document.getElementById("signupForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirmPassword").value.trim();

    if (username === "" || email === "" || phone === "" || password === "" || confirmPassword === "") {
        alert("Please fill out all fields.");
        return;
    }

    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    if (!/^\+63\d{10}$/.test(phone)) {
        alert("Please enter a valid phone number starting with +63 and 10 digits.");
        return;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }

    alert("Sign-up successful!");
    this.reset();  
});
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input").forEach(input => {
        input.setAttribute("autocomplete", "off");
    });
});
