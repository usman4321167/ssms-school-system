<?php
/**
 * Auth Helper - Authentication and Authorization Functions
 * Smart School Management System
 */

class Auth {
    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Login user
     */
    public function login($email_or_username, $password) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT id, username, email, password, role, first_name, status 
                FROM users 
                WHERE (email = ? OR username = ?) AND status = 'active'
            ");
            $stmt->execute([$email_or_username, $email_or_username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Update last login
                $updateStmt = $this->pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
                $updateStmt->execute([$user['id']]);

                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['first_name'] = $user['first_name'];

                // Log activity
                $this->logActivity($user['id'], 'Login', 'User logged in successfully');

                return true;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Register new user
     */
    public function register($data) {
        try {
            // Check if email exists
            $checkStmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
            $checkStmt->execute([$data['email'], $data['username']]);
            if ($checkStmt->fetch()) {
                return ['success' => false, 'message' => 'Email or username already exists'];
            }

            // Hash password
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

            // Insert user
            $stmt = $this->pdo->prepare("
                INSERT INTO users 
                (username, email, password, role, first_name, middle_name, last_name, gender, 
                 date_of_birth, phone, address, state, lga, nationality, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");

            $stmt->execute([
                $data['username'], $data['email'], $hashedPassword, $data['role'] ?? 'student',
                $data['first_name'], $data['middle_name'] ?? null, $data['last_name'],
                $data['gender'] ?? null, $data['date_of_birth'] ?? null, $data['phone'] ?? null,
                $data['address'] ?? null, $data['state'] ?? null, $data['lga'] ?? null,
                $data['nationality'] ?? null, 'active'
            ]);

            return ['success' => true, 'message' => 'Registration successful', 'user_id' => $this->pdo->lastInsertId()];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
        }
    }

    /**
     * Check if user is authenticated
     */
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get current user ID
     */
    public function getCurrentUserId() {
        return $_SESSION['user_id'] ?? null;
    }

    /**
     * Get current user role
     */
    public function getCurrentUserRole() {
        return $_SESSION['role'] ?? null;
    }

    /**
     * Check if user has specific role
     */
    public function hasRole($role) {
        return $this->getCurrentUserRole() === $role;
    }

    /**
     * Check if user has any of specified roles
     */
    public function hasAnyRole($roles = []) {
        return in_array($this->getCurrentUserRole(), $roles);
    }

    /**
     * Logout user
     */
    public function logout() {
        $userId = $this->getCurrentUserId();
        $this->logActivity($userId, 'Logout', 'User logged out');
        
        session_destroy();
        header('Location: ' . SITE_URL . 'auth/login.php');
        exit;
    }

    /**
     * Log user activity
     */
    public function logActivity($userId, $action, $description) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO activity_logs (user_id, action, description, ip_address)
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$userId, $action, $description, $_SERVER['REMOTE_ADDR'] ?? '']);
        } catch (PDOException $e) {
            // Silently fail - logging shouldn't break the app
        }
    }

    /**
     * Change password
     */
    public function changePassword($userId, $oldPassword, $newPassword) {
        try {
            $stmt = $this->pdo->prepare("SELECT password FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $user = $stmt->fetch();

            if (!$user || !password_verify($oldPassword, $user['password'])) {
                return ['success' => false, 'message' => 'Current password is incorrect'];
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateStmt = $this->pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $updateStmt->execute([$hashedPassword, $userId]);

            $this->logActivity($userId, 'Password Changed', 'User changed password');
            return ['success' => true, 'message' => 'Password changed successfully'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Failed to change password'];
        }
    }

    /**
     * Generate password reset token
     */
    public function generatePasswordResetToken($email) {
        try {
            $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if (!$user) {
                return ['success' => false, 'message' => 'Email not found'];
            }

            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $insertStmt = $this->pdo->prepare("
                INSERT INTO password_resets (user_id, token, expires_at)
                VALUES (?, ?, ?)
            ");
            $insertStmt->execute([$user['id'], $token, $expiresAt]);

            return ['success' => true, 'message' => 'Token generated', 'token' => $token];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Failed to generate token'];
        }
    }

    /**
     * Reset password with token
     */
    public function resetPassword($token, $newPassword) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT user_id FROM password_resets 
                WHERE token = ? AND expires_at > NOW() AND used = 0
            ");
            $stmt->execute([$token]);
            $reset = $stmt->fetch();

            if (!$reset) {
                return ['success' => false, 'message' => 'Invalid or expired token'];
            }

            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateStmt = $this->pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $updateStmt->execute([$hashedPassword, $reset['user_id']]);

            $markUsedStmt = $this->pdo->prepare("UPDATE password_resets SET used = 1 WHERE token = ?");
            $markUsedStmt->execute([$token]);

            return ['success' => true, 'message' => 'Password reset successfully'];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Failed to reset password'];
        }
    }
}
?>
