<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "petnames";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$petName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate"])) {
    $sql = "SELECT name FROM names ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $petName = $row["name"];

        $_SESSION['generatedName'] = $petName;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Name Generator</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Zen+Antique&display=swap" rel="stylesheet">
</head>

<body class="fade-in">
  <header>
    <h1 id="logo"><a href="index.php">MYNEWPAW</a></h1>
  </header>

  <section class="main">
    <p id="question">Can't decide on a name for your new pet?</p>
    <p id="big-text">Let fate decide</p>

    <form method="post">
        <button id="generate-name" type="submit" name="generate">Get a name</button>
    </form>

    <?php if (!empty($petName)) : ?>
        <p id="generatedName">
            congratulations! Your new pet's name is
            <br><br>
            <span id="pet-name"><?= $petName ?></span>
        </p>

        <form method="post" action="shop.php">
            <input type="hidden" name="petName" value="<?php echo $petName; ?>">
            <button id="buyGiftButton" type="submit" name="buyGift">Buy a gift for <?= $petName ?></button>
        </form>
    <?php endif; ?>
  </section>
</body>
</html>