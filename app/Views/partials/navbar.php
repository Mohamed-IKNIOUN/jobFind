<?php
$session = session();
$userType = session()->get('user_type');
?>

<nav>
    <a href="/" class="logo">
        <img src="/images/logoJF.png" alt="">
    </a>
    <ul class="links">

        <!-- employee -->
        <?php if ($userType == 'employee'): ?>

            <li class="link">
                <a href="">Jobs</a>
            </li>
            <li class="link">
                <a href="">Profile</a>
            </li>
            <li class="link">
                <a href="">My applications</a>
            </li>

            <!-- employer -->
        <?php elseif ($userType == 'employer'): ?>

            <li class="link">
                <a href="/jobs/create">Post a job</a>
            </li>
            <li class="link">
                <a href="">Profile</a>
            </li>
            <li class="link">
                <a href="">My posts</a>
            </li>

            <!-- not logged -->
        <?php else : ?>

            <li class="link">
                <a href="<?= site_url('/login') ?>">Log in</a>
            </li>
            <li class="link">
                <a href="<?= site_url('/register') ?>" class="get-started">Get started</a>
            </li>
            <li class="link">
                <a href="<?= site_url('contact') ?>">Contact</a>
            </li>

        <?php endif ?>

    </ul>
</nav>