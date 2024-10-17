function toggleDropdown(menuId) {
    var menu = document.getElementById(menuId);
    menu.classList.toggle('show');
}
function toggleDropdown(menuId) {
    const menu = document.getElementById(menuId);
    menu.classList.toggle('show');
}

let currentItem = 0; // You can maintain a list of best seller items to track the current index
function navigateNext() {
    currentItem++;
    // Logic to load the next item
}

function navigateBack() {
    currentItem--;
    // Logic to load the previous item
}
