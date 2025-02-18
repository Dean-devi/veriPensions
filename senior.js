// Example for filtering data (Pension Status, Verification Status)
const searchBar = document.getElementById('search-bar');
const pensionStatusFilter = document.getElementById('pension-status');
const verificationStatusFilter = document.getElementById('verification-status');

searchBar.addEventListener('input', filterTable);
pensionStatusFilter.addEventListener('change', filterTable);
verificationStatusFilter.addEventListener('change', filterTable);

function filterTable() {
    const searchQuery = searchBar.value.toLowerCase();
    const pensionStatus = pensionStatusFilter.value.toLowerCase();
    const verificationStatus = verificationStatusFilter.value.toLowerCase();
    
    const rows = document.querySelectorAll('#senior-citizen-table tbody tr');
    
    rows.forEach(row => {
        const name = row.querySelector('td a').textContent.toLowerCase();
        const pension = row.querySelector('.status').textContent.toLowerCase();
        const verification = row.querySelector('.verification').textContent.toLowerCase();
        
        const nameMatch = name.includes(searchQuery);
        const pensionMatch = pensionStatus === "" || pension.includes(pensionStatus);
        const verificationMatch = verificationStatus === "" || verification.includes(verificationStatus);
        
        if (nameMatch && pensionMatch && verificationMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Example for pagination (this is basic, you can improve it)
const paginationBtns = document.querySelectorAll('.pagination-btn');
paginationBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        alert('Pagination action triggered');
    });
});
