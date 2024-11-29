<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'Skillhive_DB');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Error de conexión']));
    }

    // Obtener los cursos
    $result = $conn->query("SELECT id, nombre FROM Cursos WHERE estado = 'Activo'");

    $cursos = [];
    while ($row = $result->fetch_assoc()) {
        $cursos[] = $row;
    }

    echo json_encode(['success' => true, 'cursos' => $cursos]);

    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>