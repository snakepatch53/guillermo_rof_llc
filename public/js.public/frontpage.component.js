const swiper = new Swiper(".swiper", {
    speed: 2000,
    allowTouchMove: true,
    autoplay: {
        delay: 3000,
    },
    effect: "fade",
    fadeEffect: {
        crossFade: true,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
const $swiper = document.querySelector(".swiper").swiper;
