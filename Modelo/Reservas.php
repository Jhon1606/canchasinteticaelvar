<?php
class Reservas
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function crearReserva($transaccion_id, $estado, $monto, $correo, $descripcion, $nombre, $cedula, $celular, $cancha_id, $fechahora_reserva)
  {
    $sql = "INSERT INTO reservas (transaccion_id, estado, monto, correo, descripcion, nombre, cedula, celular, cancha_id, fechahora_reserva, fecha_registro) 
    VALUES (:transaccion_id, :estado, :monto, :correo, :descripcion, :nombre, :cedula, :celular, :cancha_id, :fechahora_reserva, :fecha_registro)";
    $stmt = $this->pdo->prepare($sql);
    $fecha_registro = date('Y-m-d H:i:s');
    $stmt->execute([
      'transaccion_id' => $transaccion_id,
      'estado' => $estado,
      'monto' => $monto,
      'correo' => $correo,
      'descripcion' => $descripcion,
      'nombre' => $nombre,
      'cedula' => $cedula,
      'celular' => $celular,
      'cancha_id' => $cancha_id,
      'fechahora_reserva' => $fechahora_reserva,
      'estado' => $estado,
      'fecha_registro' => $fecha_registro
    ]);
    return "La reserva ha sido creada correctamente";
  }

  public function crearReservaPayU($nombre,$correo, $monto)
  {
    $sql = "INSERT INTO reservas (nombre, correo, monto) 
    VALUES (:nombre, :correo, :monto)";
    $stmt = $this->pdo->prepare($sql);
    // $fecha_registro = date('Y-m-d H:i:s');
    // $estado = 'Pendiente';
    $stmt->execute([
      'nombre' => $nombre,
      'correo' => $correo,
      'monto' => $monto
      // 'estado' => $estado,
      // 'fecha_registro' => $fecha_registro
    ]);
    return "La reserva ha sido creada correctamente";
  }

  // Dentro de Reservas.php
  public function actualizarReserva($reserva_id, $estado, $transaccion_id) {
      try {
          $stmt = $this->pdo->prepare("UPDATE reservas SET estado = ?, transaccion_id = ? WHERE id = ?");
          $stmt->execute([$estado, $transaccion_id, $reserva_id]);

          if ($stmt->rowCount()) {
              return "Reserva actualizada correctamente";
          } else {
              return "No se encontró la reserva o no se realizó ningún cambio";
          }
      } catch (PDOException $e) {
          return "Error al actualizar la reserva: " . $e->getMessage();
      }
  }


  public function obtener($id)
  {
    $sql = "SELECT * FROM reservas WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function listarReservas()
  {
    $sql = "SELECT * FROM reservas";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function eliminar($id)
  {
    $sql = "DELETE FROM reservas WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
  }
}
