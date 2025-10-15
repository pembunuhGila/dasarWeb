// Fungsi untuk menampilkan halaman genre tertentu dan mengganti tema
function showGenre(genre) {
    // Sembunyikan semua section
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
    });

    // Tampilkan section yang dipilih
    document.getElementById(genre).classList.add('active');

    // Ganti tema warna body sesuai genre (class CSS)
    document.body.className = 'theme-' + genre;
}

// Fungsi untuk kembali ke halaman index dan tema awal
function showIndex() {
    // Sembunyikan semua section
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
    });

    // Tampilkan section index
    document.getElementById('index').classList.add('active');

    // Kembalikan tema ke default (index)
    document.body.className = 'theme-index';
}