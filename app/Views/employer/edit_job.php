<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/post_job.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<div class="post-container">
    <h1 class="title" style="color:#fff">Edit a job</h1>

    <form action="<?= base_url('/jobs/edit') ?>" method="post" class="post-job-form">
        <!-- store the job id in a hidden input -->
        <input type="hidden" name="job_id" id="" value="<?= $job['job_id'] ?>">

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $job['title'] ?>">
        </div>

        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea name="description" id="description" class="form-control"
                rows="5"><?= $job['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="<?= $job['location'] ?>">
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" id="salary" class="form-control" value="<?= $job['salary'] ?>">
        </div>

        <button type="submit" class="submit-input">Edit</button>
    </form>
</div>


<?= $this->endSection(); ?>