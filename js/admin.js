document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".nav-link");
  const pageContent = document.getElementById("page-content");
  const breadcrumbText = document.getElementById("breadcrumb-text");

  // Load the default page (Dashboard) on page load
  loadPage("partials/dashboard.html", "Dashboard");

  // Attach click event to each nav link
  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const page = link.getAttribute("data-page");
      const label = link.innerText.trim();
      loadPage(page, label);
    });
  });

  // Function to fetch and load partial HTML into page-content
  function loadPage(url, label) {
    fetch(url)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok: " + response.statusText);
        }
        return response.text();
      })
      .then((html) => {
        pageContent.innerHTML = html;
        breadcrumbText.textContent = label;
      })
      .catch((error) => {
        pageContent.innerHTML = `<div class="alert alert-danger">Error loading page: ${error}</div>`;
      });
  }
});
