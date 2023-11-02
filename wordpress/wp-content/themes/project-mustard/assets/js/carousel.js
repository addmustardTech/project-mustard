$(document).ready(function(){


    // Define consts
    const carousel = document.getElementById('carousel');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const totalSlides = document.querySelectorAll('.carSlide').length;
    let currentIndex = 0;
    const slideWidth = parseInt($('.carSlide').outerWidth());
  
    // Add event listeners

    // Next button event listender
    nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % totalSlides; // updates the index of the current slide
      updateCarousel(); // updates the carousel
    });
  
    // Previous button event listener
    prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // updates the index of the current slide
      updateCarousel(); // updates the carousel
    });

    // Hammer lib for touch controls
    var hammer = new Hammer(carousel);

    // Swipe left event listener
    hammer.on('swipeleft', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel(); // updates the carousel
    });

    // Swipe right event listener
    hammer.on('swiperight', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel(); // updates the carousel
    });
  
    // Update carousel function
    function updateCarousel() {
        // Get the calculated translate value
        const translateValue = -currentIndex * slideWidth + 'px';

        // Update the carousel's position with CSS
        carousel.style.transform = 'translateX(' + translateValue + ')';
    }


});