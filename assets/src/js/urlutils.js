document.querySelectorAll('.nav__links a').forEach(link => {
    link.addEventListener('click', function(event) {
        const section = this.getAttribute('data-target');
        if (section) {
            event.preventDefault();
            localStorage.setItem('scrollToSection', section); // Simpan di localStorage
            window.location.href = 'index.php';
        }
    });
});

document.querySelectorAll('.nav__links a').forEach(link => {
    link.addEventListener('click', function(event) {
        const section = this.getAttribute('data-target-in');
        if (section) {
            event.preventDefault();
            localStorage.setItem('scrollToSection', section); // Simpan di localStorage
            window.location.href = 'home.php';
        }
    });
});