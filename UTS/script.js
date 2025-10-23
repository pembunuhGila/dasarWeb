document.addEventListener("DOMContentLoaded", () => {
  fetch("footer.html")
    .then(res => res.text())
    .then(data => {
        // Memastikan footer dimasukkan di akhir body agar tetap sticky
        document.body.insertAdjacentHTML('beforeend', data);
    })
    .catch(err => console.error("Gagal memuat footer:", err));
});