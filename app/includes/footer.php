<?php include(ROOT_PATH . '/app/includes/mail.php'); ?>
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>Blog</span>io</h1>
            <p>
                Website Description - To be filled
            </p>
            <div class="contact">
                <span><i class="fas fa-phone"></i> &nbsp; 123-456-789</span>
                <span><i class="fas fa-envelope"></i> &nbsp; itCouncil@gmail.com</span>
            </div>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <a href="<?php echo BASE_URL . '/about.php' ?>">
                    <li>About Us</li>
                </a>
                <?php if (isset($_SESSION['admin'])) : ?>
                    <a href="<?php echo BASE_URL . '/usersChat/samples/chat/index.php#!/login' ?>" target="_blank">
                        <li>Chat with peers</li>
                    </a>
                <?php endif; ?>

                <a href="<?php echo BASE_URL . '/profile.php' ?>">
                    <li>Profile</li>
                </a>

            </ul>
        </div>

        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>
            <form action="mailto:sabadmodi@gmail.com?body=" method="post" enctype="text/plain" target="_blank">
                <!-- <input type="text" name="subject" class="text-input contact-input" placeholder="Your Subject"> -->
                <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your Message"></textarea>
                <button type="submit" class="btn btn-big contact-btn" name="mail-submit">
                    <i class="fas fa-envelope"></i>
                    Send
                </button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; Gems Modern Academy | Designed by Sabad Modi
    </div>
</div>