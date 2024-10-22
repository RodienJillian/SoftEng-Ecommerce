<?php
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

// Function to fetch products by category
function fetchProductsByCategory($conn, $category) {
    $sql = "SELECT * FROM products WHERE Product_Category = '$category'";
    $result = $conn->query($sql);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuddle Paws</title>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/shop.css">    
    <link rel="stylesheet" href="css/viewProducts.css">
    <style>
        /* Modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black background with transparency */
        }

        .modal-content {
            background-color: transparent;
            margin: 5% auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 80%; /* Adjust width as needed */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute; /* Position it absolutely */
            top: 120px; /* Adjust as needed */
            right: 195px; /* Adjust as needed */
            color: black;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black; /* Change color on hover */
            text-decoration: none; /* No underline */
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop1.php">Shop</a></li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <li><a href="signup.php">Log In/Sign Up</a></li>
            </ul>
            <input type="text" placeholder="🔍 Search">
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
                <a href="#">Cuddle Paws</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="CuddlePaws">
            <h3>SHOP BY PET</h3>
            <section class="pets-category">
                <div class="dog" onclick="toggleDropdown('dogDropdown')">
                    <a href="#Shop_Dog">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728379963/Add_a_heading_2_rmeo7b.png">
                    </a>
                </div>
                <div class="cat" onclick="toggleDropdown('catDropdown')">
                    <a href="#Shop_Cat">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380501/Add_a_heading_6_ylmccn.png">
                    </a>
                </div>
                <div class="fish" onclick="toggleDropdown('fishDropdown')">
                    <a href="#Shop_fish">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_4_sern0a.png">
                    </a>
                </div>
                <div class="smallPet" onclick="toggleDropdown('smallPetDropdown')">
                    <a href="#Shop_smallPet">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_5_cewynu.png">
                    </a>
                </div>
            </section>
        </div>

        <!-- Dog Products -->
        <section class="Shop_Dog" id="Shop_Dog">
            <h2>Shop for Dogs</h2>
            <div class="shopDog" id="dogDropdown" class="dropdown-content">
                <div>Dog Foods</div>
                <div class="product-cards">
                    <?php
                    $dogProducts = fetchProductsByCategory($conn, 'Dog Food');
                    if ($dogProducts->num_rows > 0) {
                        while($product = $dogProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';

                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
                <div>Dog Treats</div>
                    <div class="product-cards">
                    <?php
                    $dogProducts = fetchProductsByCategory($conn, 'Dog Treats');
                    if ($dogProducts->num_rows > 0) {
                        while($product = $dogProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';

                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                </div>
                <div>Dog Supplies</div>
                    <div class="product-cards">
                    <?php
                    $dogProducts = fetchProductsByCategory($conn, 'Dog Supplies');
                    if ($dogProducts->num_rows > 0) {
                        while($product = $dogProducts->fetch_assoc()) {
                            // Ensure all fields are properly sanitized for HTML output
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Repeat similar structure for Cat, Fish, and Small Pet categories -->
        <section class="Shop_Cat" id="Shop_Cat">
            <h2>Shop for Cats</h2>
            <div class="shopCat" id="catDropdown" class="dropdown-content">
                <div>Cat Foods</div>
                <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Food');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
                <div>Cat Treats</div>
                <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Treats');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
                    <div>Cat Supplies</div>
                    <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Cat Supplies');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                    </div>
            </div>
        </section>

        <section class="Shop_fish" id="Shop_fish">
            <h2>Shop for Fish</h2>
            <div class="shopFish" id="fishDropdown" class="dropdown-content">
                <div class="product-cards">
                    <?php
                    $fishProducts = fetchProductsByCategory($conn, 'Fish');
                    if ($fishProducts->num_rows > 0) {
                        while($product = $fishProducts->fetch_assoc()) {
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="Shop_smallPet" id="Shop_smallPet">
            <h2>Shop for Small Pets</h2>
            <div class="shopSmallPet" id="smallPetDropdown" class="dropdown-content">
                <div class="product-cards">
                    <?php
                    $smallPetProducts = fetchProductsByCategory($conn, 'Small Pet');
                    if ($smallPetProducts->num_rows > 0) {
                        while($product = $smallPetProducts->fetch_assoc()) {
                            $productImage = htmlspecialchars(addslashes($product['Product_ImageUrl']));
                            $productName = htmlspecialchars(addslashes($product['Product_Name']));
                            $productPrice = htmlspecialchars(addslashes($product['Product_Price']));
                            $productDescription = htmlspecialchars(addslashes($product['Product_Description']));

                            echo '
                            <div class="card" onclick="openModal(\'' . $productImage . '\', \'' . $productName . '\', \'' . $productPrice . '\', \'' . $productDescription . '\')">
                                <img src="' . $productImage . '" alt="' . $productName . '">
                                <div class="card-title">' . $productName . '</div>
                                <p class="price">P ' . $productPrice . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="productModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="container">
                    <div class="product-image">
                        <img id="modalProductImage" src="" alt="">
                    </div>
                    <div class="product-info">
                        <div class="product-description">
                            <h2 id="modalProductName"></h2>
                            <p id="modalProductPrice"></p>
                            <p id="modalProductDescription"></p>
                        </div>
                        <div class="btn">
                            <div class="counter-container">
                                <button id="decrease" class="btn">-</button>
                                <span id="number" class="number">1</span>
                                <button id="increase" class="btn">+</button>
                            </div>
                            <div class="addToCart" id="btnAddtoCart" onclick="addToCart()">
                                <h3>Add to Cart</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <p><strong>Email:</strong><br>
                    cuddlepawsph@gmail.com</p>
                </div>
                <div class="footer-section">
                    <p><strong>Phone:</strong><br>
                    (63) 947-703-0508<br>
                    (63) 927-704-6513<br>
                    (63) 927-283-0230</p>
                </div>
                <div class="footer-section">
                    <p><strong>Address:</strong><br>
                    Poblacion, Pandi,<br>
                    Bulacan, Philippines</p>
                </div>
            </div>
            <p class="footer-bottom">For educational purposes only</p>
            <p class="footer-bottom">&copy;2024 Cuddle Paws. All rights reserved.</p>
        </footer>

        <script>
        // Function to open the modal with product details
        function openModal(imageUrl, productName, productPrice, productDescription) {
            // Reset quantity to 1 in the modal
            document.getElementById('modalProductImage').src = imageUrl;
            document.getElementById('modalProductName').innerText = productName;
            document.getElementById('modalProductPrice').innerText = 'P ' + productPrice;
            document.getElementById('modalProductDescription').innerText = productDescription;
            
            // Show the modal
            document.getElementById('productModal').style.display = 'block';

            // Reset counter
            document.getElementById('number').innerText = '1';
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
        }

        // Functions to increase/decrease product quantity
        document.getElementById('increase').addEventListener('click', function() {
            const numberElement = document.getElementById('number');
            let currentValue = parseInt(numberElement.innerText);
            numberElement.innerText = currentValue + 1;
        });

        document.getElementById('decrease').addEventListener('click', function() {
            const numberElement = document.getElementById('number');
            let currentValue = parseInt(numberElement.innerText);
            if (currentValue > 1) {
                numberElement.innerText = currentValue - 1;
            }
        });

        // Function to add the selected item to the cart
        function addToCart() {
            const quantity = document.getElementById('number').innerText;
            const productName = document.getElementById('modalProductName').innerText;
            const productPrice = document.getElementById('modalProductPrice').innerText;

            // Here you can implement the logic to store the item in the cart
            // This could be local storage, session storage, or an API call to save it on the server
            console.log(`Added to cart: ${productName} | Price: ${productPrice} | Quantity: ${quantity}`);

            // Close the modal after adding to cart
            closeModal();
        }

        // Event listener for clicking outside the modal to close it
        window.onclick = function(event) {
            const modal = document.getElementById('productModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Counter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseBtn = document.querySelector('.btn#decrease');
            const increaseBtn = document.querySelector('.btn#increase');
            const quantityElement = document.querySelector('.number');

            // Initial state: disable decrease button if quantity is 1
            if (parseInt(quantityElement.textContent) === 1) {
                decreaseBtn.disabled = true;
                decreaseBtn.classList.add('disabled');
            }

            // Function to update the counter and disable decrease button if necessary
            function updateCounter() {
                const count = parseInt(quantityElement.textContent);

                // Disable decrease button if the quantity is 1, enable otherwise
                if (count <= 1) {
                    decreaseBtn.disabled = true;
                    decreaseBtn.classList.add('disabled');
                } else {
                    decreaseBtn.disabled = false;
                    decreaseBtn.classList.remove('disabled');
                }
            }

            // Decrease button functionality
            decreaseBtn.addEventListener('click', function() {
                let currentCount = parseInt(quantityElement.textContent);
                if (currentCount > 1) {
                    quantityElement.textContent = currentCount - 1;
                }
                updateCounter();
            });

            // Increase button functionality
            increaseBtn.addEventListener('click', function() {
                let currentCount = parseInt(quantityElement.textContent);
                quantityElement.textContent = currentCount + 1;
                updateCounter();
            });
        });

        // Add to cart functionality (dummy placeholder)
        function addToCart() {
            const quantity = document.querySelector('.number').textContent;
            alert('Added ' + quantity + ' item(s) to the cart.');
            // Here, you can implement the logic to add the product to the shopping cart.
        }
    </script>



</body>
</html>
