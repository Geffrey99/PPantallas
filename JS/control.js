var tipoRecursoSelect = document.getElementById('tipoRecurso');
var contenidoDiv = document.getElementById('contenido');
var contenidoURL = document.getElementById('url');
var archivo = document.getElementById('archivoRecurso');

tipoRecursoSelect.addEventListener('change', function () {
    var tipoRecurso = this.value;

    if (tipoRecurso === 'elige') {
        contenidoDiv.style.display = 'none';
    } else {
        contenidoDiv.style.display = 'block';

        if (tipoRecurso === 'web') {
            contenidoURL.style.display = 'block';
            archivo.style.display = 'none';
        } else {
            contenidoURL.style.display = 'none';
            archivo.style.display = 'block';
        }
    }
});