<?php
require_once 'db.php';
session_start();

$conn = connectDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login BendiCar</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>
<body>
    <body>
    <div class="login-container"> <!-- Tambahkan div pembungkus -->
        <div class="login-box"> <!-- Tambahkan div pembungkus konten -->
            <h1>Login ke BendiCar</h1>
            <form method="POST">
                <label>Username:</label><br>
                <input type="text" name="username" required><br>
                <label>Password:</label><br>
                <input type="password" name="password" required><br>
                <button type="submit">Login</button>
            </form>
            <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        </div>
    </div>
</body>
</html>
