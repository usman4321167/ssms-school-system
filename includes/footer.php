<?php
/**
 * Footer Component
 * Smart School Management System
 * Footer with links and copyright information
 */

$currentYear = date('Y');
?>

<footer class="footer bg-dark text-white mt-5 pt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-3 mb-4">
                <h5 class="footer-title">
                    <i class="bi bi-book-half"></i> SSMS
                </h5>
                <p class="text-muted small">
                    Smart School Management System is a comprehensive solution for managing all aspects of school operations including students, teachers, academics, and finance.
                </p>
                <div class="social-links">
                    <a href="#" class="text-muted" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-muted" title="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-muted" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="text-muted" title="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-4">
                <h6 class="footer-title">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>about.php">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>contact.php">Contact</a></li>
                    <li><a href="<?php echo SITE_URL; ?>faq.php">FAQ</a></li>
                    <li><a href="<?php echo SITE_URL; ?>support.php">Support</a></li>
                </ul>
            </div>

            <!-- Important Links -->
            <div class="col-md-3 mb-4">
                <h6 class="footer-title">Important Links</h6>
                <ul class="footer-links">
                    <li><a href="<?php echo SITE_URL; ?>privacy.php">Privacy Policy</a></li>
                    <li><a href="<?php echo SITE_URL; ?>terms.php">Terms & Conditions</a></li>
                    <li><a href="<?php echo SITE_URL; ?>sitemap.php">Sitemap</a></li>
                    <li><a href="<?php echo SITE_URL; ?>documentation.php">Documentation</a></li>
                    <li><a href="<?php echo SITE_URL; ?>api-docs.php">API Documentation</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-md-3 mb-4">
                <h6 class="footer-title">Contact Info</h6>
                <ul class="footer-links">
                    <li>
                        <i class="bi bi-geo-alt"></i>
                        <span>123 School Street, City, State 12345</span>
                    </li>
                    <li>
                        <i class="bi bi-telephone"></i>
                        <a href="tel:+1234567890">+1 (234) 567-890</a>
                    </li>
                    <li>
                        <i class="bi bi-envelope"></i>
                        <a href="mailto:info@school.com">info@school.com</a>
                    </li>
                    <li>
                        <i class="bi bi-clock"></i>
                        <span>Mon - Fri: 8:00 AM - 4:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <hr class="bg-secondary my-4">

        <!-- Bottom Section -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 small text-muted">
                    &copy; <?php echo $currentYear; ?> Smart School Management System. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 small text-muted">
                    Version 1.0.0 | Last Updated: <?php echo date('M d, Y'); ?>
                </p>
            </div>
        </div>

        <!-- Developer Info -->
        <div class="row mt-3">
            <div class="col-12 text-center">
                <p class="small text-muted mb-0">
                    Developed with <i class="bi bi-heart-fill text-danger"></i> by 
                    <a href="#" class="text-decoration-none">Development Team</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.footer {
    background-color: #212529 !important;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    margin-top: auto;
}

.footer-title {
    font-size: 16px;
    font-weight: 600;
    color: white;
    margin-bottom: 15px;
}

.footer-title i {
    color: #0d6efd;
    margin-right: 8px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 10px;
    font-size: 14px;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #0d6efd;
}

.footer-links i {
    color: #0d6efd;
    margin-right: 8px;
    width: 16px;
}

.social-links {
    margin-top: 15px;
}

.social-links a {
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    margin-right: 10px;
    transition: all 0.3s ease;
    color: rgba(255, 255, 255, 0.6);
}

.social-links a:hover {
    background-color: #0d6efd;
    color: white;
}

hr.bg-secondary {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

.text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
}

.small {
    font-size: 13px;
}

@media (max-width: 768px) {
    .footer {
        padding-top: 30px !important;
    }

    .col-md-3,
    .col-md-6 {
        text-align: center !important;
        margin-bottom: 20px;
    }

    .footer-links li {
        margin-bottom: 8px;
    }

    .social-links {
        justify-content: center;
        display: flex;
    }
}

/* Ensure footer stays at bottom */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

main, .container {
    flex: 1;
}

.footer {
    margin-top: auto;
    width: 100%;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Footer scroll-to-top functionality (optional)
    const footerLinks = document.querySelectorAll('.footer-links a');
    
    footerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Keep default behavior for external links
            if (this.hostname !== window.location.hostname) {
                return;
            }
        });
    });

    // Update year dynamically
    const currentYear = new Date().getFullYear();
    const yearElements = document.querySelectorAll('footer .small');
    yearElements.forEach(el => {
        if (el.textContent.includes('&copy;')) {
            el.textContent = '© ' + currentYear + ' Smart School Management System. All rights reserved.';
        }
    });
});
</script>
