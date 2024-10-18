<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cuddlepaws";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch products by category

function fetchProductsByCategory($conn, $category) {
    $stmt = $conn->prepare("SELECT name, price, image_url FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    return $stmt->get_result();
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
    <link rel="stylesheet" href="css/shop1.css">
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
            <section class="pets-category">
                <!-- Categories Section -->
                <div class="dog">
                    <a href="#Shop_Dog" id="scrollIntoView">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728379963/Add_a_heading_2_rmeo7b.png">
                    </a>
                </div>
                <div class="cat">
                    <a href="#shop_Cat" id="scrollIntoView">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380501/Add_a_heading_6_ylmccn.png">
                    </a>
                </div>
                <div class="smallPet">
                    <a href="#shop_smallPet" id="scrollIntoView">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_5_cewynu.png">
                    </a>
                </div>
                <div class="fish">
                    <a href="#shop_fish" id="scrollIntoView">
                        <img src="https://res.cloudinary.com/dpjhzyge9/image/upload/v1728380500/Add_a_heading_4_sern0a.png">
                    </a>
                </div>
              
            </section>
        </div>
        
        <!-- Dog Products -->
        <section class="Shop_Dog" id="Shop_Dog">
            <h2>Shop for Dogs</h2>
            <div class="shopDog">
                <?php
                $dogProducts = fetchProductsByCategory($conn, 'dog');
                if ($dogProducts->num_rows > 0) {
                    while ($product = $dogProducts->fetch_assoc()) {
                        echo '<div class="allItems-Card">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["name"] . '">';
                        echo '<h3>' . $product["name"] . '</h3>';
                        echo '<p class="price">₱ ' . number_format($product["price"], 2) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
                }
                ?>
            </div>
        </section>

        <!-- Cat Products -->
        <section class="shop_Cat" id="shop_Cat">
            <h2>Shop for Cats</h2>
            <div class="shopCat">
                <?php
                $catProducts = fetchProductsByCategory($conn, 'cat');
                if ($catProducts->num_rows > 0) {
                    while ($product = $catProducts->fetch_assoc()) {
                        echo '<div class="allItems-Card">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["name"] . '">';
                        echo '<h3>' . $product["name"] . '</h3>';
                        echo '<p class="price">₱ ' . number_format($product["price"], 2) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
                }
                ?>
            </div>
        </section>
        <!--Small Pet Products -->
        <section class="shop_smallPet" id="shop_smallPet">
            <h2>Shop for Small Pets</h2>
            <div class="shopPet">
                <?php
                $catProducts = fetchProductsByCategory($conn, 'cat');
                if ($catProducts->num_rows > 0) {
                    while ($product = $catProducts->fetch_assoc()) {
                        echo '<div class="allItems-Card">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["name"] . '">';
                        echo '<h3>' . $product["name"] . '</h3>';
                        echo '<p class="price">₱ ' . number_format($product["price"], 2) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
                }
                ?>
            </div>
        </section>
        <!-- Fish Products-->
        <section class="shop_fish" id="shop_fish">
            <h2>Shop for Cats</h2>
            <div class="shopfish">
                <?php
                $catProducts = fetchProductsByCategory($conn, 'cat');
                if ($catProducts->num_rows > 0) {
                    while ($product = $catProducts->fetch_assoc()) {
                        echo '<div class="allItems-Card">';
                        echo '<img src="' . $product["image_url"] . '" alt="' . $product["name"] . '">';
                        echo '<h3>' . $product["name"] . '</h3>';
                        echo '<p class="price">₱ ' . number_format($product["price"], 2) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>
