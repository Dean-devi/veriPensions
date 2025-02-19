document.addEventListener("DOMContentLoaded", () => {
  // Get values from the cards
  const enrolledCount = parseInt(document.getElementById("enrolled-count").textContent);
  const activePensions = parseInt(document.getElementById("active-pensions").textContent);
  const pendingVerifications = parseInt(document.getElementById("pending-verifications").textContent);
  const smsSent = parseInt(document.getElementById("sms-sent").textContent);

  // Pie Chart for Pension Breakdown
  const pensionPieChart = document.getElementById("pensionPieChart");
  new Chart(pensionPieChart, {
    type: "pie",
    data: {
      labels: ["Active Pensions", "Inactive Pensions", "Pending Verifications"],
      datasets: [
        {
          data: [activePensions, enrolledCount - activePensions, pendingVerifications],
          backgroundColor: ["#0d6efd", "#dc3545", "#ffc107"],
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "top",
        },
      },
    },
  });

  // Line Chart for Biometric Verifications
  const verificationLineChart = document.getElementById("verificationLineChart");
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
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  // Line Chart for Pension Claims
  const pensionClaimedChart = document.getElementById("pensionClaimedChart");
  new Chart(pensionClaimedChart, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [
        {
          label: "Pension Claims",
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