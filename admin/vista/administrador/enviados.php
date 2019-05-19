<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <div class="menu">
                <ul>
                    <?php
                        include '../../../config/conexionBD.php';
                        $sqlF="SELECT * FROM usuario WHERE usu_codigo=".$_GET['usu_codigo']."; ";
                        $enlace=$conn->query($sqlF);
                        $foto = $enlace->fetch_assoc();

                        $imagen='';

                        if(strncmp($foto['usu_foto'],'../../../', 9) === 0   ){
                            $imagen=$foto['usu_foto'];
                        }else{
                            $imagen='../'.$foto['usu_foto'];
                        }
                        $conn->close();
                    ?>
                    <li><img class="perfil" src='<?php echo($imagen)?>' alt="../">
                        <span>
                            <h5 class="nombreUsuario"><?php echo($foto['usu_nombres'].''.$foto['usu_apellidos'])?></h5>

                        </span>
                    </li>
                </ul>
            </div>
        </header>
        <br>
        <br>
        <br>
        <h2 class="titulo">Outbox</h2>
        <br>
        <br>
        
        <div class="containerMensajes">
            <table style="width:100%">
                <tr>
                    <th>Fecha</th>
                    <th>Remitente</th>
                    <th>Asunto</th>
                    <th colspan="2">Opciones</th>
                </tr>
                <?php
                   
                   include '../../../config/conexionBD.php';
                   $codigoRemitente=$_GET['usu_codigo'];
                   $sql = "SELECT * FROM mensaje  WHERE usu_remitente='$codigoRemitente' ORDER BY mail_fecha DESC " ;
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {

                   while($row = $result->fetch_assoc()) {
                   echo "<tr>";
                   echo " <td>" . $row["mail_fecha"] . "</td>";
                   $correODest = "SELECT * FROM usuario WHERE usu_codigo=".$row["usu_destino"].";" ;
                   $crreo = $conn->query($correODest);
                   $fila = $crreo->fetch_assoc();
                   echo " <td>" . $fila["usu_correo"] . "</td>";
                   echo " <td>" . $row['mail_asunto'] ."</td>";
                   echo " <td>" .'<a href="leerMail.php?mensaje_codigo='.$row["mail_codigo"].'" > Ver </a>'. "</td>";
                   echo " <td>" .'<a href="../controladores/administrador/eliminarMail.php?mensaje_codigo='.$row["mail_codigo"].'&delete=' . true .'" > Eliminar </a>'. "</td>";
                   echo "</tr>";

                   }

                   
                   } else {
                   echo "<tr>";
                   echo " <td colspan='7'> No existen mensajes </td>";
                   echo "</tr>";
                   }
                   $conn->close();
                ?>
            </table>
        </div>
    </div>
</body>
</html>