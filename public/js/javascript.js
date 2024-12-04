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

async function fetchReservations() {
    try {
        const response = await fetch('http://localhost/canchasintetica/api/reservas/listar.php');
        const data = await response.json();
        return data.reservas || []; // Asumiendo que la respuesta tiene un campo 'reservas'
    } catch (error) {
        console.error('Error al obtener las reservas:', error);
        return [];
    }
}

function formatDateToMatch(fechahora_reserva) {
    // Formateamos la fecha para que coincida con el formato de la API
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = currentDate.toLocaleDateString('es-ES', options); // Fecha en español

    // Ajustamos el formato de la hora de la reserva
    return fechahora_reserva.replace(dateString, "").trim();
}

function renderHours(reservedHours) {
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
        reserveButton.className = 'btn btn-success btn-sm';

        // Comprobar si la hora ya está reservada
        const isReserved = reservedHours.includes(`${dateString} - ${hour}`);

        if (isReserved) {
            reserveButton.textContent = 'Reservado';
            reserveButton.disabled = true; // Deshabilitar el botón si está reservado
        } else {
            reserveButton.textContent = 'Agendar';
            reserveButton.onclick = () => {
                document.getElementById('selectedHour').value = `${dateString} - ${hour}`;
                // alert(`Hora seleccionada: ${hour} del ${dateString}`);
            };
        }

        reserveCell.appendChild(reserveButton);
        row.appendChild(timeCell);
        row.appendChild(reserveCell);
        hourRows.appendChild(row);
    });

    document.getElementById('currentDate').textContent = dateString; // Fecha en español
    document.getElementById('dayOfWeek').textContent = currentDate.toLocaleDateString('es-ES', { weekday: 'long' });
}

document.getElementById('prevDay').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() - 1);
    renderAvailableHours();
});

document.getElementById('nextDay').addEventListener('click', () => {
    currentDate.setDate(currentDate.getDate() + 1);
    renderAvailableHours();
});

// Inicializar la tabla de horas
async function renderAvailableHours() {
    const reservations = await fetchReservations(); // Obtener las reservas
    const reservedHours = reservations.map(reservation => formatDateToMatch(reservation.fechahora_reserva));
    renderHours(reservedHours);
}

renderAvailableHours();

