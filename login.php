<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: inicio.php");
    }
    if(isset($get['cerrar_sesion'])){
        session_unset();

        session_destroy();
    
    }
    
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="Verificacion/login.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <div class="input-container">
                            <input type="password" placeholder="Contraseña" name="contraseña" id="passwordLogin" required>
                            <i class="fas fa-eye" id="togglePasswordLogin"></i>
                        </div>
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="Verificacion/registro.php" method="POST" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombres" name="nombre" require>
                        <input type="text" placeholder="Apellidos" name="apellido" require>
                        <input type="text" placeholder="Correo Electronico" name="correo_electronico" require>
                        <input type="text" placeholder="Celular" name="celular" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="8" class="celular-input" require>
                        <div class="input-container">
                            <input type="password" placeholder="Contraseña" name="contraseña" id="passwordRegister" required>
                            <i class="fas fa-eye" id="togglePasswordRegister"></i>
                        </div>

                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="js/script.js"></script>
        
</body>
</html>