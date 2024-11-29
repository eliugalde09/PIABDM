const cursos = [
    { 
        id: 1, 
        titulo: "Maestro del Dibujo Digital: De Principiante a Profesional", 
        usuario: "Juan Perez", 
        categoria: "dibujo", 
        fecha: "2023-01-01", 
        descripcion: "Aprende a dominar el arte del dibujo digital con técnicas avanzadas.", 
        precio: 450, 
        valoraciones: { usuarios: 2100, porcentaje: 95 },
        imagen: "imagenes/Curso22.1.jpg"
    },
    { 
        id: 2, 
        titulo: "Desarrollo Web: De Principiante a Experto", 
        usuario: "Ana Lopez", 
        categoria: "desarrollo", 
        fecha: "2023-02-15", 
        descripcion: "Conviértete en un experto en desarrollo web desde lo más básico.", 
        precio: 350, 
        valoraciones: { usuarios: 1500, porcentaje: 90 },
        imagen: "imagenes/Curso10.jpg"
    },
    { 
        id: 3, 
        titulo: "Fotografía Digital: Captura como un Profesional", 
        usuario: "Carlos Gomez", 
        categoria: "fotografia", 
        fecha: "2023-03-10", 
        descripcion: "Aprende los secretos de la fotografía digital y cómo capturar imágenes impresionantes.", 
        precio: 400, 
        valoraciones: { usuarios: 1800, porcentaje: 93 },
        imagen: "imagenes/Curso5.png"
    }
];

function filtrarCursos(event) {
    event.preventDefault();
    const titulo = document.querySelector('input[name="titulo"]').value.toLowerCase();
    const usuario = document.querySelector('input[name="usuario"]').value.toLowerCase();
    const categoria = document.querySelector('select[name="categoria"]').value;
    const fechaInicio = document.querySelector('input[name="fecha_inicio"]').value;
    const fechaFin = document.querySelector('input[name="fecha_fin"]').value;

    // Log para verificar los filtros aplicados
    console.log("Filtros aplicados:");
    console.log("Título:", titulo);
    console.log("Usuario:", usuario);
    console.log("Categoría:", categoria);
    console.log("Fecha inicio:", fechaInicio);
    console.log("Fecha fin:", fechaFin);

    const cursosFiltrados = cursos.filter(curso => {
        return (
            (titulo === "" || curso.titulo.toLowerCase().includes(titulo)) &&
            (usuario === "" || curso.usuario.toLowerCase().includes(usuario)) &&
            (categoria === "" || curso.categoria === categoria) &&
            (fechaInicio === "" || new Date(curso.fecha) >= new Date(fechaInicio)) &&
            (fechaFin === "" || new Date(curso.fecha) <= new Date(fechaFin))
        );
    });

    // Verifica los cursos filtrados
    console.log("Cursos filtrados:", cursosFiltrados);

    mostrarCursos(cursosFiltrados);
}

function mostrarCursos(cursos) {
    const contenedorCursos = document.getElementById('cursos-list');
    contenedorCursos.innerHTML = "";  // Limpiar los cursos anteriores

    if (cursos.length === 0) {
        contenedorCursos.innerHTML = "<p>No se encontraron cursos que coincidan con los filtros.</p>";
        return;
    }

    cursos.forEach(curso => {
        const divCurso = document.createElement('div');
        divCurso.classList.add('CursoS_1');
        divCurso.innerHTML = `
            <div class="curso">
                <img src="${curso.imagen}" alt="${curso.titulo}">
                <div class="curso-txt">
                    <h3><a href="DetallesCurso.html" class="link-curso">${curso.titulo}</a></h3>
                    <p>${curso.descripcion}</p>
                    <p class="precio">$${curso.precio}</p>
                    <div class="valoraciones">
                        <i class='bx bx-user'></i>
                        <h4>${curso.valoraciones.usuarios}</h4>
                        <i class='bx bx-heart'></i>
                        <h4>${curso.valoraciones.porcentaje}%</h4>
                    </div>
                    <a href="#" class="agregar-carrito btn-3" data-id="${curso.id}">Agregar al carrito</a>
                </div>
            </div>
        `;
        contenedorCursos.appendChild(divCurso);
    });
}

// Añadir el evento al formulario
document.getElementById('search-form').addEventListener('submit', filtrarCursos);
