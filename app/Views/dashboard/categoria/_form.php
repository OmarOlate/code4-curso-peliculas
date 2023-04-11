<label for="title">Categoría</label>
<br>
<input type="text" name="title" id="title" value="<?= old('title', $categoria['title'] )  ?>">
<br>
<button type="submit"><?= $op ?></button>