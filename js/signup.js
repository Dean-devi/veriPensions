document.addEventListener("DOMContentLoaded", function () {
    const email = document.getElementById("email");
    const fullname = document.getElementById("fullname");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    const emailStatus = document.getElementById("email-status");
    const fullnameStatus = document.getElementById("fullname-status");
    const passwordStatus = document.getElementById("password-status");
    const confirmStatus = document.getElementById("confirm-status");

    const form = document.getElementById("signupForm");

    function validateEmailFormat(emailVal) {
        const regex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        return regex.test(emailVal);
    }

    // Live password match checking
    confirmPassword.addEventListener("input", function () {
        if (confirmPassword.value !== password.value) {
            confirmStatus.textContent = "Passwords do not match.";
        } else {
            confirmStatus.textContent = "";
        }
    });

    form.addEventListener("submit", function (e) {
        let error = false;

        emailStatus.textContent = "";
        fullnameStatus.textContent = "";
        passwordStatus.textContent = "";
        confirmStatus.textContent = "";

        let emailVal = email.value.trim();
        let fullnameVal = fullname.value.trim();
        let passVal = password.value.trim();
        let confirmPassVal = confirmPassword.value.trim();

        if (!validateEmailFormat(emailVal)) {
            emailStatus.textContent = "Email must be a valid Gmail address.";
            error = true;
        }

        if (fullnameVal.length < 3) {
            fullnameStatus.textContent = "Fullname must be at least 3 characters.";
            error = true;
        }

        if (passVal.length < 8 || !/[a-zA-Z]/.test(passVal) || !/[0-9]/.test(passVal)) {
            passwordStatus.textContent = "Password must be at least 8 characters and contain both letters and numbers.";
            error = true;
        }


        if (passVal !== confirmPassVal) {
            confirmStatus.textContent = "Passwords do not match.";
            error = true;
        }

        if (error) {
            e.preventDefault(); // Stop form submission if there's any error
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
const status = document.getElementById("signup-status");
if (status) {
setTimeout(() => {
    status.style.opacity = "0";
    setTimeout(() => status.remove(), 500); // completely remove after fade
}, 4000); // 4 seconds
}
});