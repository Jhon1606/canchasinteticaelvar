<?php
require '../vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Configuración de tu cuenta PayU
$apiKey = $_ENV['PAYU_API_KEY'];
$merchantId = $_ENV['PAYU_MERCHANT_ID'];
$accountId = $_ENV['PAYU_ACCOUNT_ID'];
$currency = 'COP'; // Moneda

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$monto = $_POST['monto'];
$cancha_id = $_POST['cancha_id'];
$fechahora_reserva = $_POST['selectedDateTime'];
$referenceCode = 'reserva_' . uniqid(); // Generar referencia única

// Generar la firma requerida por PayU
$signature = md5($apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . $monto . '~' . $currency);

// Redirigir al formulario de PayU
$payuFormUrl = 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/';

echo "<form action='$payuFormUrl' method='POST' id='payuForm'>
        <input name='merchantId' type='hidden' value='$merchantId'>
        <input name='accountId' type='hidden' value='$accountId'>
        <input name='description' type='hidden' value='Reserva de cancha'>
        <input name='referenceCode' type='hidden' value='$referenceCode'>
        <input name='amount' type='hidden' value='$monto'> <!-- Cambiado de monto a amount -->
        <input name='tax' type='hidden' value='0'>
        <input name='taxReturnBase' type='hidden' value='0'>
        <input name='currency' type='hidden' value='$currency'>
        <input name='signature' type='hidden' value='$signature'>
        <input name='buyerEmail' type='hidden' value='$correo'> <!-- Cambiado de correo a buyerEmail -->
        <input name='test' type='hidden' value='1'> <!-- 1 para sandbox -->
        <input name='responseUrl' type='hidden' value='http://localhost/canchasintetica/respuesta.php'>
        <input name='confirmationUrl' type='hidden' value='http://localhost/canchasintetica/confirmacion.php'>
        <!-- Campos personalizados -->
        <input name='extra1' type='hidden' value='$nombre'>
        <input name='extra2' type='hidden' value='$cedula'>
        <input name='extra3' type='hidden' value='$celular'>
        <input name='extra4' type='hidden' value='$cancha_id'>
        <input name='extra5' type='hidden' value='$fechahora_reserva'>
        <script>document.getElementById('payuForm').submit();</script>
      </form>";
?>
