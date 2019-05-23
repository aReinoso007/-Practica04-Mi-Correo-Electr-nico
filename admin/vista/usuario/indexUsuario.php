<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
    header("Location: ../../public/vista/login.html");
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
            <input type="checkbox" id="btn_menu">
            <label for="btn_menu"><img class="menuIm" src="../../../config/imagenes/menu.png" alt="botonMenu"></label>
            <link rel="stylesheet" href="../../../config/styles/index.css">
            <div class="menu">
                <ul>
                    <li><a href="cerrarSesion.php">Log out</a></li>
                    <li><a href="mailRecibido.php">Inbox</a></li>
                </ul>
            </div>
        </header>
        <br>
        <br>
        <br>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>correo</th>
                <th>fecha de nacimiento</th>
                <th>Foto de Perfil</th>
                <th>Eliminar</th>
                <th>Modificar</th>
                <th>Cambiar contrasena</th>
            </tr>

            <?php
                include '../../../config/conexionBD.php';
                $sql="SELECT * FROM usuario WHERE usu_codigo=".$_SESSION['codigo'].";";
                $result=$conn->query($sql);

                if ($result->num_rows > 0) {
                    $tipoUser = $result->fetch_assoc();

                    if($tipoUser['usu_tipo_usuario']=='user'){
                        $sql = "SELECT * FROM usuario WHERE usu_codigo=".$_SESSION['codigo']."; " ;
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["usu_codigo"] . "</td>";
                            echo " <td>" . $row["usu_cedula"] . "</td>";
                            echo " <td>" . $row['usu_nombres'] ."</td>";
                            echo " <td>" . $row['usu_apellidos'] . "</td>";
                            echo " <td>" . $row['usu_direccion'] . "</td>";
                            echo " <td>" . $row['usu_telefono'] . "</td>";
                            echo " <td>" . $row['usu_correo'] . "</td>";
                            echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";

                            echo($row["usu_foto"]);
                            
                            if(strncmp($row["usu_foto"],'../../../', 9) === 0   ){

                            echo " <td><img class='perfil' src='".$row["usu_foto"]."' ></td>";
                            }else{
                            echo " <td><img class='perfil' src='../".$row["usu_foto"]."' ></td>";
                                
                            }
                            echo " <td>" .'<a href="eliminar.php?usu_codigo='.$row["usu_codigo"]. '&delete=' . true .'" > Eliminar </a>'. "</td>";
                            echo " <td>" .'<a href="modificar.php?usu_codigo='.$row["usu_codigo"].'" > Modificar </a>'. "</td>";
                            echo " <td>" .'<a href="cambiarPasword.php?usu_codigo='.$row["usu_codigo"].'" > Cambiar Contraseña </a>'. "</td>";
                            echo "</tr>";
        
                            }

                    }else{
                        $sql = "SELECT * FROM usuario WHERE usu_tipo_usuario='user' " ;
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["usu_codigo"] . "</td>";
                            echo " <td>" . $row["usu_cedula"] . "</td>";
                            echo " <td>" . $row['usu_nombres'] ."</td>";
                            echo " <td>" . $row['usu_apellidos'] . "</td>";
                            echo " <td>" . $row['usu_direccion'] . "</td>";
                            echo " <td>" . $row['usu_telefono'] . "</td>";
                            echo " <td>" . $row['usu_correo'] . "</td>";
                            echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
        
                            if(strncmp($row["usu_foto"],'../../../', 9) === 0   ){
                                echo " <td><img class='perfil' src='".$row["usu_foto"]."' ></td>";
                            }else{
                                    echo " <td><img class='perfil' src='../".$row["usu_foto"]."' ></td>";
                                
                            }
                            echo " <td>" .'<a href="../../../admin/vista/usuario/eliminar.php?usu_codigo='.$row["usu_codigo"]. '&delete=' . true .'" > Eliminar </a>'. "</td>";
                            echo " <td>" .'<a href="../administrador/modificar.php?usu_codigo='.$row["usu_codigo"].'" > Modificar </a>'. "</td>";
                            echo " <td>" .'<a href="../administrador/cambiarPasword.php?usu_codigo='.$row["usu_codigo"].'" > Cambiar Contraseña </a>'. "</td>";
                            echo "</tr>";
        
                            }


                    }
            

                } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                echo "</tr>";
                }
                $conn->close();

            ?>
        </table>
    </div>
    <div>
        <footer id="footer">
            <p class="footer">Universidad Politecnica Salesiana</p>
            <p class="footer">Alex Jessiel Reinoso Gonzalez</p>
            <p class="footer">Estudiante</p>
            <p class="footer">Telefono: <a href="tel:+593998952718">0998952718</a></p>
            <p class="footer">E-mail: <a href="mailto:areinosog@est.ups.edu.ec">areinosog@est.ups.edu.ec</a></p>
            Todos los derechos reservados &copy; 
        </footer>
    </div>
   


</body>
</html>