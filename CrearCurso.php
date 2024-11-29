<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso || SkillHive</title>
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
                    <li><a href="Principal.php">Home</a></li>
                    <li><a href="PerfilI.html">Mi Perfil</a></li>  
                    <li><a href="Cursos.php">Cursos</a></li>
                    <li><a href="login.php">Cerrar Sesión</a></li>
                    <li><a href="Busqueda.php">Buscar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="Formulario-Curso">
        <h2>---¡Agrega un Nuevo Curso a la plataforma!---</h2>
        <h4>Por favor, llena el siguiente formulario con los datos correctos para poder registrar exitosamente el curso</h4>
        <form id="cursos-form" method="post"action="registrar_curso.php" enctype="multipart/form-data" 
        onsubmit="return validateFormCurso(event)">
           
            <label for="nivel-curso">Nivel del curso:</label>
            <select id="nivel-curso" name="nivel" required>
                <option value="">Seleccione un nivel</option>
                <option value="Principiante">Principiante</option>
                <option value="Intermedio">Intermedio</option>
                <option value="Avanzado">Avanzado</option>
            </select>
    
            <label for="name">Nombre del curso:</label>
            <input type="text" id="nombre" name ="curso-name" required>
    
            <label for="descripcion">Descripción del curso:</label>
            <textarea id="descripcion" name ="curso-descripcion" required></textarea>
    
            <label for="descripcion">Más detalles sobre el curso (Agrega información como herramientas a utilizar, público específico dirigido, entre otras cosas):</label>
            <textarea id="descripcion-detalles" name ="curso-detalles" required></textarea>
    
            <label for="curso-categoria">Categoría a la que pertenece:</label>
            <select id="curso-categoria" name="categoria" required>
        <option value="">Seleccione una categoría</option>

        <?php
        foreach ($categorias as $categoria) {
            echo '<option value="' . $categoria['id'] . '">' . $categoria['nombre'] . '</option>';
        }
        ?>
    </select>
            <label for="costo-curso">Costo del curso:</label>
            <input type="number" id="costo-curso" name ="curso-costo" step="1.00" required>
    
            <label for="videos">Videos (opcional):</label>
             <input type="file" id="videos" name="curso-videos" multiple>

             <label for="contenido1">Contenido 1 (opcional):</label>
             <input type="file" id="contenido1" name="curso-contenido1" multiple>

            <label for="contenido2">Contenido 2 (opcional):</label>
              <input type="file" id="contenido2" name="curso-contenido2" multiple>

             <label for="contenido3">Contenido 3 (opcional):</label>
             <input type="file" id="contenido3" name="curso-contenido3" multiple>

             <label for="imagen-portada">Imagen de portada (requerida):</label>
            <input type="file" id="imagen-portada" name="curso-portada" accept="image/*" required>

    
            <h4>Agrega los Módulos del Curso:</h4>
            
            <!-- Contenedor para los módulos -->
            <div id="modulos-container">
                <div class="modulo-item" id="modulo-1">
                    <label for="modulo-1-nombre">Nombre del Módulo 1:</label>
                    <input type="text" name="modulo-1-nombre" required>
                    <label for="modulo-1-descripcion">Descripción:</label>
                    <input type="text" name="modulo-1-descripcion" required>
                    
                    <label for="modulo-1-contenido">Seleccionar tipo de contenido:</label>
                    <select name="modulo-1-contenido" required>
                        <option value="">Seleccione un tipo de contenido</option>
                        <option value="video">Video</option>
                        <option value="imagen">Imagen</option>
                        <option value="documento">Documento</option>
                    </select>
    
                    <label for="modulo-1-archivo">Seleccionar archivo para el módulo:</label>
                    <input type="file" name="modulo-1-archivo" required>
                </div>
            </div>
    
            <!-- Botón para agregar más módulos -->
            <button type="button" id="add-modulo-btn" style="display: block; margin: 20px auto;">Agregar Módulo</button>
    
            <button type="submit" style="display: block; margin: 20px auto;">Agregar Curso</button>
            <p id="error-message" style="color: red;"></p>
        </form>
    </section>
    
    <script>
        let moduloCount = 1; 
        document.getElementById('add-modulo-btn').addEventListener('click', () => {
            moduloCount++; 
    
            const newModulo = document.createElement('div');
            newModulo.classList.add('modulo-item');
            newModulo.id = `modulo-${moduloCount}`;
    
            newModulo.innerHTML = `
                <label for="modulo-${moduloCount}-nombre">Nombre del Módulo ${moduloCount}:</label>
                <input type="text" name="modulo-${moduloCount}-nombre" required>
                <label for="modulo-${moduloCount}-descripcion">Descripción:</label>
                <input type="text" name="modulo-${moduloCount}-descripcion" required>
    
                <label for="modulo-${moduloCount}-contenido">Seleccionar tipo de contenido:</label>
                <select name="modulo-${moduloCount}-contenido" required>
                    <option value="">Seleccione un tipo de contenido</option>
                    <option value="video">Video</option>
                    <option value="imagen">Imagen</option>
                    <option value="documento">Documento</option>
                </select>
    
                <label for="modulo-${moduloCount}-archivo">Seleccionar archivo para el módulo:</label>
                <input type="file" name="modulo-${moduloCount}-archivo" required>
            `;
    
            document.getElementById('modulos-container').appendChild(newModulo);
        });
    </script>

<footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

</body>
</html>
