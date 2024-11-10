<?php
session_start();
require "assets/config/config.php";

if (isset($_POST["register"])) {
    if (registers($_POST) > 0) {
        $_SESSION["login"] = true; // Menandakan pengguna sudah login
        echo "<script>
        alert('Berhasil Masuk');
        document.location.href = 'home.php';
        </script>";
        exit;
    } else {
        echo mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPKK INDONESIA</title>
    <link rel="stylesheet" href="assets/src/css/auth.css">
    <link rel="stylesheet" href="assets/src/css/styles.css">
    <link rel="icon" href="assets/images/Icon.jpg" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- Navbar Section -->
    <?php include 'components/navbar.php'; ?>

    <!-- Register Section -->
    <div class="login-page">
        <div class="form">
            <form action="" method="post" id="register-form" class="register-form">
                <img src="assets/images/Logo.png" alt="Logo" class="logo">
                <h1>Selamat Datang!</h1>
                <input type="email" name="email" id="email" placeholder="Email" />
                <small id="email-error" class="error"></small>

                <input type="password" name="password" id="password" placeholder="Password" />
                <input type="password" name="re-password" id="re-password" placeholder="Re-Password" />
                <small id="password-error" class="error"></small>

                <button type="submit" id="submit-btn" name="register">Buat Akun</button>
                <p class="message">Sudah Memiliki Akun? <a href="login.php">Masuk</a></p>
            </form>
        </div>
    </div>

    <!-- Custom Notification -->
    <div id="notification" class="notification-card">
        <p>Apakah anda yakin dengan data yang sudah diisi?</p>
        <div class="notification-buttons">
            <button id="yes-btn" class="btn-yes">Iya</button>
            <button id="no-btn" class="btn-no">Tidak</button>
        </div>
    </div>

</body>
<!-- <script src="assets/src/js/auth.js"></script> -->
<script src="assets/src/js/urlutils.js"></script>

</html>