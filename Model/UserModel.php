<?php
require_once(__DIR__.'/../DataBase/DB.php');

class UserModelReg{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function SignUpUser($Nick, $last, $email, $pass){
        $conn =  $this->db->getConnection();

        if (!$conn){
            die("Error de conexión a la base de datos: ");
        }

        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (NickName, LastName, Email, Passwords) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
          die("Error al preparar la consulta: " . $conn->error);
      }
        $stmt->bind_param("ssss", $Nick, $last, $email, $hashed_pass);


        $result = $stmt->execute();
        if ($result === false) {
          die("Error al ejecutar la consulta: " . $stmt->error);
      }
        $stmt->close();
        $conn->close();
        return $result;
    }

    public function login($email, $password) {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM users WHERE email = ? AND Passwords = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Usuario encontrado
      } else {
        return null; // Usuario no encontrado
      }
    } 
}
?>


