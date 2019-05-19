<?php
   
   session_start();
   if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
       header("Location: /PRACTICA04-MI-CORREO-ELECTRONICO/public/vista/login.html");
   }


 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigoRemitente=isset($_POST["codigoRemitente"]) ? trim($_POST["codigoRemitente"]) : null;
 $asunto = isset($_POST["asunto"]) ? trim($_POST["asunto"]) : null;
 $remitente = isset($_POST["destino"]) ? trim($_POST["destino"]) : null;
 $mensaje = isset($_POST["msg"]) ? trim($_POST["msg"]) : null;



  
 $sql = "SELECT usu_codigo FROM usuario WHERE usu_correo ='$remitente';";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 $codD = $row["usu_codigo"];






 $sqlInsert = "INSERT INTO mensaje VALUES (0,null, '$asunto', '$mensaje', '$codigoRemitente', '$codD')";
 if ($conn->query($sqlInsert) === TRUE) {
 echo "<p>Se ha enviado el mensaje correctamente!!!</p>";
 header("Location: ../../vista/usuario/nuevoMail.php");
 } else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 
 //cerrar la base de datos
 $conn->close();
 
 
?>