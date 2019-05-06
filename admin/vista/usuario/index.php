<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']==FALSE){
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de usuarios</title>
    <link rel="stylesheet" href="../../vista/estilos/styles.css" type="text/css"/>
</head>
<body>
    <table style="widht:100%; border: 1">
        <tr >
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>numero</th>
            <th>correo</th>
            <th>fecha nacimiento</th>
        </tr>

<?php
    
    include '../../../config/conexionBD.php';
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo" <tr>";
            echo" <td>" .$row["usu_cedula"]."</td>";
            echo" <td>" .$row["usu_nombres"]."</td>";
            echo" <td>" .$row["usu_apellidos"]."</td>";
            echo" <td>" .$row["usu_direccion"]."</td>";
            echo" <td>" .$row["usu_telefono"]."</td>";
            echo" <td>" .$row["usu_correo"]."</td>";
            echo" <td>" .$row["usu_fecha_nacimiento"]."</td>";
            echo "  <td> <a href='eliminar.php'?codigo=" .$row['usu_codigo']."</td>";
            echo "</tr>";
        }
    }else{
        echo "<tr>";
        echo" <td colspan='7'>No existen usuarios registrados en el sistema</td>";
        echo "</tr>";
    }

    $conn->close();
?>
</table>
</body>
</html>
