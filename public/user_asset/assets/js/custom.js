jQuery(document).ready(function() {
    // for hover dropdown menu
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });
    // slick slider call 
    $('.slick_slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        slidesToShow: 1,
        slide: 'div',
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'linear'
    });
    // latest post slider call 
    $('.latest_postnav').newsTicker({
        row_height: 64,
        speed: 800,
        prevButton: $('#prev-button'),
        nextButton: $('#next-button')
    });
    $('.hero').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: !0,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 8000,
        draggable: false,
        arrows: false,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                draggable: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                draggable: true,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                draggable: true,
                slidesToScroll: 1
            }
        }

        ]
    });
    $('.slider-hero').slick({
            infinite: true,
                      slidesToShow: 3,
                      slidesToScroll: 1,
                      arrows: false,
                      autoplay: true,
                      autoplaySpeed: 4000,
                      easing:'linear',
                      responsive: [
                            {
                              breakpoint: 768,
                              settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                              }
                            },
                            {
                              breakpoint: 480,
                              settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                              }
                            }

                          ]
        });
    jQuery(".fancybox-buttons").fancybox({
        prevEffect: 'none',
        nextEffect: 'none',
        closeBtn: true,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        }
    });
    // jQuery('a.gallery').colorbox();
    //Check to see if the window is top if not then display button
     $(window).scroll(function() {
        if ($(this).scrollTop() > 10) {
            $("#navArea").addClass("sticky").delay(100);
        }else{
            $("#navArea").removeClass("sticky").delay(100);
        }
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.tootlip').tooltip();
    $("ul#ticker01").liScroll();
});

wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();
// search
$("#site-search").click(function () {
        $(".header_top_right, .navbar").addClass("fade");
        setTimeout((function () {
            $("#search-container").addClass("open");
            $("#search-text").attr("placeholder", "What are you looking for?");
            $("#search-text").focus();
        }), 150)
    });
$("#close-search").click(function () {
        $("#search-text").attr("placeholder", "");
        $("#search-container").removeClass("open");
        setTimeout((function () {
            $(".header_top_right, .navbar").delay(200).removeClass("fade");
            $("#search-text").blur()
        }), 250)
    });
$("#mobile-nav span").click(function(){
    $(this).hasClass("fa-bars") ? $(this).removeClass().addClass("fa fa-times") : $(this).removeClass().addClass("fa fa-bars");
        $("#mobile-shelf").toggle();
});
// search end
jQuery(window).load(function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(100).css({
        'overflow': 'visible'
    });
})