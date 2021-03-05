function hideFormAndShowThankYouBox(e) {
    var t = e.getFormElem(),
        i = t.parent(),
        s = i.height();
    t.hide(), i.append('<div class="form-submitted" />').css("height", s).html(ujet_object.subscribe_message);
}
function searchToObject() {
    var e,
        t,
        i = window.location.search.substring(1).split("&"),
        s = {};
    for (t in i) "" !== i[t] && ((e = i[t].split("=")), (s[decodeURIComponent(e[0])] = decodeURIComponent(e[1])));
    return s;
}
function serialize(e) {
    var t = [];
    for (var i in e) e.hasOwnProperty(i) && t.push(encodeURIComponent(i) + "=" + encodeURIComponent(e[i]));
    return t.join("&");
}
!(function (n) {
    function t() {
        var e = n(".footer-navigation li.menu-item-has-children > a");
        window.matchMedia("(max-width: 850px)").matches
            ? (0 === n(".sub-menu__arrow").length && e.after('<span class="sub-menu__arrow"></span>'),
              jQuery.each(jQuery(".make_it_big .make_it_big"), function () {
                  var e = n(this),
                      t = e.parents("li").attr("id");
                  e.attr("data-parent-id", t), n("#" + t).after(e);
              }))
            : jQuery.each(jQuery(".make_it_big[data-parent-id]"), function () {
                  var e = n(this),
                      t = e.attr("data-parent-id");
                  n("#" + t + " ul").append(e), e.removeAttr("data-parent-id");
              });
    }
    function i(e, o, r) {
        e.each(function (e) {
            var t, i, s;
            (t = n(this).find(o).height()),
                (i = n(this).find(r).height()) < t
                    ? ((s = (t - i) / 2), n(this).find(o).css("margin-top", "0"), n(this).find(r).css("padding-top", s))
                    : ((s = (i - t) / 2), n(this).find(r).css("padding-top", "0"), n(this).find(o).css("margin-top", s));
        });
    }

    $(document).ready (function () {
        if ($(window).width() < 1024) {
            $(".header__menu>ul>li a:not(.header__menu>ul>li.menu-item-has-children > a)").click(function (e) {
                $(".header__menu>ul").toggle(), $(".menu_hamburger").removeClass("close");
            });
            $(".header__menu>ul>li.menu-item-has-children > a").click(function (e) {
                e.preventDefault();
                $(this).parent().hasClass("active") ? $(this).parent().removeClass("active") : ($(this).parent().siblings().removeClass("active"), $(this).parent().addClass("active"));
            });
        }

       // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

            // Store hash
            var hash = this.hash;

            var offset = -100;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top  + offset
            }, 500, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
               // window.location.hash = hash;
            });
            return false;
            } // End if
        });
    })

    n(document).ready(function () {
        if (
            ((function () {
                var e = window.location.pathname,
                    t = window.location.hash;
                "/about-us/" === e && "#leaders" === t && (window.location.href = "/leadership/");
            })(),
            0 < n("body.home").length)
        ) {
            if (n(window).width() < 1024) {
                var e = n(".video-upload").height();
                (e -= 3), n(".video-overlay").css("height", e + "px");
            }
            n(window).scroll(function () {
                if (0 < n(".video-section").length) {
                    var e = n(".video-section").offset().top,
                        t = n(".video-section").outerHeight(),
                        i = n(window).height(),
                        s = n(this).scrollTop(),
                        o = n("#video_play");
                    e + t - i < s && s < e && e + t < s + i
                        ? (setTimeout(function () {
                              n(".video-overlay").addClass("hide"), n(".video-upload").removeClass("hide"), 0 < o.length && o.get(0).play();
                          }, 100),
                          n(window).width() < 769 && n(".video-overlay").css("height", "auto"))
                        : 0 < o.length && o.get(0).pause();
                }
            });
        }
        if (
            (n(document).on("click", 'a[href="#"]', function (e) {
                //e.preventDefault();
            }),
            n("header.header").sticky({ topSpacing: 0 }),
            n(".menu_hamburger").click(function () {
                n(".header__menu>ul").toggle(), n(this).hasClass("close") ? n(this).removeClass("close") : n(this).addClass("close");
            }),

            n(".header__menu>ul>li >a").after(n("<span class='arrow'></span>")),
           
            t(),
            n(document).on("click", ".sub-menu__arrow", function () {
                n(this).parents("li").siblings().children(".sub-menu").removeClass("showMe"),
                    n(this).next(".sub-menu").toggleClass("showMe"),
                    n(this).toggleClass("sub-menu__arrow_df"),
                    n(this).parents("li").siblings().children(".sub-menu__arrow_df").removeClass("sub-menu__arrow_df");
            }),
            n(".paragraph-select li:nth-child(1)").addClass("active"),
            n(document).on("click", ".paragraph-select li[id]", function (e) {
                n(this).siblings().removeClass("active"), n(this).addClass("active"), n(".paragraph-select .blocks:not([related=" + this.id + "])").hide(), n(".paragraph-select .blocks[related=" + this.id + "]").show();
            }),
            n(".testimonial").slick({ arrows: !0, slidesToShow: 1, nextArrow: n(".next"), prevArrow: n(".previous"), mobileFirst: !0, dots: !0 }),
            n("#why-ujet-testimonials").length && n("#why-ujet-testimonials .paginator").appendTo("#why-ujet-testimonials .slick-slider"),
            n("#library-images-slider .slider,.library-images-slider .slider").slick({
                arrows: !0,
                slidesToShow: 3,
                nextArrow: n(".next"),
                prevArrow: n(".previous"),
                responsive: [{ breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 2 } }],
            }),
            n("#library-video-slider .slider,.library-video-slider .slider").slick({ arrows: !0, slidesToShow: 1, nextArrow: n(".next"), prevArrow: n(".previous") }),
            n(".slick-slider").on("beforeChange", function (e, t, i, s) {
                n(".slick-active iframe").attr("src", n(".slick-active iframe").attr("src"));
            }),
            n("#whitepapers-and-ebooks .slider,.whitepapers-and-ebooks .slider").slick({
                arrows: !0,
                slidesToShow: 3,
                nextArrow: n(".next"),
                prevArrow: n(".previous"),
                responsive: [{ breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 2 } }],
            }),
            n("#webinars .slider,.webinars .slider").slick({ arrows: !0, slidesToShow: 3, nextArrow: n(".next"), prevArrow: n(".previous"), responsive: [{ breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 2 } }] }),
            n("#video_thought-leadership .slider,.video_thought-leadership .slider").slick({ arrows: !0, slidesToShow: 1, nextArrow: n(".next"), prevArrow: n(".previous") }),
            n(".lp_form_with_image_background").length && n(".radius_footer").css({ height: "110px", background: "#040986", "border-radius": "0" }),
            n(".reviews-slider .slider").slick({
                arrows: !0,
                slidesToShow: 3,
                nextArrow: n(".next"),
                prevArrow: n(".previous"),
                responsive: [
                    { breakpoint: 1e3, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                    { breakpoint: 700, settings: { slidesToShow: 1, slidesToScroll: 1 } },
                ],
            }),
            setTimeout(function () {
                if ((n(".grid-masonry").masonry({ itemSelector: ".grid-item", columnWidth: ".grid-item", gutter: ".gutter-sizer", percentPosition: !0 }), n(".grid-item").length % 2 != 0)) {
                    var e = document.getElementsByClassName("grid-item"),
                        t = n(".grid-item").length;
                    e.item(t - 1).style.left = "0";
                }
            }, 200),
            setTimeout(function () {
                n(".grid-masonry2").masonry({ itemSelector: ".grid-item", columnWidth: ".grid-item" });
            }, 200),
            i(n(".row.image-on-left, .row.image-on-right"), ".round-image", ".description"),
            (window.onload = function () {
                window.jQuery && i(n(".row.image-on-left, .row.image-on-right"), ".round-image", ".description");
            }),
            n(document).mouseup(function (e) {
                var t = n(".member__popup--content");
                t.is(e.target) || 0 !== t.has(e.target).length || n(".mfp-hide").css("display", "none");
            }),
            n(".member__popup--content").click(function (e) {
                e.stopPropagation();
            }),
            n(".mfp-close").click(function () {
                n(this).parents(".member__popup").css("display", "none");
            }),
            n(".member__thumbnail").click(function () {
                n(this).parents(".member").next(".member__popup").css("display", "block");
            }),
            n(".member__title").click(function () {
                n(this).parents(".member").next(".member__popup").css("display", "block");
            }),
            n("#press-listing-section .slider").slick({
                arrows: !0,
                slidesToShow: 3,
                nextArrow: n(".next.press-listing-section "),
                prevArrow: n(".previous.press-listing-section  "),
                responsive: [
                    { breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 1 } },
                    { breakpoint: 500, settings: { slidesToShow: 1, slidesToScroll: 1 } },
                ],
            }),
            n("#news-listing-section .slider").slick({
                arrows: !0,
                slidesToShow: 3,
                nextArrow: n(".next.news-listing-section "),
                prevArrow: n(".previous.news-listing-section "),
                responsive: [
                    { breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 1 } },
                    { breakpoint: 500, settings: { slidesToShow: 1, slidesToScroll: 1 } },
                ],
            }),
            n(".cards-with-links")[0] && n("footer").addClass("bckg-above-footer"),
            !window.matchMedia("(max-width: 769px)").matches)
        ) {
            n(document).scroll(function () {
                !(function () {
                    if (0 < n(".footer").length) {
                        var e = n(document).scrollTop() + window.innerHeight,
                            t = n(".footer").offset().top + 0.25 * window.innerHeight;
                        e < t ? (n("#at-custom-sidebar").css("bottom", "0"), n("#at-custom-sidebar").css("position", "fixed")) : (n("#at-custom-sidebar").css("bottom", e - t + "px"), n("#at-custom-sidebar").css("position", "absolute"));
                    }
                })();
            });
        }
    }),
        n(window).on("resize", function () {
            t(), i(n(".row.image-on-left, .row.image-on-right"), ".round-image", ".description");
        });
})(jQuery),
    0 < jQuery('form[id^="mktoForm"]').length &&
        MktoForms2.whenReady(function (i) {
            i.onSuccess(function (e, t) {
                if (1 == ujet_object.IS_BLOG && ujet_object.subscribe_message) return hideFormAndShowThankYouBox(i), !1;
            });
        }),
    (function (e) {
        "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof module && module.exports ? (module.exports = e(require("jquery"))) : e(jQuery);
    })(function (p) {
        function e() {
            for (var e = h.scrollTop(), t = u.height(), i = t - g, s = i < e ? i - e : 0, o = 0, r = m.length; o < r; o++) {
                var n = m[o],
                    a = n.stickyWrapper.offset().top - n.topSpacing - s;
                if ((n.stickyWrapper.css("height", n.stickyElement.outerHeight()), e <= a))
                    null !== n.currentTop && (n.stickyElement.css({ width: "", position: "", top: "", "z-index": "" }), n.stickyElement.parent().removeClass(n.className), n.stickyElement.trigger("sticky-end", [n]), (n.currentTop = null));
                else {
                    var c,
                        l = t - n.stickyElement.outerHeight() - n.topSpacing - n.bottomSpacing - e - s;
                    if ((l < 0 ? (l += n.topSpacing) : (l = n.topSpacing), n.currentTop !== l))
                        n.getWidthFrom ? ((padding = n.stickyElement.innerWidth() - n.stickyElement.width()), (c = p(n.getWidthFrom).width() - padding || null)) : n.widthFromWrapper && (c = n.stickyWrapper.width()),
                            null == c && (c = n.stickyElement.width()),
                            n.stickyElement.css("width", c).css("position", "fixed").css("top", l).css("z-index", n.zIndex),
                            n.stickyElement.parent().addClass(n.className),
                            null === n.currentTop ? n.stickyElement.trigger("sticky-start", [n]) : n.stickyElement.trigger("sticky-update", [n]),
                            (n.currentTop === n.topSpacing && n.currentTop > l) || (null === n.currentTop && l < n.topSpacing)
                                ? n.stickyElement.trigger("sticky-bottom-reached", [n])
                                : null !== n.currentTop && l === n.topSpacing && n.currentTop < l && n.stickyElement.trigger("sticky-bottom-unreached", [n]),
                            (n.currentTop = l);
                    var d = n.stickyWrapper.parent();
                    n.stickyElement.offset().top + n.stickyElement.outerHeight() >= d.offset().top + d.outerHeight() && n.stickyElement.offset().top <= n.topSpacing
                        ? n.stickyElement.css("position", "absolute").css("top", "").css("bottom", 0).css("z-index", "")
                        : n.stickyElement.css("position", "fixed").css("top", l).css("bottom", "").css("z-index", n.zIndex);
                }
            }
        }
        function t() {
            g = h.height();
            for (var e = 0, t = m.length; e < t; e++) {
                var i = m[e],
                    s = null;
                i.getWidthFrom ? i.responsiveWidth && (s = p(i.getWidthFrom).width()) : i.widthFromWrapper && (s = i.stickyWrapper.width()), null != s && i.stickyElement.css("width", s);
            }
        }
        var i = Array.prototype.slice,
            s = Array.prototype.splice,
            a = { topSpacing: 0, bottomSpacing: 0, className: "is-sticky", wrapperClassName: "sticky-wrapper", center: !1, getWidthFrom: "", widthFromWrapper: !0, responsiveWidth: !1, zIndex: "inherit" },
            h = p(window),
            u = p(document),
            m = [],
            g = h.height(),
            c = {
                init: function (n) {
                    return this.each(function () {
                        var e = p.extend({}, a, n),
                            t = p(this),
                            i = t.attr("id"),
                            s = i ? i + "-" + a.wrapperClassName : a.wrapperClassName,
                            o = p("<div></div>").attr("id", s).addClass(e.wrapperClassName);
                        t.wrapAll(function () {
                            if (0 == p(this).parent("#" + s).length) return o;
                        });
                        var r = t.parent();
                        e.center && r.css({ width: t.outerWidth(), marginLeft: "auto", marginRight: "auto" }),
                            "right" === t.css("float") && t.css({ float: "none" }).parent().css({ float: "right" }),
                            (e.stickyElement = t),
                            (e.stickyWrapper = r),
                            (e.currentTop = null),
                            m.push(e),
                            c.setWrapperHeight(this),
                            c.setupChangeListeners(this);
                    });
                },
                setWrapperHeight: function (e) {
                    var t = p(e),
                        i = t.parent();
                    i && i.css("height", t.outerHeight());
                },
                setupChangeListeners: function (t) {
                    window.MutationObserver
                        ? new window.MutationObserver(function (e) {
                              (e[0].addedNodes.length || e[0].removedNodes.length) && c.setWrapperHeight(t);
                          }).observe(t, { subtree: !0, childList: !0 })
                        : window.addEventListener
                        ? (t.addEventListener(
                              "DOMNodeInserted",
                              function () {
                                  c.setWrapperHeight(t);
                              },
                              !1
                          ),
                          t.addEventListener(
                              "DOMNodeRemoved",
                              function () {
                                  c.setWrapperHeight(t);
                              },
                              !1
                          ))
                        : window.attachEvent &&
                          (t.attachEvent("onDOMNodeInserted", function () {
                              c.setWrapperHeight(t);
                          }),
                          t.attachEvent("onDOMNodeRemoved", function () {
                              c.setWrapperHeight(t);
                          }));
                },
                update: e,
                unstick: function (e) {
                    return this.each(function () {
                        for (var e = p(this), t = -1, i = m.length; 0 < i--; ) m[i].stickyElement.get(0) === this && (s.call(m, i, 1), (t = i));
                        -1 !== t && (e.unwrap(), e.css({ width: "", position: "", top: "", float: "", "z-index": "" }));
                    });
                },
            };
        window.addEventListener ? (window.addEventListener("scroll", e, !1), window.addEventListener("resize", t, !1)) : window.attachEvent && (window.attachEvent("onscroll", e), window.attachEvent("onresize", t)),
            (p.fn.sticky = function (e) {
                return c[e] ? c[e].apply(this, i.call(arguments, 1)) : "object" != typeof e && e ? void p.error("Method " + e + " does not exist on jQuery.sticky") : c.init.apply(this, arguments);
            }),
            (p.fn.unstick = function (e) {
                return c[e] ? c[e].apply(this, i.call(arguments, 1)) : "object" != typeof e && e ? void p.error("Method " + e + " does not exist on jQuery.sticky") : c.unstick.apply(this, arguments);
            }),
            p(function () {
                setTimeout(e, 0);
            });
    });
