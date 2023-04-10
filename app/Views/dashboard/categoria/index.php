<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<body>
    <?= view('helpers/_sessions') ?>
    <h1>Listado de categorías</h1>
    <?= session('key')  ?>


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
</body>

</html>