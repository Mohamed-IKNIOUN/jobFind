<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'login' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/forms.css') ?>">
</head>

<body>



    <div class="form-container">

        <?php $errors = session()->getFlashdata('errors'); ?>


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

        <a href="<?= site_url('/') ?>"><img src="images/logoJF.png" alt=""></a>
        <p class="title">Login</p>
        <form class="form" action="<?= base_url('/login') ?>" method="post">
            <?php if (isset($errors['email'])):; ?>
            <div class="message error">
                <?= $errors['email'] ?>
            </div>
            <?php endif; ?>
            <input type="email" class="input" placeholder="Email" name="email" value="<?= old('email') ?>">
            <?php if (isset($errors['password'])): ?>
            <div class="message error">
                <?= $errors['password'] ?>
            </div>
            <?php endif; ?>
            <input type="password" class="input" placeholder="Password" name="password" value="<?= old('password') ?>">
            <p class="page-link">
                <span class="page-link-label">Forgot Password?</span>
            </p>
            <input class="form-btn" value="Log in" type="submit">
        </form>
        <p class="sign-up-label">
            Don't have an account?
            <a href="/register" class="sign-up-link">Sign up</a>
        </p>
        <div class="buttons-container"></div>
    </div>
</body>

</html>