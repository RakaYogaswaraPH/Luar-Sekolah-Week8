<?php
// Menghubungkan ke file config.php
require "../../assets/config/config.php";


// Menampilkan semua data program
$programs = query("SELECT * FROM program");

// Menambah data program
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_program"])) {
    $nama_program = $_POST["nama_program"];
    $deskripsi = $_POST["deskripsi"];
    $jadwal = $_POST["jadwal"];
    $biaya = $_POST["biaya"];
    $materi = $_POST["materi"];

    $query = "INSERT INTO program (nama_program, deskripsi, jadwal, biaya, materi) 
            VALUES ('$nama_program', '$deskripsi', '$jadwal', $biaya, '$materi')";

    if (mysqli_query($connect, $query)) {
        header("Location: program.php"); // Refresh halaman
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

// Menghapus data program
if (isset($_GET["hapus"])) {
    $id_program = $_GET["hapus"];
    $query = "DELETE FROM program WHERE id_program = $id_program";

    if (mysqli_query($connect, $query)) {
        header("Location: program.php"); // Refresh halaman setelah dihapus
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

// Mengedit data program
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_program"])) {
    $id_program = $_POST["id_program"];
    $nama_program = $_POST["nama_program"];
    $deskripsi = $_POST["deskripsi"];
    $jadwal = $_POST["jadwal"];
    $biaya = $_POST["biaya"];
    $materi = $_POST["materi"];

    $query = "UPDATE program 
            SET nama_program = '$nama_program', deskripsi = '$deskripsi', jadwal = '$jadwal', biaya = $biaya, materi = '$materi' 
            WHERE id_program = $id_program";

    if (mysqli_query($connect, $query)) {
        header("Location: program.php"); // Refresh halaman setelah edit
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
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
        <h1>Manajemen Program</h1>

        <!-- Form Tambah Program -->
        <h2>Kelola Program</h2>
        <form action="" method="POST">
            <input type="text" name="nama_program" placeholder="Nama Program" required>
            <input name="deskripsi" placeholder="Deskripsi" required></input>
            <input name="jadwal" placeholder="Jadwal" required></input>
            <input type="number" name="biaya" placeholder="Biaya" required>
            <input name="materi" placeholder="Materi" required></input>
            <button type="submit" name="add_program">Tambah Program</button>
        </form>
<br>

        <!-- Daftar Program -->
        <h2>Daftar Program</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Program</th>
                    <th>Nama Program</th>
                    <th>Deskripsi</th>
                    <th>Jadwal</th>
                    <th>Biaya</th>
                    <th>Materi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($programs as $program): ?>
                    <tr>
                        <td><?= $program['id_program']; ?></td>
                        <td><?= $program['nama_program']; ?></td>
                        <td><?= $program['deskripsi']; ?></td>
                        <td><?= $program['jadwal']; ?></td>
                        <td><?= $program['biaya']; ?></td>
                        <td><?= $program['materi']; ?></td>
                        <td>
                            <!-- Form Edit -->
                            <form action="" method="POST">
                                <input type="hidden" name="id_program" value="<?= $program['id_program']; ?>">
                                <input type="text" name="nama_program" value="<?= $program['nama_program']; ?>" required>
                                <textarea name="deskripsi" required><?= $program['deskripsi']; ?></textarea>
                                <textarea name="jadwal" required><?= $program['jadwal']; ?></textarea>
                                <input type="number" name="biaya" value="<?= $program['biaya']; ?>" required>
                                <textarea name="materi" required><?= $program['materi']; ?></textarea>
                                <button type="submit" name="edit_program">Edit</button>
                            </form>

                            <!-- Hapus Program -->
                            <a href="program.php?hapus=<?= $program['id_program']; ?>" onclick="return confirm('Yakin ingin menghapus program ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>