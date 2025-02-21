document.addEventListener("DOMContentLoaded", function () {
    // Get all navigation links and content sections
    const navLinks = document.querySelectorAll(".nav-link");
    const sections = document.querySelectorAll(".content-section");

    // Function to show the selected section and hide others
    function showSection(sectionId) {
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.style.display = "block";
            } else {
                section.style.display = "none";
            }
        });
    }

    // Set default active section (Dashboard)
    showSection("dashboard");

    // Add event listeners to sidebar links
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            // Remove active class from all links
            navLinks.forEach(link => link.classList.remove("active"));

            // Add active class to clicked link
            this.classList.add("active");

            // Get the section ID from data attribute
            const sectionId = this.getAttribute("data-section");
            showSection(sectionId);
        });
    });
});
