// "use strict";
$(document).ready(function () {
    //paly-slider
    $(".paly-slider").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        dots: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                },
            },
        ],
    });

    //gallery-slider
    $(".gallery-slider").slick({
        dots: false,
        infinite: true,
        speed: 800,
        slidesToShow: 6,
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
                    slidesToShow: 4,
                },
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                },
            },
        ],
    });
});

//nav menu
function navMenuIconChange() {
    const navBar = document.querySelector(
        "#header .navbar .navbar-toggler-icon"
    );
    navBar.innerHTML = '<i class="fas fa-bars"></i>';
}
navMenuIconChange();

//click to scroll top
function clickToScrollTop() {
    const arrowBtn = document.querySelector("#scroll-to-top");
    document.addEventListener("scroll", () => {
        if (window.scrollY > 350) {
            arrowBtn.classList.add("active-scroll-top");
        } else {
            arrowBtn.classList.remove("active-scroll-top");
        }
    });
}
clickToScrollTop();

function header() {
    //dropdown menu active with hover
    function DropDownItemActive() {
        if (window.innerWidth > 1200) {
            const navLinks = document.querySelectorAll("#nav-menu .nav-item");

            function activeRemoveDropdown(linkItem, eventType) {
                const InnerSubmenu = linkItem.querySelector(".dropdown-menu");
                if (InnerSubmenu) {
                    if (eventType === "mouseover") {
                        InnerSubmenu.classList.add("show");
                        linkItem.classList.add("show");
                    } else if (eventType === "mouseleave") {
                        InnerSubmenu.classList.remove("show");
                        linkItem.classList.remove("show");
                    }
                }
            }

            for (let linkItem of navLinks) {
                linkItem.addEventListener("mouseover", (e) => {
                    activeRemoveDropdown(linkItem, e.type);
                });

                linkItem.addEventListener("mouseleave", (e) => {
                    activeRemoveDropdown(linkItem, e.type);
                });
            }
        }
    }

    function stickyHeader() {
        const header = document.querySelector("#header");
        const headerHeight = header.clientHeight;
        document.addEventListener("scroll", () => {
            if (window.scrollY > headerHeight) {
                header.classList.add("sticky-header-active");
            } else {
                header.classList.remove("sticky-header-active");
            }
        });
    }

    DropDownItemActive();
    stickyHeader();
}
header();
window.addEventListener("resize", header);
