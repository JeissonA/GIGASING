<?php
session_start();
include 'modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primer_nombre = $conn->real_escape_string($_POST['primer_nombre']);
    $primer_apellido = $conn->real_escape_string($_POST['primer_apellido']);
    $email = $conn->real_escape_string($_POST['email']);
    $contrasena = $conn->real_escape_string($_POST['contrasena']);


    $sql_check = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "El correo electrónico ya está registrado.";
        $stmt_check->close();
        $conn->close();
        exit();
    }

    $stmt_check->close();

    $sql = "INSERT INTO usuarios (primer_nombre, primer_apellido, email, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssss", $primer_nombre, $primer_apellido, $email, $contrasena);

    if ($stmt->execute()) {
        $_SESSION['primer_nombre'] = $primer_nombre;
        $_SESSION['primer_apellido'] = $primer_apellido;
        $_SESSION['email'] = $email;
        $_SESSION['foto'] = 'fotos_usuarios/default.jpg';

        header("Location: index.php");
        exit();
    } else {
        echo "Hubo un error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
