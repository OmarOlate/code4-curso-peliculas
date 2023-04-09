<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>

<body>
    <h1>Listado de peliculas</h1>
    <a href="/pelicula/new">Nueva</a>
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
                    <a href="/pelicula/show/<?= $p['id']  ?>">Ver</a>
                    <a href="/pelicula/edit/<?= $p['id']  ?>">Edit</a>
                    <form action="/pelicula/delete/<?= $p['id'] ?>" method="post">
                        <button type="submit">Delete</button>
                    </form>
                </td>

            </tr>

        <?php endforeach  ?>


    </table>

</body>

</html>