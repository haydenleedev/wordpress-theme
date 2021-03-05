console.log('it works :)');
console.log(ujet_object);

(function ($) { //create closure so we can safely use $ as alias for jQuery
    $(document).ready(function () {

        redirectsByHashtag();

        //#region videoHomepage
        if ($('body.home').length > 0) {
            if ($(window).width() < 1024) {
                var height = $('.video-upload').height();
                // $('#homepage-hero').css("height", height + "px");
                height = height - 3;
                $('.video-overlay').css("height", height + "px");
            }

            $(window).scroll(function () {
                if ($('.video-section').length > 0) {
                    var hT = $('.video-section').offset().top,
                        hH = $('.video-section').outerHeight(),
                        wH = $(window).height(),
                        wS = $(this).scrollTop();
                    var $homepage_video_play = $('#video_play');
                    if (wS > (hT + hH - wH) && (hT > wS) && (wS + wH > hT + hH)) {
                        // console.log('video on the view!');
                        setTimeout(function () {
                            $('.video-overlay').addClass("hide");
                            $('.video-upload').removeClass("hide");

                            if ($homepage_video_play.length > 0) {
                                $homepage_video_play.get(0).play();
                            }

                        }, 100);
                        if ($(window).width() < 769) {
                            $('.video-overlay').css("height", "auto");
                        }
                    } else {
                        if ($homepage_video_play.length > 0) {
                            $homepage_video_play.get(0).pause();
                        }
                    }
                }
            });
        }


//endregion
        // Prevent jump on <a> tag if href only contains #, using a delegated event handler
        $(document).on('click', 'a[href="#"]', function (e) {
            e.preventDefault();
        });

        //#region Header Menu
        $("header.header").sticky({topSpacing: 0});

        $('.menu_hamburger').click(function () {

            $('.header__menu>ul').toggle();
            if ($(this).hasClass('close')) {
                $(this).removeClass('close');
            } else {
                $(this).addClass('close');
            }
        });

        $(".header__menu>ul>li >a").after($("<span class='arrow'></span>"));


        $('.header__menu>ul>li .arrow').click(function () {

            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');

            } else {
                $(this).parent().siblings().removeClass('active');
                $(this).parent().addClass('active');
            }

        });
        //endregion 
        //#region Footer
        footerMenuAdjust();

        $(document).on('click', '.sub-menu__arrow', function () {
            $(this).parents('li').siblings().children('.sub-menu').removeClass('showMe'); // close all sub-menus
            $(this).next('.sub-menu').toggleClass('showMe'); // open only the sub-menu clicked
            $(this).toggleClass('sub-menu__arrow_df');
            $(this).parents('li').siblings().children('.sub-menu__arrow_df').removeClass('sub-menu__arrow_df');
        });
        //endregion

        //#region paragraphs select

        $('.paragraph-select li:nth-child(1)').addClass('active');

        $(document).on('click', '.paragraph-select li[id]', function (e) {
            // alert(this.id);
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $(".paragraph-select .blocks:not([related=" + this.id + "])").hide();
            $(".paragraph-select .blocks[related=" + this.id + "]").show();
        });
        //#endregion

        //#region Testimonials
        $('.testimonial').slick({
            arrows: true,
            slidesToShow: 1,
            nextArrow: $('.next'),
            prevArrow: $('.previous'),
            mobileFirst: true,
            dots: true
        });

        if ($("#why-ujet-testimonials").length) {
            $("#why-ujet-testimonials .paginator").appendTo("#why-ujet-testimonials .slick-slider");
        }

        //endregion
        //#region library
        $('#library-images-slider .slider,.library-images-slider .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next'),
            prevArrow: $('.previous'),
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
        });
        $('#library-video-slider .slider,.library-video-slider .slider').slick({
            arrows: true,
            slidesToShow: 1,
            nextArrow: $('.next'),
            prevArrow: $('.previous')
        });

        $('.slick-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            $('.slick-active iframe').attr('src', $('.slick-active iframe').attr('src'));
        });


        //endregion

        //#region whitepapers-and-ebooks
        $('#whitepapers-and-ebooks .slider,.whitepapers-and-ebooks .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next'),
            prevArrow: $('.previous'),
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
        });
        $('#webinars .slider,.webinars .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next'),
            prevArrow: $('.previous'),
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }]
        });
        $('#video_thought-leadership .slider,.video_thought-leadership .slider').slick({
            arrows: true,
            slidesToShow: 1,
            nextArrow: $('.next'),
            prevArrow: $('.previous')
        });
        //endregion

        //#region partners
        // if ($('body').hasClass('partners')) {
        //     $(".radius_footer").css({"height": "110px", "background":"#040986", "border-radius":"0"});
        // }
        //endregion

        //#region LP template
        if ($(".lp_form_with_image_background").length) {
            $(".radius_footer").css({"height": "110px", "background": "#040986", "border-radius": "0"});
        }
        //endregion

        //#region reviews-slider
        $('.reviews-slider .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next'),
            prevArrow: $('.previous'),
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
        });
        //endregion

        //#region masonry
        setTimeout(function () {
            $('.grid-masonry').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
                gutter: '.gutter-sizer',
                percentPosition: true
            });
            //force the last element to stay left when elemnts are odds
            if ($(".grid-item").length % 2 != 0) {
                var test = document.getElementsByClassName("grid-item");
                var no_of_items = $(".grid-item").length;
                test.item(no_of_items - 1).style.left = "0";
            }
        }, 200); // set a small timeout so the images inside .grid-item can load

        setTimeout(function () {
            $('.grid-masonry2').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: '.grid-item',
            })
        }, 200); // set a small timeout so the images inside .grid-item can load
        //endregion
        //#region image-text-rows
        centerAlign($('.row.image-on-left, .row.image-on-right'), '.round-image', '.description');
        window.onload = function () {
            if (window.jQuery) {
                centerAlign($('.row.image-on-left, .row.image-on-right'), '.round-image', '.description');
            }
        };
        //endregion
        //#region leadership
        $(document).mouseup(function (e) {
            var container = $(".member__popup--content");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.mfp-hide').css("display", "none");
            }
        });
        $('.member__popup--content').click(function (event) {
            event.stopPropagation();
        });
        $('.mfp-close').click(function () {
            $(this).parents('.member__popup').css("display", "none");
        });

        $('.member__thumbnail').click(function () {
            $(this).parents('.member').next('.member__popup').css("display", "block");
        });
        $('.member__title').click(function () {
            $(this).parents('.member').next('.member__popup').css("display", "block");
        });
        //endregion
        //#region press
        $('#press-listing-section .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next.press-listing-section '),
            prevArrow: $('.previous.press-listing-section  '),
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
        });
        $('#news-listing-section .slider').slick({
            arrows: true,
            slidesToShow: 3,
            nextArrow: $('.next.news-listing-section '),
            prevArrow: $('.previous.news-listing-section '),
            responsive: [
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }

                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
        //endregion
        //#region thankyou-pages
        if ($('.cards-with-links')[0]) {
            $('footer').addClass('bckg-above-footer');
        }

        var mq = window.matchMedia("(max-width: 769px)");
        if (!mq.matches) {
            $(document).scroll(function () {
                checkOffset();
            });

            function checkOffset() {
                if ($('.footer').length > 0) {
                    var a = $(document).scrollTop() + window.innerHeight;
                    var b = $('.footer').offset().top + 25 / 100 * window.innerHeight;
                    if (a < b) {
                        $('#at-custom-sidebar').css('bottom', '0');
                        $('#at-custom-sidebar').css('position', 'fixed');
                    } else {
                        $('#at-custom-sidebar').css('bottom', ((a - b)) + 'px');
                        $('#at-custom-sidebar').css('position', 'absolute');
                    }
                }
            }
        }


    });


    $(window).on('resize', function () {
        footerMenuAdjust();

        centerAlign($('.row.image-on-left, .row.image-on-right'), '.round-image', '.description');
    });

    function footerMenuAdjust() {
        var anchorList = $('.footer-navigation li.menu-item-has-children > a');

        if (window.matchMedia("(max-width: 850px)").matches) {
            if ($(".sub-menu__arrow").length === 0) {
                anchorList.after('<span class="sub-menu__arrow"></span>');
            }

            jQuery.each(jQuery('.make_it_big .make_it_big'), function () {
                var $this = $(this),
                    parentID = $this.parents('li').attr('id');
                $this.attr('data-parent-id', parentID);
                $('#' + parentID).after($this);
            });
        } else {
            jQuery.each(jQuery('.make_it_big[data-parent-id]'), function () {
                var $this = $(this),
                    parentID = $this.attr('data-parent-id');
                $('#' + parentID + ' ul').append($this);
                $this.removeAttr('data-parent-id');
            });
        }
    }

    function centerAlign(eachElement, findImage, findText) {
        eachElement.each(function (index) {
            var imageHeight, textHeight, difference;
            imageHeight = $(this).find(findImage).height();
            textHeight = $(this).find(findText).height();


            if (imageHeight > textHeight) {
                difference = (imageHeight - textHeight) / 2;
                $(this).find(findImage).css("margin-top", '0');
                $(this).find(findText).css("padding-top", difference);
            } else {
                difference = (textHeight - imageHeight) / 2;
                $(this).find(findText).css("padding-top", '0');
                $(this).find(findImage).css("margin-top", difference);
            }
        });
    }

    function redirectsByHashtag() {
        var pathname = window.location.pathname,
            hash = window.location.hash;

        if (pathname === '/about-us/' && hash === '#leaders') {
            window.location.href = '/leadership/';
        }
    }

    // /* TrustArc consent popup/message */
    // setTimeout(function () {
    //     var head = document.getElementsByTagName('head')[0];
    //     var consentTrusteScript = document.createElement("script");
    //     consentTrusteScript.async = "async";
    //     consentTrusteScript.crossorigin = "crossorigin";
    //     consentTrusteScript.src = "//consent.truste.com/notice?domain=ujet.co&c=teconsent&js=bb&noticeType=bb&gtm=1";
    //     head.appendChild(consentTrusteScript);
    // }, 2000);

})(jQuery);// add everything that uses jQuery above this line


if (jQuery('form[id^="mktoForm"]').length > 0) {
    MktoForms2.whenReady(function (mktoForm) {

        // Add an onSuccess handler
        mktoForm.onSuccess(function (values, followUpUrl) {
            console.log(ujet_object);
            if (ujet_object.IS_BLOG == 1 && ujet_object.subscribe_message) {

                hideFormAndShowThankYouBox(mktoForm);

                // console.log('mktoForm.onSuccess ' +
                //     '\r\nmktoForm: ', mktoForm,
                //     '\r\nvalues: ', values,
                //     '\r\nfollowUpUrl: ', followUpUrl);

                // Return false to prevent the submission handler from taking the lead to the follow up url.
                return false;
            }
        });

    });
}

//#region MktoForms2 Helpers
function hideFormAndShowThankYouBox(mktoForm) {
    var $form = mktoForm.getFormElem(), // Get the form's jQuery element
        $formParent = $form.parent(),
        $formParentHeight = $formParent.height();

    // Get the form's jQuery element and hide it
    $form.hide();
    $formParent.append('<div class="form-submitted" />').css('height', $formParentHeight).html(ujet_object.subscribe_message);
}

//#endregion

//#region Helper functions for working with hashtags & URLs
function searchToObject() {
    var pairs = window.location.search.substring(1).split("&"),
        obj = {},
        pair,
        i;

    for (i in pairs) {
        if (pairs[i] === "") continue;

        pair = pairs[i].split("=");
        obj[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
    }

    return obj;
}

function serialize(obj) {
    var str = [];
    for (var p in obj)
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    return str.join("&");
}

//#endregion

