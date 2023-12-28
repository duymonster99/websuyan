const swiper = new Swiper('.swiper', {
    slidesPerView: 3,
    spaceBetween: 0,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        1208: {
            slidesPerView: 3
        },

        805: {
            slidesPerView: 2,
            spaceBetween: -50
        },

        320: {
            slidesPerView: 1
        }

    },
});
