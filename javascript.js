const hours = [...Array(14).keys()].map(i => {
    const hour = i + 9; // horas de 9 a 10 PM
    return hour <= 12 ? `${hour} AM` : `${hour - 12} PM`;
});

let currentDate = new Date();

function renderHours() {
    const hourRows = document.getElementById('hourRows');
    hourRows.innerHTML = ''; // Limpiar las horas
    const dateString = currentDate.toLocaleDateString();

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
    });
    
    document.getElementById('currentDate').textContent = currentDate.toDateString();
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