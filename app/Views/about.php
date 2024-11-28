<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>


<style>
.terms-container {
    padding: 20px;
}

.about-logo {
    margin-bottom: 40px;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    /* margin: 20px;
    padding: 20px; */
    background-color: #f9f9f9;
    color: #333;
}

h1,
h2,
h3 {
    color: #0056b3;
}

ul {
    margin-left: 30px;
}

p {
    margin-bottom: 15px;
}

.highlight {
    color: #0056b3;
    font-weight: bold;
}

.team {
    margin-top: 20px;
}

.team img {
    max-width: 100px;
    border-radius: 50%;
    margin-right: 10px;
}
</style>
</head>

<div class="terms-container">

    <body>
        <img class="about-logo" src="/images/logoJF.png" alt="">

        <h1>About Us</h1>
        <p>Welcome to <span class="highlight">jobFind</span>, your trusted partner in connecting job
            seekers and employers. Founded with a vision to streamline the job search process, we strive to make finding
            the perfect match simple, efficient, and accessible for everyone.</p>

        <h2>Our Mission</h2>
        <p>Our mission is to empower individuals and businesses by creating a platform that bridges the gap between
            talent and opportunities. Whether you are an <strong>employer</strong> looking to fill your team with top
            talent or an <strong>employee</strong> seeking your dream job, we are here to help you every step of the
            way.</p>

        <h2>What We Offer</h2>
        <ul>
            <li>A seamless and intuitive platform built with <strong>CodeIgniter 4</strong> for speed and reliability.
            </li>
            <li>Comprehensive job search and application features tailored for employees.</li>
            <li>Powerful job posting and candidate management tools for employers.</li>
            <li>Dedicated profile management systems for both employers and employees.</li>
            <li>Robust authentication and secure handling of user data.</li>
        </ul>

        <h2>Our Story</h2>
        <p>Based in <span class="highlight">Morocco</span>, we started with a simple goal: to create a modern platform
            that eliminates the frustrations of traditional job hunting and recruiting processes. Over time, we have
            refined our platform by incorporating feedback from users and leveraging the latest technologies.</p>

        <p>Our development journey has been powered by tools and frameworks like <strong>PHP</strong>,
            <strong>CodeIgniter</strong>, and modern web standards. We've ensured that our platform remains lightweight
            and efficient, providing fast and reliable performance even in local environments without internet access.
        </p>

        <h2>Our Values</h2>
        <p>We are guided by three core values:</p>
        <ul>
            <li><strong>Transparency:</strong> Honest communication between employers and employees.</li>
            <li><strong>Innovation:</strong> Using the latest tools and techniques to create an outstanding user
                experience.</li>
            <li><strong>Community:</strong> Building a network where people and businesses thrive together.</li>
        </ul>

        <h2>Meet the Team</h2>
        <div class="team">
            <p>Our team is made up of passionate developers, designers, and support staff who are dedicated to
                delivering the best experience for our users.</p>
            <img src="/images/default_employer_profile.png" alt="Team Member">
            <p><strong>Mohamed Iknioun :</strong> Developer and Visionary Behind jobFind</p>
        </div>

        <h2>Contact Us</h2>
        <p>If you have any questions or would like to learn more about us, feel free to get in touch:</p>
        <ul>
            <li>Email: <a href="mailto:support@jobplatform.com">mohamed.iknioun.27@edu.uiz.ac.ma</a></li>
            <li>Phone: +212-615209219</li>
            <li>Address: Agadir, Ait melloul, Morocco</li>
        </ul>
    </body>

</div>

<?= $this->endSection() ?>