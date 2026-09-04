<?php
/**
 * Layout Template
 * Smart School Management System
 * Master layout file that includes header, sidebar, and footer
 */

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . SITE_URL . 'login.php');
    exit();
}

// Define current page for active link highlighting
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ' : ''; ?>SSMS - School Management System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css">
    <?php if (isset($additionalCSS)): ?>
        <?php echo $additionalCSS; ?>
    <?php endif; ?>
</head>
<body class="d-flex flex-column">
    <!-- Header -->
    <?php include SITE_ROOT . 'includes/header.php'; ?>

    <!-- Main Container -->
    <div class="container-fluid d-flex flex-grow-1">
        <!-- Sidebar -->
        <?php include SITE_ROOT . 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="content flex-grow-1" style="margin-left: 250px; padding: 30px 20px;">
            <?php if (isset($content)): ?>
                <?php echo $content; ?>
            <?php endif; ?>
        </main>
    </div>

    <!-- Footer -->
    <?php include SITE_ROOT . 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo SITE_URL; ?>assets/js/script.js"></script>
    <?php if (isset($additionalJS)): ?>
        <?php echo $additionalJS; ?>
    <?php endif; ?>
</body>
</html>
