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
            <a href="/jobs">Jobs</a>
        </li>
        <li class="link">
            <a href="/jobs/myApplications">My applications</a>
        </li>
        <li class="link">
            <a href="/profile">Profile</a>
        </li>

        <!-- employer -->
        <?php elseif ($userType == 'employer'): ?>

        <li class="link">
            <a href="/myPosts">My posts</a>
        </li>
        <li class="link">
            <a href="/jobs/create">Post a job</a>
        </li>
        <li class="link">
            <a href="/profile">Profile</a>
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
            <a href="<?= site_url('/logout') ?>">Logout</a>
        </li>
        <?php endif; ?>

    </ul>
</nav>