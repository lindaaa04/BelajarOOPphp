<?php
require_once 'session.php';
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Kendaraan BendiCar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Selamat datang di BendiCar</h1>
    </header>

    <section class="section-kendaraan">
        <!-- Kendaraan 1 -->
        <div class="kendaraan-card">
            <img src="toyota.avanza.png" alt="toyota.avanza">
            <h3>Toyota Avanza</h3>
            <p>Harga: Rp 300.000 / Hari</p>
            <button>Sewa Sekarang</button>
        </div>

        <!-- Kendaraan 2 -->
        <div class="kendaraan-card">
            <img src="honda.civic.png" alt="honda.civic">
            <h3>Honda Civic</h3>
            <p>Harga: Rp 500.000 / Hari</p>
            <button>Sewa Sekarang</button>
        </div>

        <!-- Kendaraan 3 -->
        <div class="kendaraan-card">
            <img src="daihatsu.png" alt="daihatsu">
            <h3>Daihatsu Terios</h3>
            <p>Harga: Rp 350.000 / Hari</p>
            <button>Sewa Sekarang</button>
        </div>
    
    </section><br><br>
    <center><a href="logout.php" class="logout-btn">Logout</a></center>
</body>
</html>
