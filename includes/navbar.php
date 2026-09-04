<?php
/**
 * Navbar Component
 * Smart School Management System
 */

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . SITE_URL . 'auth/login.php');
    exit;
}

// Get unread notifications count
$notifStmt = $pdo->prepare("SELECT COUNT(*) as count FROM notifications WHERE user_id = ? AND is_read = 0");
$notifStmt->execute([$_SESSION['user_id']]);
$notifCount = $notifStmt->fetch()['count'] ?? 0;

// Get user info
$userStmt = $pdo->prepare("SELECT id, first_name, last_name, profile_picture, role FROM users WHERE id = ?");
$userStmt->execute([$_SESSION['user_id']]);
$currentUser = $userStmt->fetch();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="<?php echo SITE_URL; ?>">
            <i class="bi bi-book"></i> SSMS
        </a>

        <!-- Toggler for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center items -->
            <ul class="navbar-nav ms-auto me-3">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell-fill"></i>
                        <?php if ($notifCount > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $notifCount; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="min-width: 350px;">
                        <li><h6 class="dropdown-header">Notifications</h6></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        <?php
                        $notifQuery = $pdo->prepare("
                            SELECT id, title, message, type, is_read, created_at 
                            FROM notifications 
                            WHERE user_id = ? 
                            ORDER BY created_at DESC 
                            LIMIT 5
                        ");
                        $notifQuery->execute([$_SESSION['user_id']]);
                        $notifications = $notifQuery->fetchAll();

                        if ($notifications) {
                            foreach ($notifications as $notif):
                                $readClass = $notif['is_read'] ? '' : 'bg-light';
                        ?>
                            <li>
                                <a class="dropdown-item <?php echo $readClass; ?>" href="#" onclick="markNotificationAsRead(<?php echo $notif['id']; ?>)">
                                    <small class="d-block fw-bold"><?php echo htmlspecialchars($notif['title']); ?></small>
                                    <small class="text-muted"><?php echo htmlspecialchars(substr($notif['message'], 0, 50)); ?>...</small>
                                    <small class="d-block text-muted"><?php echo date('M d, H:i', strtotime($notif['created_at'])); ?></small>
                                </a>
                            </li>
                        <?php 
                            endforeach;
                        } else {
                            echo '<li><a class="dropdown-item text-center text-muted" href="#">No notifications</a></li>';
                        }
                        ?>
                        
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center small" href="<?php echo SITE_URL; ?>notifications.php">View All</a></li>
                    </ul>
                </li>

                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <?php if ($currentUser['profile_picture']): ?>
                            <img src="<?php echo SITE_URL . 'uploads/' . htmlspecialchars($currentUser['profile_picture']); ?>" alt="Profile" class="rounded-circle me-2" width="30" height="30" style="object-fit: cover;">
                        <?php else: ?>
                            <i class="bi bi-person-circle me-2"></i>
                        <?php endif; ?>
                        <span class="d-none d-lg-inline"><?php echo htmlspecialchars($currentUser['first_name']); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><h6 class="dropdown-header"><?php echo htmlspecialchars($currentUser['first_name'] . ' ' . $currentUser['last_name']); ?></h6></li>
                        <li><small class="dropdown-header text-muted">Role: <?php echo ucfirst(str_replace('_', ' ', $currentUser['role'])); ?></small></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>profile.php"><i class="bi bi-person"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>change-password.php"><i class="bi bi-key"></i> Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo SITE_URL; ?>auth/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
function markNotificationAsRead(notifId) {
    fetch('<?php echo SITE_URL; ?>ajax/mark-notification-read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'notification_id=' + notifId
    }).then(() => {
        location.reload();
    });
}
</script>
