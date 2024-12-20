<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancha Sintética El Var</title>
    <!-- FullCalendar 6.0 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/all.min.css">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/main.min.css" rel="stylesheet">

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

        .reserve-button {
            display: block;
            margin: 10px auto;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .reserve-button:hover {
            background-color: #0056b3;
        }

        /* Ajustes para dispositivos móviles */
        @media (max-width: 768px) {
            /* Reducir el tamaño de los botones en el header */
            .fc-toolbar button {
                font-size: 12px; /* Tamaño de fuente más pequeño */
                padding: 5px; /* Menos espacio alrededor de los botones */
            }

            /* Reducir el tamaño del texto de la fecha y otros elementos del header */
            .fc-toolbar-title {
                font-size: 14px; /* Fuente más pequeña para el título */
            }

            /* Separar más los botones y el texto del header */
            .fc-toolbar-chunk {
                margin-right: 10px; /* Añadir más espacio entre los elementos */
            }

            /* Ajustar el contenedor del header */
            .fc-toolbar {
                flex-wrap: wrap; /* Permite que los elementos se envuelvan en dispositivos pequeños */
                justify-content: space-between; /* Asegura que haya espacio entre los elementos */
            }
            
            /* Asegurar que el calendario tenga márgenes adecuados */
            .fc-view-container {
                margin: 0 5px; /* Ajustar márgenes en dispositivos pequeños */
            }
        }

        
    </style>
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../public/img/escudoelvar.jpg" alt="Logo" width="50"></a>
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
    <section class="text-white text-center bg-dark" style="background-image: url('../public/img/cancha.jpeg'); background-size: cover; background-position: center; padding: 4rem 0;">
        <div class="container">
            <div class="p-4 rounded">
                <h1 class="display-4"><strong>Reservar Cancha</strong></h1>
                <p class="lead">Alquila nuestra cancha sintética en Barranquilla y disfruta de un gran partido con amigos.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="contacto py-5">
        <div class="container">
            <div class="row justify-content-center">
                
                <!-- Formulario de contacto -->
                <div class="col-lg-8">
                    <form id="reservaForm" action="../Controlador/agregarReserva.php" method="post">
                        <div class="modal-body">
                            <h2 class="h6">Información del cliente</h2>
                            <p class="mt-1 text-muted">Rellenar todos los campos del formulario para hacer la reserva</p>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="nombre">
                                    <div id="nombreError" class="text-danger"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <input type="number" id="cedula" name="cedula" class="form-control" autocomplete="cedula">
                                    <div id="cedulaError" class="text-danger"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="correo" class="form-label">Correo electrónico</label>
                                    <input type="email" id="correo" name="correo" class="form-control" autocomplete="email">
                                    <div id="emailError" class="text-danger"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="number" id="celular" name="celular" class="form-control" autocomplete="celular">
                                    <div id="celularError" class="text-danger"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="monto" class="form-label">Monto a pagar</label>
                                    <input type="number" id="monto" name="monto" class="form-control" autocomplete="monto">
                                    <div id="montoError" class="text-danger"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cancha" class="form-label">Cancha</label>
                                    <select id="cancha_id" name="cancha_id" class="form-select" required>
                                        <option value="">Selecciona una cancha</option>
                                    </select>
                                    <div id="canchaError" class="text-danger"></div>
                                </div>

                                <div class="form-group">
                                    <label for="selectedDateTime">Fecha y hora seleccionada:</label>
                                    <input type="text" class="form-control" id="selectedDateTime" name="selectedDateTime" readonly>
                                    <div id="selectedDateTime" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
                        </div>
                    </form>
                <!-- Contenedor del calendario -->
                <div id="calendar" class="mt-3"></div>
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
                <form id="loginForm" method="post" action="Controlador/validarUsuario.php">
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
    <!-- <script src="public/js/javascript.js"></script> -->

    <!-- jQuery y FullCalendar -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            let visibleDate; // Variable para almacenar la fecha visible actual
            let reservedSlots = []; // Arreglo para almacenar fechas reservadas

            // Obtener las reservas de la API
            fetch('http://localhost/canchasintetica/api/reservas/listar.php')
                .then(response => response.json())
                .then(data => {
                    reservedSlots = data.map(reserva => new Date(reserva.fechahora_reserva));
                })
                .catch(error => console.error('Error al cargar las reservas:', error));

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridDay',
                locale: 'es',
                slotMinTime: "10:00:00",  // Hora mínima a mostrar (10 AM)
                slotMaxTime: "23:00:00",  // Hora máxima a mostrar (10 PM)
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek'
                },
                datesSet: function (info) {
                    // Actualizar la fecha visible actual cuando se navega
                    visibleDate = new Date(info.start); 
                },
                slotLabelContent: function (arg) {
                    const content = document.createElement('div');
                    const timeLabel = document.createElement('div');
                    timeLabel.innerText = arg.date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                    // Verificar si el slot está reservado
                    const isReserved = reservedSlots.some(reservedDate => 
                        reservedDate.getTime() === arg.date.getTime()
                    );

                    if (!isReserved) {
                        // Crear el botón "Reservar" si no está reservado
                        const button = document.createElement('button');
                        button.innerText = 'Reservar';
                        button.className = 'reserve-button';

                        button.onclick = function () {
                            // Combinar la fecha visible con la hora del slot
                            const selectedDateTime = new Date(visibleDate);
                            selectedDateTime.setHours(arg.date.getHours());
                            selectedDateTime.setMinutes(arg.date.getMinutes());

                            // Formatear la fecha seleccionada
                            const formattedDateTime = formatDate(selectedDateTime);
                            document.getElementById('selectedDateTime').value = formattedDateTime;
                            // alert('Reservado para: ' + formattedDateTime);
                        };

                        content.appendChild(button);
                    } else {
                        // Si está reservado, mostrar un texto
                        const reservedText = document.createElement('div');
                        reservedText.innerText = 'Reservado';
                        reservedText.style.color = 'red';
                        content.appendChild(reservedText);
                    }

                    content.appendChild(timeLabel);
                    return { domNodes: [content] };
                }
            });

            calendar.render();

            function formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                return `${year}-${month}-${day} ${hours}:${minutes}`;
            }
        });
    </script>


    <script>
        $(document).ready(function() {
        // Realiza la solicitud a la API de canchas
            $.ajax({
                url: 'http://localhost/canchasintetica/api/canchas/listar.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Verifica que los datos se hayan recibido correctamente
                    if (response.data) {
                        // Recorre cada cancha en los datos de respuesta
                        $.each(response.data, function(index, cancha) {
                            // Agrega cada cancha como una opción en el select
                            $('#cancha_id').append(
                                $('<option>', {
                                    value: cancha.id, // Usa el campo que represente el nombre
                                    text: cancha.nombre    // Usa el mismo campo para mostrar el nombre
                                })
                            );
                        });
                    } else {
                        console.error("No se encontraron datos de canchas.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las canchas:', error);
                }
            });
        });

        $(document).ready(function() {
            // Intercepta el envío del formulario
            $("form").on("submit", function(event) {
                event.preventDefault(); // Evita el envío inmediato
                let isValid = true;

                // Validación del campo Nombre
                const name = $("#nombre").val().trim();
                if (name === "") {
                    $("#nombreError").text("El nombre es requerido.");
                    isValid = false;
                } else {
                    $("#nombreError").text("");
                }

                // Validación del campo Cédula (solo números y longitud mínima)
                const cedula = $("#cedula").val().trim();
                if (cedula === "" || isNaN(cedula) || cedula.length < 6) {
                    $("#cedulaError").text("La cédula debe contener solo números y tener al menos 6 dígitos.");
                    isValid = false;
                } else {
                    $("#cedulaError").text("");
                }

                // Validación del campo Correo Electrónico (formato de email)
                const email = $("#correo").val().trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === "" || !emailPattern.test(email)) {
                    $("#emailError").text("Por favor, ingrese un correo electrónico válido.");
                    isValid = false;
                } else {
                    $("#emailError").text("");
                }

                // Validación del campo Celular (solo números y longitud)
                const celular = $("#celular").val().trim();
                if (celular === "" || isNaN(celular) || celular.length < 10) {
                    $("#celularError").text("El celular debe contener solo números y tener al menos 10 dígitos.");
                    isValid = false;
                } else {
                    $("#celularError").text("");
                }

                // Validación del campo Monto (mínimo 20000)
                const monto = parseInt($("#monto").val().trim(), 10);
                if (isNaN(monto) || monto < 20000) {
                    $("#montoError").text("El monto debe ser un valor numérico mayor o igual a 20000.");
                    isValid = false;
                } else {
                    $("#montoError").text("");
                }

                // Validación del campo Cancha (debe seleccionar una opción)
                const cancha = $("#cancha_id").val();
                if (cancha === "") {
                    $("#canchaError").text("Por favor, seleccione una cancha.");
                    isValid = false;
                } else {
                    $("#canchaError").text("");
                }

                // Si todas las validaciones son correctas, enviar el formulario
                if (isValid) {
                    this.submit();
                }
            });
        });
    </script>
    
</body>
</html>
