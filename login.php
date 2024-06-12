<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'modelo/conexion.php';

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id, primer_nombre, primer_apellido, email, foto FROM usuarios WHERE email = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['primer_nombre'] = $row['primer_nombre'];
        $_SESSION['primer_apellido'] = $row['primer_apellido'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['foto'] = $row['foto'];

        header("Location: index.php");
        exit();
    } else {
        $error_message = "El correo electrónico o la contraseña son incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <!-- <link rel="stylesheet" href="css/all.min.css"> -->
   <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
   <link rel="shortcut icon" href="icon/GIGASING.png" type="image/x-icon">
   <title>Inicio de sesión</title>
</head>

<body>
   <img class="wave" src="img/COMANSA_5LC5010.jpg" width="700px">
   <div class="container">
      <div class="img">
         <img src="">
      </div>
      <div class="login-content">
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <img src="img/avatar.svg">
            <h2 class="title">BIENVENIDO</h2>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Usuario</h5>
                  <input id="usuario" type="text" class="input" name="email">
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

            <div class="text-center">
               <a class="font-italic isai5" href="#">Olvidé mi contraseña</a>
               <a class="font-italic isai5" href="/register.php">Registrarse</a>
            </div>
            <input name="btningresar" class="btn" type="submit" value="INICIAR SESION">
            <?php if(isset($error_message)) { ?>
               <div class="error-message"><?php echo $error_message; ?></div>
            <?php } ?>
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
