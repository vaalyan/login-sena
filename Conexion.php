<?php

$host = "localhost";
$user = "root";
$pass = "";
$bd = "login-sena";

$conexion = mysqli_connect($host, $user, $pass, $bd);

if (!$conexion) {
    echo "Conexion fallida";
}
