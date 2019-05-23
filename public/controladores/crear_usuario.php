<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <link rel="stylesheet" href="../estilos/styles.css">
</head>
<body>
    <?php

        include '../../config/conexionBD.php';

            $cedula     = isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
            $nombres    = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8'):null;
            $apellidos  = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8'):null;
            $direccion  = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8'):null;
            $telefono   = isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
            $correo     = isset($_POST["correo"]) ? trim($_POST["correo"]):null;
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;
            $fechaNac   = isset($_POST["fechaNac"]) ? trim($_POST["fechaNac"]):null;


            //Foto
            $fotoN  =  $_FILES["fotoper"]["name"];
                //echo  "Nombre archivo =$fotoN";
            $ruta = $_FILES["fotoper"]["tmp_name"];
            //echo "Ruta =$ruta";

            if(empty($fotoN)){
            $destino="../../config/fotos/perfil.jpg";
            }else{
                $random_digit = rand (0000,9999);
	            $new_foto = $random_digit. $fotoN;
                $ruta=$_FILES["fotoper"]["tmp_name"];
                echo "Ruta = $ruta";
                $destino="../../config/fotos/".$new_foto;
                $new_foto='';
                echo "destino = $destino";
                copy($ruta, $destino);
            }
    

            $sql = "INSERT INTO usuario() VALUES (0,'$cedula', '$nombres', '$apellidos', '$direccion', '$telefono',
                    '$correo', MD5('$contrasena'), '$fechaNac', 'N', null, null, '$destino', 'user','Yes')";

            if($conn->query($sql) === TRUE){
                echo "<p> Se ha creado los datos personales correctamente</p>";
                header("Location: ../vista/login.html");
            }else{
                if($conn->errno==1062){
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema</p>";
                }else{
                    echo "<p class='error'>Error:" .mysqli_error($conn)."</p>";
                }
            }

        $conn->close();
            echo "<a href= '../vista/crear_usuario.html'>Regresar</a>";

    ?>

</body>
</html>