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

    // logo banners
    $('.partners, .clients').slick({
        infinite: true,
        speed: 600,
        variableWidth: true, // sizes each slide to its own logo so the gaps stay even
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2800, // waits between each slide instead of scrolling non stop
        arrows: false,
        dots: false,
        pauseOnHover: true, // so the labels can be read
        swipe: false,
        draggable: false,
        responsive: [ // breakpoints
            { breakpoint: 1260, settings: { slidesToShow: 6 } },
            { breakpoint: 992, settings: { slidesToShow: 5 } },
            { breakpoint: 768, settings: { slidesToShow: 3 } },
        ],
    });

    // variableWidth measures the slides so it has to remeasure once the logos load
    $(window).on('load', function(){
        $('.partners, .clients').slick('setPosition');
    });

    // sidebar toggle
    // html gets the class too so the page scroll can be locked while it's open
    $('.hamburger').on('click', function(){
        $('html, body').toggleClass('sidebar-open');
    });

    // close sidebar when clicking the overlay
    $('.sidebar-overlay').on('click', function(){
        $('html, body').removeClass('sidebar-open');
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

    // change settings just closes it, nothing is saved so it comes back next visit
    $('.cookies-settings').on('click', function(){
        $cookies.removeClass('cookies-open');
    });
});