document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-wrapper');
    const items = document.querySelectorAll('.testimonial-item');
    const totalItems = items.length;
    let currentIndex = 0;
    const itemsToShow = 4;

    function updateCarousel() {
        carousel.style.transform = `translateX(-${currentIndex * 100 / itemsToShow}%)`;
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

   
    setInterval(showNext, 3000); 
});


