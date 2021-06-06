<?php
session_start();
session_destroy();
header ('Location: ../index.php');
echo'Sesion cerrada correctamente'.'<br/>';
?>
<a href="../index.php">Volver a inicio</a>