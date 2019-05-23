<?php
    include '../../../config/conexionBD.php';
    $cod= isset($_GET["mail_codigo"]) ? trim($_GET["mail_codigo"]):null;             
    $delete = isset($_GET["delete"]) ? trim($_GET["delete"]):null;

    if($cod!=null and $delete==true){
      
        $sql= "DELETE FROM  mensaje WHERE mail_codigo='$cod';";             
        $result = $conn->query($sql);
        header("Location: ../../vista/administrador/index.php");
    }elseif($cod!=null and $delete==false){
        header("Location: ../../vista/administrador/index.php");
    }else{
        header("Location: ../../vista/administrador/index.php");
    }
    $conn->close();
?>