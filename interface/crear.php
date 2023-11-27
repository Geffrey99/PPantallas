<?php
echo '                   
<H3> CREAR NOTICIIIAA </H3>
<form action="repository/crearnoticia.php" method="POST" enctype="multipart/form-data" id="noticiaForm">
    <p>Título: <input type="text" name="titulo"></p>
    <p>Inicio noticia: <input type="date" name="inicio_noticia"></p>
    <p>Fin noticia: <input type="date" name="fin_noticia"></p>
    <p>Duración: <input type="number" name="duracion"></p>
    <p>Prioridad: <input type="number" name="prioridad"></p>
    <p>Perfil: <select name="perfil">
        <option value="alumno">Alumno</option>
        <option value="profesor">Profesor</option>
        <option value="todos">Todos</option>
    </select></p>
    <p>Tipo de recurso: <select name="tipo" id="tipoRecurso" required>
        <option value="elige">Selecciona un recurso</option>
        <option value="web">Web</option>
        <option value="video">Video</option>
        <option value="foto">Foto</option>
    </select></p>
    <div id="contenido" style="display:none;">
    <p id="url">URL del recurso: <textarea name="url"></textarea></p>
    <p id="archivoRecurso" >Archivo del recurso: <input type="file" name="file"></p>
    <p id="enviar" ><input type="submit" value="Enviar la información"></p>
    </div>
</form>
';
?>


<!------
nooo esque haga falta- <p>Formato del recurso: <select name="formato">
        <option value="mp4">MP4</option>
        <option value="avi">AVI</option>
        <option value="jpg">JPG</option>
        <option value="png">PNG</option>
        </select></p> -->