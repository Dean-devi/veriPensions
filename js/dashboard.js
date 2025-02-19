// dashboard.js

document.addEventListener("DOMContentLoaded", () => {
  // Initialize charts using Chart.js
  const pensionPieChart = document.getElementById("pensionPieChart");
  const verificationLineChart = document.getElementById("verificationLineChart");
  const pensionClaimedChart = document.getElementById("pensionClaimedChart");

  // Dummy Pie Chart for pension breakdown
  new Chart(pensionPieChart, {
    type: "pie",
    data: {
      labels: ["Active", "Inactive", "Pending"],
      datasets: [
        {
          data: [60, 25, 15],
          backgroundColor: ["#0d6efd", "#dc3545", "#ffc107"],
        },
      ],
    },
  });

  // Dummy Line Chart for Biometric Verifications over 4 weeks
  new Chart(verificationLineChart, {
    type: "line",
    data: {
      labels: ["Week 1", "Week 2", "Week 3", "Week 4"],
      datasets: [
        {
          label: "Biometric Verifications",
          data: [10, 25, 7, 15],
          borderColor: "#0d6efd",
          fill: false,
        },
      ],
    },
    options: {
      responsive: true,
    },
  });

  // New Dummy Line Chart for Pension Claimed by Month/Year
  new Chart(pensionClaimedChart, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [
        {
          label: "Pension Claimed",
          data: [500, 600, 550, 700, 800, 750, 850, 900, 950, 1000, 980, 1020],
          borderColor: "#28a745",
          backgroundColor: "rgba(40, 167, 69, 0.1)",
          fill: true,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // Button event listeners
  document.getElementById("send-sms").addEventListener("click", () => {
    alert("Sending SMS...");
  });

  document.getElementById("start-verification").addEventListener("click", () => {
    alert("Starting Verification...");
  });

  document.getElementById("update-pension-status").addEventListener("click", () => {
    alert("Updating Pension Status...");
  });
});
