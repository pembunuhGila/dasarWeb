// script.js
document.addEventListener("DOMContentLoaded", () => {
  fetch("footer.html")
    .then(res => res.text())
    .then(html => {
      document.body.insertAdjacentHTML('beforeend', html);
    })
    .catch(err => console.error("Gagal memuat footer:", err));
});
