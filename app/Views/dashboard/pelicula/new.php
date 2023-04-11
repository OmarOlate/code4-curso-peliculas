<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>

<?= view('partials/_form-error') ?>

    <form action="/dashboard/pelicula/create" method="POST">
    <?= view('dashboard/pelicula/_form', ['op' =>'Crear']);  ?>
    </form>

<?= $this->endSection() ?>

