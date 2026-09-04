<?php
/**
 * Student Dashboard
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
                    <small class="text-muted">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></small>
                </div>
                <div>
                    <span class="text-muted">Current Session: <?php echo CURRENT_SESSION; ?></span>
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
                                    <p class="text-muted mb-0">Tuition Fee</p>
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
                                    <p class="text-muted mb-0">Subjects</p>
                                    <h3 class="mb-0">8</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-book text-info" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row mb-4">
                <!-- Time Table -->
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-calendar-event"></i> Today's Classes</h6>
                        </div>
                        <div class="card-body">
                            <div class="schedule-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Mathematics</h6>
                                        <small class="text-muted">Room 101 | Teacher: Mr. Smith</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">8:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">English Language</h6>
                                        <small class="text-muted">Room 102 | Teacher: Ms. Johnson</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">10:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Biology</h6>
                                        <small class="text-muted">Lab | Teacher: Dr. Brown</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">2:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-lightning"></i> Quick Links</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="<?php echo SITE_URL; ?>student/results.php" class="btn btn-outline-primary btn-sm text-start">
                                    <i class="bi bi-file-earmark-text"></i> View My Results
                                </a>
                                <a href="<?php echo SITE_URL; ?>student/attendance.php" class="btn btn-outline-success btn-sm text-start">
                                    <i class="bi bi-check-circle"></i> Check Attendance
                                </a>
                                <a href="<?php echo SITE_URL; ?>student/assignments.php" class="btn btn-outline-info btn-sm text-start">
                                    <i class="bi bi-clipboard-list"></i> View Assignments
                                </a>
                                <a href="<?php echo SITE_URL; ?>student/fees.php" class="btn btn-outline-warning btn-sm text-start">
                                    <i class="bi bi-credit-card"></i> Payment Status
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
                                <h6 class="mb-0"><i class="bi bi-graph-up"></i> Latest Test Results</h6>
                                <a href="<?php echo SITE_URL; ?>student/results.php" class="btn btn-sm btn-outline-primary">View All</a>
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
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Mathematics</strong></td>
                                            <td>Midterm Exam</td>
                                            <td>92/100</td>
                                            <td><span class="badge bg-success">A</span></td>
                                            <td><?php echo formatDate(date('Y-m-d')); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>English Language</strong></td>
                                            <td>Essay Test</td>
                                            <td>88/100</td>
                                            <td><span class="badge bg-success">A-</span></td>
                                            <td><?php echo formatDate(date('Y-m-d', strtotime('-2 days'))); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Biology</strong></td>
                                            <td>Practical Exam</td>
                                            <td>85/100</td>
                                            <td><span class="badge bg-info">B+</span></td>
                                            <td><?php echo formatDate(date('Y-m-d', strtotime('-5 days'))); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assignments & Announcements -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0"><i class="bi bi-clipboard-list"></i> Upcoming Assignments</h6>
                                <a href="<?php echo SITE_URL; ?>student/assignments.php" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="assignment-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Mathematics Assignment</h6>
                                        <small class="text-muted">Chapter 5-7 Exercises</small>
                                    </div>
                                    <span class="badge bg-danger">Due Tomorrow</span>
                                </div>
                            </div>
                            <div class="assignment-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">English Project</h6>
                                        <small class="text-muted">Research Essay</small>
                                    </div>
                                    <span class="badge bg-warning">Due in 3 days</span>
                                </div>
                            </div>
                            <div class="assignment-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Biology Lab Report</h6>
                                        <small class="text-muted">Experiment Results</small>
                                    </div>
                                    <span class="badge bg-info">Due in 5 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-megaphone"></i> Announcements</h6>
                        </div>
                        <div class="card-body">
                            <div class="announcement-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">School Holidays</h6>
                                        <small class="text-muted">Today</small>
                                    </div>
                                    <small class="text-muted">Extended holidays from next week. Check calendar for details.</small>
                                </div>
                            </div>
                            <div class="announcement-item mb-3 pb-3 border-bottom">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">Sports Day</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <small class="text-muted">Annual sports day is scheduled for next month. Register now!</small>
                                </div>
                            </div>
                            <div class="announcement-item">
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="mb-0">Library Upgrade</h6>
                                        <small class="text-muted">1 week ago</small>
                                    </div>
                                    <small class="text-muted">Library renovation completed. New resources available.</small>
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
        .schedule-item h6,
        .assignment-item h6,
        .announcement-item h6 {
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</body>
</html>
