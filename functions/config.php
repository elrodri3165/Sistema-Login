<?php
$secure = "secure12345";
$version = "1.0"; 

//datos de configuracion de proyecto
date_default_timezone_set('America/Argentina/Buenos_Aires');
setlocale(LC_TIME, 'es_ES.UTF8');

//agregar los require que vayan en todos lados
require 'constantes.php';
require 'clases/Conexion_poo.php';
require 'clases/ClienteDB.php';
require 'clases/UserDB.php';
require 'clases/CheckuserDB.php';
require 'clases/TablasDB.php';

session_start();
//objeto conexion a base de datos.
$conexion_poo = new ClienteDB();

if (isset ($_SESSION['user'])){
   $check_user =  new CheckuserDB();
}