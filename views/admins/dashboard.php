<?php
session_start();
require "../../assets/config/config.php";

// Validasi akses admin
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Akses ditolak!'); document.location.href = '../../login.php';</script>";
    exit;
}

// Tambah data pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_user"])) {
    $result = tambahPengguna($_POST);
    if ($result > 0) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Gagal menambah data atau email sudah terdaftar";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $id = $_POST["id"];
    hapusPengguna($id);
    header("Location: dashboard.php");
    exit();
}

// Ubah role pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_user"])) {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    if (editRole($id, $email, $role)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Gagal memperbarui role pengguna";
    }
}

$pengguna = getPengguna();
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
        <h1>Dashboard Admin</h1>
        <h2>Kelola Pengguna</h2>

        <!-- Form Tambah Pengguna -->
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="peserta">Peserta</option>
                <option value="admin">Admin</option>
                <option value="pelatih">Pelatih</option>
            </select>
            <button type="submit" name="add_user">Tambah Pengguna</button>
        </form>

        <div class="table-container">
            <div class="table-horizontal-container">
                <table class="unfixed-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengguna as $user) : ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['role']; ?></td>
                                <td>
                                    <!-- Form Edit -->
                                    <form action="" method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <input type="email" name="email" value="<?= $user['email']; ?>" required>
                                        <select name="role" required>
                                            <option value="peserta" <?= $user['role'] == 'peserta' ? 'selected' : ''; ?>>Peserta</option>
                                            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="pelatih" <?= $user['role'] == 'pelatih' ? 'selected' : ''; ?>>Pelatih</option>
                                        </select>
                                        <button type="submit" name="edit_user">Edit</button>
                                    </form>

                                    <!-- Form Hapus -->
                                    <form action="" method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <button type="submit" name="delete_user" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                                    </form>
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