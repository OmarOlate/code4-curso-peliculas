<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view('partials/_sessions') ?>
<h1>Listado de categorías</h1>


<a href="/dashboard/categoria/new">Nueva Categoría</a>

<table>
    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Opciones</th>
    </tr>

    <?php foreach ($categorias as $key => $c) : ?>
        <tr>
            <td>
                <p><?= $c['id'] ?></p>
            </td>
            <td>
                <h3><?= $c['title'] ?></h3>
            </td>
            <td>
                <a href="/dashboard/categoria/show/<?= $c['id'] ?>">Ver</a>
                <a href="/dashboard/categoria/edit/<?= $c['id'] ?>">Edit</a>
                <form action="/dashboard/categoria/delete/<?= $c['id'] ?>" method="post">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>