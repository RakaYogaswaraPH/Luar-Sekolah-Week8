<?php
require "../../assets/config/config.php";

// Menambahkan berita
if (isset($_POST['submit'])) {
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];
    $foto_berita = $_FILES['foto_berita']['name'];
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($foto_berita);

    // Menyimpan foto yang di-upload
    if (move_uploaded_file($_FILES['foto_berita']['tmp_name'], $target_file)) {
        $query = "INSERT INTO berita (judul_berita, isi_berita, tanggal_publikasi, foto_berita) 
                VALUES ('$judul_berita', '$isi_berita', '$tanggal_publikasi', '$foto_berita')";
        mysqli_query($connect, $query);
        header('Location: news.php');
    }
}

if (isset($_POST['update'])) {
    $id_berita = $_POST['id_berita'];
    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];
    $foto_berita = $_FILES['foto_berita']['name'];

    if ($foto_berita) {
        $target_file = "../../uploads/" . basename($foto_berita);
        move_uploaded_file($_FILES['foto_berita']['tmp_name'], $target_file);
        $query = "UPDATE berita SET judul_berita = '$judul_berita', isi_berita = '$isi_berita', 
                tanggal_publikasi = '$tanggal_publikasi', foto_berita = '$foto_berita' WHERE id_berita = $id_berita";
    } else {
        $query = "UPDATE berita SET judul_berita = '$judul_berita', isi_berita = '$isi_berita', 
                tanggal_publikasi = '$tanggal_publikasi' WHERE id_berita = $id_berita";
    }
    mysqli_query($connect, $query);
    header('Location: news.php');
}

// Menghapus berita
if (isset($_GET['delete'])) {
    $id_berita = $_GET['delete'];
    $query = "DELETE FROM berita WHERE id_berita = $id_berita";
    mysqli_query($connect, $query);
    header('Location: news.php');
}

$berita = query("SELECT * FROM berita");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../../assets/src/css/styles.css">
    <link rel="stylesheet" href="../../assets/src/css/admin.css">
</head>

<body>
    <!-- Navbar Section -->
    <?php include '../../components/admins/navbar.php'; ?>

    <div class="admin-header">
        <h1>Manajemen Berita</h1>
        <h2>Kelola Berita</h2>

        <!-- Form untuk menambah berita -->
        <form action="news.php" method="POST" enctype="multipart/form-data">
            <input placeholder="Judul Berita" type="text" name="judul_berita" value="<?= isset($data) ? $data['judul_berita'] : '' ?>" required>
            <input placeholder="Isi Berita" name="isi_berita" required><?= isset($data) ? $data['isi_berita'] : '' ?></input>
            <input placeholder="Tanggal Publikasi" type="date" name="tanggal_publikasi" value="<?= isset($data) ? $data['tanggal_publikasi'] : '' ?>" required>
            <input placeholder="Foto Berita" type="file" name="foto_berita" <?= !isset($data) ? 'required' : '' ?>>
            <button type="submit" name="<?= isset($data) ? 'update' : 'submit' ?>"><?= isset($data) ? 'Update' : 'Tambah' ?></button>
        </form>

        <div class="table-container">
            <div class="table-horizontal-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Berita</th>
                            <th>Isi Berita</th>
                            <th>Tanggal Publikasi</th>
                            <th>Foto Berita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $index => $row): ?>
                            <tr>
                                <td><?= $row['id_berita'] ?></td>
                                <td><?= $row['judul_berita'] ?></td>
                                <td><?= substr($row['isi_berita'], 0, 100) . '...' ?></td>
                                <td><?= $row['tanggal_publikasi'] ?></td>
                                <td><img src="../../uploads/<?= $row['foto_berita'] ?>" alt="Foto Berita" width="100"></td>
                                <td>
                                    <a href="news.php?delete=<?= $row['id_berita'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>