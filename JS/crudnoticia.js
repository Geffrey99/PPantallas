function eliminarNoticia(id) {
    $.ajax({
        type: 'POST',
        url: './api/eliminarnoticia.php', 
        data: { id: id },
        success: function(response) {
            console.log(response);
            location.reload();
        },
        error: function(error) {
            
  
console.error('Error al eliminaar la noticia', error);
        }
    });
}

function modificarNoticia(id) {
   
    console.log("Modificar noticia con ID: " + id);

    document.getElementById('titulo_' + id).readOnly = false;
    document.getElementById('inicio_noticia_' + id).readOnly = false;
    document.getElementById('fin_noticia_' + id).readOnly = false;
    document.getElementById('duracion_' + id).readOnly = false;
    document.getElementById('prioridad_' + id).disabled = false;
    document.getElementById('perfil_' + id).disabled = false;

    document.getElementById('modificarBtn_' + id).disabled = true;
    document.getElementById('guardarBtn_' + id).style.display = 'inline';

}

function guardarModificacion(id) {

    //obtengo los valores modificados
   
    var titulo = document.getElementById('titulo_' + id).value;
    var inicio_noticia = document.getElementById('inicio_noticia_' + id).value;
    var fin_noticia = document.getElementById('fin_noticia_' + id).value;
    var duracion = document.getElementById('duracion_' + id).value;
    var prioridad = document.getElementById('prioridad_' + id).value;
    var perfil = document.getElementById('perfil_' + id).value;

    // y aqui hago la solicitud AJAX para guardar los cambios
    $.ajax({
        type: 'POST',
        url: './api/actualizarnoticia.php',
        data: {
            id: id,
            titulo: titulo,
            inicio_noticia: inicio_noticia,
            fin_noticia: fin_noticia,
            duracion: duracion,
            prioridad: prioridad,
            perfil: perfil
        },
        success: function(response) {
            console.log(response);
               location.reload();
        },
        error: function(error) {
            console.error('Erroooooooooor al modificarlo', error);
        }
    });

   //y restauro
    document.getElementById('titulo_' + id).readOnly = true;
    document.getElementById('inicio_noticia_' + id).readOnly = true;
    document.getElementById('fin_noticia_' + id).readOnly = true;
    document.getElementById('duracion_' + id).readOnly = true;
    document.getElementById('prioridad_' + id).disabled = true;
    document.getElementById('perfil_' + id).disabled = true;
     document.getElementById('modificarBtn_' + id).disabled = false;
    document.getElementById('guardarBtn_' + id).style.display = 'none';
}

