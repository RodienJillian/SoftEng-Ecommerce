const sidebar = document.querySelector('.sidebar');
const toggleButton = document.querySelector('.sidebar-toggle');

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    
    // Update the button content based on the sidebar's state
    if (sidebar.classList.contains('collapsed')) {
        toggleButton.textContent = '↦'; // Reverse symbol when collapsed
    } else {
        toggleButton.textContent = '↤'; // Normal symbol when expanded
    }
});