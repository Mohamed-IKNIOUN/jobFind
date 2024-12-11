<?php $this->extend('layouts/main') ?>

<?php $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/dynamic_links/profile_link.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/profile.css') ?>">

<!-- add csss -->

<?php $this->endSection(); ?>


<?php $this->section('content') ?>

<div class="container">
    <?php if (session()->get('user_type') == 'employer'): ?>

        <div class="profile-cover">
            <img class="profile-picture" src="<?= base_url('/images/default_profile.jpg') ?>">
        </div>

        <div class="profile-infos">
            <h2><?= $profile['username'] ?></h2>
        </div>

        <div class="edit-profile-section">
            <a href="<?= base_url('/profile/edit') ?>" id="edit-profile-link">Edit Informations</a>
        </div>

    <?php endif; ?>


    <?php if (session()->get('user_type') == 'employee'): ?>

        <div class="profile-cover">
            <img class="profile-picture" src="<?= $profile['profile_picture'] ?>">
        </div>

        <div class="profile-infos">
            <h2><?= $profile['full_name'] ?></h2>
        </div>

        <div class="edit-profile-section">
            <a href="<?= base_url('/profile/edit') ?>" id="edit-profile-link">Edit Profile</a>
        </div>

        <div class="employee-infos">
            <div class="employee-info">
                <b>Education : </b> <?= $profile['education'] ?>
            </div>
            <div class="employee-info">
                <b>Experience : </b> <?= $profile['experience'] ?>
            </div>
            <div class="employee-info">
                <b>Skills : </b> <?= $profile['skills'] ?>
            </div>
        </div>



    <?php endif; ?>
</div>



<?php $this->endSection(); ?>