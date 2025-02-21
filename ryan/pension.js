document.addEventListener("DOMContentLoaded", () => {
    const editPensionButton = document.getElementById("edit-pension");
    const editPensionModal = document.getElementById("edit-pension-modal");
    const closeModalButton = document.getElementById("close-modal");
    const editPensionForm = document.getElementById("edit-pension-form");
    const pensionAmountInput = document.getElementById("pension-amount");
    const pensionTypeInput = document.getElementById("pension-type");
    const pensionStatusInput = document.getElementById("pension-status");

    // Open modal
    editPensionButton.addEventListener("click", () => {
        editPensionModal.style.display = "block";
    });

    // Close modal
    closeModalButton.addEventListener("click", () => {
        editPensionModal.style.display = "none";
    });

    // Close modal when clicking outside
    window.addEventListener("click", (event) => {
        if (event.target === editPensionModal) {
            editPensionModal.style.display = "none";
        }
    });

    // Handle form submission
    editPensionForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const updatedAmount = pensionAmountInput.value;
        const updatedType = pensionTypeInput.value;
        const updatedStatus = pensionStatusInput.value;
        
        console.log("Updated Pension Details:", {
            amount: updatedAmount,
            type: updatedType,
            status: updatedStatus
        });
        
        editPensionModal.style.display = "none";
        alert("Pension details updated successfully!");
    });
});
