<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>

<form action="/dashboard/pelicula/update/<?= $pelicula['id'] ?>" method="POST">
       <?= view('dashboard/pelicula/_form', ['op' =>'Actualizar']);  ?>
    </form>

<?= $this->endSection() ?>

