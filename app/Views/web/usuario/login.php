<?= $this->extend('Layouts/web') ?>

<?= $this->section('contenido') ?>

<?= view('partials/_form-error') ?>

<form action="<?= route_to('usuario.logins') ?>" method="post">
    <label for="user">Usuario / email</label>
    <input type="text" name="user" id="user">
    <br>
    <label for="pass">Contraseña</label>
    <input type="password" name="pass" id="pass">
    <br>
    <input type="submit" value="enviar">
</form>

<?= $this->endSection() ?>