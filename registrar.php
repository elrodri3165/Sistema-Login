<?php
require 'functions/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
    require'templates/head.php';
?>
<body>
    <div id="contenedor">
       <p><?php
           if (isset($_GET['error'])){
               echo 'Por favor ingrese con usuario y contraseña';
           }
           ?></p>
           <p><?php
           if (isset($_GET['mal'])){
               echo 'Por favor ingrese usuario y contraseña CORRECTO';
           }
           ?></p>
        <form action="functions/registrar.php" method="post" onsubmit="return validarLogin();">
		    <ul>
		        <li><input type="text" maxlength="10" id="user" name="user" class="input" placeholder="Usuario" required></li>
		        <li><input type="text" maxlength="50" id="apellido" name="apellido" class="input" placeholder="Apellido" required></li>
		        <li><input type="text" maxlength="50" id="nombre" name="nombre" class="input" placeholder="Nombre" required></li>
		        <li><input type="email"maxlength="50" id="email"  name="email" class="input" placeholder="E-Mail"required ></li>
		        <li><input type="password" maxlength="10" id="password" name="password" class="input" placeholder="Clave" required></li>
		        <li><input type="submit" class="boton"></li>
		    </ul>
		</form>
    <script src="js/validacion.js"></script>
    </div>
</body>
</html>