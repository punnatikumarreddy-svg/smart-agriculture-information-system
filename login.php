<?php
session_start();

$conn = new mysqli("localhost", "root", "", "agriculture_db");

if ($conn->connect_error) {
    die("Database connection failed");
}

$conn->set_charset("utf8mb4");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT * FROM farmers WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $farmer = $result->fetch_assoc();

        if (password_verify($password, $farmer["password"])) {

            session_regenerate_id(true);

            $_SESSION["farmer"] = $farmer["name"];
            $_SESSION["farmer_id"] = $farmer["id"];

            header("Location: index.php");
            exit;

        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "Account not found! Please register.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">🌱 SmartAgri</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="crops.php">Crops</a>
        <a href="register.php">Register</a>
    </nav>
</header>

<div class="form-container">

    <h2>Farmer Login</h2>

    <p style="color:red;">
        <?php echo htmlspecialchars($message); ?>
    </p>

    <form method="POST">

        <input type="email"
               name="email"
               placeholder="Email Address"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <button class="btn" type="submit">
            Login
        </button>

    </form>

    <p>
        New farmer?
        <a href="register.php">Register here</a>
    </p>

</div>

<footer>
    <p>Smart Agriculture Information System</p>
</footer>

</body>
</html>