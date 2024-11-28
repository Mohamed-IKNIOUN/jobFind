<?= $this->extend('layouts/main') ?>


<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/jobs.css') ?>">
<?= $this->endSection(); ?>


<?= $this->section('content') ?>

<div class="search-area">
    <h1>Search for jobs by keywords</h1>
    <form action="/jobs/search" method="get" class="search-form">
        <input type="text" name="keywords" id="" placeholder="Enter keywords city, title, description ...">
        <input type="submit" value="Search">
    </form>
</div>

<h2 class="title">Results of searching for </h2>

<div class="jobs-container">

    <?php if (!empty($jobs)): ?>


    <?php foreach ($jobs as $job): ?>
    <div class="job-card">


        <div class="employer-profile">
            <img src="/images/default_profile.png" alt="">
            <span class="employer-name">Mohamed aknyoun</span>
        </div>
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

    <p>No jobs found.</p>

    <?php endif; ?>

</div>



<?= $this->endSection(); ?>