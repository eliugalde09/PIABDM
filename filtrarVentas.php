<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $categoria = $data['categoria'];
    $fechaInicio = $data['fechaInicio'];
    $fechaFin = $data['fechaFin'];

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'Skillhive_DB');

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Error de conexión']));
    }

    // Preparar la consulta
    $sql = "SELECT c.nombre AS curso, COUNT(v.id) AS cantidad, c.costo, SUM(c.costo) AS ingreso 
            FROM Cursos c 
            JOIN Venta v ON c.id = v.id_curso 
            WHERE c.estado = 'Activo'";

    // Filtrar por categoría si se selecciona
    if (!empty($categoria) && $categoria !== "Todos") {
        $sql .= " AND c.categoria_id = (SELECT id FROM Categorias WHERE nombre = ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $categoria);
    } else {
        $stmt = $conn->prepare($sql);
    }

    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    $ventas = [];
    while ($row = $result->fetch_assoc()) {
        $ventas[] = $row;
    }

    echo json_encode($ventas);

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>