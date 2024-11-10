<?php
$connect = mysqli_connect("localhost", "root", "", "db_lembaga_pelatihan");

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registers($data)
{
    global $connect;
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $repassword = mysqli_real_escape_string($connect, $data["re-password"]);

    // Cek apakah email sudah terdaftar
    $result = mysqli_query($connect, "SELECT email FROM accounts WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email yang dimasukkan sudah terdaftar!');</script>";
        return false;
    }

    // Validasi kesesuaian password
    if ($password !== $repassword) {
        echo "<script>alert('Password tidak cocok, silakan masukkan informasi akun yang sesuai.');</script>";
        return false;
    }

    // Hash password sebelum disimpan
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menyimpan data pengguna dengan role default 'peserta'
    $query = "INSERT INTO accounts (email, password, role) VALUES ('$email', '$password', 'peserta')";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

// Fungsi untuk menambahkan data pengguna
function tambahPengguna($data) {
    global $connect;
    
    $email = strtolower(stripslashes($data["email"]));
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    $role = $data["role"];

    // Cek apakah email sudah ada
    $result = mysqli_query($connect, "SELECT email FROM accounts WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        return "Email sudah terdaftar";
    }

    // Masukkan data pengguna baru
    mysqli_query($connect, "INSERT INTO accounts (email, password, role) VALUES ('$email', '$password', '$role')");
    return mysqli_affected_rows($connect);
}

// Fungsi untuk menghapus data pengguna
function hapusPengguna($id) {
    global $connect;
    mysqli_query($connect, "DELETE FROM accounts WHERE id = $id");
    return mysqli_affected_rows($connect);
}

// Fungsi untuk memperbarui data pengguna
function updatePengguna($data) {
    global $connect;
    
    $id = $data["id"];
    $email = strtolower(stripslashes($data["email"]));
    $role = $data["role"];

    mysqli_query($connect, "UPDATE accounts SET email = '$email', role = '$role' WHERE id = $id");
    return mysqli_affected_rows($connect);
}

// Fungsi untuk mengambil semua data pengguna
function getPengguna() {
    global $connect;
    $result = mysqli_query($connect, "SELECT * FROM accounts");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function editRole($id, $email, $role) {
    global $connect;

    $allowedRoles = ['peserta', 'admin', 'pelatih'];
    if (!in_array($role, $allowedRoles)) {
        throw new Exception("Role tidak valid: " . htmlspecialchars($role));
    }

    $stmt = $connect->prepare("UPDATE accounts SET email = ?, role = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $role, $id);

    return $stmt->execute();
}



