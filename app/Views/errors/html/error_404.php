<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title><?= lang('Errors.pageNotFound') ?></title> -->
    <title>Page not found</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        color: #8FD14F;
        font-size: 25rem;
    }

    p {
        font-size: 5rem;
        position: absolute;
        background-color: #fff;
        padding: 0 12rem;
    }

    span {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-top: 5rem;
        font-size: 1.4rem;
    }

    .red {
        color: red;
        font-size: 1.7rem;
    }

    a {
        padding: 5px 20px;
        background-color: #8FD14F;
        margin-top: 20px;
        text-decoration: none;
        color: #fff;
        border-radius: 4px;
    }

    a:hover {
        background-color: green;
    }
    </style>
</head>

<body>

    <span>
        <h3>404 - Page Not Found</h3>


        <a href="/">Go home</a>
    </span>

    <div class="container">
        <h1>404</h1>
        <p>Not Found</p>
    </div>



















    <!-- <div class="wrap">
        <h1>404</h1>

        <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
            <?= nl2br(esc($message)) ?>
            <?php else : ?>
            <?= lang('Errors.sorryCannotFind') ?>
            <?php endif; ?>
        </p>
    </div> -->
</body>

</html>