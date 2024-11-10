const newsData = [
    {
        date: '2024-08-11',
        desc: 'Program Pelatihan terbaru telah dibuka',
        category: 'pelatihan',
    },
    {
        date: '2024-08-12',
        desc: 'Seminar Nasional mengenai Teknologi terbaru',
        category: 'seminar',
    },
    {
        date: '2024-08-13',
        desc: 'Program Pelatihan terbaru telah dibuka',
        category: 'pelatihan',
    },
    {
        date: '2024-08-14',
        desc: 'Pengumuman Program Beasiswa Tahun 2024',
        category: 'terbaru',
    }
];

//* Fungsi untuk merender berita
const newsContainer = document.getElementById('news-list');
const filterSelect = document.getElementById('news-filter');

function renderNews(news) {
    newsContainer.innerHTML = ''; // Bersihkan konten sebelumnya
    news.forEach(item => {
        const newsCard = `
            <div class="news__card">
            <img src="../../assets/images/News.jpeg" alt="program" />
            <div class="news__name">
                <i class="ri-profile-fill"></i>
                <span><p>${item.date}</p>${item.desc}</span>
            </div>
            </div>
        `;
        newsContainer.innerHTML += newsCard;
    });
}

//* Render berita
renderNews(newsData);

//* Fungsi untuk memfilter berita berdasarkan kategori
filterSelect.addEventListener('change', (event) => {
    const selectedCategory = event.target.value;
    let filteredNews;

    if (selectedCategory === 'all') {
        filteredNews = newsData;
    } else if (selectedCategory === 'latest') {
        filteredNews = [...newsData].sort((a, b) => new Date(b.date) - new Date(a.date));
    } else {
        filteredNews = newsData.filter(news => news.category === selectedCategory);
    }

    renderNews(filteredNews);
});
