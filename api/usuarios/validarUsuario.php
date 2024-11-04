<?php
require_once '../../Modelo/Usuarios.php';

$usuarios = new Usuarios($pdo);

if (isset($_POST['email']) && isset($_POST['password'])) {
  $message = $usuarios->validarUsuario($_POST['email'], $_POST['password']);
  echo json_encode(['status' => 'OK', 'message' => $message]);
} else {
  echo json_encode(['status' => 'ERROR', 'message' => 'Faltan datos']);
}  