<?php
// respuesta.php
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit;


require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['PAYU_API_KEY'];
$merchantId = $_POST['merchantId'];
$referenceCode = $_POST['referenceCode'];
$transactionId = $_POST['transactionId'];
$statePol = $_POST['state_pol']; // Estado de la transacción
$amount = $_POST['TX_VALUE'];
$currency = $_POST['currency'];
$sign = $_POST['signature'];

if (!$merchantId || !$referenceCode || !$transactionId || !$statePol || !$amount || !$currency || !$sign) {
    echo "<h3>Datos incompletos en la respuesta</h3>";
    exit;
}

// Verificar la firma de la respuesta
$generatedSign = md5("$apiKey~$merchantId~$referenceCode~$amount~$currency~$statePol");

if ($sign !== $generatedSign) {
    echo "<h3>Firma no válida</h3>";
    exit;
}

if ($statePol == 4) {
    echo "<h3>Transacción aprobada</h3>";
    echo "<p>Referencia: $referenceCode</p>";
    echo "<p>ID de transacción: $transactionId</p>";
    echo "<p>Monto: $amount $currency</p>";
} else {
    echo "<h3>Transacción no aprobada</h3>";
    echo "<p>Estado: $statePol</p>";
    echo "<p>Referencia: $referenceCode</p>";
}
?>
