<?php
/**
 * Sidebar Component
 * Smart School Management System
 * Displays different menu items based on user role
 */

$userRole = $_SESSION['role'] ?? null;
?>

<aside class="sidebar bg-dark text-white" id="sidebar">
    <div class="sidebar-header p-3 border-bottom">
        <h5 class="mb-0">
            <i class="bi bi-book"></i> SSMS
        </h5>
        <small class="text-muted">School Management</small>
    </div>

    <nav class="sidebar-nav">
        <?php if ($userRole === 'super_admin' || $userRole === 'admin'): ?>
            <!-- Admin Menu -->
            <a href="<?php echo SITE_URL; ?>admin/dashboard.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/dashboard') !== false ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">
                <h6 class="nav-title">MANAGEMENT</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/students/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/students') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-people"></i> Students
                </a>

                <a href="<?php echo SITE_URL; ?>admin/teachers/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/teachers') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-person-badge"></i> Teachers
                </a>

                <a href="<?php echo SITE_URL; ?>admin/staff/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/staff') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-briefcase"></i> Staff
                </a>

                <a href="<?php echo SITE_URL; ?>admin/parents/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/parents') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-heart"></i> Parents
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACADEMICS</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/classes/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/classes') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-building"></i> Classes
                </a>

                <a href="<?php echo SITE_URL; ?>admin/subjects/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/subjects') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-book-half"></i> Subjects
                </a>

                <a href="<?php echo SITE_URL; ?>admin/sessions/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/sessions') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-calendar-check"></i> Sessions & Terms
                </a>

                <a href="<?php echo SITE_URL; ?>admin/enrollments/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/enrollments') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-check"></i> Enrollments
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">RECORDS</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/attendance/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/attendance') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-clipboard-check"></i> Attendance
                </a>

                <a href="<?php echo SITE_URL; ?>admin/results/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/results') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up"></i> Results
                </a>

                <a href="<?php echo SITE_URL; ?>admin/examinations/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/examinations') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-pencil-square"></i> Examinations
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">FINANCE</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/fees/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/fees') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-cash-coin"></i> Fees
                </a>

                <a href="<?php echo SITE_URL; ?>admin/payments/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/payments') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-credit-card"></i> Payments
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">APPLICATIONS</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/student-registrations/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/student-registrations') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-text"></i> Student Applications
                </a>

                <a href="<?php echo SITE_URL; ?>admin/staff-registrations/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/staff-registrations') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-text"></i> Staff Applications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">COMMUNICATION</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/announcements/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/announcements') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-megaphone"></i> Announcements
                </a>

                <a href="<?php echo SITE_URL; ?>admin/notifications/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/notifications') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i> Notifications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">REPORTS</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/reports/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/reports') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-pdf"></i> Reports
                </a>

                <a href="<?php echo SITE_URL; ?>admin/activity-logs/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/activity-logs') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-file-text"></i> Activity Logs
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">SETTINGS</h6>
                
                <a href="<?php echo SITE_URL; ?>admin/settings/" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'admin/settings') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-gear"></i> Settings
                </a>
            </div>

        <?php elseif ($userRole === 'teacher'): ?>
            <!-- Teacher Menu -->
            <a href="<?php echo SITE_URL; ?>teacher/dashboard.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/dashboard') !== false ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">
                <h6 class="nav-title">ACADEMICS</h6>
                
                <a href="<?php echo SITE_URL; ?>teacher/classes.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/classes') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-building"></i> My Classes
                </a>

                <a href="<?php echo SITE_URL; ?>teacher/subjects.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/subjects') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-book-half"></i> My Subjects
                </a>

                <a href="<?php echo SITE_URL; ?>teacher/students.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/students') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-people"></i> Students
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">RECORDS</h6>
                
                <a href="<?php echo SITE_URL; ?>teacher/attendance.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/attendance') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-clipboard-check"></i> Attendance
                </a>

                <a href="<?php echo SITE_URL; ?>teacher/results.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/results') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up"></i> Results
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">COMMUNICATION</h6>
                
                <a href="<?php echo SITE_URL; ?>teacher/announcements.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/announcements') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-megaphone"></i> Announcements
                </a>

                <a href="<?php echo SITE_URL; ?>teacher/notifications.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'teacher/notifications') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i> Notifications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACCOUNT</h6>
                
                <a href="<?php echo SITE_URL; ?>profile.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'profile') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-person"></i> Profile
                </a>

                <a href="<?php echo SITE_URL; ?>change-password.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'change-password') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-key"></i> Change Password
                </a>
            </div>

        <?php elseif ($userRole === 'staff'): ?>
            <!-- Staff Menu -->
            <a href="<?php echo SITE_URL; ?>staff/dashboard.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'staff/dashboard') !== false ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">
                <h6 class="nav-title">RECORDS</h6>
                
                <a href="<?php echo SITE_URL; ?>staff/attendance.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'staff/attendance') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-clipboard-check"></i> Attendance
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">COMMUNICATION</h6>
                
                <a href="<?php echo SITE_URL; ?>staff/announcements.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'staff/announcements') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-megaphone"></i> Announcements
                </a>

                <a href="<?php echo SITE_URL; ?>staff/notifications.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'staff/notifications') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i> Notifications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACCOUNT</h6>
                
                <a href="<?php echo SITE_URL; ?>profile.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'profile') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-person"></i> Profile
                </a>

                <a href="<?php echo SITE_URL; ?>change-password.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'change-password') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-key"></i> Change Password
                </a>
            </div>

        <?php elseif ($userRole === 'student'): ?>
            <!-- Student Menu -->
            <a href="<?php echo SITE_URL; ?>student/dashboard.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/dashboard') !== false ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">
                <h6 class="nav-title">ACADEMICS</h6>
                
                <a href="<?php echo SITE_URL; ?>student/results.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/results') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up"></i> Results
                </a>

                <a href="<?php echo SITE_URL; ?>student/attendance.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/attendance') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-clipboard-check"></i> Attendance
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">FINANCE</h6>
                
                <a href="<?php echo SITE_URL; ?>student/fees.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/fees') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-cash-coin"></i> Fees
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">COMMUNICATION</h6>
                
                <a href="<?php echo SITE_URL; ?>student/announcements.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/announcements') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-megaphone"></i> Announcements
                </a>

                <a href="<?php echo SITE_URL; ?>student/notifications.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'student/notifications') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i> Notifications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACCOUNT</h6>
                
                <a href="<?php echo SITE_URL; ?>profile.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'profile') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-person"></i> Profile
                </a>

                <a href="<?php echo SITE_URL; ?>change-password.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'change-password') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-key"></i> Change Password
                </a>
            </div>

        <?php elseif ($userRole === 'parent'): ?>
            <!-- Parent Menu -->
            <a href="<?php echo SITE_URL; ?>parent/dashboard.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/dashboard') !== false ? 'active' : ''; ?>">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <div class="nav-section">
                <h6 class="nav-title">CHILDREN</h6>
                
                <a href="<?php echo SITE_URL; ?>parent/children.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/children') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-people"></i> My Children
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACADEMICS</h6>
                
                <a href="<?php echo SITE_URL; ?>parent/results.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/results') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up"></i> Results
                </a>

                <a href="<?php echo SITE_URL; ?>parent/attendance.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/attendance') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-clipboard-check"></i> Attendance
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">FINANCE</h6>
                
                <a href="<?php echo SITE_URL; ?>parent/fees.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/fees') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-cash-coin"></i> Fees
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">COMMUNICATION</h6>
                
                <a href="<?php echo SITE_URL; ?>parent/announcements.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/announcements') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-megaphone"></i> Announcements
                </a>

                <a href="<?php echo SITE_URL; ?>parent/notifications.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'parent/notifications') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i> Notifications
                </a>
            </div>

            <div class="nav-section">
                <h6 class="nav-title">ACCOUNT</h6>
                
                <a href="<?php echo SITE_URL; ?>profile.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'profile') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-person"></i> Profile
                </a>

                <a href="<?php echo SITE_URL; ?>change-password.php" class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'change-password') !== false ? 'active' : ''; ?>">
                    <i class="bi bi-key"></i> Change Password
                </a>
            </div>
        <?php endif; ?>
    </nav>
</aside>

<style>
.sidebar {
    height: 100vh;
    position: fixed;
    left: 0;
    top: 56px;
    width: 250px;
    overflow-y: auto;
    z-index: 1000;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    padding: 0;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    border-left: 3px solid transparent;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: white;
    border-left-color: #0d6efd;
}

.nav-link.active {
    background-color: rgba(13, 110, 253, 0.1);
    color: white;
    border-left-color: #0d6efd;
}

.nav-link i {
    margin-right: 10px;
    width: 20px;
}

.nav-section {
    padding-top: 15px;
    padding-bottom: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: 10px;
}

.nav-title {
    padding: 8px 15px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
    letter-spacing: 0.5px;
}

.sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.sidebar-header h5 {
    font-size: 18px;
}

@media (max-width: 768px) {
    .sidebar {
        width: 220px;
        margin-left: -220px;
        transition: margin-left 0.3s ease;
    }

    .sidebar.show {
        margin-left: 0;
    }

    .sidebar-nav {
        padding-bottom: 60px;
    }
}
</style>
