<?php
session_start();

// Incluye el archivo que obtiene los cursos
$cursos = include('requests/obtener_cursos.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Cursos || SkillHive</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Cursos.css">
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
                    <?php include_once 'menu.php'; ?>
                </ul>
            </nav>
        </div>
    </header>

    <section class="cursos-container" id="lista-1">
        <h2>---Todos nuestros Cursos---</h2>
        <div class="Cursos_s">
            <?php
            // Mostrar los cursos obtenidos
            if ($cursos) {
                foreach ($cursos as $curso) {
                    echo '<div class="CursoS_1">';
                    echo '    <div class="curso">';
                    echo '        <img src="data:image/jpeg;base64,' . base64_encode($curso['portada']) . '" alt="Curso Imagen">';
                    echo '        <div class="curso-txt">';
                    echo '            <h3><a href="DetallesCurso.php?id=' . htmlspecialchars($curso['id']) . '" class="link-curso">' . htmlspecialchars($curso['nombre']) . '</a></h3>';
                    echo '            <p>' . htmlspecialchars($curso['descripcion']) . '</p>';
                    echo '            <p class="precio">$' . number_format($curso['costo'], 2) . '</p>';
                    echo '            <a href="Pago.php?id=' . htmlspecialchars($curso['id']) . '" class="btn-3 agregar-carrito">Agregar al carrito</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No se encontraron cursos.</p>';
            }
            ?>
        </div>
        <a href="Busqueda.php" class="btn-cargar" id="button-cargar">Buscar</a>
    </section>

    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="carrito.js"></script>
</body>
</html>      