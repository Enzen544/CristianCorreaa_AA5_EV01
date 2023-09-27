<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>hola mundo</h1>

    <!-- Botón de cerrar sesión -->
    <form action="" method="post">
        <input type="submit" name="logout" value="Cerrar sesión">
    </form>

    <?php
        // Si se hace clic en el botón de cerrar sesión
        if (isset($_POST['logout'])) {
            // Destruir la sesión
            session_destroy();
            // Redirigir al usuario a la página de inicio de sesión
            header('Location: index.php');
        }

       
    ?>
</body>
</html>
