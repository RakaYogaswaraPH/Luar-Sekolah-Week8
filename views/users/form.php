<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPKK INDONESIA</title>
    <link rel="stylesheet" href="../../assets/src/css/form.css" />
    <link rel="stylesheet" href="../../assets/src/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Section -->
    <?php include '../../components/users/navbar.php'; ?>

    <!-- Form Section -->
    <div class="form-container">
        <div class="text">
            <i class="ri-file-edit-fill"></i> Formulir Registrasi
        </div>
        <form action="result.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="nama" required>
                    <div class="underline"></div>
                    <label for="">Nama Lengkap</label>
                </div>
                <div class="input-data">
                    <select id="gender" name="gender" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <div class="underline"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="ttl" required>
                    <div class="underline"></div>
                    <label for="">Tempat Tanggal Lahir</label>
                </div>
                <div class="input-data">
                    <input type="email" name="email" required>
                    <div class="underline"></div>
                    <label for="">Alamat Email</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="tel" name="telepon" required>
                    <div class="underline"></div>
                    <label for="">Nomor Telepon</label>
                </div>
                <div class="input-data">
                    <label for="" class="label-foto">Upload Foto Diri</label>
                    <input type="file" name="foto" required>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea">
                    <textarea rows="8" cols="80" name="alamat" required></textarea>
                    <div class="underline"></div>
                    <label for="">Alamat Lengkap</label>
                </div>
            </div>
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <button type="submit">Daftar</button>
                </div>
            </div>
        </form>
    </div>

</body>
<script src="../../assets/src/js/urlutils.js"></script>

</html>