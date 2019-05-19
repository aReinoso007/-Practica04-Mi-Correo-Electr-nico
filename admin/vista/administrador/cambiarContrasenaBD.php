<?php
session_start();
if(!$_SESSION['isLogged']){
    header("Location: ../../../public/vista/login.html");
}
?>
<?php

include '../../../config/conexionBD.php';
$actual = isset($_POST['antcontrasena']) ?trim($_POST["antcontrasena"]):null;
$nueva = isset($_POST["Nucontrasena"]) ? trim($_POST["Nucontrasena"]) : null;
$repnueva = isset($_POST["NuCcontrasena"]) ? trim($_POST["NuCcontrasena"]) : null;
$cod = $_GET["usu_codigo"];

$sql = "SELECT usu_password FROM usuario WHERE usu_codigo='$cod'";

$result = $conn->query($sql);
$result = $result->fetch_assoc();

if (MD5($actual) === $result["usu_password"]) {
    if ($nueva === $repnueva) {
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql = "UPDATE usuario SET usu_password = MD5('$nueva'), usu_fecha_modificacion='$fecha' WHERE usu_codigo ='$cod'";
        if ($conn->query($sql) === true) {
            echo "<h2>Contrasena actulizada con exito</h2>";
            include '../../usuario/indexUsuario.php';
        } else {
            header("Location: cambiarContrasena.php");
        }
    }
}
?>