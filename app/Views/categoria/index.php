<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>

<body>
    <h1>Listado de categorías</h1>
    <a href="/categoria/new">Nueva Categoría</a>

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
                    <a href="/categoria/show/<?= $c['id'] ?>">Ver</a>
                    <a href="/categoria/edit/<?= $c['id'] ?>">Edit</a>
                    <form action="/categoria/delete/<?= $c['id'] ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>