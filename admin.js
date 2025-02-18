// Edit Profile Modal Functionality
const editProfileBtn = document.getElementById('edit-profile');
const modal = document.getElementById('edit-profile-modal');
const closeModalBtn = document.getElementById('close-modal');

// Open modal when edit profile button is clicked
editProfileBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
});

// Close modal when close button is clicked
closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Close modal if clicked outside of the modal content
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};

// Form submission for profile update
document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const role = document.getElementById('role').value;

    alert(`Profile updated:\nName: ${name}\nEmail: ${email}\nRole: ${role}`);
    modal.style.display = 'none';
});
