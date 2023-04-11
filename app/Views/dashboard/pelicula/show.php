<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>

<h1><?= $pelicula['title'] ?></h1>
<p><?= $pelicula['description'] ?></p>

<?= $this->endSection() ?>