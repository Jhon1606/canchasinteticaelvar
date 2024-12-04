<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>

    <!-- FullCalendar 6.0 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery y FullCalendar -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        #calendar {
            margin-top: 30px;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Formulario de Reserva</h2>
    <form id="reservaForm">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="cedula">Cédula:</label>
            <input type="text" class="form-control" id="cedula" name="cedula" required>
        </div>
        <div class="form-group">
            <label for="selectedDateTime">Fecha y hora seleccionada:</label>
            <input type="text" class="form-control" id="selectedDateTime" name="selectedDateTime" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
    </form>

    <h3>Selecciona un horario</h3>
    <div id="calendar"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        let visibleDate; // Variable para almacenar la fecha visible actual

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridDay',
            locale: 'es',
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
                // Crear un contenedor
                const content = document.createElement('div');

                // Mostrar la hora en formato amigable
                const timeLabel = document.createElement('div');
                timeLabel.innerText = arg.date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                // Crear el botón "Reservar"
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
                    alert('Reservado para: ' + formattedDateTime);
                };

                // Añadir elementos al contenedor
                content.appendChild(timeLabel);
                content.appendChild(button);

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

</body>
</html>
