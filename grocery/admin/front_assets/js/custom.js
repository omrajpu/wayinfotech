//Home carousel js
$('#mobile-screens').owlCarousel({
    loop: true,
    margin: 20,
    responsiveClass: true,
    lazyLoad: true,
    center: true,
    autoplay: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1300: {
            items: 3
        }
    }
});

//type text
document.addEventListener('DOMContentLoaded', function () {
    var typed = new Typed('#typed', {
        strings: ["Performance", "Field Issues", "Security Issues"],
        backSpeed: 100,
        typeSpeed: 50,
        startDelay: 20,
        loop: true,
        loopCount: Infinity,
    });
});


$(function () {
//caches a jQuery object containing the header element
    var header = $("#nav-bar");
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            header.addClass("small_header");
        } else {
            header.removeClass("small_header");
        }
    });
});