<?php
require_once '../controller/UserController.php';
$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginSuccessful = $controller->login();
    if ($loginSuccessful) {
        header('Location: inicio.php');
        exit();
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="styles.css"> 
</head>

<body>

<div class="container">
    <h1>LOGIN</h1>
  <form method="post" action="">
    <input type="text" name="username" placeholder="Nombre de usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="submit" name="login" value="Iniciar sesión">
  </form>
  <a href="register.php">Registrese</a> 
</div>

</body>
</html> 
