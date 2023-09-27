<?php
require_once '../model/User.php';

class UserController {
    private $model;

    public function __construct(){
        $this->model = new User();
    }

    public function register(){
        if(isset($_POST['register'])){
            // Validar los datos del formulario aquí
            // ...

            $register = $this->model->register($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone']);
            if ($register) {
                // El registro fue exitoso
                return true;
            } else {
                // Hubo un error en el registro
                return false;
            }
        }
    }

    public function login(){
        if(isset($_POST['login'])){
            // Validar los datos del formulario aquí
            // ...

            $user = $this->model->login($_POST['username'], $_POST['password']);
          
            if($user){
                // Iniciar la sesión y establecer la variable de sesión del usuario
                session_start();
                $_SESSION['username'] = $user['username'];
                return true;
            }else{
                // Hubo un error en el inicio de sesión
                return false;
            }
        }
    }
}
?>

