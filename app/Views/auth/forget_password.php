<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'forget password' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/forms.css') ?>">
</head>

<body>



    <div class="form-container" style="height: 400px">

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
        <p class="title">Enter your email</p>
        <form class="form" action="<?= base_url('/sendResetLink') ?>" method="post">
            <?php if (isset($errors['email'])):; ?>
                <div class="message error">
                    <?= $errors['email'] ?>
                </div>
            <?php endif; ?>
            <input type="email" class="input" placeholder="Email" name="email" value="<?= old('email') ?>">

            <input class="form-btn" value="Send reset link" type="submit">
        </form>
        <div class="buttons-container"></div>
    </div>
</body>

</html>