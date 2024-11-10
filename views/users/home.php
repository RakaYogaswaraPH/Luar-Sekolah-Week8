<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
    alert('Silahkan Masuk Terlebih Dahulu')
    document.location.href = '../../login.php'
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/src/css/styles.css" />
    <link rel="stylesheet" href="../../assets/src/css/button.css" />
    <link rel="icon" href="../../assets/images/Icon.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>PPKK INDONESIA</title>
</head>

<body>
    <!-- Navbar Section -->
    <?php include '../../components/users/navbars.php'; ?>

    <!-- Hero Section -->
    <?php include '../../components/users/hero.php'; ?>

    <!-- About Us Section -->
    <?php include '../../components/about.php'; ?>

    <!--Our Program Section  -->
    <section class="program__container" id="program">
        <div class="section__container">
            <h2 class="section__title">Program Kami</h2>
            <p class="section__subtitle">
                Bekerja sama dengan partner perusahaan besar, kami menyelenggarakan
                beberapa program untuk mendukung karir peserta
            </p>
            <div class="program__grid">
                <div class="program__card" data-card="1">
                    <img src="../../assets/images/PTI.jpg" alt="program" />
                    <div class="program__name">
                        <i class="ri-briefcase-4-fill"></i>
                        <span>Pelatihan Pengembangan Teknologi Informasi</span>
                    </div>
                    <div class="program__info">
                        <p><strong>Durasi:</strong> 3 Bulan</p>
                        <p><strong>Benefit:</strong> Sertifikat dan Jaringan Industri</p>
                        <p><strong>Keahlian:</strong> Pengembangan Software, Analisis Data</p>
                        <p><strong>Biaya:</strong> Rp 250.000</p>
                    </div>
                    <a href="form.php"><button class="program__register-button">Daftar Sekarang</button></a>
                </div>

                <div class="program__card" data-card="2">
                    <img src="../../assets/images/MK.jpg" alt="program" />
                    <div class="program__name">
                        <i class="ri-briefcase-4-fill"></i>
                        <span>Pelatihan Soft Skills dan Manajemen Kerja</span>
                    </div>
                    <div class="program__info">
                        <p><strong>Durasi:</strong> 1 Bulan</p>
                        <p><strong>Benefit:</strong> Sertifikat dan Pelatihan Profesional</p>
                        <p><strong>Keahlian:</strong> Kepemimpinan, Komunikasi, Manajemen Tim</p>
                        <p><strong>Biaya:</strong> Rp 150.000</p>
                    </div>
                    <a href="form.php"><button class="program__register-button">Daftar Sekarang</button></a>
                </div>

                <div class="program__card" data-card="3">
                    <img src="../../assets/images/KW.jpeg" alt="program" />
                    <div class="program__name">
                        <i class="ri-briefcase-4-fill"></i>
                        <span>Pelatihan Kewirausahaan dan Bisnis</span>
                    </div>
                    <div class="program__info">
                        <p><strong>Durasi:</strong> 4 Bulan</p>
                        <p><strong>Benefit:</strong> Akses ke Mentor Bisnis</p>
                        <p><strong>Keahlian:</strong> Perencanaan Bisnis, Marketing</p>
                        <p><strong>Biaya:</strong> Rp 450.000</p>
                    </div>
                    <a href="form.php"><button class="program__register-button">Daftar Sekarang</button></a>
                </div>

                <div class="program__card" data-card="4">
                    <img src="../../assets/images/TK.jpg" alt="program" />
                    <div class="program__name">
                        <i class="ri-briefcase-4-fill"></i>
                        <span>Pelatihan Teknik dan Produksi</span>
                    </div>
                    <div class="program__info">
                        <p><strong>Durasi:</strong> 6 Bulan</p>
                        <p><strong>Benefit:</strong> Sertifikat, Kunjungan Pabrik</p>
                        <p><strong>Keahlian:</strong> Teknik Mesin, Manufaktur</p>
                        <p><strong>Biaya:</strong> Rp 650.000</p>
                    </div>
                    <a href="form.php"><button class="program__register-button">Daftar Sekarang</button></a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news__container">
        <div class="news__container">
            <div class="news__header">
                <h2 class="news__title">Berita Terbaru</h2>

                <!-- Filter Dropdown -->
                <div class="filter__dropdown__container">
                    <label for="news-filter">Filter: </label>
                    <select id="news-filter" class="filter__dropdown">
                        <option value="all">Semua</option>
                        <option value="latest">Terbaru</option>
                        <option value="pelatihan">Pelatihan</option>
                        <option value="seminar">Seminar</option>
                    </select>
                </div>
            </div>

            <div class="news__grid" id="news-list"></div>
        </div>
    </section>

    <!-- Mission Section -->
    <?php include '../../components/users/mission.php'; ?>

    <!-- Gallery Section -->
    <?php include '../../components/users/gallery.php'; ?>

    <!-- Footer -->
    <?php include '../../components/footer.php'; ?>


</body>
<script src="../../assets/src/js/script.js"></script>
<script src="../../assets/src//js/news.js"></script>

</html>