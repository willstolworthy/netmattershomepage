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

    // close sidebar when clicking the overlay
    $('.sidebar-overlay').on('click', function(){
        $('body').removeClass('sidebar-open');
    });

    // sticky header
    var $header = $('.header');
    var lastScroll = window.scrollY;

    $(window).on('scroll', function(){
        var current = window.scrollY;
        var delta = current - lastScroll;

        // ignore small scroll
        if (Math.abs(delta) < 5) return;

        // only hide once past the header
        if (delta > 0 && current > $header.outerHeight() && !$('body').hasClass('sidebar-open')) {
            $header.addClass('header-hidden');
        } else {
            $header.removeClass('header-hidden');
        }

        lastScroll = current;
    });

    // cookies popup
    var $cookies = $('.cookies-overlay');

    try {
        if (localStorage.getItem('cookiesAccepted') !== 'true') {
            $cookies.addClass('cookies-open');
        }
    } catch (e) {
        // storage blocked show it anyway
        $cookies.addClass('cookies-open');
    }

    $('.cookies-accept').on('click', function(){
        try {
            localStorage.setItem('cookiesAccepted', 'true');
        } catch (e) {
            // still let them through
        }
        $cookies.removeClass('cookies-open');
    });
});