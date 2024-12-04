<?php
require_once '../../db.php';
require_once '../../Modelo/Reservas.php';

// Decodificar el JSON y convertirlo en un array asociativo
$data = json_decode(file_get_contents('php://input'), true);

$reserva = new Reservas($pdo);

header('Content-Type: application/json');
// Validar que todos los datos requeridos estén presentes
if (isset($data['nombre'], $data['correo'],  $data['monto'])) {
    // Llamar al método para crear la reserva
    $message = $reserva->crearReservaPayU($data['nombre'], $data['correo'], $data['monto']);
    
    // Enviar una respuesta de éxito
    echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
    // Enviar un mensaje de error si faltan datos
    echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos requeridos']);
}
