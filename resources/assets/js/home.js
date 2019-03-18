
require('./bootstrap');

var Swiper = require('swiper');


$(function(){

    var galleryTop = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
        parallax: true,
        autoplay: 5000,
        //loop:true
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        //centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true,

    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;

});
