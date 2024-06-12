<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="icon/GIGASING.png" type="image/x-icon">
    <title>Registrarse</title>
</head>

<body>
    <img class="wave" src="img/COMANSA_5LC5010.jpg" width="700px">
    <div class="container">
        <div class="img">
            <img src="">
        </div>
        <div class="login-content">
            <form action="register_process.php" method="POST" enctype="multipart/form-data">
                <img src="img/avatar.svg">
                <h2 class="title">BIENVENIDO</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Primer nombre</h5>
                        <input id="usuario" type="text" class="input" name="primer_nombre">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Primer apellido</h5>
                        <input id="usuario" type="text" class="input" name="primer_apellido">
                    </div>
                </div>
                <div class="input-div three">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="usuario" type="email" class="input" name="email">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" id="input" class="input" name="contrasena">
                    </div>
                </div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>
               
                <input name="btnregistrar" class="btn" type="submit" value="Registrarse">
                <div class="text-center">
                    <a class="font-italic isai5" href="/login.php">¿Ya tienes unas cuenta? ingresa aquí</a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/fontawesome.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
