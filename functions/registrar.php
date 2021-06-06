<?php
require 'config.php';

if (isset ($_POST['apellido'],$_POST['nombre'],$_POST['email'],$_POST['user'], $_POST['password'])){
    
    $apellido = trim($_POST['apellido']);
    
    $nombre = trim($_POST['nombre']);
    
    $email = trim($_POST['email']);
    
    $user = trim($_POST['user']);
    
    $password = trim($_POST['password']);
    
    
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    $email($email, FILTER_VALIDATE_EMAIL);
    
    
    
    
    
    $newuser = New UserDB($apellido, $nombre, $email, $user, $password);
    
    var_dump($newuser);
    
    //$resultado = $newuser ->Registarusuario();
    
    if ($resultado == true){
        header('Location:../login.php?usuariook');
    }else{
        header('Location:../login.php?error');
    }
}else{
        header('Location:../login.php?error');
    }