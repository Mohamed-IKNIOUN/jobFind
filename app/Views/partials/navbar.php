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
            <a href="/jobs" id="main-link">Jobs</a>
        </li>
        <li class="link">
            <a href="/jobs/myApplications" id="my-applications-link">My applications</a>
        </li>
        <li class="link">
            <a href="/profile" id="profile-link">Profile</a>
        </li>

        <!-- employer -->
        <?php elseif ($userType == 'employer'): ?>

        <li class="link">
            <a href="/myPosts" id="main-link">My posts</a>
        </li>
        <li class="link">
            <a href="/jobs/create" id="post-job-link">Post a job</a>
        </li>
        <li class="link">
            <a href="/profile" id="profile-link">Profile</a>
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
            <a href="<?= site_url('/contact') ?>">Contact</a>
        </li>

        <?php endif ?>

        <?php if (session()->get('isLogged')): ?>
        <li class="link">
            <a href="<?= site_url('/logout') ?>" id="logout">Logout</a>
        </li>
        <?php endif; ?>

    </ul>
</nav>