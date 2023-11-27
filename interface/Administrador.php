<head>
  <script src="JS/control.js" defer></script>
  <script src="JS/validacion.js" defer></script>
  <script src="JS/crudnoticia.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<div id="tabla_noticias">
  <?php
  include_once 'noticias.php'
  ?>
</div>
<div id="tabla_recursos">
  <?php
  include_once 'recursos.php';
  ?>
</div>
<div id="crear__noticia">
<?php
include_once 'crear.php'; 
?>
</div>