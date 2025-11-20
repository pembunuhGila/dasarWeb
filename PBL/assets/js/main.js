// assets/js/main.js - small enhancer (no slider lib)
document.addEventListener('DOMContentLoaded', function(){
  // optional: highlight active nav link by URL
  const links = document.querySelectorAll('.navbar-pill a');
  links.forEach(a=>{
    if(window.location.pathname.endsWith(a.getAttribute('href'))) a.classList.add('active');
  });
});


// Di assets/js/main.js
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.gallery-slider .slide');
  const dots = document.querySelectorAll('.slider-dots span');
  let currentSlide = 0;
  
  // Auto slide setiap 5 detik
  setInterval(() => {
    slides[currentSlide].classList.remove('active');
    dots[currentSlide].classList.remove('active');
    
    currentSlide = (currentSlide + 1) % slides.length;
    
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
  }, 5000);
  
  // Click pada dots
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      slides[currentSlide].classList.remove('active');
      dots[currentSlide].classList.remove('active');
      
      currentSlide = index;
      
      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.add('active');
    });
  });
});