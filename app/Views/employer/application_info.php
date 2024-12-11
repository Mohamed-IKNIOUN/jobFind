<?= $this->extend('layouts/main') ?>


<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/application_info.css') ?>">
<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<div class="container">
    <h1>Application informations</h1>

    <div class="profile-infos">
        <div class="profile-header">
            <img src="<?= $details['profile_picture'] ?>" alt="" width="110" height="110" style="border-radius: 50%;">
            <span><?= $details['full_name'] ?></span>
        </div>
        <div class="profile-experience">
            <div class="profile-experience-section">
                <span>Education : </span>
                <?= $details['education'] ?>
            </div>
            <div class="profile-experience-section">
                <span>Experience : </span>
                <?= $details['experience'] ?>
            </div>
            <div class="profile-experience-section">
                <span>Skills : </span>
                <?= $details['skills'] ?>
            </div>
        </div>
        <div class="profile-contact">
            <div class="profile-contact-section">
                <span>Birth date : </span>
                <?= $details['date_birth'] ?>
            </div>
            <div class="profile-contact-section">
                <span>Phone : </span>
                <?= $details['phone'] ?>
            </div>
            <div class="profile-contact-section">
                <span>Adress : </span>
                <?= $details['address'] ?>
            </div>
        </div>
        <?php
        $color = '';

        switch ($details['status']) {
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

        <div class="status">
            Application status :
            <span style="color : <?= $color ?>"><?= $details['status'] ?></span>
        </div>
        <a href="https://api.whatsapp.com/send?phone= <?= $details['phone'] ?>" class="whatsapp-contact">Contact via
            <img src="<?= base_url('/images/icons8-whatsapp-32.png') ?>">
        </a>

        <div class="application-status">

            <form class="change-status" action="<?= base_url('/application/edit') ?>" method="POST">
                <div>
                    <label for="status">Change application status :</label>
                    <select name="status" id="status">

                        <option value="pending" <?= $details['status'] === 'pending' ? 'selected' : '' ?>>Pending
                        </option>

                        <option value="accepted" <?= $details['status'] === 'accepted' ? 'selected' : '' ?>>Accepted
                        </option>

                        <option value="rejected" <?= $details['status'] === 'rejected' ? 'selected' : '' ?>>Rejected
                        </option>

                    </select>
                    <input type="hidden" value="<?= $details['application_id'] ?>" name="application_id">
                </div>
                <input type="submit" value="Update status" class="update-status-button">
            </form>
        </div>
    </div>



    <a class="generate-contract" href="<?= base_url('/application/download-pdf/' . $details['user_id']) ?>">Generate a
        contract</a>

</div>

<?= $this->endSection(); ?>