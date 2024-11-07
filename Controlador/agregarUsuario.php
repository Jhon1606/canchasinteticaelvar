<?php
// Verifica que se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $data = [
        'nombre' => $_POST['nombre'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    // Inicializa cURL
    $ch = curl_init();

    // Configura las opciones de cURL
    curl_setopt($ch, CURLOPT_URL, "http://localhost/canchasintetica/api/usuarios/addUsuario.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Envía los datos en formato de formulario
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud cURL
    $response = curl_exec($ch);

    // Maneja errores de cURL
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } else {
        // Aquí puedes manejar la respuesta de la API
        // Por ejemplo, redirigir al usuario a una página de confirmación
        header("Location: ../index.php");
    }

    // Cierra cURL
    curl_close($ch);
}
?>
