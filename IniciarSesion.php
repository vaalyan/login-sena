<?php
session_start();
include('Conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: Index.php?error=El Usuario Es Requerido");
        exit();
    } elseif (empty($Clave)) {
        header("Location: Index.php?error=La Clave Es Requerida");
        exit();
    } else {
        // Preparar la consulta SQL (también se recomienda usar consultas preparadas para prevenir inyección SQL)
        $Sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario'";
        $result = mysqli_query($conexion, $Sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // Verificar la contraseña con password_verify()
            if (password_verify($Clave, $row['Clave'])) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: Index.php?error=El usuario o la clave son incorrectas");
                exit();
            }
        } else {
            header("Location: Index.php?error=El usuario o la clave son incorrectas");
            exit();
        }
    }
} else {
    header("Location: Index.php");
    exit();
}
