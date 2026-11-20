<?php
$conn = new mysqli("localhost", "root", "", "agriculture_db");

if ($conn->connect_error) {
    die("Database connection failed");
}

$result = $conn->query("SELECT * FROM fertilizers");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fertilizer Information</title>
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

    <h2>Fertilizer Information</h2>
    <p class="subtitle">Learn about fertilizers and nutrients</p>

    <div class="info-grid">

        <?php while($item = $result->fetch_assoc()) { ?>

        <div class="info-card">

            <h3>🧪 <?php echo htmlspecialchars($item['name']); ?></h3>

            <p><b>Type:</b> <?php echo htmlspecialchars($item['type']); ?></p>

            <p><b>Nutrients:</b> <?php echo htmlspecialchars($item['nutrients']); ?></p>

            <p><?php echo htmlspecialchars($item['description']); ?></p>

        </div>

        <?php } ?>

    </div>

</section>

<footer>
    <p>Smart Agriculture Information System</p>
</footer>

</body>
</html>