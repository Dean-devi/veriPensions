document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('eye-icon');

    // Initially, the password field type is "password" and the eye icon is "eye-slash"
    passwordInput.setAttribute('type', 'password');
    passwordIcon.classList.add('fa-eye-slash'); // Eye-slash means password is hidden

    togglePassword.addEventListener('click', function () {
        const currentType = passwordInput.getAttribute('type');
        const newType = currentType === 'password' ? 'text' : 'password'; // Toggle between password and text
        
        passwordInput.setAttribute('type', newType); // Change password field type

        // Toggle the icon between "eye" and "eye-slash"
        if (newType === 'password') {
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    });
});
