<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'Skillhive_DB');
    
    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Error de conexión']));
    }

    // Obtener ID del curso a eliminar
    $data = json_decode(file_get_contents('php://input'), true);
    $cursoId = $data['id'];

    // Preparar la consulta para eliminar el curso
    $stmt = $conn->prepare("CALL EliminarCurso(?)");
    $stmt->bind_param("i", $cursoId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el curso']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
