<?= $this->extend('layouts/main') ?>


<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/job_applications_list.css') ?>">
<?= $this->endSection(); ?>


<?= $this->section('content') ?>


<div class="container">
    <h1>Your post applications list</h1>
    <?php if (!empty($applications)): ?>

        <table>
            <tr>
                <th>N° </th>
                <th>Username</th>
                <th>Application date</th>
                <th>Status</th>
                <th>Candidature informations</th>
            </tr>

            <?php foreach ($applications as $application): ?>

                <tr>
                    <?php
                    $i = 1;
                    $color = '';

                    switch ($application['status']) {
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
                    <td><?= $i ?></td>
                    <td><?= $application['username'] ?></td>
                    <td><?= $application['date_application'] ?></td>
                    <td style="color : <?= $color ?>"><?= $application['status'] ?></td>
                    <td><a href="<?= base_url('post/application/' . $application['application_id']) ?>">Candidature infos</a>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>

        </table>
    <?php else: ?>

        <p>Not applications for this job</p>

    <?php endif; ?>
</div>

<?= $this->endSection(); ?>