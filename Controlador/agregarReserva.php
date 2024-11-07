<?php
require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Datos del formulario
$data = [
    'nombre' => $_POST['nombre'],
    'cedula' => $_POST['cedula'],
    'email' => $_POST['correo'],
    'celular' => $_POST['celular'],
    'monto' => $_POST['monto'],
    'cancha_id' => $_POST['cancha_id'],
    'fechahora_reserva' => $_POST['selectedHour']
];

// Enviar datos a la API de reservas
$api_url = 'http://localhost/canchasintetica/api/reservas/addReserva.php';
$options = [
    'http' => [
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($api_url, false, $context);

// Si la reserva se realizó correctamente, redirigir al formulario de PayU
if ($response !== FALSE) {
    // Variables para PayU
    $payu_data = [
        'merchantId' => $_ENV['PAYU_MERCHANT_ID'],
        'accountId' => $_ENV['PAYU_ACCOUNT_ID'],
        'description' => 'Reserva de cancha',
        'referenceCode' => uniqid(),
        'amount' => $data['monto'],
        'currency' => 'COP',
        'buyerEmail' => $data['email'],
        'responseUrl' => 'https://30be-167-0-212-32.ngrok-free.app/canchasintetica/Controlador/payuCallback.php',
        'confirmationUrl' => 'https://30be-167-0-212-32.ngrok-free.app/canchasintetica/Controlador/payuCallback.php',
        'signature' => hash('md5', $_ENV['PAYU_API_KEY'] . "~" . $_ENV['PAYU_MERCHANT_ID'] . "~" . uniqid() . "~" . $data['monto'] . "~COP")
    ];

    // Redirigir al formulario de PayU
    $payu_url = $_ENV['PAYU_SANDBOX_URL']; // Cambia a $_ENV['PAYU_PRODUCTION_URL'] en producción
    echo '<form id="payuForm" action="' . $payu_url . '" method="POST">';
    foreach ($payu_data as $key => $value) {
        echo "<input type='hidden' name='$key' value='$value'>";
    }
    echo '</form>';
    echo '<script>document.getElementById("payuForm").submit();</script>';
} else {
    echo 'Error al realizar la reserva. Inténtalo de nuevo.';
}
?>
