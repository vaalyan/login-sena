<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>

    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <?php 
            if (isset($_GET['error'])) {
            ?>
            <p class="error"> 
                <?php 
                echo $_GET['error']
                ?>
            </p>
        <?php
            }
        ?>
        <form action="IniciarSesion.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <button class="button1">Acceder</button>
            <button class="button2">Registrarse</button>
        </form>
    </div>
</body>
</html>