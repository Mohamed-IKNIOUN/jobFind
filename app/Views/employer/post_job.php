<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/post_job.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/dynamic_links/post_job.css') ?>">

<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<div class="post-container">

    <h1 class="title" style="color:#fff">Post a Job</h1>
    <form action="<?= base_url('/jobs/create') ?>" method="post" class="post-job-form">
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= old('title') ?>">
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" class="form-control"
                rows="5"><?= old('description') ?></textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="<?= old('location') ?>">
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" class="form-control" value="<?= old('salary') ?>">
        </div>

        <button type="submit" class="submit-input">Post Job</button>
    </form>

</div>


<?= $this->endSection(); ?>