<?= $this->extend('layouts/main') ?>


<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/jobs.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<h2 class="title">Your applications</h2>

<div class="jobs-container">

    <?php if (!empty($jobs)): ?>


    <?php foreach ($jobs as $job): ?>
    <div class="job-card">

        <?php
                $color = '';

                switch ($job['status']) {
                    case 'pending':
                        $color = "#F96E2A";
                        break;
                    case 'accepted':
                        $color = "green";
                        break;
                    case 'rejected':
                        $color = "red";
                        break;
                }
                ?>


        <div class="employer-profile">
            <img src="/images/default_employer_profile.png" alt="">
            <span class="employer-name"><?= $job['employer_username'] ?></span>
        </div>
        <strong class="location"> <img src="/images/job-title.png"> <?= esc($job['title']) ?></strong><br>

        <p><?= esc($job['description']) ?></p>
        <p>Salary : <strong><?= esc($job['salary']) ?></strong> MAD</p>

        <div>
            <strong>Status :</strong>
            <strong style="color : <?= $color ?>"><?= $job['status']  ?></strong>
        </div>
        <p class="location"><img src="/images/location.png" alt=""> <?= esc($job['location']) ?></p>
        <p class="job-post-date">Posted at : <?= esc($job['posted_date']) ?></p>
        <p class="job-post-date">Applied at : <?= esc($job['date_application']) ?></p>
        <a href="<?= site_url('/jobs/myApplications/delete/' . $job['application_id']); ?>" class="remove-apply-btn"
            onclick="return confirm('Are you sure you want to cancel you application for this job?');">
            <img src="/images/remove-application.png" alt=""> Remove
        </a>
    </div>
    <?php endforeach; ?>

    <?php else: ?>

    <p>You didnt apply for any jobs</p>

    <?php endif; ?>

</div>

<?= $this->endSection(); ?>