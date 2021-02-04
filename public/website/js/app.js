$(function($) {
    'use strict';

    $(document).ready(function() {
        // Animate loader off screen
        setTimeout(function () {
            $(".page-loader").fadeOut("slow");
        }, 2000);

        // set the navnation bar link active
        $('body#home-page .navbar-nav li:eq(0)').addClass('active');
        $('body#about-page .navbar-nav li:eq(1)').addClass('active');
        $('body#jobs-page .navbar-nav li:eq(2)').addClass('active');
        $('body#jobview-page .navbar-nav li:eq(2)').addClass('active');
        $('body#store-page .navbar-nav li:eq(3)').addClass('active');
        $('body#contact-page .navbar-nav li:eq(4)').addClass('active');

        // check navbar
        checkNavBar();
        $(document).on('scroll', function () {
            checkNavBar();
        });

        // set logo by page
        $('.navbar-nav li').on('click', function() {
            $('body').fadeOut();
        });

        // mobile navbar toogle logic
        $('#mobile-menu-button').on('click', function() {
            if ($(this).attr('class').indexOf('collapsed') > -1) {
                $(this).removeClass('collapsed');
                $(this).parent().removeClass('collapsed');
            } else {
                $(this).addClass('collapsed');
                $(this).parent().addClass('collapsed');
            }
        });

        // back to top appear logic
        $(document).on('scroll', function() {
            if (getPageScroll().y > 0) {
                $('#back-top').fadeIn('slow');
            } else {
                $('#back-top').fadeOut('slow');
            }
        });

        // back to top function
        $('#back-top .btn').on('click', function() {
            $('html, body').animate({
                scrollTop: $('body').offset().top
            }, 500);
        });

        // mobile menu button
        $('#mobile-menu-button').on('click', function(){
            var page_body = $('body');
            var body_style = page_body.attr('style') || '';

            if (body_style.indexOf('hidden') > -1) {
                page_body.removeAttr('style');
            } else {
                page_body.attr('style', 'overflow: hidden;');
            }
        });
    });
});

// getPageScroll() by quirksmode.com
function getPageScroll() {
    var xScroll,
        yScroll;

    if (self.pageYOffset) {
        yScroll = self.pageYOffset;
        xScroll = self.pageXOffset;
    } else if (document.documentElement && document.documentElement.scrollTop) {
        yScroll = document.documentElement.scrollTop;
        xScroll = document.documentElement.scrollLeft;
    } else if (document.body) { // all other Explorers
        yScroll = document.body.scrollTop;
        xScroll = document.body.scrollLeft;
    }
    return {x: xScroll, y: yScroll};
}

// Adapted from getPageSize() by quirksmode.com
function getPageHeight() {
    var windowHeight
    if (self.innerHeight) { // all except Explorer
        windowHeight = self.innerHeight;
    } else if (document.documentElement && document.documentElement.clientHeight) {
        windowHeight = document.documentElement.clientHeight;
    } else if (document.body) { // other Explorers
        windowHeight = document.body.clientHeight;
    }
    return windowHeight
}

// check nav bar
function checkNavBar() {
    if (getPageScroll().y > 0) {
        $('.navbar.navbar-default ').addClass('nav-active');
    } else {
        $('.navbar.navbar-default ').removeClass('nav-active');
    }
}
(function ($) {
    // align slider with nav bar
    $(document).ready(function () {
        // resize slider area
        resizeSlider();        
        $(window).on('resize', function (e) {
            resizeSlider();
        });        

        $('#main-slider .slider-info a').on('click', function() {
            $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
            return false;
        });

        // active slider
        $('#home #main-slider .carousel.slide').carousel({
            interval: 8000,
            pause: false
        });

        // clients slider
        $("#clients-area #owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            pagination: false,
            autoPlay: 5000,
            items : 4,
        });	
    });

    $(document).ready(function () {
        /*main slider and all slider carousel speed*/
        $('#home-slider.carousel').carousel({
            interval: 6000
        });

        $('#schedule-slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
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
                        slidesToShow: 2,
                        slidesToScroll: 2
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


        /*pause video carousel*/
        $('#video-scroller.carousel').carousel({
            pause: true,
            interval: false
        });

        /*set images carousel speed*/
        $('#images-scroller.carousel').carousel({
            interval: 4000
        });
    });
})(jQuery);

function resizeSlider() {
    var winHeigth = $(window).height();
    $('#main-slider').css('height', winHeigth);
}


$(document).ready(function () {
    // empty
});
(function () {
    $(window).on('load',function() {
        setupMansoryGrid('.grid','.grid-item');

        $(window).on('resize',function(e) {
            setupMansoryGrid('.home-jobs-grid','.home-jobs-grid-item');
        });
        console.log("WORKS");
    });

    function setupMansoryGrid(grid, item) {
        var _grid = jQuery(grid);
        var _item = jQuery(item);
        var winWidth = _grid.width();

        if (screenMatch(401, 800)) {
            width = winWidth/3;
            _item.css('width','48%');
        }
        else if (screenMatch(0, 400)) {
            width = winWidth/2;
            _item.css('width','48%');
        }
        else {
            var width = winWidth/4;
            _item.css('width','48%');
        }

        _grid.masonry({
            itemSelector: item,
            columnWidth: width,
            percentPosition: true
        })
            .masonry();
    }

    function screenMatch(min_width, max_width) {
        var max_width = max_width || 100000;
        var min_width = min_width || 0;
        var max_check = window.matchMedia("(max-width: "+max_width+"px)").matches;
        var min_check = window.matchMedia("(min-width: "+min_width+"px)").matches;

        return max_check && min_check;
    }
})();
