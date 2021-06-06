<?php
require 'functions/config.php';
if (isset($_SESSION['user'])){
$usuario =  $_SESSION['user']->DevolverUserDB();?>
<!DOCTYPE html>
<html lang="es">
<?php
    require'templates/head.php';
?>
<body>
<p>Este es el login</p>
<a href="functions/cerrarsesion.php">Cerrar Sesion</a>

</body>
</html>
<?php }
else {
    header ('location:index.php');
}
?>