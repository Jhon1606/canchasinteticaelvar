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
        reserveButton.className = 'btn btn-success btn-sm';
        reserveButton.textContent = 'Agendar';
        reserveButton.onclick = () => {
        document.getElementById('selectedHour').value = `${dateString} - ${hour}`;
            // alert(`Hora seleccionada: ${hour} del ${dateString}`);
        };

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

