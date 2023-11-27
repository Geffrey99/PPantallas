
document.getElementById('noticiaForm').addEventListener('submit', function (event) {
 
    var inicioNoticia = document.querySelector('input[name="inicio_noticia"]').value;
    var finNoticia = document.querySelector('input[name="fin_noticia"]').value;
    var duracion = document.querySelector('input[name="duracion"]').value;
    var prioridad = document.querySelector('input[name="prioridad"]').value;
    
    if (inicioNoticia.trim() === '' || finNoticia.trim() === '' || duracion.trim() === '') {
        alert('Completa todos los campos');
        event.preventDefault();
        return;
    }
   

    if (isNaN(duracion) || duracion < 1 || duracion > 60) {
        alert('Elige la duración debe estar entre 1 y 60.');
        event.preventDefault();
        return;
    }

    if (isNaN(prioridad) || prioridad < 1 || prioridad > 60) {
        alert('Elige prioridad entre 1 y 5');
        event.preventDefault();
        return;
    }
    // Si todo está ok se enviará
});
