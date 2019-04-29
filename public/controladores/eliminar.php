<?php
    include '../../../config/conexionBD.php';
    $cod= isset($_GET["usu_codigo"]) ? trim($_GET["usu_codigo"]):null;             
    $delete = isset($_GET["delete"]) ? trim($_GET["delete"]):null;

    if($cod!=null and $delete==true){
        $sql= "UPDATE usuario SET usu_eliminado='S' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: ../usuario/index.php");
    }elseif($cod!=null and $delete==false){
        $sql= "UPDATE usuario SET usu_eliminado='N' WHERE usu_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: ../usuario/index.php");
    }else{
        header("Location: ../usuario/index.php");
    }
    $conn->close();
?>