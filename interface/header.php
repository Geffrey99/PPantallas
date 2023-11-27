<?php
echo '
<form method="POST" action="index.php">
<p><h1>Elige la pantalla que quieres veeer:</h1></p>
<select name="pantalla" required>
  <option value="" selected disabled>Selecciona una opción</option>
  <option value="alumno">Alumno</option>
  <option value="profesor">Profesor</option>
  <option value="administrador">administrador</option>
</select>
<button type="submit">Enviar</button>
</form>
';
?>