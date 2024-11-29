<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro || SkillHive</title>
    <link rel="stylesheet" href="Registro.css">
</head>
<body>
    <section>
        <div class="Container-form">
            <div class="information">
                <div class="info-childs">
                    <img src="imagenes/Logo2.png" alt="Logo" class="logo"> 
                    <h1>SkillHive</h1>
                    <h2>¿Ya tienes una cuenta con nosotros?</h2>
                    <h3><br>¡Inicia tu sesión y sigue puliento tus habilidades con nuestros cursos!</br></h3>
                    <button type="button" onclick="document.location='login.php'" class="btnLog">Iniciar Sesión</button>
                </div>
            </div>

            <div class="form-information">
                <div class="form-information-childs">
                    <h2><br>Registrate y descubre un millón de cursos de tu interés</br></h2>
                    <form class="form" method="post" id="registroForm" action="registrar_usuario.php" enctype="multipart/form-data" 
                    onsubmit="return validateForm(event)">
        
                        <!--<label for="profile-pic">Foto de Perfil:</label>
                        <input type="file" id="profile-pic" name="profile-pic" accept="image/*">-->

                        <label>
                            <i class='bx bxs-user-badge'></i>
                            <input id="fullName" name="profile-name" type="text" placeholder="Nombre Completo" required>
                        </label>

                        <label>
                            <i class='bx bxs-user'></i>
                            <input id="username" name="profile-user" type="text" placeholder="Nombre de Usuario" required>
                        </label>

                        <label>
                            <i class='bx bxs-envelope'></i>
                            <input id="email" name="profile-email" type="email" placeholder="Correo electrónico" required>
                        </label>

                        <label>
                            <i class='bx bxs-lock'></i>
                            <input id="password" name="profile-pass" type="password" placeholder="Contraseña" required>
                        </label>
                    
                        <label for="dob">Fecha de Nacimiento:</label>
                        <input type="date" id="dob" name="dob" required>

                        <label for="genero">Género:</label>
                        <select id="genero" name="genero" required>
                            <option value="">Seleccione</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="No binario">No Binario</option>
                            <option value="Otro">Otro</option>
                        </select>

                        <label for="role">Rol:</label>
                        <select id="role" name="role" required>
                            <option value="">Seleccione</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Estudiante">Estudiante</option>
                        </select>

                        <button type="submit" class="btn">Registrarse</button>
                        <br>
                        <p id="error-message" style="color: red;"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="Registro.js"></script>
</body>
</html>
