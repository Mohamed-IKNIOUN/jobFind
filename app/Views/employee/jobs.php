<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/jobs.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<!-- Display the list of jobs  -->

<h1 class="title">Available Jobs</h1>


<div class="jobs-container">

    <?php if (!empty($jobs)): ?>


    <?php foreach ($jobs as $job): ?>
    <div class="job-card">


        <h3> <?= esc($job['title']) ?></h3>
        <p><?= esc($job['description']) ?></p>
        <p>Salary : <strong><?= esc($job['salary']) ?></strong> MAD</p>

        <p class="location"><img src="/images/location.png" alt=""> <?= esc($job['location']) ?></p>
        <p class="app-count"><img src="/images/app-count.png" alt=""> <?= esc($job['applications_count']) ?>
            Applications</p>
        <p class="job-post-date">Posted at : <?= esc($job['posted_date']) ?></p>
        <a href="<?= site_url('/jobs/apply/' . $job['job_id']); ?>" class="apply-btn"
            onclick="return confirm('Are you sure you want to apply for this job?');">
            <img src="/images/apply.png" alt=""> Apply
        </a>
    </div>
    <?php endforeach; ?>



    <?php else: ?>

    <p>There are no jobs at this moment.</p>

    <?php endif; ?>


</div>









<?= $this->endSection(); ?>