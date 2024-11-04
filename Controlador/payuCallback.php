<?php
// Recibir datos de PayU
$estado_pago = $_POST['transactionState'];
$transaction_id = $_POST['transactionId'];
$reserva_id = $_POST['referenceCode'];  // ID de referencia de reserva (puede venir de PayU)

// Validar la respuesta y actualizar el estado de la reserva
if ($estado_pago == 4) {  // 4 suele indicar pago exitoso en PayU
    $estado = 'Completado';
} else {
    $estado = 'Fallido';
}

// Enviar datos a la API de actualización
$update_data = [
    'reserva_id' => $reserva_id,
    'estado' => $estado,
    'transaction_id' => $transaction_id
];

$update_api_url = 'http://localhost/canchasintetica/api/reservas/updateReserva.php';
$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($update_data)
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($update_api_url, false, $context);

// Confirmar actualización
if ($response !== FALSE) {
    echo 'Reserva actualizada exitosamente';
} else {
    echo 'Error al actualizar la reserva';
}
?>
