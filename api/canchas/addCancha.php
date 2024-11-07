<?php
require_once '../../db.php';
require_once '../../Modelo/Canchas.php';

$data = json_decode(file_get_contents('php://input'), true);
$cancha = new Canchas($pdo);

if ($data['nombre']) {
    $message = $cancha->crearCancha($data['nombre']);
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}
 
