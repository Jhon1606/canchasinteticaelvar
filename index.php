<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancha Sintética El Var</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">
    <style>
        .btn-circle {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer-social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="public/img/escudoelvar.jpg" alt="Logo" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Reservas -->
    <section class="text-white text-center bg-dark" style="background-image: url('public/img/cancha.jpeg'); background-size: cover; background-position: center; padding: 4rem 0;">
        <div class="container">
            <div class="p-4 rounded">
                <h1 class="display-4"><strong>Reservar Cancha</strong></h1>
                <p class="lead">Alquila nuestra cancha sintética en Barranquilla y disfruta de un gran partido con amigos.</p>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Reservar
                </button>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="contacto py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Información de contacto -->
                <div class="col-lg-5 mb-4">
                    <h2>Contáctanos para Reservas</h2>
                    <p>Reserva tu cancha sintética y disfruta de un buen partido con amigos. ¡Te esperamos en Barranquilla para vivir la experiencia!</p>
                    <p><strong>Contacto:</strong> 1234567890</p>
                    <p><strong>Ayuda:</strong> info@canchasinteticaelvar.com</p>
                </div>
                
                <!-- Formulario de contacto -->
                <div class="col-lg-5">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del interesado</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre aquí" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electrónico*</label>
                            <input type="email" class="form-control" id="correo" placeholder="Ingresa tu correo aquí" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje o consulta*</label>
                            <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Enviar consulta</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Ubicación -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 mb-4">
                    <h2>Ubicación Cancha</h2>
                    <p>Nuestra cancha sintética se encuentra en Barranquilla, Colombia, ideal para alquilar y disfrutar de partidos de fútbol con amigos.</p>
                    <p><strong>Dirección:</strong> Carrera 45 # 70 - 185 Barranquilla, Colombia</p>
                    <p><strong>Horario:</strong> 9 AM - 10 PM</p>
                </div>
                <div class="col-lg-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.729214233!2d-74.8069814!3d10.9838119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef42e329a6e0a9d%3A0x7a8c7b7d97a3896d!2sCarrera%2045%20%23%2070-185%2C%20Barranquilla%2C%20Atl%C3%A1ntico%2C%20Colombia!5e0!3m2!1ses!2sco!4v1601930365737!5m2!1ses!2sco" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario de Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="Controlador/add.php" method="post">
                        <h2 class="h6">Información del cliente</h2>
                        <p class="mt-1 text-muted">Rellenar todos los campos del formulario para hacer la reserva</p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" autocomplete="name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="number" id="cedula" name="cedula" class="form-control" autocomplete="cedula" required>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="form-control" autocomplete="email" required>
                            </div>

                            <div class="col-md-6">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="number" id="celular" name="celular" class="form-control" autocomplete="celular" required>
                            </div>

                            <div class="col-md-6">
                                <label for="monto" class="form-label">Monto a pagar</label>
                                <input type="number" id="monto" name="monto" class="form-control" autocomplete="monto" required>
                            </div>

                            <div class="col-md-6">
                                <label for="cancha" class="form-label">Cancha</label>
                                <select id="cancha" name="cancha" class="form-select" required>
                                    <option value="">Selecciona una cancha</option>
                                    <option value="Cancha Futbol 5 VS 5">Cancha Futbol 5 VS 5</option>
                                    <option value="Cancha Futbol 7 VS 7">Cancha Futbol 7 VS 7</option>
                                </select>
                            </div>

                            <!-- Campo oculto para la hora seleccionada -->
                            <input type="text" id="selectedHour" name="selectedHour">

                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <button id="prevDay" class="btn btn-outline-secondary">←</button>
                                    <div id="currentDate" class="font-weight-bold"></div>
                                    <button id="nextDay" class="btn btn-outline-secondary">→</button>
                                </div>

                                <!-- Tabla de horas -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center" id="dayOfWeek">DÍA</th>
                                        </tr>
                                    </thead>
                                    <tbody id="hourRows">
                                        <!-- Las horas se generarán aquí dinámicamente -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
            <!-- Logotipo centrado -->
            <div class="modal-header d-flex justify-content-center align-items-center">
                <img src="public/img/escudoelvar.jpg" alt="escudo var" class="img-fluid" style="max-width: 60px;">
                <button type="button" class="btn-close btn-close-black position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <!-- Encabezado del modal con ícono y título -->
            <div class="text-center my-3 text-black">
                <h5 class="modal-title mx-auto" id="loginModalLabel">
                    <i class="fa fa-user-circle me-2"></i>Iniciar Sesión
                </h5>
            </div>

            <!-- Cuerpo del modal con el formulario -->
            <div class="modal-body p-4">
                <form id="loginForm" method="post" action="tu_ruta_de_autenticacion.php">
                <div class="mb-3">
                    <label for="email" class="form-label"><i class="fa fa-user me-2"></i> Usuario</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><i class="fa fa-lock me-2"></i> Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Iniciar Sesión</button>
                </form>
            </div>

            <!-- Pie del modal con un enlace para recuperación de contraseña -->
            <div class="modal-footer justify-content-center">
                <a href="#" class="text-muted small">¿Olvidaste tu contraseña?</a>
            </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="text-white py-4" style="background-color: #28a745;">
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

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/javascript.js"></script>
</body>
</html>
