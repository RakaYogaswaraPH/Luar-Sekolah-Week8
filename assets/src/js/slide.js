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
