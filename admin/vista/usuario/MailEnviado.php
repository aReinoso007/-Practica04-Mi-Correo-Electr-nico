<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
    header("Location: ../../../public/vista/login.html");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../config/styles/menuH.css">
    <link rel="stylesheet" href="../../../config/styles/mensajesR.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="../../../config/Ajax/ajax.js"></script>
    <title>Mensajes Enviados</title>
</head>

<body>
    <div class="contenedor">

        <header>




            <div class="menu">
                <ul>
                    <li><a href="nuevoMail.php">Nuevo Mensaje</a></li>
                    <li><a href="mailRecibido.php">Mensajes Recibidos</a></li>
                    <li><a href="indexUsuario.php">Mi cuenta</a></li>

                    <?php
                        include '../../../config/conexionBD.php';
                        $sqlF = "SELECT * FROM usuario WHERE usu_codigo=".$_SESSION['codigo'].";  " ;
                        $enlace = $conn->query($sqlF);
                        $foto = $enlace->fetch_assoc();
                        $imagen='';
                            
                        if(strncmp($foto['usu_foto'],'../../../', 9) === 0   ){
                            $imagen=$foto['usu_foto'];
                       }else{
                            $imagen='../'.$foto['usu_foto'];
                       }
                       $conn->close();
                    ?>


                    <li><img class="perfil1" src='<?php echo ($imagen) ?>' alt="../">
                        <span>
                            <h5 class="nombreUser"><?php echo ($foto['usu_nombres'].' '.$foto['usu_apellidos']) ?></h5>
                        </span>


                    </li>
                </ul>
            </div>

        </header>

        <br>
        <br>

        <h2 class="titulo"> Mensajes Enviados</h2>

        <div class="containerMensajerR">

            <input class="barraBusqueda" id="barraBusqueda" type="text" />
            <button class="buscar" type="submit" onclick="buscarCorreo()">
                <i class="fas fa-search"></i>
            </button>

            <table id="tabla" style="width:100%">
                <tr>
                    <th>Fecha</th>
                    <th>Destino</th>
                    <th>Asunto</th>
                    <th></th>
                </tr>
                <?php
                   
                    include '../../../config/conexionBD.php';
                    $codigoRemitente=$_SESSION['codigo'];
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
                    echo " <td>" .'<a style="text-decoration: none; color:white" href="verMail.php?mail_codigo='.$row["mail_codigo"].'" > Ver  </a>'."</td>";
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="piePagina">

        <footer>

            <address>

                Alex Jessiel Reinoso Gonzalez<br>
                Universidad Politecnica Salesiana<br>
            </address>
            <br>
            <p>&copy; Todos los derechos reservados</p>
        </footer>
    </div>
</body>

</html>