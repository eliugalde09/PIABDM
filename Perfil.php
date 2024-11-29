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
    
    <link rel="stylesheet" href="PerfilEstilos.css">
    <link rel="stylesheet" href="Nav_foot.css">

    <title>SkillHive | Mi Perfil</title>
</head>
<body>  

    <header class="header">
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
            </div>       
        </header>  
    </header>

        <div class="row mt-5 justify-content-center">
            
            <div class="row">
                <div class="col text-end">


                        <!--<img src="imagenes/user_default.jpg" class="img-profile" alt="Haz clic para seleccionar una imagen" 
                        style="cursor: pointer; border: 2px solid black;">

                        <input type="file" id="inputImagen" style="display: none;" accept="image/*">
                        <p id="direccionImagen"></p>-->

                    <form action="procesar_imagen.php" method="POST" enctype="multipart/form-data">

                        <!--<label for="inputImagen">Selecciona una imagen:</label>-->
                        <!-- Campo de entrada de tipo file -->
                         <input type="file" id="inputImagen" name="imagen" accept="image/*" required>
        
                        <!-- Imagen que actuará como un botón (opcional) -->
                        <img id="imagenSeleccionada" src="<?=$_SESSION['imagen'] ?>" class="img-profile" alt="Haz clic para seleccionar una imagen" 
                        style="cursor: pointer; border: 2px solid black;">
        
                        <p id="direccionImagen"></p>
        
                        <button type="submit">Actualizar Avatar</button>
                    </form>

                    <script>
                        const imagen = document.getElementById('imagenSeleccionada');
                        const inputImagen = document.getElementById('inputImagen');
                        const direccionImagen = document.getElementById('direccionImagen');

                        // Hacer que al hacer clic en la imagen, se active el input de tipo file
                        imagen.addEventListener('click', function() {
                        inputImagen.click(); // Abre el selector de archivos
                        });

                        // Manejar el cambio de archivo seleccionado
                        inputImagen.addEventListener('change', function(event) {
                        const archivo = event.target.files[0]; // Obtenemos el primer archivo seleccionado
                        if (archivo) {
                            const ruta = URL.createObjectURL(archivo); // Creamos una URL temporal para la imagen seleccionada
                            imagen.src = ruta; // Mostramos la imagen seleccionada en el img
                            //direccionImagen.textContent = `Ruta de la imagen seleccionada: ${ruta}`; // Mostramos la ruta en el texto
                        }
                    });
                    </script>
                    
 
                    
                </div>
                <div class="col text-left my-auto">
                     <p><?=$_SESSION['usuario'];?></p>
                     <p><?=$_SESSION['correo'];?></p>
                </div>
                <hr class="mt-3">
            </div>

            <div class="row">
                <div class="col-6 col justify-content-center d-flex">
                    <form class="form w-50" method="POST" action="./requests/editar_usuario.php" onsubmit="return validateForm(event)">
                        <div class="mb-3">
                            <label for="input_fullname" class="form-label">Nombre</label>
                            <input type="" name="input_fullname" class="input-form" id="input_fullname" value="<?=$_SESSION['nombre'];?>">
                        </div>
    
                        <div class="mb-3">
                            <label for="input-state" class="">Género</label>
                            <select class="input-form" name ="input-state" id="input-state" >
                                <option value="Femenino" <?php echo ($_SESSION['genero'] == "Femenino")  ?  "selected" : ""; ?>>Femenino</option>
                                <option value="Masculino" <?php echo ($_SESSION['genero'] == "Masculino")  ?  "selected" : ""; ?>>Masculino</option>
                                <option value="No binario" <?php echo($_SESSION['genero'] == "No binario")  ?  "selected" : ""; ?>>No binario</option>
                                <option value="Prefiero no decirlo" <?php echo ($_SESSION['genero'] == "Prefiero no decirlo")  ?  "selected" : ""; ?>>Prefiero no decirlo</option>
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label for="input_fullname" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="input-form" name="input_fechaNac" id="input_fechaNac" value="<?=$_SESSION['fechaNac'];?>">
                        </div>
    
                        <p id="error-message" style="color: red;"></p>

                        <button type="submit" >Actualizar</button>

                    </form>
                    
                </div>

                <div class="col col-6">
                    <div class="mb-3">
                        <label for="input_fullname" class="form-label">Rol</label>
                        <input type="text" class="input-form" id="input_fullname" value="<?=$_SESSION['rol'];?>" disabled>
                    </div>
        
                    <div class="mb-3">
                        <p>Último cambio:</p>
                        <p><?=$_SESSION['fechaModi'];?></p>
                    </div>
                    <button class="logoutbutton"><a href="login.php">Cerrar Sesión</a></button>
                </div>


            </div>
                   
        </div>

   
    <script src="Perfil.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>

