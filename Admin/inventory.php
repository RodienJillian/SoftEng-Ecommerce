<?php
include 'database.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="inventory.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">Admin</a>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <div class="sidebar">
            <button class="sidebar-toggle" onclick="toggleSidebar()">&#x21A4;</button>
            <div class="logo-container">
                <img src="https://res.cloudinary.com/dpxfbom0j/image/upload/v1728791049/Ellipse_9_llomyf.png" alt="Cuddle Paws Logo" class="paw-logo">
                <a href="#" class="logo-text">Cuddle <span>Paws</span></a>
            </div>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </div>
        
        <script>
            const sidebar = document.querySelector('.sidebar');
            const toggleButton = document.querySelector('.sidebar-toggle');
    
            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                
                if (sidebar.classList.contains('collapsed')) {
                    toggleButton.textContent = '↦';
                } else {
                    toggleButton.textContent = '↤';
                }
            });
        </script>

        <div class="inventory">
            <h1>Inventory</h1>
            <div class="products-header">
                <h2>PRODUCTS</h2>
                <button class="add-product-btn">+ Add Product</button>
            </div>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Stocks</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td>{$product['Product_Id']}</td>";
                        echo "<td>{$product['Product_Name']}</td>";
                        echo "<td>{$product['Product_Description']}</td>";
                        echo "<td><img src='{$product['Product_ImageUrl']}' alt='{$product['Product_Name']}' width='50'></td>";
                        echo "<td>{$product['Product_Category']}</td>";
                        echo "<td>{$product['Product_Stocks']}</td>";
                        echo "<td>{$product['Product_Price']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
