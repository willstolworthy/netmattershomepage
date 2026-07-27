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

    // sidebar toggle
    $('.hamburger').on('click', function(){
        $('body').toggleClass('sidebar-open');
    });

    // close sidebar when clicking the overlay (anywhere off the sidebar)
    $('.sidebar-overlay').on('click', function(){
        $('body').removeClass('sidebar-open');
    });
});