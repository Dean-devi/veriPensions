document.addEventListener("DOMContentLoaded", function () {
    const sendSmsBtn = document.getElementById("send-sms");
    const modal = document.getElementById("send-sms-modal");
    const closeModalBtn = document.getElementById("close-modal");
    const sendSmsForm = document.getElementById("send-sms-form");
    const smsSearch = document.getElementById("sms-search");
    const statusFilter = document.getElementById("status-filter");
    const smsLogTable = document.getElementById("sms-log-table").getElementsByTagName("tbody")[0];

    sendSmsBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    sendSmsForm.addEventListener("submit", function (event) {
        event.preventDefault();
        alert("SMS Sent Successfully!");
        modal.style.display = "none";
    });

    smsSearch.addEventListener("input", function () {
        let filter = smsSearch.value.toLowerCase();
        let rows = smsLogTable.getElementsByTagName("tr");
        for (let row of rows) {
            let name = row.getElementsByTagName("td")[0]?.innerText.toLowerCase() || "";
            row.style.display = name.includes(filter) ? "" : "none";
        }
    });

    statusFilter.addEventListener("change", function () {
        let filter = statusFilter.value.toLowerCase();
        let rows = smsLogTable.getElementsByTagName("tr");
        for (let row of rows) {
            let status = row.getElementsByTagName("td")[3]?.innerText.toLowerCase() || "";
            row.style.display = filter === "" || status.includes(filter) ? "" : "none";
        }
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
