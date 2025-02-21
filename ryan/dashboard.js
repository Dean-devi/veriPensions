document.addEventListener("DOMContentLoaded", function () {
    const pensionPieChart = document.getElementById("pensionPieChart").getContext("2d");

    new Chart(pensionPieChart, {
        type: "pie",
        data: {
            labels: ["Senior Citizens", "Active Pensions", "Pending Verifications", "SMS Sent"],
            datasets: [{
                data: [3500, 2000, 120, 5000],
                backgroundColor: ["#FFD700", "#FF5733", "#28A745", "#17A2B8"]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Tatanggalin ang legend
                }
            }
        }
    });

    const verificationLineChart = document.getElementById("verificationLineChart").getContext("2d");

    new Chart(verificationLineChart, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                label: "Verifications",
                data: [10, 30, 50, 80, 120, 150],
                borderColor: "#FFD700",
                backgroundColor: "rgba(255, 215, 0, 0.2)"
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Tatanggalin din ang legend
                }
            }
        }
    });
});
