<?php 

require_once "conexion.php";

$db = new db();
$conexion = $db->conectar();

//$conexion

$params = [
    'correo'       => $_POST['email'],
    'contraseña'    => $_POST['pass']
];

//var_dump($params);

$sql = "
    SELECT * FROM usuarios 
    WHERE correo = '{$params['correo']}' 
    AND contrasena = '{$params['contraseña']}'
    LIMIT 1
";

$stmt = $conexion->query($sql);
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if($registro){

    //Guardar datos de usuario en la sesion;
    session_start();
    $_SESSION['id_usuario'] = $registro['id'];
    $_SESSION['nombre'] = $registro['nombre'];
    $_SESSION['usuario'] = $registro['nom_usuario'];
    $_SESSION['correo'] = $registro['correo'];
    
    $_SESSION['fechaNac'] = $registro['fecha_nacimiento'];
    $_SESSION['rol'] = $registro['rol'];
    $_SESSION['genero'] = $registro['genero'];
    $_SESSION['fechaCrea'] = $registro['fecha_creacion'];
    $_SESSION['fechaModi'] = $registro['fecha_modificacion'];
    $_SESSION['imagen'] = $registro['imagen_perfil'];

    if($_SESSION['imagen'] == NULL || $_SESSION['imagen'] ==''){
        $_SESSION['imagen'] = "imagenes/user_default.jpg";
    }

    //aqui la ruta de la pagina principal
    header('Location: Principal.php');
    var_dump($registro);
}
else{
    header('Location: Login.php');
}



?>