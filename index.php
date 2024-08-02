<?php
require_once(__DIR__.'/Controller/UserController.php');

// Redirigir si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_email'])) {
    header('Location: View/control.php');
    exit;
}

// Procesar las solicitudes POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['accion']) && $_POST['accion'] === 'Register'){
        $userscontroller = new UsersControllerReg();
        $userscontroller->Registro();
    } elseif(isset($_POST['accionLogIn']) && $_POST['accionLogIn'] === 'Iniciar_Sesion'){
        $logincontroller = new LogInController();
        $logincontroller->LogIn();
    }
}
?>
