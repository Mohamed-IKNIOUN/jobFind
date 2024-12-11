<?= $this->extend('layouts/main') ?>

<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/jobs.css') ?>">
<link rel="stylesheet" href="<?= base_url('css/dynamic_links/main_link.css') ?>">
<?= $this->endSection(); ?>


<?= $this->section('content') ?>
<div class="container">

    <!-- Display the list of jobs  -->

    <div class="search-area">
        <h1>Search for jobs by keywords</h1>
        <form action="/jobs/search" method="get" class="search-form">
            <input type="text" name="keywords" id="" placeholder="Enter keywords city, title, description ...">
            <input type="submit" value="Search">
        </form>
    </div>

    <h1 class="title">Available Jobs</h1>

    <div class="jobs-container">

        <?php if (!empty($jobs)): ?>


            <?php foreach ($jobs as $job): ?>
                <div class="job-card">


                    <div class="employer-profile">
                        <img src="/images/default_employer_profile.png" alt="">
                        <span class="employer-name"><?= $job['employer_username'] ?></span>
                    </div>
                    <strong class="location"> <img src="/images/job-title.png"> <?= esc($job['title']) ?></strong><br>
                    <p><?= esc($job['description']) ?></p>
                    <p>Salary : <strong><?= esc($job['salary']) ?></strong> MAD</p>

                    <p class="location"><img src="/images/location.png" alt=""> <?= esc($job['location']) ?></p>
                    <p class="app-count"><img src="/images/app-count.png" alt=""> <?= esc($job['applications_count']) ?>
                        Applications</p>
                    <p class="job-post-date">Posted at : <?= esc($job['created_at']) ?></p>
                    <a href="<?= site_url('/jobs/apply/' . $job['job_id']); ?>" class="apply-btn">
                        <img src="/images/apply.png" alt=""> Apply
                    </a>
                </div>
            <?php endforeach; ?>

        <?php else: ?>

            <p>There are no jobs at this moment.</p>

        <?php endif; ?>

    </div>

</div>
<?= $this->endSection(); ?>