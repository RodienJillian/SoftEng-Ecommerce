function updateCounter(row) {
    const quantityElement = row.querySelector('.number');
    const decreaseButton = row.querySelector('.btn#decrease');
    const count = parseInt(quantityElement.textContent);

    // Update the displayed number in the counter
    quantityElement.textContent = count;

    // Disable the decrease button if count is 1, otherwise enable it
    if (count <= 1) {
        decreaseButton.disabled = true;
        decreaseButton.classList.add('disabled');
    } else {
        decreaseButton.disabled = false;
        decreaseButton.classList.remove('disabled');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll('.cart-table tbody tr');

    // Function to handle quantity changes for each row
    rows.forEach(row => {
        const decreaseBtn = row.querySelector('.btn#decrease');
        const increaseBtn = row.querySelector('.btn#increase');
        const quantityElement = row.querySelector('.number');
        
        let count = parseInt(quantityElement.textContent);

        // Update counter initially for each row
        updateCounter(row);

        // Decrease button functionality
        decreaseBtn.addEventListener('click', function() {
            if (count > 1) {
                count--;
                quantityElement.textContent = count;
                updateCounter(row);
                calculateTotal(); // Recalculate the total after quantity change
            }
        });

        // Increase button functionality
        increaseBtn.addEventListener('click', function() {
            count++;
            quantityElement.textContent = count;
            updateCounter(row);
            calculateTotal(); // Recalculate the total after quantity change
        });
    });

    // Initial total calculation
    calculateTotal();
});


document.addEventListener("DOMContentLoaded", function() {
    const totalAmountElement = document.querySelector('.total-amount');
    const rows = document.querySelectorAll('.cart-table tbody tr');

    // Function to calculate and update the total price for each row
    function calculateRowTotal(row) {
        const priceCell = row.querySelector('td:nth-child(2)'); // Price column
        const quantityCell = row.querySelector('.quantity .number'); // Quantity element
        const totalPriceCell = row.querySelector('td:nth-child(4)'); // Total Price column

        // Get the price and remove 'P' and commas
        let priceText = priceCell.textContent.replace('P', '').trim().replace(/,/g, '');
        const price = parseFloat(priceText);

        // Get the quantity
        const quantity = parseInt(quantityCell.textContent);

        // Calculate total price for this row
        const totalRowPrice = price * quantity;

        // Update the Total Price cell with formatted value
        totalPriceCell.textContent = `P ${totalRowPrice.toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    }

    // Function to calculate and update the overall total
    function calculateTotal() {
        let total = 0;

        rows.forEach(row => {
            calculateRowTotal(row); // Update the row's total price

            const totalPriceCell = row.querySelector('td:nth-child(4)');
            let totalPriceText = totalPriceCell.textContent.replace('P', '').trim().replace(/,/g, '');
            const rowTotal = parseFloat(totalPriceText);

            total += rowTotal;
        });

        // Update the overall total price
        totalAmountElement.textContent = `P ${total.toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    }

    // Event listeners for quantity increment/decrement buttons
    rows.forEach(row => {
        const decreaseBtn = row.querySelector('.btn#decrease');
        const increaseBtn = row.querySelector('.btn#increase');
        const quantityElement = row.querySelector('.number');

        decreaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityElement.textContent);
            if (currentQuantity > 1) {
                quantityElement.textContent = currentQuantity - 1;
                calculateTotal(); // Recalculate total after changing quantity
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = currentQuantity + 1;
            calculateTotal(); // Recalculate total after changing quantity
        });
    });

    // Initial total calculation
    calculateTotal();
});


document.addEventListener("DOMContentLoaded", function() {
    const totalAmountElement = document.querySelector('.total-amount');

    function calculateTotal() {
        let total = 0;
        const rows = document.querySelectorAll('.cart-table tbody tr');

        rows.forEach(row => {
            const priceCell = row.querySelector('td:nth-child(4)'); // Select the "Total Price" cell
            let priceText = priceCell.textContent.replace('P', '').trim(); // Remove 'P'
            priceText = priceText.replace(/,/g, ''); // Remove any commas
            const price = parseFloat(priceText);
            total += price;
        });

        totalAmountElement.textContent = `P ${total.toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`; // Format the total with commas
    }

    calculateTotal();
});

