// Toggle sidebar collapse functionality
const sideNav = document.querySelector('.side-nav');
const collapseButton = document.getElementById('collapse-sidebar');

// Add event listener to collapse button
collapseButton.addEventListener('click', () => {
    sideNav.classList.toggle('collapsed');
    document.querySelector('.main-content').style.marginLeft = sideNav.classList.contains('collapsed') ? '70px' : '250px';
});
