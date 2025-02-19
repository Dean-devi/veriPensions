// pension.js

document.addEventListener("DOMContentLoaded", () => {
    const editPensionBtn = document.getElementById("edit-pension");
    const editPensionModal = document.getElementById("edit-pension-modal");
    const closeModalBtn = document.getElementById("close-modal");
    const editPensionForm = document.getElementById("edit-pension-form");
  
    // Show the modal when "Edit Pension" is clicked
    editPensionBtn.addEventListener("click", () => {
      editPensionModal.style.display = "block";
    });
  
    // Hide the modal when the close button is clicked
    closeModalBtn.addEventListener("click", () => {
      editPensionModal.style.display = "none";
    });
  
    // Hide the modal if user clicks outside the modal content
    window.addEventListener("click", (e) => {
      if (e.target === editPensionModal) {
        editPensionModal.style.display = "none";
      }
    });
  
    // Handle form submission
    editPensionForm.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("Pension details updated!");
      editPensionModal.style.display = "none";
    });
  });
  