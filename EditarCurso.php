<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso || SkillHive</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CrearCurso.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <div class="imagen-logo">
                <img src="imagenes/Logo2.png" alt="Logo" class="logo">
            </div>
            <a href="#" class="logo">SkillHive</a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <i class='bx bx-menu'></i>
            </label>
            <nav class="navbar">
                <ul>
                    <?php include_once 'menu.php' ?>
                </ul>
            </nav>
        </div>
    </header>

    <section class="Formulario-Curso">
        <h2>---Edita tu curso---</h2>
        <h4>Actualiza tus datos del curso de manera correcta</h4>
        <form id="edit-course-form">
            <input type="hidden" id="curso-id" value="1"> <!-- Aquí se debe cargar el ID del curso que se va a editar -->

            <label for="nivel-curso">Nivel del curso:</label>
            <select id="nivel-curso" required>
                <option value="">Seleccione un nivel</option>
                <option value="Principiante">Principiante</option>
                <option value="Intermedio">Intermedio</option>
                <option value="Avanzado">Avanzado</option>
            </select>

            <label for="nombre">Nombre del curso:</label>
            <input type="text" id="nombre" required>

            <label for="descripcion">Descripción del curso:</label>
            <textarea id="descripcion" required></textarea>

            <label for="detalles">Más detalles sobre el curso:</label>
            <textarea id="descripcion-detalles" required></textarea>

            <label for="curso-categoria">Categoría a la que pertenece:</label>
            <select id="curso-categoria">
                <option value="Arte2D">Arte2D</option>
                <option value="Comunicación">Comunicación</option>
                <option value="Programación">Programación</option>
                <option value="Cocina">Cocina</option>
                <option value="Costura">Costura</option>
                <option value="Cine">Cine</option>
                <option value="Escritura">Escritura</option>
                <option value="Nutrición">Nutrición</option>
                <option value="Mascotas">Mascotas</option>
                <option value="Música">Música</option>
            </select>

            <label for="costo-curso">Costo del curso:</label>
            <input type="number" id="costo-curso" step="0.01" required>

            <button type="submit" style="display: block; margin: 20px auto;">Actualizar Curso</button>
        </form>
    </section>

    <script>
        // Cargar los datos del curso cuando se cargue la página
        document.addEventListener('DOMContentLoaded', function() {
            const cursoId = document.getElementById('curso-id').value;
    
            // Realizar una solicitud para obtener los detalles del curso
            fetch(`obtenerCurso.php?id=${cursoId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Asignar los valores de los campos del formulario
                        document.getElementById('nivel-curso').value = data.curso.nivel;
                        document.getElementById('nombre').value = data.curso.nombre;
                        document.getElementById('descripcion').value = data.curso.descripcion;
                        document.getElementById('descripcion-detalles').value = data.curso.detalles;
                        document.getElementById('curso-categoria').value = data.curso.categoria_id;
                        document.getElementById('costo-curso').value = data.curso.costo;
                    } else {
                        alert('Error al cargar los datos del curso.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al cargar los datos del curso.');
                });
        });
    
        // Manejo del formulario de edición
        document.getElementById('edit-course-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario por defecto
    
            const cursoData = {
                id: document.getElementById('curso-id').value,
                nivel: document.getElementById('nivel-curso').value,
                nombre: document.getElementById('nombre').value,
                descripcion: document.getElementById('descripcion').value,
                detalles: document.getElementById('descripcion-detalles').value,
                categoria: document.getElementById('curso-categoria').value,
                costo: document.getElementById('costo-curso').value
            };
    
            // Realiza la llamada AJAX para actualizar el curso
            fetch('editarCurso.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(cursoData) // Enviar los datos del curso
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Curso actualizado exitosamente!');
                    // Aquí puedes redirigir a otra página o limpiar el formulario si es necesario
                } else {
                    alert('Error al actualizar el curso. Inténtalo de nuevo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al actualizar el curso. Inténtalo de nuevo.');
            });
        });
    </script>
    

    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
