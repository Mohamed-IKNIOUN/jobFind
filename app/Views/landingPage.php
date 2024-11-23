<!-- load the main layout -->
<?= $this->extend('layouts/main') ?>



<!-- add custom css -->
<?= $this->section('custom_css') ?>
<link rel="stylesheet" href="<?= base_url('css/landing.css') ?>">
<?= $this->endSection(); ?>



<!-- load the main content of the landing page -->
<?= $this->section('content') ?>

<div class="container">
    <section class="first-section">
        <h1>
            Welcome to our platform, connecting top employers with outstanding talent.
        </h1>

        <img src="images/down-arrow.png" alt="">
    </section>

    <section class="second-section">

        <h2 class="title">Here you can</h2>

        <div class="cards">
            <div class="card">
                <img src="images/hire.png" class="card-icon">
                <div class="card-content">
                    <h1 class="card-title">Hire employees</h1>
                    <p class="card-text">
                        You can easily hire people by posting your job recuirements.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="images/job-search.png" class="card-icon">
                <div class="card-content">
                    <h1 class="card-title">Find Jobs</h1>
                    <p class="card-text">
                        You can easily hire people by posting your job recuirements.
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="images/network.png" class="card-icon">
                <div class="card-content">
                    <h1 class="card-title">Grow up you network</h1>
                    <p class="card-text">
                        You can easily hire people by posting your job recuirements.
                    </p>
                </div>
            </div>
        </div>

    </section>
</div>

<?= $this->endSection(); ?>