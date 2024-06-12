<?php
include 'modelo/conexion.php';

$input = json_decode(file_get_contents('php://input'), true);
$userId = $input['userId'];

$query = "SELECT * FROM mensajes WHERE user_id = '$userId' ORDER BY fecha ASC";
$result = mysqli_query($conexion, $query);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'text' => $row['mensaje'],
        'sent' => $row['sent']
    ];
}

echo json_encode(['messages' => $messages]);
?>
