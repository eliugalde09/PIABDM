<?php 
    session_start();
    $cursosCali = include('requests/obtener_cursos_cali.php'); // Incluimos obtener_cursos_cali.php y obtenemos los cursos
    $cursosRec = include('requests/obtener_cursos_rec.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SkillHive</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Principal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

    <hr>

    <section class="cursos-container" id="lista-1">
        
        <h2>---Te puede interesar---</h2>
        <h3>Mejor Rankeados</h3>
        <div class="Cursos_s">

            <?php
                if ($cursosCali) {
                    
                    foreach($cursosCali as $curso) {
                        
                        //var_dump($curso);
                        echo '<div class="CursoS_1">';
                        echo '    <div class="curso">';
                        /*echo '        <img src="imagenes/' . htmlspecialchars($curso['imagen']) . '" alt="Curso Imagen">';*/
                        echo '        <div class="curso-txt">';
                        echo '            <h3><a href="DetallesCurso.php?id=' . $curso['id'] . '" class="link-curso">' . $curso['nombre'] . '</a></h3>';
                        echo '            <p>' . $curso['descripcion'] . '</p>';
                        echo '            <p class="precio">$' . number_format($curso['costo'], 2) . '</p>';
                        echo '            <div class="valoraciones">';
                        echo '                <i class="bx bx-heart"></i>';
                        echo '                <h4>' . $curso['calificacion_promedio'] . '</h4>';
                        echo '            </div>';
                        // Botón de agregar al carrito 
                        echo '            <a href="Pago.php" class="agregar-carrito btn-3" data-id="' . $curso['id'] . '">Agregar al carrito</a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No se encontraron cursos.</p>';
                }
            ?>
        </div>
        
        

    </section>

    <hr>

    <section class="cursos-container" id="lista-1">
        
        <h3>Los más populares</h3>
        
        <div class="Cursos_sugeridos">
            
            <div class="Cursos_s">

            </div>
        
        </div>

    </section>

    <hr>

    <section class="cursos-container" id="lista-1">
        
        <h3>Agregados Recientemente</h3>
        
        <div class="Cursos_sugeridos">
            
            <div class="Cursos_s">
            
            <?php
                if ($cursosRec) {
                    
                    foreach($cursosRec as $curso) {
                        
                        //var_dump($curso);
                        echo '<div class="CursoS_1">';
                        echo '    <div class="curso">';
                        /*echo '        <img src="imagenes/' . htmlspecialchars($curso['imagen']) . '" alt="Curso Imagen">';*/
                        echo '        <div class="curso-txt">';
                        echo '            <h3><a href="DetallesCurso.php?id=' . $curso['id'] . '" class="link-curso">' . $curso['nombre'] . '</a></h3>';
                        echo '            <p>' . $curso['descripcion'] . '</p>';
                        echo '            <p class="precio">$' . number_format($curso['costo'], 2) . '</p>';
                        echo '            <div class="valoraciones">';
                        echo '                <i class="bx bx-heart"></i>';
                        echo '                <h4>' . $curso['calificacion_promedio'] . '</h4>';
                        echo '            </div>';
                        // Botón de agregar al carrito 
                        echo '            <a href="Pago.php" class="agregar-carrito btn-3" data-id="' . $curso['id'] . '">Agregar al carrito</a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No se encontraron cursos.</p>';
                }
            ?>
            
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        
        </div>

    </section>

    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

</body>