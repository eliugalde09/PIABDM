
<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'Skillhive_DB');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Error de conexión']));
    }

    // Obtener los datos enviados
    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];
    $nivel = $data['nivel'];
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $detalles = $data['detalles'];
    $categoria = $data['categoria'];
    $costo = $data['costo'];

    // Preparar la consulta para actualizar el curso
    $stmt = $conn->prepare("CALL ActualizarCurso(?, ?, ?, ?, ?, ?, 'Activo')"); // Cambia la llamada al procedimiento si es necesario
    $stmt->bind_param("issssd", $id, $nombre, $descripcion, $detalles, $categoria, $costo);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el curso']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
