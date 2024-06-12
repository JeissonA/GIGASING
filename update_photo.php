<?php
session_start();
include 'modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto"])) {
    $email = $_SESSION['email'];

    if ($_FILES["foto"]["error"] != 0) {
        die("Error al subir la foto.");
    }

    $target_dir = "fotos_usuarios/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $sql = "UPDATE usuarios SET foto = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $target_file, $email);

        if ($stmt->execute()) {
            $_SESSION['foto'] = $target_file;
            echo "<script>alert('Foto actualizada correctamente.'); window.location.href = 'index.php';</script>";
        } else {
            echo "Error al actualizar la foto en la base de datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Hubo un error al subir la foto.";
    }

    $conn->close();
} else {
    echo "No se ha subido ninguna foto.";
}
?>
