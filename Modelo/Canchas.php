<?php
class Usuarios
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function crear($nombre)
  {
    $sql = "INSERT INTO canchas (nombre, fecha_creacion) VALUES (:nombre, :fecha_creacion)";
    $stmt = $this->pdo->prepare($sql);
    $fecha_registro = date('Y-m-d H:i:s');
    $stmt->execute([
      'nombre' => $nombre,
      'fecha_registro' => $fecha_registro
    ]);
    return "La cancha ha sido creado correctamente";
  }

  // Dentro de Reservas.php
    // public function actualizarReserva($id_reserva, $estado_pago, $transaccion_id) {
    //     try {
    //         $stmt = $this->pdo->prepare("UPDATE reservas SET estado = ?, transaccion_id = ? WHERE id = ?");
    //         $stmt->execute([$estado_pago, $transaccion_id, $id_reserva]);

    //         if ($stmt->rowCount()) {
    //             return "Reserva actualizada correctamente";
    //         } else {
    //             return "No se encontró la reserva o no se realizó ningún cambio";
    //         }
    //     } catch (PDOException $e) {
    //         return "Error al actualizar la reserva: " . $e->getMessage();
    //     }
    // }

  public function obtener($id)
  {
    $sql = "SELECT * FROM canchas WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function listar()
  {
    $sql = "SELECT * FROM canchas";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function actualizar($id, $nombre, $email, $password)
  {
    $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'nombre' => $nombre,
        'email' => $email,
        'password' => $password
    ]);
  }


  public function eliminar($id)
  {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
  }
}
