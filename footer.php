<?php
include_once 'conexion.php';

$db = new db();
$conexion = $db->conectar();

try {
    // Consultar categorías activas
    $sql = "SELECT nombre FROM Categorias WHERE estado = 'Activo'";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    error_log("Error al obtener categorías: " . $e->getMessage());
    $categorias = [];
}
?>

<div class="link">
    <h3>Categorías</h3>
    <ul>
        <?php
        if (!empty($categorias)) {
            foreach (array_slice($categorias, 0, 5) as $categoria) {
                echo '<li><a href="CursoCategoria.php?categoria=' . urlencode($categoria['nombre']) . '">' . htmlspecialchars($categoria['nombre']) . '</a></li>';
            }
        } else {
            echo '<li>No hay categorías disponibles.</li>';
        }
        ?>
    </ul>
</div>

<div class="link">
    <ul>
        <?php
        if (!empty($categorias)) {
            foreach (array_slice($categorias, 5, 5) as $categoria) {
                echo '<li><a href="CursoCategoria.php?categoria=' . urlencode($categoria['nombre']) . '">' . htmlspecialchars($categoria['nombre']) . '</a></li>';
            }
        }
        ?>
    </ul>
</div>

<div class="link">
    <h3>Sobre nosotros</h3>
    <p>
        Somos una empresa en crecimiento con el objetivo de
        ofrecer cursos innovadores y de alta calidad. 
        Únete a nuestra comunidad y descubre cómo podemos 
        ayudarte a explorar nuevas habilidades y alcanzar
        tu máximo potencial.
    </p>
</div>
