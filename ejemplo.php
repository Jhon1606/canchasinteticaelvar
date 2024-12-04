<?php

require 'vendor/autoload.php';


// Recuperar datos de PayU
$estado = $_POST['transactionState'] == 4 ? 'APROBADO' : 'RECHAZADO';
$nombre = $_POST['buyerFullName'];
$email = $_POST['buyerEmail'];
$monto = $_POST['TX_VALUE'];

var_dump($_POST);

echo $estado === 'APROBADO' ? '¡Pago exitoso!' : 'Pago rechazado.';
