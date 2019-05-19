<?php

ModificarUsuario(
        $_POST['codigo'],
        $_POST['cedula'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['direccion'],
        $_POST['telefono'],
        $_POST['fechaNacimiento'],
        $_POST['correo'],
        // $_POST['foto']
);

header("Location: modificar.php");

function ModificarUsuario ($codigo ,$cedula, $nombres, $apellidos, $direccion, $telefono, $fechaNacimiento, $correo) {
        include '../../../config/conexionBD.php';
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s', time());


        $fotoN=$_FILES["foto"]["name"];
        echo "Nomre archivo = $fotoN";
        $ruta=$_FILES["foto"]["tmp_name"];
        echo "Ruta = $ruta";
 
        if(empty($fotoN)){
        $destino="../../../config/fotos/1.jpeg";
        }else{
        $random_digit = rand (0000,9999);
	$new_foto = $random_digit. $fotoN;
        $ruta=$_FILES["foto"]["tmp_name"];
        echo "Ruta = $ruta";
        $destino="../../../config/fotos/".$new_foto;
        $new_foto='';
        echo "destino = $destino";
        copy($ruta, $destino);
        }

        echo "Codigo=  $codigo";




        $sql="UPDATE usuario SET usu_cedula='".$cedula."', usu_nombres='".$nombres."',
        usu_apellidos='".$apellidos."', usu_direccion='".$direccion."', usu_telefono='".$telefono."',
        usu_correo='".$correo."', usu_fecha_nacimiento='".$fechaNacimiento."', usu_fecha_modificacion='$fecha',
        usu_foto='$destino'  
        WHERE usu_codigo='".$codigo."'";
        $conn->query($sql);
        $conn->close();

       
}

?>