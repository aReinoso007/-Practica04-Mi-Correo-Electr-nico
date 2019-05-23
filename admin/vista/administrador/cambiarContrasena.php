<?php
$codigo=$_GET['usu_codigo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../config/styles/contrasena.css">
    <title>Cambiar Contrasena</title>
</head>
<body>
<div class="contenedor">

    <header>
        <div class="menu">
            <ul>
                <li><a href="index.php">CANCELAR</a></li>
            </ul>
        </div>

    </header>

    <form id="formulario04" method="POST"
        action="cambiarContrasenaBD.php?usu_codigo=<?php $cod=$_GET['usu_codigo']; echo($cod); ?>">
        <label class="contrasenia" for="ContraseñaAnt">Antigua Contraseña </label>
        <input type="password" id="antcontrasena" name="antcontrasena" value=""
        placeholder="Ingrese ultima contrasena ..." />
        <br><br>
        <label class="contrasenia"  for="NuContraseña">Nueva Contraseña</label>
        <input type="password" id="Nucontrasena" name="Nucontrasena" value=""
        placeholder="Ingrese nueva contraseña ..." />
        <br><br>
        <label class="contrasenia" for="NuCContraseña">Confirmar Contraseña</label>
        <input type="password" id="NuCcontrasena" name="NuCcontrasena" value=""
        placeholder="Confirme su contraseña ..." />
        <br><br>
        <input type="submit" id="cambiar" name="cambiar" value="Aceptar" />

    </form>
</div>
<div class="footer">
    <footer >
        <p id="footer">Universidad Politecnica Salesiana</p>
        <p id="footer">Alex Jessiel Reinoso Gonzalez</p>
        <p id="footer">Estudiante</p>
        <p id="footer">Telefono: <a href="tel:+593998952718">0998952718</a></p>
        <p id="footer">E-mail: <a href="mailto:areinosog@est.ups.edu.ec">areinosog@est.ups.edu.ec</a></p>
        Todos los derechos reservados &copy; 
    </footer>
</div>
</body>
</html>