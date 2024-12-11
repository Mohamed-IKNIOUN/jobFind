<link rel="stylesheet" href="<?= base_url('css/application_info.css') ?>">


<title><?= $title ?? 'Pdf Resume' ?></title>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

    :root {
        --blue: #133E87;
        --light-blue: #D1EBFE;
        --green: #8FD14F;
        --purple: #604CC3;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Nunito", sans-serif;
    }

    center {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .cv-header {
        padding: 20px;
        background-color: #454857;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contrat-body {
        padding: 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 60px;
    }

    .title {
        margin-top: 10px;
        margin-bottom: 15px;
        font-size: 2.2rem;
        font-weight: 700;
        text-align: center;
        color: #fff;
    }

    .banner-blank {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #454857;
        padding: 50px 0;
    }

    p,
    h3,
    h2 {
        margin: 5px;
    }
</style>

<center>

    <div class="cv-header">

        <h1 class="title">Jobfind - Contrat de travail</h1>
    </div>


    <div class="contrat-body">

        <h2>CONTRAT DE TRAVAIL À DURÉE INDÉTERMINÉE</h2>

        <p>LE PRÉSENT CONTRAT DE TRAVAIL </p>
        <p>en date du <?= date('d/m/Y') ?> est un contrat à durée indéterminée</p>
        <p>(le « Contrat »)</p>
        <b>ENTRE :</b>
        <p><?= $employerInfos['username'] ?></p>
        <p>(« l'Employeur »)</p>
        <b>- ET -</b>

        <p><?= $employeeProfile['full_name'] ?></p>
        <p>(le « Salarié »)</p>
        <h3>LE CONTEXTE</h3>
        <p>L'Employeur estime que le Salarié possède les compétences et atouts nécessaires pour occuper un
            emploi chez l'Employeur
        </p>
        <h3>IL A ÉTÉ CONVENU DE CE QUI SUIT :</h3>
        <u> <b>Date de début et durée du Contrat</b> </u>

        <p>1.
            Le Salarié est embauché à partir du <?= date('d/m/Y') ?> (la « Date de début ») dans le
            cadre d'un contrat à durée indéterminée à temps plein
        </p>

        <div class="banner-blank"></div>

    </div>
</center>