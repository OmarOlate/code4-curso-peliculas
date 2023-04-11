<label for="title">Titulo</label>
<input type="text" name="title" id="title" value="<?= old('title', $pelicula->title )  ?>">
<br>
<label for="description">Descripcion</label>
<textarea name="description" value="" id="description" cols="30" rows="5">
<?= old('description', $pelicula->description) ?>
</textarea>
<br>
<button type="submit"><?= $op ?></button>