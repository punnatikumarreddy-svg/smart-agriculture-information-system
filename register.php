<?php
$conn = new mysqli("localhost", "root", "", "agriculture_db");

if ($conn->connect_error) {
    die("Database connection failed");
}

$conn->set_charset("utf8mb4");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Secure password hashing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save farmer details into MySQL
    $stmt = $conn->prepare(
        "INSERT INTO farmers (name, email, password)
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        $message = "Registration successful! You can login now.";
    } else {
        $message = "Registration failed. Email may already exist.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">🌱 SmartAgri</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="crops.php">Crops</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<div class="form-container">

    <h2>Farmer Registration</h2>

    <p><?php echo htmlspecialchars($message); ?></p>

    <form method="POST">

        <input type="text"
               name="name"
               placeholder="Full Name"
               required>

        <input type="email"
               name="email"
               placeholder="Email Address"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               minlength="6"
               required>

        <button class="btn" type="submit">
            Register
        </button>

    </form>

    <p>Already registered?
       <a href="login.php">Login here</a>
    </p>

</div>

<footer>
    <p>Smart Agriculture Information System</p>
</footer>

</body>
</html>