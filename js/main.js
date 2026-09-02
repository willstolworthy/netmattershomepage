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
        variableWidth: true, // gaps stay even
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2800, // waits between each slide instead of scrolling non stop
        arrows: false,
        dots: false,
        pauseOnHover: true,
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

    // out of hours accordion
    var $oohToggle = $('.out-of-hours');
    var $oohPanel = $('.out-of-hours-panel');

    function openOutOfHours(open) {
        $oohToggle.toggleClass('out-of-hours-open', open).attr('aria-expanded', open);
        $oohPanel.css('max-height', open ? $oohPanel[0].scrollHeight + 'px' : 0);
    }

    $oohToggle.on('click', function(e){
        e.preventDefault();
        openOutOfHours(!$oohToggle.hasClass('out-of-hours-open'));
    });

    $(window).on('resize', function(){
        if ($oohToggle.hasClass('out-of-hours-open')) {
            openOutOfHours(true);
        }
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

    // contact form validation
    // the form is marked novalidate

    var $contactForm = $('.contact-form form');

    var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
    // uk numbers
    var phonePattern = /^(?:\+44|0)\d{9,10}$/;

    // one entry per field that needs checking, true when the value is ok
    // the patterns reject an empty string so they cover the required check too
    var validators = {
        name: function(value){
            return value !== '';
        },
        email: function(value){
            return emailPattern.test(value);
        },
        telephone: function(value){
            return phonePattern.test(value.replace(/[\s().-]/g, ''));
        },
        message: function(value){
            return value !== '';
        },
    };

    function fieldByName(name) {
        return $contactForm.find('[name="' + name + '"]');
    }

    function validateField($field) {
        var check = validators[$field.attr('name')];
        if (!check) return true;

        var valid = check($.trim($field.val()));

        $field.toggleClass('form-field-invalid', !valid).attr('aria-invalid', !valid);

        // drop any message php left behind once the field is fixed
        if (valid) {
            $field.closest('.form-field').find('.form-error').remove();
        }

        return valid;
    }

    $contactForm.on('submit', function(e){
        var $invalid = $();

        $.each(validators, function(name){
            var $field = fieldByName(name);
            if (!validateField($field)) {
                $invalid = $invalid.add($field);
            }
        });

        if ($invalid.length) {
            e.preventDefault();
            $invalid.first().trigger('focus');
        }
    });

    // only recheck a field that has already failed
    $contactForm.on('input focusout', '[name]', function(){
        var $field = $(this);
        if ($field.hasClass('form-field-invalid')) {
            validateField($field);
        }
    });
});