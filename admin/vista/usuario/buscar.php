<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    include "../../../config/conexionBD.php";
    $cedula = $_GET['cedula'];
    echo "<p>".$cedula."</p>";
    ?>
</body>
</html>