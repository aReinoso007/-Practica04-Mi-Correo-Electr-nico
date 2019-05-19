<?php
    include '../../../config/conexionBD.php';
    $cod= isset($_GET["usu_codigo"]) ? trim($_GET["usu_codigo"]):null;             
    $delete = isset($_GET["delete"]) ? trim($_GET["delete"]):null;

    if($cod!=null and $delete==true){
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());
        $sql= "UPDATE usuario SET usu_eliminado='S', usu_fecha_modificacion='$fecha' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: indexUsuario.php");
    }elseif($cod!=null and $delete==false){
        $sql= "UPDATE usuario SET usu_eliminado='N', usu_fecha_modificacion='$fecha' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: ../../../public/vista/login.html");
    }else{
        header("Location: ../../../public/vista/login.html");
    }
    $conn->close();
?>