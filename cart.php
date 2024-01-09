<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCart"])) {
    $product = array(
        'title' => $_POST['productTitle'],
        'quantity' => 1, 
        'price' => $_POST['price'],
        'petName' => $_SESSION['generatedName'],
    );

    $_SESSION['cart'][] = $product;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteItem"])) {
    $index = $_POST['itemIndex'];

    unset($_SESSION['cart'][$index]);

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Zen+Antique&display=swap" rel="stylesheet">
</head>

<body class="fade-in">
    <header>
        <h1 id="logo"><a href="index.php">MYNEWPAW</a></h1>
        <a href="cart.php" id="cartLink">
            <div id="cartIcon"></div>
        </a>
    </header>

    <div class="main">
        <p id="pageTitle">Your Cart</p>

        <div class="cart">
            <?php
            foreach ($_SESSION['cart'] as $index => $product) {
                echo '<div class="cartItem">';
                echo '<div class="productTitle">' . $product['title'] . ' for ' . $product['petName'] . '</div>';
                echo '<div class="quantity">' . $product['quantity'] . '</div>';
                echo '<div class="price">$' . number_format($product['price'], 2) . '</div>';
                echo '<form method="post" class="deleteForm">';
                echo '<input type="hidden" name="itemIndex" value="' . $index . '">';
                echo '<button type="submit" name="deleteItem" class="deleteButton">Delete</button>';
                echo '</form>';
                echo '</div>';

                $totalPrice += $product['price'];
            }
            ?>
        </div>

        <p id="totalPrice">Total: $<?php echo number_format($totalPrice, 2); ?></p>
    </div>

    <footer id="footerLinks">
        <a id="go-back" href="javascript:history.back()">Go back to shop</a>
        <a href="checkout.php" id="checkoutButton">Check out</a>
    </footer>
</body>
</html>