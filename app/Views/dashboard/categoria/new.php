<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<form action="/dashboard/categoria/create" method="POST">
    <?= view('dashboard/categoria/_form', ['op' => 'Crear']) ?>
</form>

<?= $this->endSection() ?>