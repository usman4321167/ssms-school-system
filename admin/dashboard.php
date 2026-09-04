<?php
/**
 * Admin Dashboard
 * Smart School Management System
 */

require_once '../config/config.php';

// Check permission
requirePermission('view_dashboard');

$pageTitle = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - SSMS</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <?php include SITE_ROOT . 'includes/header.php'; ?>

    <!-- Main Container -->
    <div class="container-fluid d-flex flex-grow-1">
        <!-- Sidebar -->
        <?php include SITE_ROOT . 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="content flex-grow-1" style="margin-left: 250px; margin-top: 56px; padding: 30px 20px;">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-0"><i class="bi bi-speedometer2"></i> Dashboard</h2>
                    <small class="text-muted">Welcome back, <?php echo htmlspecialchars($_SESSION['name']); ?></small>
                </div>
                <div>
                    <span class="text-muted">Last login: <?php echo isset($_SESSION['last_login']) ? formatDateTime($_SESSION['last_login']) : 'N/A'; ?></span>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">Total Students</p>
                                    <h3 class="mb-0">1,245</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-people text-primary" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">Total Teachers</p>
                                    <h3 class="mb-0">65</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-person-badge text-success" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">Total Classes</p>
                                    <h3 class="mb-0">45</h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-building text-warning" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">Pending Fees</p>
                                    <h3 class="mb-0">$12,540</h3>
                                </div>
                                <div class="bg-danger bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-cash-coin text-danger" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0">Enrollment Trend</h6>
                        </div>
                        <div class="card-body">
                            <div style="height: 250px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <p class="text-muted mb-0">Chart will be displayed here</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0">Attendance Overview</h6>
                        </div>
                        <div class="card-body">
                            <div style="height: 250px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                <p class="text-muted mb-0">Chart will be displayed here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0">Recent Activities</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Activity</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="bi bi-person-plus text-success"></i> New Student Added</td>
                                            <td>Admin User</td>
                                            <td><?php echo formatDateTime(date('Y-m-d H:i:s')); ?></td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-file-earmark-check text-info"></i> Results Published</td>
                                            <td>Teacher User</td>
                                            <td><?php echo formatDateTime(date('Y-m-d H:i:s', strtotime('-1 hour'))); ?></td>
                                            <td><span class="badge bg-info">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-cash-coin text-warning"></i> Payment Received</td>
                                            <td>Finance User</td>
                                            <td><?php echo formatDateTime(date('Y-m-d H:i:s', strtotime('-2 hours'))); ?></td>
                                            <td><span class="badge bg-warning">Completed</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <?php include SITE_ROOT . 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo SITE_URL; ?>assets/js/script.js"></script>
</body>
</html>
