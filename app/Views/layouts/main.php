<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'JobFind' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- render cusmtomized css -->
    <?= $this->renderSection('custom_css') ?>
</head>

<body>
    <!-- dynamic navbar -->
    <?= $this->include('partials/navbar'); ?>

    <!-- dynamic messages section -->
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
        <?= "Warning : " . session()->getFlashdata('warning'); ?>
    </div>
    <?php endif; ?>

    <!-- main content -->
    <?= $this->renderSection('content') ?>

    <!-- dynamic footer -->
    <?= $this->include('partials/footer') ?>

</body>

</html>