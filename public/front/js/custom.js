$(document).ready(function () {
    "use strict";

    if ($(".awards-slider").length > 0) {
        $(".awards-slider").slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            prevArrow:
                '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow:
                '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2,
                    },
                },
            ],
        });
    }

    $(".home-header .mobile").on("click", function () {
        $(".home-header .main-menu .menu-content .list").slideToggle();
    });

    if ($(".testimonial-slider-wrapper").length > 0) {
        $(".testimonial-slider-wrapper").slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 800,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    }
});
