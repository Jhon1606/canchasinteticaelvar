<?php
require_once '../../db.php';
require_once '../../Modelo/Usuarios.php';

$data = json_decode(file_get_contents('php://input'), true);
$usuario = new Usuarios($pdo);

if ($data['nombre'] && $data['email'] && $data['password']) {
    $message = $usuario->crear($data['nombre'], $data['email'], $data['password']);
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}
 
