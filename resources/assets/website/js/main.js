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