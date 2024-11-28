<hr>
<footer>
    <div class="upper-footer">
        <?php if (!session()->get('user_id')): ?>
        <div class="upper-footer-section">
            <ul>
                <li>
                    <h3>Account</h3>
                </li>
                <li>
                    <a href="/login">Login</a>
                </li>
                <li>
                    <a href="/register">Create an account</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="upper-footer-section">
            <ul>
                <li>
                    <h3>Company</h3>
                </li>
                <li>
                    <a href="/about">About us</a>
                </li>
                <li>
                    <a href="/Terms">Terms o use</a>
                </li>
            </ul>
        </div>
        <div class="upper-footer-section">
            <ul>
                <li>
                    <h3>Contact us</h3>
                </li>
                <li>
                    <a href="">Email us</a>
                </li>
                <li>
                    <a href="">Call +212 000000000</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="lower-footer">
        <div class="social-media">
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <div class="last-part">
            <img src="/images/logoJF.png" alt="">
            jobFind, All rights are reserved &copy; <?= date('Y'); ?>
        </div>
    </div>
</footer>