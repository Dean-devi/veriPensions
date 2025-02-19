// Search and Filter Functionality
const searchBar = document.getElementById('sms-search');
const statusFilter = document.getElementById('status-filter');

searchBar.addEventListener('input', filterSmsLogs);
statusFilter.addEventListener('change', filterSmsLogs);

function filterSmsLogs() {
    const searchQuery = searchBar.value.toLowerCase();
    const status = statusFilter.value.toLowerCase();
    
    const rows = document.querySelectorAll('#sms-log-table tbody tr');
    
    rows.forEach(row => {
        const name = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const date = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        const statusMatch = status === "" || row.querySelector('td:nth-child(4)').textContent.toLowerCase().includes(status);
        const searchMatch = name.includes(searchQuery) || date.includes(searchQuery);
        
        if (statusMatch && searchMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Modal functionality for sending SMS
const sendSmsBtn = document.getElementById('send-sms');
const modal = document.getElementById('send-sms-modal');
const closeModalBtn = document.getElementById('close-modal');

sendSmsBtn.addEventListener('click', () => {
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

// Form submission for sending SMS
document.getElementById('send-sms-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const recipients = Array.from(document.getElementById('recipient').selectedOptions).map(option => option.value);
    const messageContent = document.getElementById('message-content').value;
    
    alert(`SMS sent to: ${recipients.join(', ')}\nMessage: ${messageContent}`);
    modal.style.display = 'none';
});
