<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/jobs.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>



<!-- Display the list of jobs posted by the logged employer -->
<center>

    <h2 class="title ">Your Posted Jobs</h2>

    <div class="jobs-container">

        <?php if (!empty($jobs)): ?>


        <?php foreach ($jobs as $job): ?>

        <div class="job-card">

            <strong class="location"> <img src="/images/job-title.png"> <?= esc($job['title']) ?></strong><br>
            <p><?= esc($job['description']) ?></p>
            <p>Salary : <strong><?= esc($job['salary']) ?></strong> MAD</p>
            <p class="location"><img src="/images/location.png" alt=""> <?= esc($job['location']) ?></p>
            <div style="margin:10px 0">
                <a class="edit-job" href="<?= base_url('/jobs/edit/' . $job['job_id']) ?>">Edit</a> |
                <a class="remove-job" href="<?= base_url('/jobs/delete/' . $job['job_id']) ?>"
                    onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
            </div>

            <p class="job-post-date">Posted at : <?= esc($job['created_at']) ?></p>
            <p class="job-post-date">Last update : <?= esc($job['updated_at']) ?></p>

        </div>

        <?php endforeach; ?>


    </div>

    <?php else: ?>



    <p>You haven't posted any jobs yet.</p>
    <a href="<?= base_url('/jobs/create') ?>" class="btn">Post a New One</a>

    <?php endif; ?>
</center>




<?= $this->endSection(); ?>