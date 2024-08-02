<?php
require_once(__DIR__.'/../Model/UserModel.php');

class UsersControllerReg{
    public function Registro(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Nick = $_POST['Nick'];
            $last = $_POST['Last'];
            $email = $_POST['Email'];
            $pass = $_POST['Pass'];

            $user = new UserModelReg();
            $registro =  $user->SignUpUser($Nick, $last, $email, $pass);

            if($registro){
                echo '<script>alert("REGISTRO EXITOSO");
                    window.location.href = "View/forms.php";
                </script>';
                exit;
            }
            else{
                echo 'ERROR AL REGISTRAR';
            }
        }
    }
}
class LogInController {
  public function LogIn() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $email = $_POST['Email'];
          $password = $_POST['Passwords'];
          
          $userModel = new UserModelReg();
          $user = $userModel->login($email, $password);
          
          if ($user) {
                echo '<script>alert("INGRESO EXITOSO");
                    window.location.href = "View/control.php";
                </script>';
          } else {
                echo '<script>alert("INGRESO FALLIDO");
                    window.location.href = "View/forms.php";
                </script>';
          }
      }
  }
}
?>