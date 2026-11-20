<?php
$conn = new mysqli("localhost", "root", "", "agriculture_db");

if ($conn->connect_error) {
    die("Database connection failed");
}

$result = $conn->query("SELECT * FROM crops");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crop Information - SmartAgri</title>
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
    <h2>Crop Information</h2>
    <p>Explore crops and their growing requirements</p>

    <input type="text" id="cropSearch" placeholder="Search crops...">
    <button onclick="searchItems('cropSearch','crop-card')">Search</button>

    <div class="info-grid">

        <?php while($crop = $result->fetch_assoc()) { ?>

        <div class="info-card crop-card">
            <h3>🌾 <?php echo htmlspecialchars($crop['name']); ?></h3>

            <p><b>Season:</b> <?php echo htmlspecialchars($crop['season']); ?></p>
            <p><b>Soil:</b> <?php echo htmlspecialchars($crop['soil']); ?></p>
            <p><b>Water:</b> <?php echo htmlspecialchars($crop['water']); ?></p>
            <p><b>Duration:</b> <?php echo htmlspecialchars($crop['duration']); ?></p>
            <p><?php echo htmlspecialchars($crop['description']); ?></p>
        </div>

        <?php } ?>

    </div>
</section>

<script src="script.js"></script>
</body>
</html>