document.addEventListener("DOMContentLoaded", function () {
    const initiateButton = document.getElementById("initiate-verification");
    const searchInput = document.getElementById("verification-search");
    const filterOptions = document.querySelectorAll(".filter-dropdown");
    const paginationButtons = document.querySelectorAll(".pagination-btn");

    // Simulated verification process
    initiateButton.addEventListener("click", function () {
        initiateButton.innerText = "Verifying...";
        initiateButton.disabled = true;

        setTimeout(() => {
            initiateButton.innerText = "Initiate Verification";
            initiateButton.disabled = false;
            alert("Verification Process Completed!");
        }, 2000);
    });

    // Search functionality
    searchInput.addEventListener("input", function () {
        let filter = searchInput.value.toLowerCase();
        let rows = document.querySelectorAll("#verification-logs-table tbody tr");

        rows.forEach(row => {
            let name = row.querySelector("td a").innerText.toLowerCase();
            if (name.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });

    // Filter functionality
    filterOptions.forEach(filter => {
        filter.addEventListener("change", function () {
            let startDate = new Date(document.getElementById("start-date").value);
            let endDate = new Date(document.getElementById("end-date").value);
            let resultFilter = document.getElementById("verification-result").value.toLowerCase();

            let rows = document.querySelectorAll("#verification-logs-table tbody tr");

            rows.forEach(row => {
                let date = new Date(row.cells[1].innerText);
                let result = row.cells[2].innerText.toLowerCase();
                let showRow = true;

                if (startDate && !isNaN(startDate) && date < startDate) showRow = false;
                if (endDate && !isNaN(endDate) && date > endDate) showRow = false;
                if (resultFilter && result !== resultFilter) showRow = false;

                row.style.display = showRow ? "" : "none";
            });
        });
    });

    // Pagination functionality (simulated)
    paginationButtons.forEach(button => {
        button.addEventListener("click", function () {
            alert(`Pagination clicked: ${this.innerText}`);
        });
    });
});
