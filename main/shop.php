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
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <header>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="shop1.php">Shop</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="index.html#about-us">About</a></li>
                    <li><a href="signup.html">Log In/Sign Up</a></li>
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
                                echo '
                                <div class="card">
                                    <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                    <div class="card-title">' . $product['Product_Name'] . '</div>
                                    <p class="price">P ' . $product['Product_Price'] . '</p>
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
                                echo '
                                <div class="card">
                                    <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                    <div class="card-title">' . $product['Product_Name'] . '</div>
                                    <p class="price">P ' . $product['Product_Price'] . '</p>
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
                                echo '
                                <div class="card">
                                    <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                    <div class="card-title">' . $product['Product_Name'] . '</div>
                                    <p class="price">P ' . $product['Product_Price'] . '</p>
                                </div>';
                            }
                        } else {
                            echo '<p>No products available.</p>';
                        }
                        ?>
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
                                echo '
                                <div class="card">
                                    <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                    <div class="card-title">' . $product['Product_Name'] . '</div>
                                    <p class="price">P ' . $product['Product_Price'] . '</p>
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
                                    echo '
                                    <div class="card">
                                        <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                        <div class="card-title">' . $product['Product_Name'] . '</div>
                                        <p class="price">P ' . $product['Product_Price'] . '</p>
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
                                echo '
                                <div class="card">
                                    <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                    <div class="card-title">' . $product['Product_Name'] . '</div>
                                    <p class="price">P ' . $product['Product_Price'] . '</p>
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
                    $catProducts = fetchProductsByCategory($conn, 'Fish');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            echo '
                            <div class="card">
                                <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                <div class="card-title">' . $product['Product_Name'] . '</div>
                                <p class="price">P ' . $product['Product_Price'] . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
        </section>
        <section class="Shop_smallPet" id="Shop_smallPet">
            <h2>Shop for Small Pets</h2>
            <div class="shopSmallPet" id="smallPetDropdown" class="dropdown-content">
                <div class="product-cards">
                    <?php
                    $catProducts = fetchProductsByCategory($conn, 'Small Pet');
                    if ($catProducts->num_rows > 0) {
                        while($product = $catProducts->fetch_assoc()) {
                            echo '
                            <div class="card">
                                <img src="' . $product['Product_ImageUrl'] . '" alt="' . $product['Product_Name'] . '">
                                <div class="card-title">' . $product['Product_Name'] . '</div>
                                <p class="price">P ' . $product['Product_Price'] . '</p>
                            </div>';
                        }
                    } else {
                        echo '<p>No products available.</p>';
                    }
                    ?>
                </div>
        </section>
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
</body>
</html>

<?php
$conn->close();
?>
