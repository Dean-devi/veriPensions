// user.js

document.addEventListener("DOMContentLoaded", () => {
    const editProfileBtn = document.getElementById("edit-profile");
    const editProfileModal = document.getElementById("edit-profile-modal");
    const closeModalBtn = document.getElementById("close-modal");
    const editProfileForm = document.getElementById("edit-profile-form");
  
    // Show the modal
    editProfileBtn.addEventListener("click", () => {
      editProfileModal.style.display = "block";
    });
  
    // Close the modal
    closeModalBtn.addEventListener("click", () => {
      editProfileModal.style.display = "none";
    });
  
    // Close if clicked outside content
    window.addEventListener("click", (e) => {
      if (e.target === editProfileModal) {
        editProfileModal.style.display = "none";
      }
    });
  
    // Handle form submission
    editProfileForm.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Profile updated successfully!");
      editProfileModal.style.display = "none";
    });
  
    // Example: handle "Edit Permissions" button
    document.querySelectorAll("#edit-permissions").forEach((btn) => {
      btn.addEventListener("click", () => {
        alert("Editing permissions...");
      });
    });
  });

// Form submission for profile update
document.getElementById('edit-profile-form').addEventListener('submit', function(e) {
  e.preventDefault();
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const role = document.getElementById('role').value;

  alert(`Profile updated:\nName: ${name}\nEmail: ${email}\nRole: ${role}`);
  modal.style.display = 'none';
});
  