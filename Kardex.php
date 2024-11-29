<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="kardexEstilos.css">
    <link rel="stylesheet" href="Nav_foot.css">

    <title>Kardex || SkillHive</title>
    <style>
        .profile-container {
            display: flex;
            align-items: center;
            margin-left: 15px; /* Espaciado a la izquierda */
        }
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px; /* Espaciado a la derecha */
        }
    </style>
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

    <div class="row">
        <h2>KARDEX</h2>
        <!-- COLUMNA IZQUIERDA-->
        <div class="col col-3">
            <div class="text-center">
                <div class="filtros">
                    <h3>Filtros</h3>
                    <h4>Estado</h4>
                    <select name="Estado">
                        <option selected="true" disabled="disabled">---</option>
                        <option value="valor">Completado</option>
                        <option value="valor2">En curso</option>
                    </select>

                    <h4>Categoría</h4>
                    <select name="Categoría">
                        <option selected="true" disabled="disabled">---</option>
                        <option value="">Dibujo</option>
                        <option value="">Programación</option>
                        <option value="">Electrónica</option>
                        <option value="">Cocina</option>
                    </select>

                    <h4>Rango de fechas</h4>
                    <h5>Fecha 1</h5>
                    <input class="fecha" type="date">
                    <h5>Fecha 2</h5>
                    <input class="fecha" type="date">

                    <div>
                        <button class="boton">Filtrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- COLUMNA DERECHA -->
        <div class="col col-9">
            <div class="text-center">
                <!-- Sección de la foto de perfil -->
                <h3>Foto de Perfil</h3>
                <img id="profile-image" src="imagenes/default-profile.png" alt="Foto de Perfil" style="width: 150px; height: 150px; border-radius: 50%;">
                <br>
                <button class="btn btn-primary" onclick="document.getElementById('hidden-file-input').click();">Cambiar Foto</button>
                <input type="file" id="hidden-file-input" accept="image/*" style="display: none;" onchange="previewImage(event)">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="fondoTabla">#</th>
                        <th scope="col" class="fondoTabla">Curso</th>
                        <th scope="col" class="fondoTabla">Estado</th>
                        <th scope="col" class="fondoTabla">Fecha de Inscripción</th>
                        <th scope="col" class="fondoTabla">Último Acceso</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Dibujo de Anatomía Humana</td>
                        <td>Completado</td>
                        <td>20/08/2024</td>
                        <td>21/08/2024</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Cocina para principiantes</td>
                        <td>En Curso</td>
                        <td>01/09/2024</td>
                        <td>10/09/2024</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const profileImage = document.getElementById('profile-image');
                profileImage.src = e.target.result; // Establece la fuente de la imagen
            };

            if (file) {
                reader.readAsDataURL(file); // Lee el archivo como una URL de datos
            }
        }
    </script>

</body>
</html>