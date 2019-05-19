<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged']===FALSE){
    header("Location: /PRACTICA04-MI-CORREO-ELECTRONICO/public/vista/login.html");
}


$consulta=ConsultarMensaje($_GET['mensaje_codigo']);

function ConsultarMensaje($mensaje_codigo){
    include '../../../config/conexionBD.php';

    $sql="SELECT * from mensaje WHERE mensaje_codigo='".$mensaje_codigo."' ";
    $result=$conn->query($sql);
    $filas=$result->fetch_assoc();

    return[
        $filas['mensaje_asunto'],
        $filas['mensaje_destino'],
        $filas['mensaje_texto'],
    
    ];

    $conn->close();
}
include '../../../config/conexionBD.php';

$correoD="SELECT * from usuario WHERE usu_codigo='".$consulta['1']."' ";
$resultado=$conn->query($correoD);
$row=$resultado->fetch_assoc();

$correoDestino=$row['usu_correo'];
$conn->close();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../config/styles/nuevoMensaje.css">
    <link rel="stylesheet" href="../../../config/styles/menuH.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="menu">
            <ul>
                <li><a href="../usuario/mensajesRecibidos.php">REGRESAR</a></li>
            </ul>
        </div>

    </header>


    <form method="POST" action="../../controladores/usuario/enviarMensaje.php">

        <div>
            <label for="Asunto">Asunto:</label>
            <input name="asunto" type="text" id="asunto" value="<?php echo($consulta[0]) ?>" />
        </div>
        <div>
            <label for="Remitente">Remitente:</label>
            <input name="destino" type="email" id="destino" value="<?php echo($correoDestino) ?>" />
        </div>
        <div>
            <label for="msg">Mensaje:</label>
            <textarea name="msg" class="mensaje" id="msg" ><?php echo($consulta[2]) ?></textarea>
        </div>

    </form>

</body>

</html>