<?php
require_once '../../db.php';
require_once '../../Modelo/Reservas.php';

$data = json_decode(file_get_contents('php://input'), true);
$reserva = new Reservas($pdo);

header('Content-Type: application/json');
if ($data['reserva_id'] && $data['estado'] && $data['transaccion_id']) {
    $message = $reserva->actualizarReserva($data['reserva_id'], $data['estado'], $data['transaccion_id']);
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}