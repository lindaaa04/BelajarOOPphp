<?php
require_once 'db.php';
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conn = connectDatabase();

// Mendapatkan daftar kendaraan dari database
$sql = "SELECT * FROM vehicles";
$result = $conn->query($sql);

// Proses penyewaan kendaraan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_id = $_POST['vehicle_id'];
    $user_id = $_SESSION['user_id'];
    $rent_date = date('Y-m-d');

    $sql_sewa = "INSERT INTO rentals (user_id, vehicle_id, rent_date) VALUES ('$user_id', '$vehicle_id', '$rent_date')";
    if ($conn->query($sql_sewa) === TRUE) {
        $success = "Kendaraan berhasil disewa!";
    } else {
        $error = "Terjadi kesalahan saat menyewa kendaraan.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Kendaraan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Daftar Kendaraan</h1>
        <a href="logout.php" style="float: right; text-decoration: none; color: white; font-weight: bold;">Logout</a>
    </header>
    <div class="section-kendaraan">
        <?php
        if ($result->num_rows > 0) {
            while ($vehicle = $result->fetch_assoc()) {
                echo "<div class='kendaraan-card'>";
                echo "<img src='images/" . $vehicle['image'] . "' alt='" . $vehicle['name'] . "'>";
                echo "<h3>" . $vehicle['name'] . "</h3>";
                echo "<p>Harga: Rp" . number_format($vehicle['price'], 0, ',', '.') . "/hari</p>";
                echo "<form method='POST'>";
                echo "<input type='hidden' name='vehicle_id' value='" . $vehicle['id'] . "'>";
                echo "<button type='submit'>Sewa</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada kendaraan tersedia.</p>";
        }
        ?>
    </div>
    <?php
    if (isset($success)) {
        echo "<p style='color: green; text-align: center;'>$success</p>";
    }
    if (isset($error)) {
        echo "<p style='color: red; text-align: center;'>$error</p>";
    }
    ?>
</body>
</html>
