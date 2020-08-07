
$('.slide-banner').slick({
    autoplay: true,
    arrow: true,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '<button class="prev"><i class="fa fa-chevron-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-chevron-right"></i> </button>',
});

$('.slide-srv').slick({
    autoplay: true,
    arrow: true,
    dots: false,
    slidesToShow: 4,
    slidesToScroll: 1, 
    prevArrow: '<button class="prev"><i class="fa fa-chevron-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-chevron-right"></i> </button>',
    responsive: [
        {
            breakpoint: 1023,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                dots: true,
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 480,
            settings: {
                dots: true,
                slidesToShow: 2,
            }
        }
    ]
});

$('.list-item-cate').slick({
    autoplay: true,
    arrow: true,
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '<button class="prev"><i class="fa fa-chevron-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-chevron-right"></i> </button>',
    responsive: [
        {
            breakpoint: 480,
            settings: {
                dots: true,
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                dots: true,
            }
        }
    ]
});


$('.slide-new .row').slick({
    autoplay: true,
    arrow: true,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 1023,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
}); 

$('.slide-feed').slick({
    autoplay: true,
    arrow: true,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
});


$('.slide-part').slick({
    autoplay: true,
    arrow: true,
    dots: true,
    slidesToShow: 6,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 1023,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                dots: true,
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 480,
            settings: {
                dots: true,
                slidesToShow: 2,
            }
        }
    ]
});

$('.slide-img').slick({
    autoplay: true,
    arrow: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
});


$('.slide-new-other .row').slick({
    autoplay: true,
    arrow: true,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});


$('.slide-project-other .row').slick({
    autoplay: true,
    arrow: false,
    dots: true,
    slidesToShow: 2,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


$('.slider-for').slick({
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-nav',
    prevArrow: '<button class="prev"><i class="fa fa-chevron-left"></i> </button>',
    nextArrow: '<button class="next"><i class="fa fa-chevron-right"></i> </button>',

});
$('.slider-nav').slick({
    autoplay:false,
    arrow:false,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    // centerMode: true, 
    // centerPadding: 0, 
    focusOnSelect: true,
    prevArrow: '', 
    nextArrow: '', 
});

$('.slide-tab ul').slick({
    autoplay: true,
    arrow: false,
    dots: false,
    slidesToShow: 6,
    slidesToScroll: 1, 
    prevArrow: '',
    nextArrow: '',
    responsive: [
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
            }
        }
    ]
});

$(document).ready(function(){
    
    $('ul.tabs li a').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li a').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
    })

})

jQuery(document).ready(function( $ ) {
  $("#menu").mmenu({
     "extensions": [
        "fx-menu-zoom"
     ],
     "counters": true
  });
});

(function($){
    $(document).ready(function(){
    $('.lightbox').fancybox();
    });
})(jQuery)

$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
        $('.header-menu').addClass('fixed-header');
        $('main').addClass('visible-title');
    }
    else {
        $('.header-menu').removeClass('fixed-header');
        $('main').removeClass('visible-title');
    }
});





/*7/1/2019 - Trong*/
function showToast(text, heading){
    $.toast({
        text: text,
        heading: heading,
        icon: 'success',
        showHideTransition: 'fade',
        allowToastClose: false,
        hideAfter: 3000,
        stack: 5,
        position: 'top-right',
        textAlign: 'left', 
        loader: true, 
        loaderBg: '#9ec600',
    });   
}