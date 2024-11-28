<?= $this->extend('layouts/main') ?>


<?= $this->section('content') ?>


<style>
.terms-container {
    padding: 20px;
}

center {
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

a {
    color: #0056b3;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

ul {
    margin-left: 20px;
}

footer {
    margin-top: 30px;
    font-size: 0.9em;
    color: #666;
    text-align: center;
}
</style>
</head>

<div class="terms-container">

    <body>
        <center><img src="/images/logoJF.png" alt=""></center>
        <center>
            <h1>Terms of Use</h1>
            <p>Welcome to jobFind! By using our website, you agree to abide by the following terms
                and
                conditions. Please read them carefully before accessing or using the platform.</p>
        </center>

        <h2>1. Acceptance of Terms</h2>
        <p>By accessing and using our platform, you confirm that you agree to these Terms of Use. If you do not agree
            with
            any part of these terms, please do not use our services.</p>

        <h2>2. Use of the Platform</h2>
        <ul>
            <li>You must be at least 18 years old to use this platform.</li>
            <li>All users must provide accurate, current, and complete information during registration.</li>
            <li>You are responsible for maintaining the confidentiality of your account credentials.</li>
            <li>Employers are prohibited from posting fraudulent, misleading, or irrelevant job announcements.</li>
            <li>Employees must ensure the accuracy of their profile information and job applications.</li>
        </ul>

        <h2>3. User Conduct</h2>
        <p>As a user of this platform, you agree not to:</p>
        <ul>
            <li>Engage in any illegal or unauthorized activities on the platform.</li>
            <li>Post, upload, or share content that is abusive, offensive, or discriminatory.</li>
            <li>Misuse or exploit other users' personal or professional information.</li>
        </ul>

        <h2>4. Employer Responsibilities</h2>
        <p>Employers must:</p>
        <ul>
            <li>Ensure job postings are accurate and relevant.</li>
            <li>Not discriminate based on age, gender, religion, ethnicity, or any other protected category.</li>
            <li>Respond promptly to job applications and queries.</li>
        </ul>

        <h2>5. Employee Responsibilities</h2>
        <p>Employees must:</p>
        <ul>
            <li>Provide truthful information in job applications.</li>
            <li>Respect the decisions of employers and communicate professionally.</li>
            <li>Refrain from applying for jobs they are not qualified for or uninterested in.</li>
        </ul>

        <h2>6. Intellectual Property</h2>
        <p>All content on the platform, including text, graphics, logos, and software, is the property of [Job Search
            Platform Name] and protected by intellectual property laws. You may not reproduce, distribute, or modify any
            content without prior permission.</p>

        <h2>7. Limitation of Liability</h2>
        <p>We strive to maintain the accuracy and reliability of the platform, but we are not liable for:</p>
        <ul>
            <li>Errors, omissions, or inaccuracies in job postings.</li>
            <li>Misuse of the platform by users.</li>
            <li>Technical issues, interruptions, or downtime.</li>
        </ul>

        <h2>8. Termination</h2>
        <p>We reserve the right to suspend or terminate your account if you violate these terms. Termination may result
            in
            the removal of your data and access to the platform.</p>

        <h2>9. Changes to the Terms</h2>
        <p>We may update these Terms of Use periodically. Continued use of the platform after updates indicates your
            acceptance of the new terms.</p>

        <h2>10. Contact Us</h2>
        <p>If you have any questions or concerns about these Terms of Use, please contact us at <a
                href="mailto:support@jobplatform.com">support@jobplatform.com</a>.</p>
    </body>
</div>

<?= $this->endSection() ?>