<?php
require_once '../../db.php'; // Asegúrate de que la ruta sea correcta
require_once '../../Modelo/Usuarios.php';

// Obtiene los datos JSON enviados
$data = json_decode(file_get_contents('php://input'), true);
$usuarios = new Usuarios($pdo);

header('Content-Type: application/json');
if (isset($data['email']) && isset($data['password'])) {
    $result = $usuarios->validarUsuario($data['email'], $data['password']);
    
    if ($result) {
        echo json_encode(['status' => 'OK', 'message' => 'Usuario validado']);
    } else {
        echo json_encode(['status' => 'ERROR', 'message' => 'Credenciales incorrectas']);
    }
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}
?>
