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
    <link rel="stylesheet" href="../../../config/styles/nuevoMail.css">
    <link rel="stylesheet" href="../../../config/styles/menuH.css">
    <title>Contacto</title>

</head>

<body>

    <header>
        <div class="menu">
            <ul>
                <li><a href="mailRecibido.php">VOLVER</a></li>
            </ul>
        </div>
    </header>


    <!-- <div class="volver">
        <a href="Index.html">Volver</a>
    </div> -->

    <form method="POST" action="../../controladores/usuario/enviarMail.php">

        <input type="hidden" name="codigoRemitente" value="<?php echo ($_SESSION['codigo']) ?>">


        <div>
            <label for="Asunto">Asunto:</label>
            <input name="asunto" type="text" id="asunto" />
        </div>
        <div>
            <label for="Remitente">Remitente:</label>
            <input name="destino" type="email" id="destino" />
        </div>
        <div>
            <label for="msg">Mensaje:</label>
            <textarea name="msg" class="mensaje" id="msg"></textarea>
        </div>

        <div class="button">
            <button type="submit">Enviar Mensaje</button>
        </div>
    </form>

</body>

</html>