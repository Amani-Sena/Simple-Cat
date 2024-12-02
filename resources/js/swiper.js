var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
    },
  });

  var swiper = new Swiper(".mySwiperList", {
    slidesPerView: 5,
    spaceBetween: 32,
    pagination: {
      clickable: true,
    },

    // Responsive breakpoints
    breakpoints: {
    // when window width is >= 320px
    200: {
      slidesPerView: 1,
      spaceBetween: 0
    },

    780: {
      slidesPerView: 2,
      spaceBetween: 10
    },
    
    1300: {
      slidesPerView: 4,
      spaceBetween: 12
    },
    // when window width is >= 480px
    1930: {
      slidesPerView: 4,
      spaceBetween: 32
    },
    // when window width is >= 640px
    2500: {
      slidesPerView: 5,
      spaceBetween: 32
    }
  }

  });