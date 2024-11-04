<?php
require_once '../../db.php';
require_once '../../Modelo/Reservas.php';

$data = json_decode(file_get_contents('php://input'));
$reserva = new Reservas($pdo);

if ($data && isset($data->id_reserva) && isset($data->estado_pago) && isset($data->transaccion_id)) {
    $message = $reserva->actualizarReserva($data->id_reserva, $data->estado_pago, $data->transaccion_id);
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}
