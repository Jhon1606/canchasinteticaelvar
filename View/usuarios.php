<?php
session_start(); // Asegúrate de iniciar la sesión

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_email'])) {
    header("Location: ../index.php"); // Redirige a la página de inicio
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancha Sintética El Var</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="public/js/javascript.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="../public/img/escudoelvar.jpg" alt="Logo" width="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Menú lateral -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Botón para colapsar el menú en dispositivos móviles -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> Menú
            </button>
            
            <a href="#" class="brand-link">
                <img src="../public/img/escudoelvar.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cancha El Var</span>
            </a>

            <div class="collapse d-lg-block" id="sidebarMenu">
                <div class="sidebar">
                    <h5 class="px-3 text-white">Dashboard</h5>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="canchas.php" class="nav-link">
                                <i class="nav-icon fas fa-futbol"></i>
                                <p>Canchas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="usuarios.php" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reservas.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Reservas</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>


        <!-- Contenido principal -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <h1 class="my-4">Lista de Reservas</h1>

                <!-- Tabla de reservas -->
                <div class="table-responsive"> <!-- Asegura que la tabla sea responsive -->
                    <table id="usuariosTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Los datos se llenarán aquí mediante JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usuariosTable').DataTable(); // Inicializa DataTables
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#usuariosTable').DataTable();
            $.ajax({
                url: 'http://localhost/canchasintetica/api/usuarios/listar.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    var data = response.data;
                    table.clear();
                    $.each(data, function(index, usuario) {
                        table.row.add([
                            usuario.nombre,
                            usuario.email,
                            usuario.fecha_registro
                        ]).draw(false);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar usuarios:', error);
                }
            });
        });
    </script>
</body>
</html>
