<?php
$db_servername= "localhost";
$db_username="root";
$db_password="";
$db_name="hipermedial";
//Crear conexion
$conn=new mysqli($db_servername, $db_username, $db_password, $db_name);
$conn->set_charset("utf8");

if($conn->connect_error){
    die("conexion fallida".$conn->connect_error);
}else{
    echo "<p>conexion exitosa</p>";
}
?>