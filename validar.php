<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

include('db.php');

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo']==1) { //administrador
    header("location:home.php");
}else
if($filas['id_cargo']==2){ //administrador de clientes
    header("location:admin_clientes.php");
}else{
    $_SESSION['error'] = "Usuario o contraseña incorrectos.";
    header("location:login.php");
    exit();
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
