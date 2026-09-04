<?php
/**
 * Header Component
 * Smart School Management System
 * Navigation bar and top menu
 */

$userName = $_SESSION['name'] ?? 'User';
$userRole = $_SESSION['role'] ?? null;
$userImage = $_SESSION['profile_image'] ?? SITE_URL . 'assets/images/default-avatar.png';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm" id="navbar">
    <div class="container-fluid">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
            <i class="bi bi-book-half"></i>
            <strong>SSMS</strong>
        </a>

        <!-- Sidebar Toggle Button -->
        <button class="btn btn-outline-light me-3 d-lg-none" type="button" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button>

        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center Navigation Items (Hidden on mobile) -->
            <ul class="navbar-nav ms-auto me-3 d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>notifications.php">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="notificationBadge" style="display: none;">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>messages.php">
                        <i class="bi bi-chat-dots"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="messageBadge" style="display: none;">0</span>
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <div class="nav-item dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $userImage; ?>" alt="Profile" class="rounded-circle" width="28" height="28" style="object-fit: cover;">
                    <span class="ms-2 d-none d-md-inline"><?php echo htmlspecialchars($userName); ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDropdown">
                    <li><h6 class="dropdown-header"><?php echo htmlspecialchars($userName); ?></h6></li>
                    <li><small class="dropdown-header text-muted"><?php echo ucfirst(str_replace('_', ' ', $userRole)); ?></small></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>profile.php"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>change-password.php"><i class="bi bi-key"></i> Change Password</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>settings.php"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo SITE_URL; ?>logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
.navbar {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-size: 24px;
    font-weight: 600;
    color: white !important;
}

.navbar-brand i {
    margin-right: 8px;
    color: #0d6efd;
}

.nav-link {
    position: relative;
    color: rgba(255, 255, 255, 0.7) !important;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: white !important;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.dropdown-item {
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    border-left: 3px solid #0d6efd;
    padding-left: 12px;
}

.dropdown-item i {
    margin-right: 8px;
    width: 16px;
    color: #0d6efd;
}

#sidebarToggle {
    border-color: rgba(255, 255, 255, 0.3) !important;
    color: rgba(255, 255, 255, 0.7) !important;
}

#sidebarToggle:hover {
    border-color: white !important;
    color: white !important;
    background-color: rgba(255, 255, 255, 0.1);
}

@media (max-width: 768px) {
    .navbar-brand {
        font-size: 20px;
    }

    .nav-link span {
        display: none;
    }

    .dropdown-toggle span {
        display: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth < 992) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    }

    // Load notifications count
    loadNotificationCount();
    loadMessageCount();

    // Refresh notifications every 30 seconds
    setInterval(loadNotificationCount, 30000);
    setInterval(loadMessageCount, 30000);
});

function loadNotificationCount() {
    fetch('<?php echo SITE_URL; ?>api/notifications/count.php')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('notificationBadge');
            if (data.count > 0) {
                badge.textContent = data.count;
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        })
        .catch(error => console.log('Error loading notifications:', error));
}

function loadMessageCount() {
    fetch('<?php echo SITE_URL; ?>api/messages/count.php')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('messageBadge');
            if (data.count > 0) {
                badge.textContent = data.count;
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        })
        .catch(error => console.log('Error loading messages:', error));
}
</script>
