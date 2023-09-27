<!DOCTYPE html>
<html>
<head>
  <title>Registrarse</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

<?php
 require_once '../controller/UserController.php';

  $controller = new UserController(); 
?>

<div class="container">
    <H1>REGISTRESE</H1>
  <form method="post" action="register.php">
    <input type="text" name="username" placeholder="Nombre de usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="text" name="phone" placeholder="Teléfono" required>
    <input type="submit" name="register" value="Registrar">
  </form>
  <a href="index.php">Login</a> 
</div>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
      if ($controller->register()) {
          echo "<script>alert('Usuario registrado dirigase al login');</script>";
      } else {
          echo "<script>alert('Error en el registro');</script>";
      }
    
  }
?>

</body>
</html>
