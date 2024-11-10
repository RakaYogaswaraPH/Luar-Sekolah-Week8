<?php
//* Warna background dan warna teks berdasarkan jenis kelamin
$backgroundColor = '';
$textColor = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gender = $_POST['gender'];

    if ($gender == 'laki-laki') {
        $backgroundColor = '#1E90FF'; // Biru
        $textColor = '#000000'; // Hitam
    } elseif ($gender == 'perempuan') {
        $backgroundColor = '#FF6347'; // Merah
        $textColor = '#FFFFFF'; // Putih
    }

    //* Baca file gambar dan encode ke base64
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $fileType = $_FILES['foto']['type'];
        $fileData = file_get_contents($_FILES['foto']['tmp_name']);
        $base64 = base64_encode($fileData);
        $src = 'data:' . $fileType . ';base64,' . $base64;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPKK INDONESIA</title>
    <link rel="stylesheet" href="../../assets/src/css/styles.css" />
    <link rel="stylesheet" href="../../assets/src/css/cards.css" />
    <link rel="stylesheet" href="../../assets/src/css/button.css" />
</head>

<body>
    <!-- Navbar Section -->
    <?php include '../../components/users/navbar.php'; ?>

    <!-- Result Section -->
    <div class="card-container" style="background-color: <?php echo $backgroundColor; ?>; color: <?php echo $textColor; ?>;">
        <h1 class="title">Kartu Registrasi</h1>

        <?php if (isset($src)) { ?>
            <img src="<?php echo $src; ?>" alt="Foto Diri">
        <?php } ?>

        <div class="card-details">
            <p><span>Nama:</span> <?php echo $_POST['nama']; ?></p>
            <p><span>Jenis Kelamin:</span> <?php echo $_POST['gender']; ?></p>
            <p><span>Tempat, Tanggal Lahir:</span> <?php echo $_POST['ttl']; ?></p>
            <p><span>Email:</span> <?php echo $_POST['email']; ?></p>
            <p><span>Telepon:</span> <?php echo $_POST['telepon']; ?></p>
            <p><span>Alamat:</span> <?php echo $_POST['alamat']; ?></p>
        </div>
    </div>
    <div class="button-container">
        <a href="#" class="btn register-btn">Cetak</a>
        <a href="home.php" class="btn register-btn">Kembali</a>
    </div>

</body>
<script src="../../assets/src/js/urlutils.js"></script>

</html>