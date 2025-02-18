// Example for filtering logs (by name, date, or result)
const searchBar = document.getElementById('verification-search');
const startDateFilter = document.getElementById('start-date');
const endDateFilter = document.getElementById('end-date');
const resultFilter = document.getElementById('verification-result');

searchBar.addEventListener('input', filterLogs);
startDateFilter.addEventListener('change', filterLogs);
endDateFilter.addEventListener('change', filterLogs);
resultFilter.addEventListener('change', filterLogs);

function filterLogs() {
    const searchQuery = searchBar.value.toLowerCase();
    const startDate = startDateFilter.value;
    const endDate = endDateFilter.value;
    const result = resultFilter.value.toLowerCase();
    
    const rows = document.querySelectorAll('#verification-logs-table tbody tr');
    
    rows.forEach(row => {
        const name = row.querySelector('td a').textContent.toLowerCase();
        const verificationDate = row.querySelector('td:nth-child(2)').textContent;
        const verificationResult = row.querySelector('.result').textContent.toLowerCase();
        
        const nameMatch = name.includes(searchQuery);
        const dateMatch = (startDate === "" || verificationDate >= startDate) && (endDate === "" || verificationDate <= endDate);
        const resultMatch = result === "" || verificationResult.includes(result);
        
        if (nameMatch && dateMatch && resultMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Example for initiating a verification
const initiateButton = document.getElementById('initiate-verification');

initiateButton.addEventListener('click', function() {
    alert('Verification process initiated!');
});
