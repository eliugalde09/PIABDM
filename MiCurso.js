const checkboxes = document.querySelectorAll('.form-check-input');
const botonFinalizar = document.getElementById('finalizarCursoBtn');
const progresoBarra = document.getElementById('progreso');
const mensajeFinalizacion = document.getElementById('mensajeFinalizacion');
const botonDiploma = document.getElementById('generarDiplomaBtn');  
const comentariosSection = document.getElementById('comentariosSection'); 
const addCommentSection = document.getElementById('add-comment-section'); 

// Función para actualizar el progreso y verificar si todos los checkboxes están seleccionados
function actualizarProgreso() {
    let completados = 0;
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            completados++;
        }
    });

    const progreso = (completados / checkboxes.length) * 100;
    progresoBarra.value = progreso;

    if (completados === checkboxes.length) {
        botonFinalizar.disabled = false;
    } else {
        botonFinalizar.disabled = true;
    }
}

// Función para finalizar el curso
function finalizarCurso() {
    checkboxes.forEach(checkbox => {
        checkbox.disabled = true; 
    });

    mensajeFinalizacion.style.display = 'block'; // Muestra el mensaje de finalización
    botonDiploma.style.display = 'inline-block'; // Muestra el botón para descargar diploma
    addCommentSection.style.display = 'block'; // Muestra la sección de comentarios
}

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', actualizarProgreso);
});

// Finalizar curso
botonFinalizar.addEventListener('click', finalizarCurso);

// Inicializar el progreso
actualizarProgreso();