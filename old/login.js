// Simulate opening the modal after a successful login (for demonstration purposes)
document.querySelector('.login-btn').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission
    // Simulate successful login
    document.getElementById('2fa-modal').style.display = 'flex';
});

// Close modal when clicking the submit button
document.querySelector('.submit-btn').addEventListener('click', function() {
    alert('Authentication Successful!');
    document.getElementById('2fa-modal').style.display = 'none';
});
