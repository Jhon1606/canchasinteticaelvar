<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancha sintética El Var</title>
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
            <a class="navbar-brand" href="#"><img src="escudoelvar.jpg" alt="Logo" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Reservas -->
    <section class="text-white text-center bg-dark" style="background-image: url('cancha.jpeg'); background-size: cover; background-position: center; padding: 4rem 0;">
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
                    <form>
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


    <!-- Pie de Página -->
    <footer class="text-white py-4" style="background-color: #28a745;">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-3">
                    <h5>Bienvenido</h5>
                    <p>Alquila nuestra cancha y disfruta del fútbol.</p>
                    <div class="footer-social-icons d-flex gap-2">
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
    <script>
        const hours = [...Array(13).keys()].map(i => {
            const startHour = i + 9;
            const endHour = startHour + 1;
            const formatHour = hour => {
                if (hour < 12) return `${hour}AM`;
                if (hour === 12) return `12PM`;
                return `${hour - 12}PM`;
            };
            return `${formatHour(startHour)} - ${formatHour(endHour)}`;
        });

        let currentDate = new Date();

        function renderHours() {
            const hourRows = document.getElementById('hourRows');
            hourRows.innerHTML = ''; // Limpiar las horas
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = currentDate.toLocaleDateString('es-ES', options); // Formato en español

            hours.forEach(hour => {
                const row = document.createElement('tr');
                const timeCell = document.createElement('td');
                timeCell.className = 'text-center';
                timeCell.textContent = hour;

                const reserveCell = document.createElement('td');
                reserveCell.className = 'text-center';
                const reserveButton = document.createElement('button');
                reserveButton.className = 'btn btn-warning btn-sm';
                reserveButton.textContent = 'Reservar';
                reserveButton.onclick = () => alert(`Reserva realizada para ${hour} del ${dateString}`);

                reserveCell.appendChild(reserveButton);
                row.appendChild(timeCell);
                row.appendChild(reserveCell);
                hourRows.appendChild(row);
            }
        );

        document.getElementById('currentDate').textContent = dateString; // Fecha en español
        document.getElementById('dayOfWeek').textContent = currentDate.toLocaleDateString('es-ES', { weekday: 'long' });
        }


        document.getElementById('prevDay').addEventListener('click', () => {
            currentDate.setDate(currentDate.getDate() - 1);
            renderHours();
        });

        document.getElementById('nextDay').addEventListener('click', () => {
            currentDate.setDate(currentDate.getDate() + 1);
            renderHours();
        });

        // Inicializar la tabla de horas
        renderHours();
    </script>
</body>
</html>
