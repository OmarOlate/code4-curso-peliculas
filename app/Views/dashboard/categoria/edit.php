<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>

<?= view('partials/_form-error') ?>

 <form action="/dashboard/categoria/update/<?= $categoria->id ?>" method="POST">
        <?= view('dashboard/categoria/_form', ['op' =>'Actualizar']) ?>
    </form>

<?= $this->endSection() ?>

   