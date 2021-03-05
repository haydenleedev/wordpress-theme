// JavaScript Document
var initialImg;
$(document).ready(function () {
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
            $(this).toggleClass('open');
        }
    );
});

$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.navbar .navbar-brand img').attr('src', '/files/logo-blue.png');
        }
        if ($(this).scrollTop() < 100) {
            $('.navbar .navbar-brand img').attr('src', '/files/logo-white.png');
        }
        if ($(window).scrollTop() > 100) {
            $('.navbar_section').addClass('fixed');

        } else {
            $('.navbar_section').removeClass('fixed');
        }

        initialImg = $('#logoimg').attr('src');

    })
});


$(function () {
    initialImg = $('#logoimg').attr('src');
    $("#home-button").on({
        mouseenter: function () {
            $('#logoimg').attr('src', '/files/logo-blue.png');
        },
        mouseleave: function () {
            $('#logoimg').attr('src', initialImg);
        }
    });

});


(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this), settings = $.extend({
            format: "dropdown",
            sticky: false
        }, options);
        return this.each(function () {
            $(this).find(".button").on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.slideToggle().removeClass('open');
                } else {
                    mainmenu.slideToggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"><img src="/files/Down-Arrow-PNG.png"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').slideToggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 1000;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("#cssmenu").menumaker({
            format: "multitoggle"
        });
    });
})(jQuery);