<?php
require 'config.php';

if (isset($_POST['user'], $_POST['password'])){

    $user=$_POST['user'];
    $password=$_POST['password'];
    
    $user = $conexion_poo->Subsanastring($user);
    $password = $conexion_poo->Subsanastring($password);

    $new_user = New Userdb(null, null, null, $user, $password);

    $resultado = $new_user-> Buscarusuario();

    if ($resultado == true){
        $_SESSION['user'] = $new_user;
          header ('location:../login.php');
        }else{
          header ('location:../index.php?mal');
        }
    }     