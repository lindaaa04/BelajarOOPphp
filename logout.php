<?php
// Mulai sesi
session_start();

// Hapus semua sesi
session_destroy();

// Redirect ke halaman login
header('Location: login.php');
exit;
?>
