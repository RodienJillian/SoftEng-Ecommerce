<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuddle Paws</title>
    
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/viewProducts.css">
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
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
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
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224064/turkeywithliver_khsioz.webp" alt="Product Image" id="current-product-image" style="width: 100%; max-width: 300px;">
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
                <h4>Product Name</h4>
                <h5>Price</h5>
                <p> Description</p>
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
            const productName = "Product Name"; // Replace with actual product name
            const productPrice = "Product Price"; // Replace with actual product price

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
