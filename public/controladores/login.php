<?php
 session_start();
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;


 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena') and usu_eliminado='N' ";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 if ($result->num_rows > 0) {
 $_SESSION['isLogged'] = TRUE;
 $_SESSION['codigo'] = $row['usu_codigo'];
    if($row['usu_tipo_usuario']=='user'){
        header("Location: ../../admin/vista/usuario/indexUsuario.php");
    }else{
        header("Location: ../../admin/vista/administrador/index.php");
    }
 } else {
 header("Location: ../vista/login.html");
 }

 $conn->close();
?>