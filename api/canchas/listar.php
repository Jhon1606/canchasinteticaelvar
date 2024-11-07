<?php
require_once '../../db.php';
require_once '../../Modelo/Canchas.php';

$cancha = new Canchas($pdo);

if ($cancha->listarCanchas()) {
    echo json_encode(['status' => 'OK', 'data' => $cancha->listarCanchas()]);
} else {
    echo json_encode(['status' => 'ERROR', 'message' => 'No se pudieron cargar las canchas']);
}