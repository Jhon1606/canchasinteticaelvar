<?php
require_once '../../db.php';
require_once '../../Modelo/Usuarios.php';

$usuario = new Usuarios($pdo);

if ($usuario->listarUsuarios()) {
    echo json_encode(['status' => 'OK', 'data' => $usuario->listarUsuarios()]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'No se pudieron cargar los usuarios']);
}