<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style type="text/css" rel="stylesheet">
    .error{
        color:red;
    }
</style>
</head>
<body>

<?php
    include '../config/conexionDB.php';
    $cedula=isset($_POST["cedula"])? mb_strtoupper($_POST["nombres"])