<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'reset password' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/forms.css') ?>">
</head>

<body>



    <div class="form-container" style="height: 500px">


        <?php if (session()->getFlashdata('success')): ?>
            <div class="message success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message error">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('warning')): ?>
            <div class="message warning">
                <?= session()->getFlashdata('warning'); ?>
            </div>
        <?php endif; ?>

        <a href="<?= site_url('/') ?>"><img src="/images/logoJF.png" alt=""></a>
        <p class="title">Enter your new password</p>
        <form class="form" action="<?= base_url('/processResetPassword') ?>" method="post">
            <input type="hidden" name="email" value="<?= $email ?>">

            <input type="password" class="input" placeholder="new password" name="password"
                value="<?= old('password') ?>">
            <input type="password" class="input" placeholder="confirm password" name="confirmPassword"
                value="<?= old('confirmPassword') ?>">

            <input class="form-btn" value="Reset password" type="submit">
        </form>
        <div class="buttons-container"></div>
    </div>
</body>

</html>