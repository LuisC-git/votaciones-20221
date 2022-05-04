<?php
$email = $_POST['email'];
$pass  = $_POST['pass'];


include '../resources/class/class.connection.php';
include '../models/model.usuario.php';

try {
    session_start();
    $db->debug();

    $sql = "SELECT * FROM usuario WHERE CorreoUsu=? and ContrasenaUsu=?";
    
    $usuario->get($sql,array($email,$pass));
   
    if ($usuario->data->CorreoUsu==$email) {

        $_SESSION['usuario'] = $usuario->data;

     


        switch ($usuario->data->IdTipUsu) {
          
            case 1:
                header("location:../?page=visitante");
                break;
            case 2:
                header("location:../?page=secretario");
                break;
            case 3:
                header("location:../?page=operador");
                break;
            case 4:
                header("location:../?page=administrador");
                break;
        }
    } else {
        $_SESSION['error'] = true;
        header('location:../?page=login');
    }

} catch (Exception $e) {

}
