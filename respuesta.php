<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuración de tu cuenta PayU
$ApiKey = $_ENV['PAYU_API_KEY']; // API Key desde .env

// Datos enviados por PayU
$merchant_id = $_REQUEST['merchantId'] ?? '';
$referenceCode = $_REQUEST['referenceCode'] ?? '';
$TX_VALUE = $_REQUEST['TX_VALUE'] ?? 0;
$currency = $_REQUEST['currency'] ?? '';
$transactionState = $_REQUEST['transactionState'] ?? '';
$firma = $_REQUEST['signature'] ?? '';
$transactionId = $_REQUEST['transactionId'] ?? '';

// Campos personalizados enviados a través de PayU
$nombre = $_REQUEST['extra1'] ?? '';
$cedula = $_REQUEST['extra2'] ?? '';
$celular = $_REQUEST['extra3'] ?? '';
$cancha_id = $_REQUEST['extra4'] ?? '';
$fechahora_reserva = $_REQUEST['extra5'] ?? '';

var_dump($_REQUEST['extra4'], $_REQUEST['extra5']);


// Verificar la firma para validar la transacción
$New_value = number_format($TX_VALUE, 1, '.', '');
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);

// Determinar el estado de la transacción
$estadoTx = '';
switch ($transactionState) {
    case '4':
        $estadoTx = "Transacción aprobada";
        break;
    case '6':
        $estadoTx = "Transacción rechazada";
        break;
    case '104':
        $estadoTx = "Error";
        break;
    case '7':
        $estadoTx = "Pago pendiente";
        break;
    default:
        $estadoTx = $_REQUEST['mensaje'] ?? 'Estado desconocido';
        break;
}

// Validar la firma y procesar la transacción
if (strtoupper($firma) === strtoupper($firmacreada)) {
    // Si la transacción fue aprobada, enviar datos a la API para guardar en la BD
    if ($transactionState == '4') {
        $data = [
            'transaccion_id' => $transactionId,
            'estado' => $estadoTx,
            'monto' => $TX_VALUE,
            'correo' => $_REQUEST['buyerEmail'] ?? '',
            'descripcion' => $_REQUEST['description'] ?? 'Reserva de cancha',
            'nombre' => $nombre,
            'cedula' => $cedula,
            'celular' => $celular,
            'cancha_id' => $cancha_id,
            'fechahora_reserva' => $fechahora_reserva
        ];

        // Enviar datos a la API de reserva
        $url = 'http://localhost/canchasintetica/api/reservas/addReserva.php';
        $options = [
            'http' => [
                'header' => "Content-Type: application/json",
                'method' => 'POST',
                'content' => json_encode($data),
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $apiResponse = json_decode($response, true);
    }

    // Mostrar resumen de la transacción
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Respuesta de Transacción</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
        <header class="bg-blue-600 p-4 text-white text-center">
            <h1 class="text-xl font-bold">Resumen de la Transacción</h1>
        </header>
        <main class="p-8">
            <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4"><?php echo $estadoTx; ?></h2>
                <table class="table-auto w-full text-left border">
                    <tr>
                        <th class="border px-4 py-2">ID de Transacción</th>
                        <td class="border px-4 py-2"><?php echo htmlspecialchars($transactionId); ?></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">Referencia</th>
                        <td class="border px-4 py-2"><?php echo htmlspecialchars($referenceCode); ?></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">Valor Total</th>
                        <td class="border px-4 py-2">$<?php echo number_format($TX_VALUE, 2); ?></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">Nombre</th>
                        <td class="border px-4 py-2"><?php echo htmlspecialchars($nombre); ?></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2">Correo</th>
                        <td class="border px-4 py-2"><?php echo htmlspecialchars($_REQUEST['buyerEmail'] ?? ''); ?></td>
                    </tr>
                </table>
                <div class="mt-6 text-center">
                    <a href="index.php" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Regresar</a>
                </div>
            </div>
        </main>
        <footer class="bg-blue-600 text-white text-center p-4">
            <p>&copy; 2024 Canchas Sintética</p>
        </footer>
    </body>
    </html>
    <?php
} else {
    echo "<h1>Error: Firma digital inválida.</h1>";
}
?>
