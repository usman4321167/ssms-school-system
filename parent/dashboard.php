<?php
/**
 * Parent Dashboard
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
                    <h2 class="mb-0"><i class="bi bi-speedometer2"></i> Parent Portal</h2>
                    <small class="text-muted">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></small>
                </div>
                <div>
                    <span class="text-muted">Current Session: <?php echo CURRENT_SESSION; ?></span>
                </div>
            </div>

            <!-- Child Selection -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="mb-3"><i class="bi bi-people"></i> Select Child</h6>
                            <div class="child-selector">
                                <button class="btn btn-outline-primary active" data-child-id="1">
                                    <i class="bi bi-person"></i> John Doe - Class 10A
                                </button>
                                <button class="btn btn-outline-primary" data-child-id="2">
                                    <i class="bi bi-person"></i> Jane Doe - Class 8B
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">GPA</p>
                                    <h3 class="mb-0">3.85</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-graph-up text-primary" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Attendance</p>
                                    <h3 class="mb-0">96%</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-check-circle text-success" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Fees Status</p>
                                    <h3 class="mb-0">Paid</h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-cash-coin text-warning" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Messages</p>
                                    <h3 class="mb-0">3</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-chat-dots text-info" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row mb-4">
                <!-- Child Performance -->
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-graph-up"></i> Performance Overview</h6>
                        </div>
                        <div class="card-body">
                            <div class="performance-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Mathematics</span>
                                    <strong>92%</strong>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                                </div>
                            </div>
                            <div class="performance-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>English Language</span>
                                    <strong>88%</strong>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 88%"></div>
                                </div>
                            </div>
                            <div class="performance-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Biology</span>
                                    <strong>85%</strong>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                                </div>
                            </div>
                            <div class="performance-item">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>History</span>
                                    <strong>90%</strong>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="<?php echo SITE_URL; ?>parent/child-results.php" class="btn btn-outline-primary btn-sm text-start">
                                    <i class="bi bi-file-earmark-text"></i> View Child Results
                                </a>
                                <a href="<?php echo SITE_URL; ?>parent/child-attendance.php" class="btn btn-outline-success btn-sm text-start">
                                    <i class="bi bi-check-circle"></i> Check Attendance
                                </a>
                                <a href="<?php echo SITE_URL; ?>parent/payment-history.php" class="btn btn-outline-warning btn-sm text-start">
                                    <i class="bi bi-credit-card"></i> Payment History
                                </a>
                                <a href="<?php echo SITE_URL; ?>parent/communicate.php" class="btn btn-outline-info btn-sm text-start">
                                    <i class="bi bi-chat-dots"></i> Contact Teachers
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Results -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0"><i class="bi bi-book"></i> Latest Results</h6>
                                <a href="<?php echo SITE_URL; ?>parent/child-results.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Subject</th>
                                            <th>Test Name</th>
                                            <th>Score</th>
                                            <th>Grade</th>
                                            <th>Teacher Comment</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Mathematics</strong></td>
                                            <td>Midterm Exam</td>
                                            <td>92/100</td>
                                            <td><span class="badge bg-success">A</span></td>
                                            <td><small>Excellent performance</small></td>
                                            <td><?php echo formatDate(date('Y-m-d')); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>English Language</strong></td>
                                            <td>Essay Test</td>
                                            <td>88/100</td>
                                            <td><span class="badge bg-success">A-</span></td>
                                            <td><small>Well written essay</small></td>
                                            <td><?php echo formatDate(date('Y-m-d', strtotime('-2 days'))); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Biology</strong></td>
                                            <td>Practical Exam</td>
                                            <td>85/100</td>
                                            <td><span class="badge bg-info">B+</span></td>
                                            <td><small>Good understanding</small></td>
                                            <td><?php echo formatDate(date('Y-m-d', strtotime('-5 days'))); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages & Announcements -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0"><i class="bi bi-chat-dots"></i> Messages from Teachers</h6>
                                <a href="<?php echo SITE_URL; ?>parent/messages.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="message-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>Mr. Smith</strong>
                                        <small class="text-muted">Today</small>
                                    </div>
                                    <small class="text-muted">Mathematics: Your child performed excellent in today's test.</small>
                                </div>
                            </div>
                            <div class="message-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>Ms. Johnson</strong>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <small class="text-muted">English: Great participation in class discussions.</small>
                                </div>
                            </div>
                            <div class="message-item">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>Dr. Brown</strong>
                                        <small class="text-muted">1 week ago</small>
                                    </div>
                                    <small class="text-muted">Biology: Please encourage more lab participation.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-megaphone"></i> School Announcements</h6>
                        </div>
                        <div class="card-body">
                            <div class="announcement-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">Parent-Teacher Meeting</h6>
                                        <small class="text-muted">3 days away</small>
                                    </div>
                                    <small class="text-muted">PTM scheduled for <?php echo formatDate(date('Y-m-d', strtotime('+3 days'))); ?>. Register now.</small>
                                </div>
                            </div>
                            <div class="announcement-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">Sports Day</h6>
                                        <small class="text-muted">1 month away</small>
                                    </div>
                                    <small class="text-muted">Annual sports day is scheduled. Encourage your child to participate.</small>
                                </div>
                            </div>
                            <div class="announcement-item">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">Mid-term Break</h6>
                                        <small class="text-muted">2 weeks away</small>
                                    </div>
                                    <small class="text-muted">Mid-term break starts <?php echo formatDate(date('Y-m-d', strtotime('+2 weeks'))); ?>.</small>
                                </div>
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

    <style>
        .child-selector {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .child-selector .btn {
            flex: 1;
            min-width: 200px;
        }

        .performance-item h6,
        .message-item,
        .announcement-item {
            font-size: 14px;
        }
    </style>
</body>
</html>
