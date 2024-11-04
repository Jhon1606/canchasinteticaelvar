<?php
// Datos del formulario
$data = [
    'nombre' => $_POST['nombre'],
    'cedula' => $_POST['cedula'],
    'email' => $_POST['email'],
    'celular' => $_POST['celular'],
    'monto' => $_POST['monto'],
    'cancha' => $_POST['cancha'],
    'hora_reserva' => $_POST['hora_reserva']
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
    // Variables necesarias para PayU (ajustar según su documentación)
    $payu_data = [
        'merchantId' => 'TU_MERCHANT_ID',
        'accountId' => 'TU_ACCOUNT_ID',
        'description' => 'Reserva de cancha',
        'referenceCode' => uniqid(),
        'amount' => $data['monto'],
        'currency' => 'COP',
        'buyerEmail' => $data['email'],
        'responseUrl' => 'http://localhost/canchasintetica/Controlador/payuCallback.php',  // Callback URL
        'confirmationUrl' => 'http://localhost/canchasintetica/Controlador/payuCallback.php' // Confirmación de pago
    ];

    // Redirigir al formulario de PayU
    echo '<form id="payuForm" action="https://sandbox.gateway.payulatam.com/ppp-web-gateway/" method="POST">';
    foreach ($payu_data as $key => $value) {
        echo "<input type='hidden' name='$key' value='$value'>";
    }
    echo '</form>';
    echo '<script>document.getElementById("payuForm").submit();</script>';
} else {
    echo 'Error al realizar la reserva. Inténtalo de nuevo.';
}
?>
