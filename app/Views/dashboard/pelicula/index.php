<?= $this->extend('dashboard/Layouts/dashboard') ?>

<?= $this->section('contenido') ?>
<?= view('partials/_sessions') ?>
<h1>Listado de peliculas</h1>

<a href="/dashboard/pelicula/new">Nueva</a>
<table>

    <tr>
        <th>
            ID
        </th>
        <th>
            Titulo
        </th>
        <th>
            Descripcion
        </th>
        <th>
            Opciones
        </th>
    </tr>
    <?php foreach ($peliculas as $key => $p) : ?>
        <tr>
            <td>
                <p><?= $p['id'] ?></p>
            </td>
            <td>
                <h3><?= $p['title']  ?></h3>
            </td>

            <td>
                <p><?= $p['description']  ?></p>
            </td>
            <td>
                <a href="/dashboard/pelicula/show/<?= $p['id']  ?>">Ver</a>
                <a href="/dashboard/pelicula/edit/<?= $p['id']  ?>">Edit</a>
                <form action="/dashboard/pelicula/delete/<?= $p['id'] ?>" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>

        </tr>

    <?php endforeach  ?>


</table>

<?= $this->endSection() ?>