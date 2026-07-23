// carousel

$(document).ready(function(){
    $('.banner-carousel').slick({
        dots: true,
        arrows: false,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 6000,
        swipeToSlide: true,
    });
});