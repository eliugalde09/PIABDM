<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Curso || SkillHive</title>
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
        <h2>---Eliminar Curso---</h2>
        <h4>Selecciona el curso que deseas eliminar</h4>

        <ul id="cursos-lista">
            <li data-id="1">
                <span><strong>Cocina Vegana Creativa: Recetas Innovadoras</strong></span>
                <button onclick="eliminarCurso(1)">Eliminar</button>
            </li>
            <li data-id="2">
                <span><strong>Técnicas de Escritura de No Ficción</strong></span>
                <button onclick="eliminarCurso(2)">Eliminar</button>
            </li>
            <li data-id="3">
                <span><strong>Voz y Técnica Vocal: Mejora tu Cantante Interior</strong></span>
                <button onclick="eliminarCurso(3)">Eliminar</button>
            </li>
        </ul>

        <script>
            function eliminarCurso(cursoId) {
                const confirmar = confirm("¿Estás seguro de querer eliminar este curso?");
                if (confirmar) {
                    fetch('eliminarCurso.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ id: cursoId }) 
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert("El curso se eliminó correctamente");
                            document.querySelector(`li[data-id="${cursoId}"]`).remove();
                        } else {
                            alert('Error al eliminar el curso. Inténtalo de nuevo.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al eliminar el curso. Inténtalo de nuevo.');
                    });
                }
            }
        </script>
        
    </section>

    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
