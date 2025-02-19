// sms.js

document.addEventListener("DOMContentLoaded", () => {
    const sendSmsBtn = document.getElementById("send-sms");
    const sendSmsModal = document.getElementById("send-sms-modal");
    const closeModalBtn = document.getElementById("close-modal");
    const sendSmsForm = document.getElementById("send-sms-form");
    const smsSearch = document.getElementById("sms-search");
    const statusFilter = document.getElementById("status-filter");
  
    // Show the modal when "Send SMS" is clicked
    sendSmsBtn.addEventListener("click", () => {
      sendSmsModal.style.display = "block";
    });
  
    // Hide the modal when the close button is clicked
    closeModalBtn.addEventListener("click", () => {
      sendSmsModal.style.display = "none";
    });
  
    // Hide the modal if user clicks outside the modal content
    window.addEventListener("click", (e) => {
      if (e.target === sendSmsModal) {
        sendSmsModal.style.display = "none";
      }
    });
  
    // Handle form submission
    sendSmsForm.addEventListener("submit", (e) => {
      e.preventDefault();
      alert("SMS sent successfully!");
      sendSmsModal.style.display = "none";
    });
  
    // Filters
    smsSearch.addEventListener("input", (e) => {
      console.log("SMS Search:", e.target.value);
    });
  
    statusFilter.addEventListener("change", (e) => {
      console.log("Filter by status:", e.target.value);
    });
  });
  