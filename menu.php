<?php
        echo '<li><a href="Principal.php">Home</a></li>';
        echo '<li><a href="Perfil.php">Mi Perfil</a></li>';
        echo '<li><a href="Cursos.php">Cursos</a></li>';
    if ($_SESSION['rol'] == 'Estudiante'){
        echo '<li><a href="Kardex.php">Kardex</a></li>';
        echo '<li><a href="Chats.php">Chat</a></li>';
        echo '<li><a href="Login.php">Cerrar Sesión</a></li>';
    }
    if($_SESSION['rol'] == 'Instructor'){
        echo '<li><a href="CrearCurso.php">Crear Curso</a></li>';
        echo '<li><a href="EditarCurso.php">Editar Curso</a></li>';
        echo '<li><a href="EliminarCurso.php">Eliminar Curso</a></li>';
        echo '<li><a href="Ventas.php">Ventas</a></li>';
        echo '<li><a href="Chats.php">Chat</a></li>';
        echo '<li><a href="Login.php">Cerrar Sesión</a></li>';

    }
    if($_SESSION['rol'] == 'Administrador'){
        echo '<li><a href="Categorias.php">Categorías</a></li>';
        echo '<li><a href="Reportes.php">Reportes</a></li>';
        echo '<li><a href="PanelControl.php">Panel de Control</a></li>';
        echo '<li><a href="Login.php">Cerrar Sesión</a></li>';
    }
?>