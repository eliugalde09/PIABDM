<?php
session_start();
include_once 'conexion.php'; // Conexión a la base de datos

if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['instructor_id'])) {
    die("Acceso denegado. No se encontraron sesiones activas.");
}

$usuario_id = $_SESSION['usuario_id'];
$instructor_id = $_SESSION['instructor_id'];

// Función para obtener mensajes
function obtenerMensajes($usuario_id, $instructor_id) {
    global $conn;
    $sql = "SELECT c.*, u.nombre AS nombre_usuario, i.nombre AS nombre_instructor, 
            u.imagen AS imagen_usuario, i.imagen AS imagen_instructor 
            FROM chats c
            JOIN usuarios u ON c.usuario_id = u.id
            JOIN instructores i ON c.instructor_id = i.id
            WHERE (c.usuario_id = ? AND c.instructor_id = ?) OR (c.usuario_id = ? AND c.instructor_id = ?)
            ORDER BY c.fecha_hora ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $usuario_id, $instructor_id, $instructor_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Enviar mensaje
if (isset($_POST['mensaje']) && !empty($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    
    if (empty($mensaje)) {
        $error = "Porfavor ingresa un mensaje valido.";
    } else {
        // Mensaje guardado en la BD
        $fecha_hora = date('Y-m-d H:i:s');
        $sql = "INSERT INTO chats (usuario_id, instructor_id, mensaje, fecha_hora) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiss", $usuario_id, $instructor_id, $mensaje, $fecha_hora);
        $stmt->execute();
    }
}

$mensajes = obtenerMensajes($usuario_id, $instructor_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Global.css">
    <link rel="stylesheet" href="Nav_foot.css">
    <link rel="stylesheet" href="Chats.css">
    <title>Chats || SkillHive</title>
</head>
<body>
    <!-- Navbar omitted for brevity -->

    <?php
function obtenerChats($usuario_id) {
    global $conn;
    
    $sql = "SELECT c.instructor_id, i.nombre AS nombre_instructor, i.imagen AS imagen_instructor, 
            MAX(c.fecha_hora) AS ultimo_mensaje_fecha, 
            (SELECT mensaje FROM chats WHERE usuario_id = ? AND instructor_id = c.instructor_id ORDER BY fecha_hora DESC LIMIT 1) AS ultimo_mensaje
            FROM chats c
            JOIN instructores i ON c.instructor_id = i.id
            WHERE c.usuario_id = ?
            GROUP BY c.instructor_id
            ORDER BY ultimo_mensaje_fecha DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $usuario_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

// Función para obtener los chats del alumno
$chats = obtenerChats($usuario_id);
?>

<div class="container">
    <div class="row">
        <!-- Lista de chats -->
        <div class="col-3 chats-container border">
            <h5 class="font-weight-bold mb-3 text-center">Chats</h5>
            <ul class="list-unstyled">
                <?php while ($row = $chats->fetch_assoc()): ?>
                    <li class="border-top">
                        <a href="#!" class="d-flex justify-content-between p-2 a-chat">
                            <div class="d-flex flex-row">
                                <img src="<?php echo $row['imagen_instructor']; ?>" alt="avatar" 
                                     class="rounded-circle mx-2 d-flex align-self-center" width="60">
                                <div class="pt-1"> 
                                    <p class="fw-bold mb-0"><?php echo htmlspecialchars($row['nombre_instructor']); ?></p>
                                    <p class="small text-muted"><?php echo htmlspecialchars($row['ultimo_mensaje']); ?></p>
                                </div>
                            </div>
                            <div class="pt-1">
                                <p class="small text-muted mb-1"><?php echo date('d/m/Y h:i A', strtotime($row['ultimo_mensaje_fecha'])); ?></p>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>


            <!-- Mensajes -->
            <div class="col-9 inbox-container">
                <div class="d-flex flex-row my-auto p-2">
                    <img src="path_to_instructor_image.jpg" alt="avatar" style="width: 45px;">
                    <h3 class="subtitle my-auto ml-2">Nombre del Instructor</h3>
                </div>

                <!-- Mostrar mensajes -->
                <div class="messages-container">
                    <?php while ($row = $mensajes->fetch_assoc()): ?>
                        <div class="d-flex flex-row <?php echo $row['usuario_id'] == $usuario_id ? 'justify-content-end' : 'justify-content-start'; ?>">
                            <img src="<?php echo $row['usuario_id'] == $usuario_id ? $row['imagen_usuario'] : $row['imagen_instructor']; ?>" 
                                 alt="avatar" style="width: 45px;">
                            <div class="<?php echo $row['usuario_id'] == $usuario_id ? 'mensaje-emisor' : 'mensaje-remitente'; ?>">
                                <p><?php echo htmlspecialchars($row['mensaje']); ?></p>
                                <div class="text-right">
                                    <span class="small"><?php echo date('h:i A | d/m/Y', strtotime($row['fecha_hora'])); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Enviar mensaje -->
                <div class="text-muted d-flex justify-content-start align-items-center p-3 mt-2">
                    <img class="mr-2" src="path_to_user_image.jpg" alt="avatar" style="width: 40px;">
                    <form method="POST" action="Chats.php">
                        <input type="text" name="mensaje" class="input-message" placeholder="Mensaje...">
                        <button type="submit" class="ico-send ml-2"><i class='bx bxs-send'></i></button>
                    </form>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer omitted for brevity -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
