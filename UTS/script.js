function showGenre(genre) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
        }
    );
    document.getElementById(genre).classList.add('active');
    document.body.className = 'theme-' + genre;
}

function showIndex() {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.classList.remove('active');
        }
    );
    document.getElementById('index').classList.add('active');
    document.body.className = 'theme-index';
}

document.addEventListener("DOMContentLoaded", () => {
    fetch(".html")
        .then(response => {
            if (!response.ok) {
                throw new Error(`Gagal memuat footer: ${response.statusText}`);
            }
            return response.text();
        }
    )
        .then(data => {
            document.body.insertAdjacentHTML('beforeend', data);
        }
    )
        .catch(error => console.error("Gagal memuat footer:", error));
    }
);