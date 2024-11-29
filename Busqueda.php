<?php 
    session_start(); 
    $categorias = include('requests/obtener_cat_bus.php');


    if(isset($_SESSION['resultados'])){
        $resultados = $_SESSION['resultados'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Cursos || SkillHive</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Nav_foot.css">
    <link rel="stylesheet" href="Busqueda.css">
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


    <div class="search-container">
        <form id="search-form" action="requests/buscar_cursos.php" method="POST">
            <input type="text" name="titulo" placeholder="Buscar por título" class="search-input">
            <input type="text" name="usuario" placeholder="Buscar por usuario" class="search-input">
            <select name="categoria" class="search-input">
                
                <?php
                if($categorias){
                    echo '<option value="0">Seleccionar categoría</option>';
                    foreach($categorias as $categoria){
                        echo '<option value="'.$categoria['id'].'">'.$categoria['nombre'].'</option>';
                    }
                }
                else{
                    echo '<option value="0">Aún no hay categorías</option>';
                }
                ?>
            </select>
            <input type="date" name="fecha_inicio" class="search-input">
            <input type="date" name="fecha_fin" class="search-input">

            <button type="submit" class="search-button">Buscar</button>
        </form>
    </div>

    <!-- Cursos-->
    <div class="cursos-container">
        <h2 class="subtitle">Cursos Encontrados</h2>
        <div class="Cursos_s" id="cursos-list">
        <?php

                if (isset($resultados)) {
                    
                    foreach($resultados as $resultado) {
                        
                        echo '<div class="CursoS_1">';
                        echo '    <div class="curso">';
                        echo '        <div class="curso-txt">';
                        echo '            <h3><a href="DetallesCurso.php?id=' . $resultado['id'] . '" class="link-curso">' . $resultado['nombre'] . '</a></h3>';
                        echo '            <p>' . $resultado['descripcion'] . '</p>';
                        echo '            <p class="precio">$' . number_format($resultado['costo'], 2) . '</p>';
                        echo '            <div class="valoraciones">';
                        echo '                <i class="bx bx-heart"></i>';
                        echo '                <h4>' . $resultado['calificacion_promedio'] . '</h4>';
                        
                        echo '            </div>';
                        // Botón de agregar al carrito 
                        echo '            <a href="Pago.php" class="agregar-carrito btn-3" data-id="' . $resultado['id'] . '">Agregar al carrito</a>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No se encontraron cursos.</p>';
                }
            ?>
        </div>
    </div>

    <footer class="footer-container">
  
        <div class="link">
            <h3>Categorías</h3>
             <ul>
                 <li><a href="CursoCategoría.html">Arte 2D</a></li>
                 <li><a href="CursoCategoría.html">Comunicación</a></li>
                 <li><a href="CursoCategoría.html">Programación</a></li>
                 <li><a href="CursoCategoría.html">Cocina</a></li>
                 <li><a href="CursoCategoría.html">Costura</a></li>
 
 
             </ul>
         </div>
 
         <div class="link">
              <ul>
                  <li><a href="CursoCategoría.html">Cine</a></li>
                  <li><a href="CursoCategoría.html">Escritura</a></li>
                  <li><a href="CursoCategoría.html">Nutrición</a></li>
                  <li><a href="CursoCategoría.html">Mascotas</a></li>
                  <li><a href="CursoCategoría.html">Música</a></li>
  
              </ul>
          </div>

         <div class="link">
            <h3>Sobre nosotros</h3>
            <p>
                Somos una empresa en crecimiento con el objetivo de
                ofrecer cursos innovadores y de alta calidad. 
                Únete a nuestra comunidad y descubre cómo podemos 
                ayudarte a explorar nuevas habilidades y alcanzar
                tu máximo potencial.
            </p>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</body>