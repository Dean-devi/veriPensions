// Update Date & Time
function updateDateTime() {
    const now = new Date();
    document.getElementById('datetime').textContent = 
        `Current Date and Time: ${now.toLocaleString()}`;
}
setInterval(updateDateTime, 1000);
updateDateTime();

// Go to Profile
function goToProfile() {
    window.location.href = "admin.html";
}

// Logout Function
function logout() {
    window.location.href = "login.html";
}

document.addEventListener("DOMContentLoaded", function () {
    const userEmail = document.querySelector(".user-email");
    const dropdown = document.querySelector(".dropdown");

    // Toggle dropdown visibility on click
    userEmail.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevents click event from closing immediately
        dropdown.classList.toggle("show");
    });

    // Close dropdown if clicking outside
    document.addEventListener("click", function (event) {
        if (!userEmail.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("show");
        }
    });
});

function updateDateTime() {
    const now = new Date();
    document.getElementById("datetime").innerText = now.toLocaleString('en-US', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: true
    });

    const secDeg = (now.getSeconds() / 60) * 360 + 90;
    const minDeg = (now.getMinutes() / 60) * 360 + 90;
    const hourDeg = ((now.getHours() % 12) / 12) * 360 + 90;

    document.getElementById("second-hand").setAttribute("transform", `rotate(${secDeg} 50 50)`);
    document.getElementById("minute-hand").setAttribute("transform", `rotate(${minDeg} 50 50)`);
    document.getElementById("hour-hand").setAttribute("transform", `rotate(${hourDeg} 50 50)`);
}

setInterval(updateDateTime, 1000);
window.onload = updateDateTime;
