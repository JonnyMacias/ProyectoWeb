// Selecciona el elemento canvas para la gráfica
const ctxPastel = document.getElementById('pieChart').getContext('2d');

// Crea la gráfica de pastel
const pieChart = new Chart(ctxPastel, {
    type: 'pie', // Cambia el tipo de gráfica a 'pie' o 'doughnut' para una gráfica de dona
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'], // Etiquetas de los datos
        datasets: [{
            label: 'Ventas en USD',
            data: [120, 190, 300, 500, 200, 300], // Datos de la gráfica
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ], // Colores de cada sección del pastel
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ], // Colores de los bordes de cada sección
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top', // Posición de la leyenda (puede ser 'top', 'bottom', 'left', 'right')
            }
        }
    }
});

/*---------------GRAFICA DE LINEAS------------------------*/
// Selecciona el elemento canvas para la gráfica
const ctx = document.getElementById('lineChart').getContext('2d');

// Crea la gráfica de líneas
const lineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'], // Etiquetas de los datos
        datasets: [{
            label: 'Ventas en USD',
            data: [120, 190, 300, 500, 200, 300], // Datos de la gráfica
            borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color del área bajo la línea
            borderWidth: 2,
            fill: true // Rellena el área bajo la línea
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true // Inicia el eje Y desde cero
            }
        }
    }
});

