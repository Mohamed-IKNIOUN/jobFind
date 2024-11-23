<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h1>Employer Posts </h1>
<p>Hello Mr <?= session()->get('username') ?>! Here you can manage your job Posts.You are
    <?= session()->get('user_type') ?></p>


<!-- Display the list of jobs posted by the logged employer -->

<?php if (!empty($jobs)): ?>

<h2>Your Posted Jobs</h2>
<ul>

    <?php foreach ($jobs as $job): ?>

    <li>
        <strong><?= esc($job['title']) ?></strong><br>
        <p><?= esc($job['description']) ?></p>
        <a href="<?= base_url('/employer/jobs/edit/' . $job['id']) ?>">Edit</a> |
        <a href="<?= base_url('/employer/jobs/delete/' . $job['id']) ?>"
            onclick="return confirm('Are you sure you want to delete this job?')">Delete</a>
    </li>

    <?php endforeach; ?>

</ul>

<?php else: ?>

<p>You haven't posted any jobs yet.</p>
<a href="<?= base_url('/employer/jobs/create') ?>" class="btn">Post a New One</a>

<?php endif; ?>




<?= $this->endSection(); ?>