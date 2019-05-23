<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
    header("Location: ../../public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Gestion de Usuarios</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="ajax.js"></script>
    <link rel="stylesheet" href="../../../config/styles/index.css">
</head>

<body class="bodyAdmin">
        <div class="menu">
            <header>
                <nav>
                    <ul>
                    <li><a href="index.php">Mi cuenta</a></li>
                    </ul>
                </nav>
            </header>
        </div>
        <table style="width:100%">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento </th>
                <th>Foto Perfil</th>
                <th>Eliminar </th>
                <th>Modificar </th>
                <th> Cambiar Contrasena</th>
                <th colspan="2">Mensajeria</th> 
            </tr>
            <?php
                include '../../../config/conexionBD.php';
                $sql ="SELECT * FROM usuario WHERE usu_tipo_usuario='user'";
                $result=$conn->query($sql);


                
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["usu_eliminado"]=='N'){
                        echo "<tr>";
                        $codigo=$row["usu_codigo"];
                        echo "  <td align=center>" .$row["usu_cedula"]."</td>";
                        echo "  <td align=center>" .$row["usu_nombres"]."</td>";
                        echo "  <td align=center>" .$row["usu_apellidos"]."</td>";
                        echo "  <td align=center>" .$row["usu_direccion"]."</td>";
                        echo "  <td align=center>" .$row["usu_telefono"]."</td>";
                        echo "  <td align=center>" .$row["usu_correo"]."</td>";
                        echo "  <td align=center>" .$row["usu_fecha_nacimiento"]."</td>";

                        if(strncmp($row["usu_foto"],'../../../',9)==0){
                            echo "<td><img class='perfil' src='".$row["usu_foto"]."'></td>";
                        }else{
                            echo "<td><img class='perfil' src='../'".$row["usu_foto"]."'></td>";
                        }

                        echo " <td>" .'<a href="eliminar.php?usu_codigo='.$row["usu_codigo"]. '&delete=' . true .'" > Eliminar </a>'. "</td>";
                        echo " <td>" .'<a href="modificar.php?usu_codigo='.$row["usu_codigo"].'" > Modificar </a>'. "</td>";
                        echo " <td>" .'<a href="cambiarContrasena.php?usu_codigo='.$row["usu_codigo"].'" > Cambiar Contraseña </a>'. "</td>";
                        echo " <td>" .'<a href="recibidos.php?usu_codigo='.$row["usu_codigo"].'" > Ver mensajes </a>'."</td>";

                        echo "</tr>";
                        }
                    }
                }
            ?>

        </table>
        <div>
        <footer>
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