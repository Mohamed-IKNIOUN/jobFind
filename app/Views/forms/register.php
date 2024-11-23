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

        <a href="<?= site_url('/') ?>"><img src="images/logoJF.png" alt=""></a>
        <p class="title">Register</p>
        <form class="form" method="post" action="<?= base_url('/register') ?>">
            <?php if (isset($errors['username'])):; ?>
                <div class="message error">
                    <?= $errors['username'] ?>
                </div>
            <?php endif; ?>
            <input type="text" class="input" placeholder="username" name="username" value="<?= old('username') ?>">
            <?php if (isset($errors['password'])):; ?>
                <div class="message error">
                    <?= $errors['password'] ?>
                </div>
            <?php endif; ?>
            <input type="password" class="input" placeholder="password" name="password" value="<?= old('password') ?>">
            <?php if (isset($errors['email'])):; ?>
                <div class="message error">
                    <?= $errors['email'] ?>
                </div>
            <?php endif; ?>
            <input type="email" class="input" placeholder="email" name="email" value="<?= old('email') ?>">
            <?php if (isset($errors['role'])):; ?>
                <div class="message error">
                    <?= $errors['role'] ?>
                </div>
            <?php endif; ?>
            <div class="role-field">
                I am an :
                <select name="role" id="">
                    <option value="employee">Employee</option>
                    <option value="employer">Employer</option>
                </select>
            </div>
            <input class="form-btn" value="Sign up" type="submit">
        </form>
        <p class="sign-up-label">
            Already have an account ? <a href="<?= site_url('/login') ?>" class="sign-up-link"> Log in</a>
        </p>
        <div class="buttons-container">
        </div>
    </div>
</body>

</html>