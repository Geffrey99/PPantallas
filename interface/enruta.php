
<?php
//ejemplo ...... index.?pantalla=alumno
  if (isset($_POST["pantalla"])) {
       
    $pantalla = $_POST["pantalla"] ?? "inicio" ;

switch ($pantalla) {
  case "alumno":
    include "Alumno.php";
    break;
  case "profesor":
    include "Profesor.php";
    break;
    case "administrador":
      include "Administrador.php";
      break;
      case "Inicio":
        include "index.php";
        break;
  default:  
     include "index.php";
}
}

?>
