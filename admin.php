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
                <a class="navbar-brand" href="#"><img src="public/img/escudoelvar.jpg" alt="Logo" width="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link active" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Menú lateral -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="public/img/escudoelvar.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cancha El Var</span>
            </a>
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
                        <a href="usuarios.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="reservas.php" class="nav-link active">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>Reservas</p>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Contenido principal -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <h1 class="my-4">Lista de Reservas</h1>

                <!-- Tabla de reservas -->
                <table id="reservasTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Monto</th>
                            <th>Cancha ID</th>
                            <th>Estado</th>
                            <th>Transacción ID</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Los datos se llenarán aquí mediante JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pie de Página -->
        <footer class="main-footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-4 mb-3">
                        <h5>Bienvenido</h5>
                        <p>Alquila nuestra cancha y disfruta del fútbol.</p>
                        <div class="footer-social-icons d-flex gap-2 col-6 mx-auto">
                            <a href="#" class="btn-circle bg-dark text-white d-flex align-items-center justify-content-center"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="btn-circle bg-dark text-white d-flex align-items-center justify-content-center"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn-circle bg-dark text-white d-flex align-items-center justify-content-center"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <p>+57 3152229972</p>
                        <p>canchasinteticaelvar@gmail.com</p>
                    </div>
                    <div class="col-lg-4">
                        <form>
                            <div class="mb-3">
                                <label for="emailFooter" class="sr-only">Correo Electrónico</label>
                                <input type="email" class="form-control" id="emailFooter" placeholder="ejemplo@correo.com" required>
                            </div>
                            <button type="submit" class="btn btn-light btn-block">Enviar solicitud de reserva</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="mb-0">© 2024. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reservasTable').DataTable(); // Inicializa DataTables
        });
        
    </script>

    <script>
       $(document).ready(function() {
            var table = $('#reservasTable').DataTable(); // Inicializa DataTables

            // Realiza la petición a la API
            $.ajax({
                url: 'http://localhost/canchasintetica/api/reservas/listar.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Verifica el formato de la respuesta
                    console.log(response); // Verifica qué datos se están recibiendo
                    var data = response.data; // Accede a los datos

                    // Limpia la tabla antes de llenarla
                    table.clear();

                    // Llenar la tabla con los datos recibidos
                    $.each(data, function(index, reserva) {
                        table.row.add([
                            reserva.nombre,
                            reserva.cedula,
                            reserva.correo,
                            reserva.celular,
                            reserva.monto,
                            reserva.cancha_id,
                            reserva.estado,
                            reserva.transaccion_id,
                            reserva.fecha_registro
                        ]).draw(false);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar reservas:', error);
                }
            });
        });


    </script>



</body>
</html>
