<?php
class User {
    private $db;
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "123456";
    private $dbName     = "loginn";
    private $userTbl    = "usuarios";

    function __construct(){
        if(!isset($this->db)){
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Error al conectar a MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

    function register($username, $password, $email, $phone){
        // Preparar la consulta
        $stmt = $this->db->prepare("INSERT INTO ".$this->userTbl." (username, password, email, phone) VALUES (?, ?, ?, ?)");
        // Vincular los parámetros
        $stmt->bind_param("ssss", $username, $password, $email, $phone);
        // Ejecutar la consulta
        return $stmt->execute();
    }
    
    
    function login($username, $password){
        // Preparar la consulta
        $stmt = $this->db->prepare("SELECT * FROM ".$this->userTbl." WHERE username = ? AND password = ?");
        // Vincular los parámetros
        $stmt->bind_param("ss", $username, $password);
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Obtener los resultados
            return $stmt->get_result()->fetch_assoc();
        } else {
            return false;
        }
    }
    
    
}
?>
