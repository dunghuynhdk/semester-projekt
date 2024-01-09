<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop Gifts</title>
  <link rel="stylesheet" href="css/shop.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Zen+Antique&display=swap" rel="stylesheet">
  <script src="scripts/shop.js" defer></script>
</head>

<body class="fade-in">
  <header>
    <h1 id="logo"><a href="index.php">MYNEWPAW</a></h1>
    <a href="cart.php" id="cartLink">
      <div id="cartIcon"></div>
    </a>
  </header>

  <section class="main">
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buyGift"])) {
      if (isset($_SESSION['generatedName'])) {
        $petName = $_SESSION['generatedName'];
        echo "<p id='pageTitle'>Shop gifts for <span id='shop-petname'>$petName</span></p>";
      } else {
        echo "<p>No pet name selected. Please go back and generate a name.</p>";
      }
    } else {
      echo "<p>No pet name selected. Please go back and generate a name.</p>";
    }
    ?>

    <div id="sliderContainer">
      <div id="slider">
        <div class="productColumn">
          <div class="productTitle">Pet Bandana Collar</div>
          <img class="productImage" src="images/product1.png" alt="Product 1">
          <div class="productPrice">$10.07</div>
          <button class="addToCartButton" onclick="addToCart('Product1', 'Pet Bandana Collar', 10.07)">Add to Cart</button>
        </div>

        <div class="productColumn">
          <div class="productTitle">Pet Hoodie</div>
          <img class="productImage" src="images/product2.png" alt="Product 2">
          <div class="productPrice">$19.40</div>
          <button class="addToCartButton" onclick="addToCart('Product2', 'Pet Hoodie', 19.40)">Add to Cart</button>
        </div>

        <div class="productColumn">
          <div class="productTitle">Pet Tank Top</div>
          <img class="productImage" src="images/product3.png" alt="Product 3">
          <div class="productPrice">$20.15</div>
          <button class="addToCartButton" onclick="addToCart('Product3', 'Pet Tank Top', 20.15)">Add to Cart</button>
        </div>

        <div class="productColumn">
          <div class="productTitle">Pet Tag</div>
          <img class="productImage" src="images/product4.png" alt="Product 4">
          <div class="productPrice">$7.76</div>
          <button class="addToCartButton" onclick="addToCart('Product4', 'Pet Tag', 7.76)">Add to Cart</button>
        </div>

        <div class="productColumn">
          <div class="productTitle">Pet Bowl</div>
          <img class="productImage" src="images/product5.png" alt="Product 5">
          <div class="productPrice">$22.16</div>
          <button class="addToCartButton" onclick="addToCart('Product5', 'Pet Bowl', 22.16)">Add to Cart</button>
        </div>

        <div class="productColumn">
          <div class="productTitle">Pet Feeding Mat</div>
          <img class="productImage" src="images/product6.png" alt="Product 6">
          <div class="productPrice">$15.34</div>
          <button class="addToCartButton" onclick="addToCart('Product6', 'Pet Feeding Mat', 15.34)">Add to Cart</button>
        </div>
      </div>

      <div id="leftArrow" onclick="scrollSlider('left')">&#9665;</div>
      <div id="rightArrow" onclick="scrollSlider('right')">&#9655;</div>
    </div>
  </section>

  <footer id="footerLinks">
    <a id="go-back" href="index.php">Go back to generate a name</a>
    <a href="cart.php" id="checkoutLink">Go to cart</a>
  </footer>
</body>

</html>
