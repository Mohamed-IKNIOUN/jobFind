<?php $this->extend('lyouts/main'); ?>


<?php $this->section('content'); ?>


<form action="/contact" method="post">

    <table>
        <tr>
            <td>
                <input type="email" name="email" id="" value="<?= session()->get('email') ?? '' ?>">
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="submit" value="Envoyer">

</form>


<?php $this->endSection(); ?>