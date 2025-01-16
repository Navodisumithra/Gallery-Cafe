
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelector('.hero-slideshow .slides');
    const slideCount = slides.children.length;
    let index = 0;

    function moveToNextSlide() {
        index = (index + 1) % slideCount;
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    setInterval(moveToNextSlide, 3000);
});

