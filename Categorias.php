<?php 
 session_start();
   

 $categoria = include("requests/obtener_categorias.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="Global.css">
    <link rel="stylesheet" href="Nav_foot.css">
    <link rel="stylesheet" href="Categorias.css">

    <title>Nueva Categoría | SkillHive</title>
</head>
<body>

    <!-- NAVBAR -->
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
            
            <div>
                <ul>
                    <li class="submenu">
                        <a href="Pago.html">
                            <i class='bx bxs-cart' id="img-carrito"></i>
                        </a>
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn-2">Vaciar Carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">
        <h2 class="title">---CATEGORIAS---</h2>
        <div class="row">
            <div class="col-3 filter-container">
                <h3 class="subtitle">Nueva categoría</h3>
                <form id="categoryForm" class="form" method="post" action="/requests/obtener_categorias.php">
                    <label for="categoryName">Nombre categoría:</label>
                    <input type="text" id="categoryName" name="categoria-name" placeholder="Nombre de categoría" required>

                    <label for="description" class="mt-2">Descripción:</label>
                    <textarea id="description" name="categoria-descripcion" rows="3"></textarea>

                    <button type="submit" class="btn btn-success">Agregar categoría</button>
                </form>
            </div>
            <div class="col-9 result-container">
                <h3 class="subtitle">Lista de categorías</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha creación</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody id="categoryTable">
                        <!-- Aquí se llenarán las categorías dinámicamente -->
                        <?php
                        // Recorrer las categorías y llenar la tabla
                        foreach ($categorias as $categoria) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($categoria['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($categoria['categoria']) . "</td>";
                        echo "<td>" . htmlspecialchars($categoria['descripcion']) . "</td>";
                        echo "<td>" . htmlspecialchars($categoria['fecha_creacion']) . "</td>";
                        echo "<td>" . htmlspecialchars($categoria['usuario']) . "</td>";
                        echo "<td><a href='editar_categoria.php?id=" . htmlspecialchars($categoria['id']) . "' class='btn btn-warning'>Editar</a></td>";
                        echo "<td><a href='borrar_categoria.php?id=" . htmlspecialchars($categoria['id']) . "' class='btn btn-danger'>Borrar</a></td>";
                        echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-container">
        <div class="link">
            <h3>Categorías</h3>
            <ul>
                <li><a href="#">Arte 2D</a></li>
                <li><a href="#">Comunicación</a></li>
                <li><a href="#">Programación</a></li>
                <li><a href="#">Cocina</a></li>
                <li><a href="#">Costura</a></li>
            </ul>
        </div>
        <div class="link">
            <ul>
                <li><a href="#">Cine</a></li>
                <li><a href="#">Escritura</a></li>
                <li><a href="#">Nutrición</a></li>
                <li><a href="#">Mascotas</a></li>
                <li><a href="#">Música</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Sobre nosotros</h3>
            <p>
                Somos una empresa en crecimiento con el objetivo de ofrecer cursos innovadores y de alta calidad. Únete a nuestra comunidad y descubre cómo podemos ayudarte a explorar nuevas habilidades y alcanzar tu máximo potencial.
            </p>
        </div>
    </footer>

    <script src="Categorias.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
