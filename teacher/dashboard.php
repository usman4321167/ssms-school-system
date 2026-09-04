<?php
/**
 * Teacher Dashboard
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
                    <span class="text-muted">Current Session: <?php echo CURRENT_SESSION; ?> - <?php echo CURRENT_TERM; ?></span>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted mb-0">My Classes</p>
                                    <h3 class="mb-0">6</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-book text-primary" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Total Students</p>
                                    <h3 class="mb-0">240</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-people text-success" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Attendance Rate</p>
                                    <h3 class="mb-0">94.5%</h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-percent text-warning" style="font-size: 24px;"></i>
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
                                    <p class="text-muted mb-0">Pending Tasks</p>
                                    <h3 class="mb-0">8</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 p-3 rounded">
                                    <i class="bi bi-list-check text-info" style="font-size: 24px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row mb-4">
                <!-- Today's Schedule -->
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-calendar-event"></i> Today's Schedule</h6>
                        </div>
                        <div class="card-body">
                            <div class="schedule-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Biology - Class 101</h6>
                                        <small class="text-muted">Room 204</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">9:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3 pb-3 border-bottom">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Chemistry - Class 102</h6>
                                        <small class="text-muted">Lab Room 1</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">11:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1">Physics - Class 103</h6>
                                        <small class="text-muted">Room 305</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary">2:00 PM</span>
                                    </div>
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
                                <a href="<?php echo SITE_URL; ?>teacher/attendance.php" class="btn btn-outline-primary btn-sm text-start">
                                    <i class="bi bi-check-circle"></i> Take Attendance
                                </a>
                                <a href="<?php echo SITE_URL; ?>teacher/results.php" class="btn btn-outline-success btn-sm text-start">
                                    <i class="bi bi-pencil-square"></i> Submit Results
                                </a>
                                <a href="<?php echo SITE_URL; ?>teacher/assignments.php" class="btn btn-outline-info btn-sm text-start">
                                    <i class="bi bi-file-earmark-plus"></i> Create Assignment
                                </a>
                                <a href="<?php echo SITE_URL; ?>teacher/messages.php" class="btn btn-outline-warning btn-sm text-start">
                                    <i class="bi bi-chat-dots"></i> Send Message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Classes -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-bottom">
                            <h6 class="mb-0"><i class="bi bi-book"></i> My Classes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Students</th>
                                            <th>Room</th>
                                            <th>Schedule</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Class 101</strong></td>
                                            <td>Biology</td>
                                            <td><span class="badge bg-light text-dark">40</span></td>
                                            <td>204</td>
                                            <td>Mon, Wed, Fri - 9:00 AM</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">Manage</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class 102</strong></td>
                                            <td>Chemistry</td>
                                            <td><span class="badge bg-light text-dark">38</span></td>
                                            <td>Lab 1</td>
                                            <td>Tue, Thu - 11:00 AM</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">Manage</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Class 103</strong></td>
                                            <td>Physics</td>
                                            <td><span class="badge bg-light text-dark">42</span></td>
                                            <td>305</td>
                                            <td>Mon, Wed, Fri - 2:00 PM</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">Manage</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <h6 class="mb-0"><i class="bi bi-clock-history"></i> Recent Activities</h6>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-success"></div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Attendance Submitted</h6>
                                            <small class="text-muted">Today at 11:30 AM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-info"></div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Results Published</h6>
                                            <small class="text-muted">Yesterday at 3:45 PM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-warning"></div>
                                        <div class="ms-3">
                                            <h6 class="mb-1">Assignment Created</h6>
                                            <small class="text-muted">2 days ago</small>
                                        </div>
                                    </div>
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
        .timeline-marker {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 4px;
        }

        .schedule-item h6 {
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</body>
</html>
