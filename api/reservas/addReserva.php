<?php
require_once '../../db.php';
require_once '../../Modelo/Reservas.php';

$data = json_decode(file_get_contents('php://input'));
$reserva = new Reservas($pdo);

if ($data) {
    $message = $reserva->crearReserva($data->nombre, $data->cedula, $data->correo, $data->celular, $data->monto, $data->cancha_id, $data->fechahora_reserva, $data->estado);
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}
 
