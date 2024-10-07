// script.js

// Function to handle dropdown toggle
function setupDropdown(buttonId, listId) {
    const button = document.getElementById(buttonId);
    const list = document.getElementById(listId);

    button.addEventListener('click', function() {
        const isVisible = list.style.display === 'block';
        list.style.display = isVisible ? 'none' : 'block';
    });

    // Handle click on category items
    const items = list.querySelectorAll('.category-item');
    items.forEach(item => {
        item.addEventListener('click', function() {
            const selectedValue = this.getAttribute('data-value');
            console.log(`Selected category: ${selectedValue}`);
            list.style.display = 'none'; // Hide the list after selection
        });
    });
}

// Setup both dropdowns
setupDropdown('dog-category-button', 'dog-category-list');
setupDropdown('cat-category-button', 'cat-category-list');

// Close the list when clicking outside of it
window.addEventListener('click', function(event) {
    const buttons = document.querySelectorAll('.category-button');
    const lists = document.querySelectorAll('.category-list');

    buttons.forEach(button => {
        if (!button.contains(event.target)) {
            const list = button.nextElementSibling;
            list.style.display = 'none'; // Hide the list if clicked outside
        }
    });
});
