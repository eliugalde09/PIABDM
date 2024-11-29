<?php 

require_once "conexion.php";

$db = new db();
$conexion = $db->conectar();

//$conexion

$params = [
    'nombre'        => $_POST['profile-name'],
    'correo'        => $_POST['profile-email'],
    'usuario'       => $_POST['profile-user'],
    'contraseña'    => $_POST['profile-pass'],
    'fecha'         => $_POST['dob'],
    'genero'        => $_POST['genero'],
    'rol'           => $_POST['role']
];

//var_dump($params);

$sql = "
    CALL AgregarUsuario (
        '{$params['nombre']}',
        '{$params['usuario']}',
        '{$params['correo']}',
        '{$params['contraseña']}',
        '{$params['fecha']}',
        '',
        '{$params['genero']}',
        '{$params['rol']}',
        'desbloqueado'
    )
";

//echo $sql."<br><br>";

//Agregar usuario a bd
$conexion->query($sql);

//Obtenemos el id del usuario creado
//$id_usuario = $db->conexion->lastInsertId();

$sql = "
    SELECT * FROM usuarios 
    WHERE nom_usuario = '{$params['usuario']}' 
    AND contrasena = '{$params['contraseña']}'
    LIMIT 1
";
$stmt = $conexion->query($sql);

$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if($registro){
    //Guardar datos de usuario en la sesion;
    session_start();
    $_SESSION['id_usuario'] = $registro['id'];
    $_SESSION['nombre'] = $params['nombre'];
    $_SESSION['usuario'] = $params['usuario'];
    $_SESSION['correo'] = $params['correo'];

    $_SESSION['fechaNac'] = $params['fecha'];
    $_SESSION['rol'] = $params['rol'];
    $_SESSION['genero'] = $params['genero'];
    $_SESSION['fechaCrea'] = '';
    $_SESSION['imagen'] = "imagenes/user_default.jpg";

    //aqui la ruta de la pagina principal
    header('Location: Principal.php');
}else{
    //aqui la ruta de la pagina de registro
    header('Location: Registro.php');
}


?>