<?php
include_once("config.php");
include_once("db.php"); // Asegúrate de que el nombre del archivo sea correcto

$db = new db();
$conexion = $db->conectar();

if ($conexion) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
}
?>