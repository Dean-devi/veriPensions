// Data for the Pie Chart (Pension Distribution)
const pensionPieChartCtx = document.getElementById('pensionPieChart').getContext('2d');
const pensionPieChart = new Chart(pensionPieChartCtx, {
    type: 'pie',
    data: {
        labels: ['Retired', 'Active', 'Pending', 'Suspended'],
        datasets: [{
            data: [50, 30, 15, 5],  // Example data
            backgroundColor: ['#007BFF', '#28a745', '#f0ad4e', '#d9534f'],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        },
    }
});

// Data for the Line Chart (Verification Success vs Failure)
const verificationLineChartCtx = document.getElementById('verificationLineChart').getContext('2d');
const verificationLineChart = new Chart(verificationLineChartCtx, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'Success',
            data: [50, 60, 70, 80, 90],  // Example data for success
            fill: false,
            borderColor: '#28a745',
            tension: 0.1
        }, {
            label: 'Failure',
            data: [20, 15, 10, 5, 2],  // Example data for failure
            fill: false,
            borderColor: '#d9534f',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: { 
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                position: 'top',
            },
        }
    }
});

// Quick Actions Button Handlers (Example)
document.getElementById('send-sms').addEventListener('click', function() {
    alert('Send SMS action triggered!');
});

document.getElementById('start-verification').addEventListener('click', function() {
    alert('Start Verification action triggered!');
});

document.getElementById('update-pension-status').addEventListener('click', function() {
    alert('Update Pension Status action triggered!');
});
