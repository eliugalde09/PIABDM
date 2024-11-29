<?php
header('Content-Type: application/json');

session_start();

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'skillhive');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos: ' . $conn->connect_error]));
    }

    $nivel = $_POST['nivel'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $detalles = $_POST['detalles'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $costo = $_POST['costo'] ?? '';
    $id_instructor = $_SESSION['id_usuario'];

    $imagenPortada = $_FILES['imagen-portada'];
    $videoCurso = $_FILES['video-curso'];

    if ($imagenPortada['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Error al subir la imagen de portada']);
        exit();
    }

    if ($videoCurso['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Error al subir el video del curso']);
        exit();
    }

    $rutaPortada = 'PIABDM/Imágenes Portada/' . basename($imagenPortada['name']);
    $rutaVideo = 'PIABDM/Videos Cursos/' . basename($videoCurso['name']);

    if (!move_uploaded_file($imagenPortada['tmp_name'], $rutaPortada) || !move_uploaded_file($videoCurso['tmp_name'], $rutaVideo)) {
        echo json_encode(['success' => false, 'message' => 'Error al mover los archivos subidos']);
        exit();
    }

    // Base de datos
    $sql = "INSERT INTO cursos (nombre, descripcion, detalles, categoria_id, id_instructor, costo, estado, portada, video) 
            VALUES ('$nombre', '$descripcion', '$detalles', '$categoria', '$id_instructor', '$costo', 'Activo', '$rutaPortada', '$rutaVideo')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Curso creado exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al crear el curso: ' . $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>