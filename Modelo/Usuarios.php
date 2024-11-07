<?php
class Usuarios
{
  private $pdo;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function crear($nombre, $email, $password)
  {
    $sql = "INSERT INTO usuarios (nombre, email, password, fecha_registro) VALUES (:nombre, :email, :password, :fecha_registro)";
    $stmt = $this->pdo->prepare($sql);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $fecha_registro = date('Y-m-d H:i:s');
    $stmt->execute([
      'nombre' => $nombre,
      'email' => $email,
      'password' => $password,
      'fecha_registro' => $fecha_registro
    ]);
    return "El usuario ha sido creado correctamente";
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


  public function validarUsuario($email, $password)
  {
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($password, $user['password'])) {
        return ['status' => 'OK', 'message' => 'Usuario validado correctamente', 'user' => $user];
    } else {
        return ['status' => 'ERROR', 'message' => 'Email o contraseña incorrectos'];
    }
  }
    

  public function obtener($id)
  {
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function listarUsuarios()
  {
    $sql = "SELECT * FROM usuarios";
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
