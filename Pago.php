<?php
session_start();
require_once 'conexion.php';

// Validar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: login.php');
    exit;
}

$idUsuario = $_SESSION['id_usuario'];
if (isset($_GET['id'])) {
    $idCurso = $_GET['id'];

    // Conexión a la base de datos
    $db = new db();
    $conexion = $db->conectar();

    // Obtener detalles del curso
    $sql = "SELECT nombre, costo FROM cursos WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idCurso, PDO::PARAM_INT);
    $stmt->execute();
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener métodos de pago del usuario
    $sqlMetodos = "SELECT id_metodo, nombre_propietario, numero FROM MetodoPago WHERE id_usuario = :idUsuario";
    $stmtMetodos = $conexion->prepare($sqlMetodos);
    $stmtMetodos->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmtMetodos->execute();
    $metodos = $stmtMetodos->fetchAll(PDO::FETCH_ASSOC);
} else {
    header('Location: Cursos.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="Global.css">
    <link rel="stylesheet" href="Nav_foot.css">
    <link rel="stylesheet" href="PagoEstilos.css">
    <title>Pago || SkillHive</title>
</head>
<body>
    <!-- NAVBAR -->
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
                    <?php include_once 'menu.php'; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <!-- Resumen de Compra -->
            <div class="col-6 col justify-content-center d-flex">
                <form class="form w-75">
                    <h3 class="subtitle">Resumen de compra</h3>
                    <div class="mb-3">
                        <label for="curso_nombre" class="form-label">Curso:</label>
                        <input type="text" id="curso_nombre" class="input-form" value="<?php echo htmlspecialchars($curso['nombre']); ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="curso_costo" class="form-label">Costo:</label>
                        <input type="text" id="curso_costo" class="input-form" value="$<?php echo number_format($curso['costo'], 2); ?>" disabled>
                    </div>
                </form>
            </div>

            <!-- Método de Pago -->
            <div class="col col-6">
                <h3 class="subtitle">Método de Pago</h3>
                <form id="form-pago" class="form">
                    <label for="type">Seleccione un método:</label>
                    <select id="type" name="type" required>
                        <option value="">Seleccione una tarjeta</option>
                        <?php foreach ($metodos as $metodo): ?>
                            <option value="<?php echo $metodo['id_metodo']; ?>">
                                <?php echo htmlspecialchars($metodo['nombre_propietario']) . " ***" . substr($metodo['numero'], -4); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="cvv">CVV:</label>
                    <input type="number" id="cvv" name="cvv" placeholder="CVV" required>
                    <small id="cvv-feedback" style="color: red; display: none;">CVV incorrecto.</small>
                    <button type="button" class="btn1" id="btn-agregar-metodo" data-toggle="modal" data-target="#modalNuevoMetodo">Agregar otro método</button>
                    <hr>
                    <button type="submit" class="btn">Comprar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para agregar método -->
    <div class="modal fade" id="modalNuevoMetodo" tabindex="-1" aria-labelledby="modalNuevoMetodoLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-nuevo-metodo">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoMetodoLabel">Agregar Nuevo Método</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_propietario">Nombre del propietario</label>
                        <input type="text" id="nombre_propietario" name="nombre_propietario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número de tarjeta</label>
                        <input type="text" id="numero" name="numero" class="form-control" maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control" maxlength="3" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
 </div>

    <!-- FOOTER -->
    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

    <!-- Scripts necesarios -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="Pago.js"></script>
</body>
</html>
