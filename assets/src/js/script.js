//* Menghilangkan Anchor Pada URL index.php
document.querySelectorAll('.nav__links a').forEach(link => {
    link.addEventListener('click', function(event) {
        const targetId = this.getAttribute('data-target');
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            event.preventDefault();
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});


//* Menghilangkan Anchor Pada URL Saat Halaman Lain Ingin Berpindah Ke Halaman index.php
document.addEventListener('DOMContentLoaded', function () {
    const section = localStorage.getItem('scrollToSection');
    if (section) {
        const targetElement = document.querySelector(`${section}`);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
            localStorage.removeItem('scrollToSection'); // Hapus agar tidak berulang
        }
    }
});


//*  Menghilangkan Anchor Pada URL Saat Hero-btn Di Klik Pada Halaman home.php
document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector(".hero-btn");

    button.addEventListener("click", function (event) {
        // Mengambil target dari atribut data-target
        const target = button.getAttribute("data-target");

        // Memindahkan halaman ke elemen target
        const targetElement = document.querySelector(target);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: "smooth" });
        }
    });
});


//* Interaktifitas Elemen Program Card 
document.querySelectorAll('.program__card').forEach(card => {
    card.addEventListener('click', function () {
        const isActive = this.classList.contains('active');

        // Tutup card lain jika ada yang terbuka
        document.querySelectorAll('.program__card').forEach(otherCard => {
            if (otherCard !== this && otherCard.classList.contains('active')) {
                otherCard.classList.remove('active');
                otherCard.style.maxHeight = '300px'; // Reset max-height ke default saat menutup
            }
        });

        // Jika card sudah aktif, tutup dengan animasi smooth
        if (isActive) {
            this.classList.remove('active');
            this.style.maxHeight = '300px'; // Kembali ke max-height default
        } else {
            // Buka card yang diklik dengan animasi smooth
            this.classList.add('active');
            this.style.maxHeight = this.scrollHeight + 'px'; // Sesuaikan tinggi dengan konten
        }
    });
});


//* Interaktifitas SlideShow
document.addEventListener('DOMContentLoaded', function () {
    const slideContainers = document.querySelectorAll('.slideshow-container');

    slideContainers.forEach(container => {
        let slides = container.querySelectorAll('.slide');
        let currentIndex = 0;
        slides[currentIndex].style.display = "block"; // Menampilkan slide pertama

        setInterval(() => {
            slides[currentIndex].style.display = "none"; // Menyembunyikan slide saat ini
            currentIndex = (currentIndex + 1) % slides.length; // Menghitung indeks berikutnya
            slides[currentIndex].style.display = "block"; // Menampilkan slide berikutnya
        }, 7000); // Ganti gambar setiap 7 detik
    });
});




