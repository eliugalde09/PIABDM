<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || SkillHive</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>

    <section>
        <div class="Container-form">
            
            <div class="form-information">
                <div class="form-information-childs">
                    <h2><br>Inicio de Sesión</br></h2>
                    <h3> Coloca tus datos correctamente y empieza cosas nuevas</h3>
                    <form action= "loguear_usuario.php" onsubmit="return validateForm(event)" method="POST">                    
                        <label>
                            <i class='bx bxs-envelope'></i>
                            <input id="email" type="email" name="email" placeholder="Correo electrónico" >
                        </label>

                        <label>
                            <i class='bx bxs-lock'></i>
                            <input id="password" name="pass" type="password" placeholder="Contraseña" >
                        </label>

                        <p id="error-message" style="color: red;"></p>

                        <button type="submit" class="btn">Iniciar Sesión</a></button>
                        
                    </form>
                </div>
            </div>

            
            <div class="information">
                <div class="info-childs">
                    <img src="imagenes/Logo2.png" alt="Logo" class="logo"> 
                    <h1>SkillHive</h1>
                    <h2>¿Aún no tienes una cuenta?</h2>
                    <h3><br>¡Registrate para tener acceso a diferentes cursos!</br></h3>
                    <button type="button" onclick="document.location='Registro.php'" class="btnLog">Registrarse</button>
                </div>
            </div>

        </div>
    </section>

    <script src="Login.js"></script>

</body>
</html>
