<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Detalles archivo imagen
        $nombreArchivo = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $tamañoArchivo = $_FILES['imagen']['size'];

        $directorioDestino = 'imagenes/';
        $nombreArchivoFinal = $directorioDestino .uniqid(). $nombreArchivo;
        if (move_uploaded_file($rutaTemporal, $nombreArchivoFinal)) {
            
            require_once "conexion.php";

            $db = new db();
            $conexion = $db->conectar();
    
            $sql = "
                UPDATE usuarios SET imagen_perfil = '{$nombreArchivoFinal}' WHERE id = '{$_SESSION['id_usuario']}';
                ";
            $stmt = $conexion->query($sql);

            $_SESSION['imagen'] = $nombreArchivoFinal;
            
            header('Location: Perfil.php');
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se seleccionó una imagen válida.";
        }

        var_dump($rutaTemporal);
} else {
        echo "No se seleccionó una imagen válida.";
}

?>