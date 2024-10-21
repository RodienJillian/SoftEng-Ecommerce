<?php
// viewProduct.php
// Database connection
$servername = "localhost";
$username = "root"; // Adjust as needed
$password = ""; // Adjust as needed
$dbname = "cuddlepaws";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the product ID is present in the URL
if (isset($_GET['id'])) {
    $Product_Id = $_GET['id']; // Fixed missing semicolon

    $sql = "SELECT Product_Name, Product_Price, Product_Description, Product_ImageUrl FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $Product_Id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if product exists
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc(); // Changed to $product for consistency
    } else {
        echo "Product not found in the shop.";
        exit;
    }

    $stmt->close();
} else {
    echo "Product ID is not provided.";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuddle Paws</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop1.html">Shop</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <li><a href="login.php">Log In/Sign Up</a></li>
            </ul>
            <input type="text" placeholder="🔍 Search">
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Cuddle Paws Logo">
                <a href="index.php">Cuddle Paws</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="product-variants">
                <div class="variant-box" data-image="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224064/turkeywithliver_khsioz.webp">Variant 1</div>
                <div class="variant-box" data-image="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728658834/random9_plydgh.webp">Variant 2</div>
                <div class="variant-box" data-image="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224066/variant3.jpg">Variant 3</div>
                <div class="variant-box" data-image="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224067/variant4.jpg">Variant 4</div>
            </div>
            <div class="product-image">
                <img src="<?php echo $product['Product_ImageUrl']; ?>" alt="<?php echo $product['Product_Name']; ?>" id="current-product-image" style="width: 100%; max-width: 300px;">
            </div>
            <div class="btn">
                <div class="quantity-selector" id="btnQuant">
                    <button onclick="changeQuantity(-1)">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" readonly>
                    <button onclick="changeQuantity(1)">+</button>
                </div>
                <div class="addToCart" id="btnAddtoCart" onclick="addToCart()">
                    <h3>Add to Cart</h3>
                </div>
            </div>
            <div class="product-description">
                <h4><?php echo $product['Product_Name']; ?></h4> <!-- Display product name -->
                <h5>Price: $<?php echo $product['Product_Price']; ?></h5> <!-- Display product price -->
                <p><?php echo $product['Product_Description']; ?></p> <!-- Display product description -->
            </div>
        </div>
    </main>
    <script>
        function changeQuantity(change) {
            const quantityInput = document.getElementById('quantity');
            let currentQuantity = parseInt(quantityInput.value);
            currentQuantity += change;

            // Ensure the quantity does not go below 1
            if (currentQuantity < 1) {
                currentQuantity = 1;
            }
            quantityInput.value = currentQuantity; // Update the input value
        }

        function addToCart() {
            const quantity = document.getElementById('quantity').value;
            const productName = "<?php echo $product['Product_Name']; ?>"; // Use actual product name
            const productPrice = "<?php echo $product['Product_Price']; ?>"; // Use actual product price

            // Example: Save to localStorage (could be a better structure for a real cart)
            localStorage.setItem('cart', JSON.stringify({ name: productName, price: productPrice, quantity: quantity }));

            // Redirect to cart.html
            window.location.href = 'cart.html';
        }

        document.querySelectorAll('.variant-box').forEach(box => {
            box.addEventListener('click', function() {
                const newImageSrc = this.getAttribute('data-image'); 
                const productImage = document.getElementById('current-product-image'); 
                productImage.src = newImageSrc; // Change the image source
            });
        });
    </script>
</body>
</html>
