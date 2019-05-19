<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
        include '../../../config/conexionBD.php';
        $remitente=$_GET['remitente'];

        $sqlCod = "SELECT * FROM usuario WHERE usu_correo='$remitente' " ;
        $resultCod = $conn->query($sqlCod);
        $codigosC = $resultCod->fetch_assoc();
        $remitente=$codigosC['usu_codigo'];

        $sql = "SELECT * FROM mensaje WHERE mensaje_remitente='$remitente' " ;
        $result = $conn->query($sql);

        

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["mensaje_fecha"] . "</td>";
                $correODest = "SELECT * FROM usuario WHERE usu_codigo=".$row["mensaje_remitente"].";" ;
                $crreo = $conn->query($correODest);
                $fila = $crreo->fetch_assoc();
                echo " <td>" . $fila["usu_correo"] . "</td>";
                echo " <td>" . $row['mensaje_asunto'] ."</td>";
                echo " <td>" .'<a href="../../vista/usuario/verMail.php?mensaje_codigo='.$row["mensaje_codigo"].'" > Ver  </a>'."</td>";
                echo "</tr>";

             }
            
        }else {
            echo "<tr>";
            echo " <td colspan='7'> No existen mensajes  </td>";
            echo "</tr>";
            }

        $conn->close();
    ?>

</body>

</html>