<?php 
session_start();
include_once 'conexion.php'; 

// Tipo de usuario
$type = isset($_GET['type']) ? $_GET['type'] : '';

if ($type == 'Instructor') {
    $sql = "SELECT * FROM Usuarios WHERE rol = 'Instructor' AND estado = 'activo'";
} elseif ($type == 'Estudiante') {
    $sql = "SELECT * FROM Usuarios WHERE rol = 'Estudiante' AND estado = 'activo'";
} else {
    $sql = "SELECT * FROM Usuarios WHERE estado = 'activo'";
}

$result = $conn->query($sql);
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
    <link rel="stylesheet" href="Reportes.css">
    <title>Reportes || SkillHive</title>
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
                    <?php include_once 'menu.php' ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2 class="title">---REPORTES---</h2>
        <div class="row">
            <div class="col-2 filter-container">
                <h3 class="subtitle">Filtro</h3>
                <form action="" method="get" class="form">
                    <label for="type">Tipo de usuario:</label>
                    <select id="type" name="type" required>
                        <option value="">Seleccione</option>
                        <option value="Instructor" <?php echo ($type == 'Instructor') ? 'selected' : ''; ?>>Instructor</option>
                        <option value="Estudiante" <?php echo ($type == 'Estudiante') ? 'selected' : ''; ?>>Estudiante</option>
                    </select>

                    <button type="submit" class="btn">Generar reporte</button>
                </form>
            </div>

            <div class="col-10 result-container">
                <?php if ($result->num_rows > 0): ?>
                    <h3 class="subtitle">Resultado del reporte por <?php echo $type ? $type : 'usuarios'; ?></h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha ingreso</th>
                                <th scope="col">Estado</th>
                                <?php if ($type == 'Instructor'): ?>
                                    <th scope="col">Cursos ofrecidos</th>
                                    <th scope="col">Total ganancias</th>
                                <?php else: ?>
                                    <th scope="col">Cursos inscritos</th>
                                    <th scope="col">Cursos finalizados</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
<tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nom_usuario']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['fecha_creacion']; ?></td>
            <td><?php echo ucfirst($row['estado']); ?></td>

            <?php if ($type == 'Instructor'): ?>
                <!-- Número de cursos ofrecidos -->
                <?php
                $id_instructor = $row['id'];
                $cursos_query = "SELECT COUNT(*) as cursos_ofrecidos FROM Cursos WHERE id_instructor = $id_instructor";
                $cursos_result = $conn->query($cursos_query);
                $cursos_row = $cursos_result->fetch_assoc();
                $cursos_ofrecidos = $cursos_row['cursos_ofrecidos'];
                ?>
                <td><?php echo $cursos_ofrecidos; ?></td>
                
                <!-- Ganancias totales -->
                <?php
                $ganancias_query = "SELECT SUM(monto) as total_ganancias FROM Venta WHERE id_usuario = $id_instructor";
                $ganancias_result = $conn->query($ganancias_query);
                $ganancias_row = $ganancias_result->fetch_assoc();
                $total_ganancias = $ganancias_row['total_ganancias'];
                ?>
                <td>$<?php echo number_format($total_ganancias, 2); ?> MXN</td>
            
                <?php else: ?>
                <!-- Cursos inscritos (Estudiantes) -->
                <?php
                $id_estudiante = $row['id'];
                $cursos_inscritos_query = "SELECT COUNT(*) as cursos_inscritos FROM Registro WHERE id_usuario = $id_estudiante";
                $cursos_inscritos_result = $conn->query($cursos_inscritos_query);
                $cursos_inscritos_row = $cursos_inscritos_result->fetch_assoc();
                $cursos_inscritos = $cursos_inscritos_row['cursos_inscritos'];
                ?>
                <td><?php echo $cursos_inscritos; ?></td>

                <!-- Cursos finalizados (Estudiantes) -->
                <?php
                $cursos_finalizados_query = "SELECT COUNT(*) as cursos_finalizados FROM ProgresoEstudiante WHERE id_usuario = $id_estudiante AND progreso = 100";
                $cursos_finalizados_result = $conn->query($cursos_finalizados_query);
                $cursos_finalizados_row = $cursos_finalizados_result->fetch_assoc();
                $cursos_finalizados = $cursos_finalizados_row['cursos_finalizados'];
                ?>
                <td><?php echo $cursos_finalizados; ?></td>
            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</tbody>

                    </table>
                <?php else: ?>
                    <p>No se encontraron usuarios.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-container">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
