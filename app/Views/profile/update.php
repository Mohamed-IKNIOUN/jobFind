<?php $this->extend('layouts/main') ?>


<?php $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/dynamic_links/profile_link.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/profile.css') ?>">
<?php $this->endSection(); ?>


<?php $this->section('content') ?>

<div class="container">

    <form action="/profile/edit" method="POST" class="edit-profile-form" enctype="multipart/form-data">

        <p class="last-update">Last update you made was at : <?= $userInfo['updated_at'] ?></p>

        <?php if (session()->get('user_type') == 'employee'): ?>
        <div class="input-field">
            Profile Picture :
            <?php if (!empty($userInfo['profile_picture'])): ?>
            <img class="profile-pic" src="<?= base_url(esc($userInfo['profile_picture'])) ?>" alt="Profile Picture"
                width="100" height="100">
            <?php endif; ?>
        </div>

        <div class="input-field">
            <input type="file" id="profile_picture" name="profile_picture">
        </div>
        <?php endif; ?>

        <div class=" input-field">
            Username :
            <input type="text" name="username" placeholder="Enter your username" value="<?= $userInfo['username'] ?>">
        </div>
        <div class="input-field">
            Email :
            <input type="text" name="email" placeholder="Enter your email" value="<?= $userInfo['email'] ?>">
        </div>


        <?php if (session()->get('user_type') == 'employee'): ?>

        <div class="input-field">
            Full name :
            <input type="text" name="full_name" value="<?= $userInfo['full_name'] ?>">
        </div>

        <div class="input-field">
            Date birth :
            <input type="date" name="date_birth" id="" value="<?= $userInfo['date_birth'] ?>">
        </div>

        <div class="input-field">
            Phone :
            <input type="number" name="phone" value="<?= $userInfo['phone'] ?>">
        </div>

        <div class="input-field">
            Adress :
            <input type="text" name="address" value="<?= $userInfo['address'] ?>">
        </div>

        <div class="input-field">
            Education :
            <textarea name="education" id=""><?= $userInfo['education'] ?></textarea>
        </div>

        <div class="input-field">
            Experience :
            <textarea name="experience" id=""><?= $userInfo['experience'] ?></textarea>
        </div>

        <div class="input-field">
            Skills :
            <textarea name="skills" id=""><?= $userInfo['skills'] ?></textarea>
        </div>

        <?php endif; ?>
        <input type="submit" value="Edit profile" id="edit-profile-button">
    </form>



</div>

<?php $this->endSection(); ?>