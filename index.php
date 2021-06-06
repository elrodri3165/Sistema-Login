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
        <?php
           if (isset($_GET['error'])){?>
        <p class="error">¡¡¡Por favor ingrese con usuario y contraseña..!!!</p>
        <?php }
           
           if (isset($_GET['mal'])){?>
        <p class="error">Por favor ingrese usuario y contraseña CORRECTO</p>
        <?php }
           ?>
        <form class="row g-3 needs-validation" novalidate action="functions/validar.php" method="post" onsubmit="return validarlogin()">
           
            <div class="input-group mb-5 input-group-lg">
                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                <input name="user" type="text" class="form-control" id="user" placeholder="Usuario" aria-label="Apellido" aria-describedby="addon-wrapping" required>
                <div class="invalid-feedback">
                    Por favor ingrese el usuario registrado
                </div>
                <div class="valid-feedback">
                    Correcto!
                </div>
            </div>

            <div class="input-group mb-5 input-group-lg">
                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
                <input id="password" name="password" type="password" class="form-control" id="user" placeholder="Clave" aria-label="Apellido" aria-describedby="addon-wrapping" required>
                <div class="invalid-feedback">
                    Por favor ingrese la clave
                </div>
                <div class="valid-feedback">
                    Correcto!
                </div>
            </div>
            
           <div class="container-boton">
            <input type="submit" value="Ingresar" class="boton-login">
            <a class="boton-login" href="registrar.php">Registrarse</a>
            </div>
            
        </form>
        <script src="js/validacion.js"></script>
    
    </div>
    <script src="js/form-control.js" type="text/javascript"></script>
</body>
</html>