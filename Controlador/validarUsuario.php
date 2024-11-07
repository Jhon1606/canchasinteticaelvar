<?php
// Archivo: Controlador/validarUsuario.php
session_start(); // Inicia la sesión

// Verifica que se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    // Inicializa cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/canchasintetica/api/usuarios/validarUsuario.php");
    curl_setopt($ch, CURLOPT_POST, true);
    
    // Envía los datos como JSON
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ]);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud cURL
    $response = curl_exec($ch);

    // Maneja errores de cURL
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        $result = json_decode($response, true);
        
        // Verifica si $result es un array y tiene los índices esperados
        if (is_array($result) && isset($result['status'])) {
            if ($result['status'] === 'OK') {
                // Guarda el email en la sesión
                $_SESSION['user_email'] = $data['email'];
                header("Location: ../View/reservas.php");
                exit();
            } else {
                // Manejo de error, puedes mostrar un mensaje
                echo "Error: " . $result['message'];
            }
        } else {
            echo "Error: Respuesta del servidor no válida.";
        }
    }

    curl_close($ch);
}
?>
