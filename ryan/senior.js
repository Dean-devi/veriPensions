document.addEventListener("DOMContentLoaded", () => {
    const searchBar = document.getElementById("search-bar");
    const tableRows = document.querySelectorAll("tbody tr");
    const pensionStatusFilter = document.getElementById("pension-status");
    const verificationStatusFilter = document.getElementById("verification-status");

    searchBar.addEventListener("input", () => {
        filterTable();
    });

    pensionStatusFilter.addEventListener("change", () => {
        filterTable();
    });

    verificationStatusFilter.addEventListener("change", () => {
        filterTable();
    });

    function filterTable() {
        const searchValue = searchBar.value.toLowerCase();
        const pensionFilter = pensionStatusFilter.value.toLowerCase();
        const verificationFilter = verificationStatusFilter.value.toLowerCase();

        tableRows.forEach(row => {
            const name = row.querySelector("td:first-child").textContent.toLowerCase();
            const pensionStatus = row.querySelector(".status").textContent.toLowerCase();
            const verificationStatus = row.querySelector(".verification").textContent.toLowerCase();

            if ((name.includes(searchValue) || searchValue === "") &&
                (pensionStatus.includes(pensionFilter) || pensionFilter === "") &&
                (verificationStatus.includes(verificationFilter) || verificationFilter === "")) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    }

    document.querySelectorAll(".action-btn").forEach(button => {
        button.addEventListener("click", (event) => {
            alert(`Button clicked: ${event.target.textContent}`);
        });
    });
});
