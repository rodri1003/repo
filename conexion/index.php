<?php
include_once 'conexion.php';
include_once 'login.php';

$host = "localhost";
$dbname = "dbclasepoo";
$usuario = "root";
$contrasena = "";
$conexion = new conexionPDO($host, $dbname, $usuario, $contrasena);
$conexion->conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['user'];
    $password = $_POST['pwd'];

    $login = new Login($conexion);


    if ($login->login($usuario, $password)) {
        header("Location: dash.php");
        exit();
    } else {
        $error_message = "Nombre de usuario o contraseña incorrectos";
    }
}

$conectar->desconectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
</head>
<body>
<form action="" method="POST">
        <label for="user">Usuario</label> 
        <br>
        <input type="text" name="user" >
        <br>
        <label for="pwd">Contraseña</label> 
        <br>
        <input type="password" name="pwd">
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>