// inventory.js

const productRows = document.getElementById('product-rows');
const sidebar = document.querySelector('.sidebar');
const toggleButton = document.querySelector('.sidebar-toggle');
const addProductBtn = document.querySelector('.add-product-btn');
const tableBody = document.querySelector('.inventory-table tbody');
let isEditing = false; // Flag to indicate if we are in edit mode

// Sidebar toggle functionality
toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    
    // Update the button content based on the sidebar's state
    if (sidebar.classList.contains('collapsed')) {
        toggleButton.textContent = '↦'; // Reverse symbol when collapsed
    } else {
        toggleButton.textContent = '↤'; // Normal symbol when expanded
    }
});

// Create a single input row for adding products
const inputRow = document.createElement('tr');
inputRow.innerHTML = `
    <td><input type="text" name="product_name" placeholder="Product Name" required></td>
    <td><input type="text" name="product_category" placeholder="Category" required></td>
    <td><input type="number" name="product_stocks" placeholder="Stocks" required></td>
    <td><input type="number" name="product_price" placeholder="Price" required></td>
    <td>
        <button class="save-btn">Add</button>
        <button class="cancel-btn">Cancel</button>
    </td>
`;
tableBody.appendChild(inputRow);
inputRow.style.display = 'none'; // Hide input row initially

addProductBtn.addEventListener('click', () => {
    // Show the input row when the button is clicked
    if (!isEditing) {
        inputRow.style.display = 'table-row'; // Display the input row
        inputRow.querySelector('input[name="product_name"]').focus(); // Focus on the first input
        isEditing = true; // Set editing flag
    } else {
        alert("Please save or cancel the current product before adding a new one.");
    }
});

// Add functionality to the 'Add' button inside the input row
const saveBtn = inputRow.querySelector('.save-btn');
saveBtn.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default form submission

    // Collect input data from the row
    const inputs = inputRow.querySelectorAll('input');
    const data = {
        product_name: inputs[0].value,
        product_category: inputs[1].value,
        product_stocks: inputs[2].value,
        product_price: inputs[3].value,
        add_product: true // Indicate that this is an add product request
    };

    // Send AJAX request to add the product
    fetch('', { // Using empty string to refer to the current PHP file
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            // Create a new row for the added product
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${data.product_name}</td>
                <td>${data.product_category}</td>
                <td>${data.product_stocks}</td>
                <td>${data.product_price}</td>
                <td><button class="edit-btn" data-id="${result.product_id}">Edit</button></td>
            `;
            tableBody.appendChild(newRow);
            inputRow.style.display = 'none'; // Hide the input row again
            isEditing = false; // Reset editing flag
        } else {
            alert('Error adding product: ' + result.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

// Add functionality to the 'Cancel' button
const cancelBtn = inputRow.querySelector('.cancel-btn');
cancelBtn.addEventListener('click', function () {
    inputRow.style.display = 'none'; // Hide the input row
    isEditing = false; // Reset editing flag
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('edit-btn')) {
        const row = event.target.closest('tr'); // Get the current row
        const cells = row.querySelectorAll('td'); // Get all the cells in the row

        // Get current product values from the row
        const currentName = cells[0].innerText;
        const currentCategory = cells[1].innerText;
        const currentStocks = cells[2].innerText;
        const currentPrice = cells[3].innerText;

        // Get the product ID from data attribute
        const productId = event.target.getAttribute('data-id'); // Assuming you have the product ID stored in a data attribute

        // Replace the row content with input fields for editing
        row.innerHTML = `
            <td><input type="text" name="edit_product_name" value="${currentName}" required></td>
            <td><input type="text" name="edit_product_category" value="${currentCategory}" required></td>
            <td><input type="number" name="edit_product_stocks" value="${currentStocks}" required></td>
            <td><input type="number" name="edit_product_price" value="${currentPrice}" required></td>
            <td>
                <button class="save-btn">Save</button>
                <button class="cancel-btn">Cancel</button>
            </td>
        `;

        // Add event listener for the Save button
        row.querySelector('.save-btn').addEventListener('click', function() {
            const updatedName = row.querySelector('input[name="edit_product_name"]').value;
            const updatedCategory = row.querySelector('input[name="edit_product_category"]').value;
            const updatedStocks = row.querySelector('input[name="edit_product_stocks"]').value;
            const updatedPrice = row.querySelector('input[name="edit_product_price"]').value;

            const data = {
                product_id: productId, // Add the product ID to the data
                product_name: updatedName,
                product_category: updatedCategory,
                product_stocks: updatedStocks,
                product_price: updatedPrice,
                update_product: true // Indicate this is an update request
            };

            // Send the updated data via fetch
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    // Replace the input fields with updated values
                    row.innerHTML = `
                        <td>${updatedName}</td>
                        <td>${updatedCategory}</td>
                        <td>${updatedStocks}</td>
                        <td>${updatedPrice}</td>
                        <td><button class="edit-btn" data-id="${productId}">Edit</button></td>
                    `;
                } else {
                    alert('Error updating product: ' + result.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Add event listener for the Cancel button
        row.querySelector('.cancel-btn').addEventListener('click', function() {
            // Restore the original row content
            row.innerHTML = `
                <td>${currentName}</td>
                <td>${currentCategory}</td>
                <td>${currentStocks}</td>
                <td>${currentPrice}</td>
                <td><button class="edit-btn" data-id="${productId}">Edit</button></td>
            `;
        });
    }
});
