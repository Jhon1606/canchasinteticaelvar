<?php
require_once '../../db.php';
require_once '../../Modelo/Reservas.php';

$reserva = new Reservas($pdo);

header('Content-Type: application/json');
if ($reserva->listarReservas()) {
    echo json_encode(['status' => 'OK', 'data' => $reserva->listarReservas()]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'No se pudieron cargar las reservas']);
}