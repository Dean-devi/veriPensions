// Search and Filter Functionality
const searchBar = document.getElementById('pension-history-search');
const statusFilter = document.getElementById('status-filter');

searchBar.addEventListener('input', filterPensionHistory);
statusFilter.addEventListener('change', filterPensionHistory);

function filterPensionHistory() {
    const searchQuery = searchBar.value.toLowerCase();
    const status = statusFilter.value.toLowerCase();
    
    const rows = document.querySelectorAll('#pension-history-table tbody tr');
    
    rows.forEach(row => {
        const date = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const amount = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        const reason = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const statusMatch = status === "" || row.querySelector('td:nth-child(2)').textContent.toLowerCase().includes(status);
        const searchMatch = date.includes(searchQuery) || amount.includes(searchQuery) || reason.includes(searchQuery);
        
        if (statusMatch && searchMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Modal functionality for editing pension
const editPensionBtn = document.getElementById('edit-pension');
const modal = document.getElementById('edit-pension-modal');
const closeModalBtn = document.getElementById('close-modal');

editPensionBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
});

closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};

// Form validation and submission (you can expand this as needed)
document.getElementById('edit-pension-form').addEventListener('submit', function(e) {
    e.preventDefault();
    // Perform validation and then update pension details
    alert('Pension details updated successfully!');
    modal.style.display = 'none';
});
