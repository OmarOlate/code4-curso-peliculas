<label for="title">Titulo</label>
<input type="text" name="title" id="title" value="<?= $pelicula['title'] ?>">
<br>
<label for="description">Descripcion</label>
<textarea name="description" placeholder="<?= $pelicula['description'] ?>" id="description" cols="30" rows="5"></textarea>
<br>
<button type="submit"><?= $op ?></button>