<?php $this->extend('layouts/main'); ?>


<?php $this->section('content'); ?>


<center>
    <form action="/contact" method="post">

        <table>
            <tr>
                <td>Email : </td>
                <td>
                    <input <?= session()->get('email') ? "disabled" : "" ?> type="email" name="email"
                        value="<?= session()->get('email') ?? '' ?>">
                </td>
            </tr>
            <tr>
                <td>Message : </td>
                <td>
                    <textarea name="message" id=""></textarea>
                </td>
            </tr>
        </table>
        <input type="submit" value="Envoyer">

    </form>
</center>


<?php $this->endSection(); ?>