<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Agriculture Information System</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">🌱 SmartAgri</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="crops.php">Crops</a>
        <a href="fertilizers.php">Fertilizers</a>
        <a href="tips.php">Farming Tips</a>

        <?php if(isset($_SESSION["farmer"])) { ?>

            <span style="color:green;font-weight:bold;">
                Welcome, <?php echo htmlspecialchars($_SESSION["farmer"]); ?>!
            </span>

            <a href="logout.php" class="nav-btn">Logout</a>

        <?php } else { ?>

            <a href="login.php">Login</a>
            <a href="register.php" class="nav-btn">Register</a>

        <?php } ?>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">

        <?php if(isset($_SESSION["farmer"])) { ?>

            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["farmer"]); ?>! 👋</h1>

            <p>
                Welcome to Smart Agriculture Information System.
                Explore crops, fertilizers and useful farming tips
                for better agricultural practices.
            </p>

        <?php } else { ?>

            <h1>Smart Farming for a Better Future</h1>

            <p>
                Discover crops, fertilizers and farming practices
                that help farmers make better agricultural decisions.
            </p>

        <?php } ?>

        <a href="crops.php" class="btn">Explore Crops</a>

        <a href="register.php" class="btn btn-light">Join Us</a>

    </div>
</section>

<section class="section">

    <h2>Explore Agriculture Information</h2>

    <p class="subtitle">
        Everything a farmer needs in one place.
    </p>

    <div class="cards">

        <div class="card">
            <div class="icon">🌾</div>
            <h3>Crop Information</h3>
            <p>
                Explore crops, soil requirements,
                seasons and growing duration.
            </p>
            <a href="crops.php">Explore Crops →</a>
        </div>

        <div class="card">
            <div class="icon">🧪</div>
            <h3>Fertilizer Guide</h3>
            <p>
                Learn about fertilizers, nutrients
                and their agricultural uses.
            </p>
            <a href="fertilizers.php">Explore Fertilizers →</a>
        </div>

        <div class="card">
            <div class="icon">📚</div>
            <h3>Farming Tips</h3>
            <p>
                Learn helpful farming practices,
                irrigation and crop management.
            </p>
            <a href="tips.php">Read Tips →</a>
        </div>

    </div>
</section>

<section class="about">

    <h2>About Smart Agriculture</h2>

    <p>
        Smart Agriculture Information System is a digital platform
        designed to provide farmers with accessible agricultural
        information. It helps users learn about crops, fertilizers
        and farming techniques through a simple website.
    </p>

</section>

<footer>
    <p>© 2026 Smart Agriculture Information System</p>
    <p>Supporting farmers with accessible agricultural information 🌿</p>
</footer>

</body>
</html>