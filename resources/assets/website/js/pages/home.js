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