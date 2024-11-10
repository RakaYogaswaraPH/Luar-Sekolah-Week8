<?php
session_start();
if (isset($_SESSION["login"])) {
    echo "<script>
    alert('Anda Sudah Melakukan Log In');
    document.location.href = 'views/users/home.php';
    </script>";
    exit;
}

require "assets/config/config.php";

if (isset($_POST["login"])) {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($connect, "SELECT * FROM accounts WHERE email = '$email'");

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                $_SESSION["role"] = $row["role"]; // Simpan role di session

                if ($row["role"] === "admin") {
                    echo "<script>
                    alert('Berhasil Masuk sebagai Admin');
                    document.location.href = 'views/admins/dashboard.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Berhasil Masuk');
                    document.location.href = 'views/users/home.php';
                    </script>";
                }
                exit;
            } else {
                echo "<script>
                alert('Password Tidak Sesuai!');
                document.location.href = 'login.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Email Tidak Terdaftar!');
            document.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Email dan Password harus diisi!');
        document.location.href = 'login.php';
        </script>";
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

    <!-- Login Section -->
    <div class="login-page">
        <div class="form">
            <form action="" method="post" class="login-form">
                <img src="assets/images/Logo.png" alt="Logo" class="logo">
                <h1>Selamat Datang Kembali!</h1>
                <input type="email" placeholder="Email" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <button type="submit" name="login">Masuk</button>
                <p class="message">
                    Belum memiliki akun? <a href="register.php">Buat Akun</a>
                </p>
            </form>
        </div>
    </div>
</body>
<script src="assets/src/js/urlutils.js"></script>

</html>