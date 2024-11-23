<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/post_job.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<h1 class="title">Post a Job</h1>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<form action="<?= base_url('/jobs/create') ?>" method="post" class="post-job-form">
    <?= csrf_field(); ?>

    <div class="form-group">
        <label for="title">Job Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Job Description</label>
        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
    </div>

    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" name="salary" id="salary" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Post Job</button>
</form>


<?= $this->endSection(); ?>