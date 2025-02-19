// biometric.js

document.addEventListener("DOMContentLoaded", () => {
    const initiateVerificationBtn = document.getElementById("initiate-verification");
    const verificationSearch = document.getElementById("verification-search");
    const startDate = document.getElementById("start-date");
    const endDate = document.getElementById("end-date");
    const verificationResult = document.getElementById("verification-result");
  
    initiateVerificationBtn.addEventListener("click", () => {
      alert("Initiating Biometric Verification...");
    });
  
    verificationSearch.addEventListener("input", (e) => {
      console.log("Searching for:", e.target.value);
    });
  
    startDate.addEventListener("change", (e) => {
      console.log("Start Date:", e.target.value);
    });
  
    endDate.addEventListener("change", (e) => {
      console.log("End Date:", e.target.value);
    });
  
    verificationResult.addEventListener("change", (e) => {
      console.log("Verification Result Filter:", e.target.value);
    });
  });
  