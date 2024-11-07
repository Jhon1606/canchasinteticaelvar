<?php
class Reservas
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function crearReserva($nombre, $cedula, $correo, $celular, $monto, $cancha, $fechahora_reserva, $estado)
  {
    $sql = "INSERT INTO reservas (nombre, cedula, correo, celular, monto, cancha_id, fechahora_reserva, estado, fecha_registro) 
    VALUES (:nombre, :cedula, :correo, :celular, :monto, :cancha_id, :fechahora_reserva, :estado, :fecha_registro)";
    $stmt = $this->pdo->prepare($sql);
    $fecha_registro = date('Y-m-d H:i:s');
    $stmt->execute([
      'nombre' => $nombre,
      'cedula' => $cedula,
      'correo' => $correo,
      'celular' => $celular,
      'monto' => $monto,
      'cancha_id' => $cancha,
      'fechahora_reserva' => $fechahora_reserva,
      'estado' => $estado,
      'fecha_registro' => $fecha_registro
    ]);
    return "La reserva ha sido creada correctamente";
  }

  // Dentro de Reservas.php
    public function actualizarReserva($id_reserva, $estado_pago, $transaccion_id) {
        try {
            $stmt = $this->pdo->prepare("UPDATE reservas SET estado = ?, transaccion_id = ? WHERE id = ?");
            $stmt->execute([$estado_pago, $transaccion_id, $id_reserva]);

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
