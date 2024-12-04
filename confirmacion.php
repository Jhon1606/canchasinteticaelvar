<?php
// Recoger los datos enviados por PayU a través de POST
$estado = $_POST['transactionState']; // Estado de la transacción
$referencia = $_POST['reference_sale']; // Código de referencia
$monto = $_POST['value']; // Monto pagado
$moneda = $_POST['currency']; // Moneda
$firmaRecibida = $_POST['signature']; // Firma recibida
$descripcion = $_POST['description'];
$correo = $_POST['buyerEmail'];

// Recoger los campos personalizados enviados en el formulario
$nombre = $_POST['extra1'];
$cedula = $_POST['extra2'];
$celular = $_POST['extra3'];
$cancha_id = $_POST['extra4'];
$fechahora_reserva = $_POST['extra5'];

// Configuración para validar la firma
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$apiKey = $_ENV['PAYU_API_KEY'];
$merchantId = $_ENV['PAYU_MERCHANT_ID'];
$firmaGenerada = md5($apiKey . '~' . $merchantId . '~' . $referencia . '~' . $monto . '~' . $moneda);

// Verificar la firma para evitar fraudes
if ($firmaRecibida === $firmaGenerada) {
    // Preparar los datos para enviarlos a la API
    $data = [
        'transaccion_id' => $referencia,
        'estado' => $estado,
        'monto' => $monto,
        'correo' => $correo,
        'descripcion' => $descripcion,
        'nombre' => $nombre,
        'cedula' => $cedula,
        'celular' => $celular,
        'cancha_id' => $cancha_id,
        'fechahora_reserva' => $fechahora_reserva
    ];

    // Enviar los datos a la API para guardar la reserva
    $url = 'http://localhost/canchasintetica/api/reservas/addReserva.php';
    $options = [
        'http' => [
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        error_log('Error al guardar la reserva en la API.');
    }
} else {
    error_log('Error en la validación de la firma.');
}
?>
