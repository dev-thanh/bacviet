$(document).ready(function() {
    $('.banner-slider').slick({
        autoplay: true,
        arrow: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button class="prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="next"><i class="fa fa-angle-right"></i></button>',
    });

    $('.product-slider').slick({
        autoplay: true,
        arrow: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ],
        dots: false,
        prevArrow: '<button class="prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="next"><i class="fa fa-angle-right"></i></button>',
    });

    $('.pro-watched-slider').slick({
        autoplay: true,
        arrow: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ],
        dots: false,
        prevArrow: '<button class="prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="next"><i class="fa fa-angle-right"></i></button>',
    });

    $('.service-slider').slick({
        autoplay: true,
        arrow: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ],
    });
    $('.partner-slider').slick({
        autoplay: true,
        arrow: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    vertical: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ],
    });

    $('.current-select').click(function () {
        $(this).closest('.sidebar-dropdown').siblings().find('.dropdown-select').hide();
        $(this).next('.dropdown-select').slideToggle(400)
    });
    $('.dropdown-select a').click(function (e) {
        e.preventDefault();
        $(this).closest('.sidebar-dropdown').find('.current-select').html($(this).text());
        $(this).closest('.dropdown-select').slideToggle(300)
    })
    $('.cate-cap').click(function () {
        $(this).toggleClass('active')
        $(this).closest('.cate-item').siblings().find('.cate-dropdown').hide();
        $(this).closest('.cate-item').siblings().find('.cate-cap').removeClass('active');
        $(this).next('.cate-dropdown').slideToggle(400)
    })

    $('.slider-for').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
    });

    $('.slider-nav').slick({
        autoplay:true,
        arrow:true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
        ],
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        prevArrow: '<button class="prev"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button class="next"><i class="fa fa-chevron-right"></i></button>',
    });

    $("#menu").mmenu({
        "extensions": [
            "fx-menu-zoom"
        ],
        "counters": true
    });

    $('.btn-showSearch').click(function () {
        $('.search-mb').toggleClass('show')
    })

    $('#btn-st-2').click(function () {
        $(this).addClass('store-main');
        $('#btn-st-1').removeClass('store-main');
        $('#store-map-1').removeClass('active');
        $('#store-map-2').addClass('active')
    })
    $('#btn-st-1').click(function () {
        $(this).addClass('store-main');
        $('#btn-st-2').removeClass('store-main');
        $('#store-map-2').removeClass('active');
        $('#store-map-1').addClass('active')
    })
})
