<?php
$conn = new mysqli("localhost", "root", "", "agriculture_db");

if ($conn->connect_error) {
    die("Database connection failed");
}

$result = $conn->query("SELECT * FROM tips");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farming Tips</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">🌱 SmartAgri</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="crops.php">Crops</a>
        <a href="fertilizers.php">Fertilizers</a>
        <a href="tips.php">Tips</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<section class="section">

    <h2>Smart Farming Tips</h2>
    <p class="subtitle">Simple ways to improve farming practices</p>

    <div class="cards">

        <?php while($tip = $result->fetch_assoc()) { ?>

        <div class="card">

            <div class="icon">🌿</div>

            <h3><?php echo htmlspecialchars($tip['title']); ?></h3>

            <p><?php echo htmlspecialchars($tip['description']); ?></p>

        </div>

        <?php } ?>

    </div>

</section>

<footer>
    <p>Smart Agriculture Information System</p>
</footer>

</body>
</html>