<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>

    <form action="/dashboard/pelicula/create" method="POST">
    <?= view('dashboard/pelicula/_form', ['op' =>'Crear']);  ?>
    </form>

<?= $this->endSection() ?>

