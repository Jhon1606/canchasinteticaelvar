<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario con Reservas</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #calendar {
            max-width: 1200px;
            margin: 40px auto;
        }
        .reservation-btn {
            padding: 8px 16px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .reservation-btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Calendario de Reservas</h1>
    
    <!-- Contenedor del Calendario -->
    <div id="calendar"></div>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridDay', // Vista de horario diario
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,dayGridMonth'
                },
                slotDuration: '01:00:00', // Duración de cada franja horaria
                slotLabelInterval: '01:00', // Intervalo de una hora
                nowIndicator: true, // Indicador de la hora actual
                events: [], // No cargamos eventos por defecto
                dayCellDidMount: function(info) {
                    var cell = info.el;
                    var hourSlot = info.date;

                    // Solo agregamos el botón en horas visibles
                    if (hourSlot.getHours() >= 8 ) {
                        const button = document.createElement('button');
                        button.classList.add('reservation-btn');
                        button.innerText = 'Reservar';
                        button.onclick = function() {
                            alert('Reserva realizada para la hora: ' + hourSlot.toLocaleString());
                        };

                        // Añadir el botón dentro de la celda correspondiente
                        cell.appendChild(button);
                    }
                },
            });

            calendar.render(); // Renderiza el calendario
        });
    </script>
</body>
</html>
