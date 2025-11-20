// assets/js/galeri.js - Lightbox functionality untuk galeri

document.addEventListener('DOMContentLoaded', function() {
  const lightbox = document.getElementById('lightbox');
  const lightboxImage = document.getElementById('lightboxImage');
  const lightboxTitle = document.getElementById('lightboxTitle');
  const closeLightbox = document.getElementById('closeLightbox');
  const prevImage = document.getElementById('prevImage');
  const nextImage = document.getElementById('nextImage');
  const galeriItems = document.querySelectorAll('.galeri-item');
  
  let currentIndex = 0;
  const images = [];
  
  // Collect all images data
  galeriItems.forEach((item, index) => {
    const img = item.querySelector('img');
    const title = item.querySelector('.overlay-content h3')?.textContent || 'Galeri Lab DT';
    
    images.push({
      src: img.src,
      alt: img.alt,
      title: title
    });
    
    // Click event untuk buka lightbox
    item.addEventListener('click', () => {
      openLightbox(index);
    });
  });
  
  // Function: Open Lightbox
  function openLightbox(index) {
    currentIndex = index;
    updateLightboxImage();
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  
  // Function: Close Lightbox
  function closeLightboxFunc() {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  }
  
  // Function: Update image in lightbox
  function updateLightboxImage() {
    const current = images[currentIndex];
    lightboxImage.src = current.src;
    lightboxImage.alt = current.alt;
    lightboxTitle.textContent = current.title;
  }
  
  // Function: Show next image
  function showNextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    updateLightboxImage();
  }
  
  // Function: Show previous image
  function showPrevImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateLightboxImage();
  }
  
  // Event Listeners
  closeLightbox.addEventListener('click', closeLightboxFunc);
  nextImage.addEventListener('click', showNextImage);
  prevImage.addEventListener('click', showPrevImage);
  
  // Close lightbox saat klik di luar gambar
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
      closeLightboxFunc();
    }
  });
  
  // Keyboard navigation
  document.addEventListener('keydown', (e) => {
    if (!lightbox.classList.contains('active')) return;
    
    if (e.key === 'Escape') closeLightboxFunc();
    if (e.key === 'ArrowRight') showNextImage();
    if (e.key === 'ArrowLeft') showPrevImage();
  });
  
  // Prevent image dragging
  lightboxImage.addEventListener('dragstart', (e) => e.preventDefault());
});