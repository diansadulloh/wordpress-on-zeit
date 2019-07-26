(function (e) {
    "use strict";
    var n = window.AFTHEMES_JS || {};
    n.mobileMenu = {
        init: function () {
            this.toggleMenu(), this.menuMobile(), this.menuArrow()
        },
        toggleMenu: function () {
            e('#masthead').on('click', '.toggle-menu', function (event) {
                var ethis = e('.main-navigation .menu .menu-mobile');
                if (ethis.css('display') == 'block') {
                    ethis.slideUp('300');
                } else {
                    ethis.slideDown('300');
                }
                e('.ham').toggleClass('exit');
            });
            e('#masthead .main-navigation ').on('click', '.menu-mobile a i', function (event) {
                event.preventDefault();
                var ethis = e(this),
                    eparent = ethis.closest('li');

                if (eparent.find('> .children').length) {
                    var esub_menu = eparent.find('> .children');
                } else {
                    var esub_menu = eparent.find('> .sub-menu');
                }


                if (esub_menu.css('display') == 'none') {
                    esub_menu.slideDown('300');
                    ethis.addClass('active');
                } else {
                    esub_menu.slideUp('300');
                    ethis.removeClass('active');
                }
                return false;
            });
        },
        menuMobile: function () {
            if (e('.main-navigation .menu > ul').length) {
                var ethis = e('.main-navigation .menu > ul'),
                    eparent = ethis.closest('.main-navigation'),
                    pointbreak = eparent.data('epointbreak'),
                    window_width = window.innerWidth;
                if (typeof pointbreak == 'undefined') {
                    pointbreak = 991;
                }
                if (pointbreak >= window_width) {
                    ethis.addClass('menu-mobile').removeClass('menu-desktop');
                    e('.main-navigation .toggle-menu').css('display', 'block');
                } else {
                    ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                    e('.main-navigation .toggle-menu').css('display', '');
                }
            }
        },
        menuArrow: function () {
            if (e('#masthead .main-navigation div.menu > ul').length) {
                e('#masthead .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="">');
                e('#masthead .main-navigation div.menu > ul .children').parent('li').find('> a').append('<i class="">');
            }
        }
    },


        n.DataBackground = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {
                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });

            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                e(this).css('background-image', 'url(' + src + ')').children('img').hide();
            });
        },

        n.Preloader = function () {
            e(window).load(function () {
                e('.spinner-container').fadeOut();
                e('#af-preloader').delay(1000).fadeOut('slow');
            });
        },

        n.Search = function () {
            e(window).load(function () {
                e(".af-search-click").on('click', function () {
                    e("#af-search-wrap").toggleClass("af-search-toggle");
                });
            });
        },

        n.Offcanvas = function () {
            e('.offcanvas-nav').sidr({
                side: 'right',
                displace: false,
            });

            e('.sidr-class-sidr-button-close').click(function () {
                e.sidr('close', 'sidr');
            });
        },

        n.openCloseSearch = function () {
            e('.open-search-form').click(function () {
                e('#myOverlay').show();
            });

            e('.close-serach-form').click(function () {
                e('#myOverlay').hide();
            });


        },


        // SHOW/HIDE SCROLL UP //
        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e("#scroll-up").fadeIn(300);
            } else {
                e("#scroll-up").fadeOut(300);
            }
        },

        n.scroll_up = function () {
            e("#scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        },

        n.RtlCheck = function () {
            if (e('body').hasClass("rtl")) {
                return true;
            } else {
                return false;
            }
        },

        n.OwlCarouselandSlider = function () {

            jQuery('.main-banner-slider-single').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause: true,
                slideSpeed: 300,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            jQuery('.main-banner-slider-center').owlCarousel({
                center: true,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause: true,
                slideSpeed: 300,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            });




            jQuery('.latest-product-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                margin: 9,
                nav: false,
                dots: false,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }
            });

            jQuery('.page-carousel-vertical').owlCarousel({
                loop: true,
                autoplay: true,
                items: 1,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                margin: 5,
                nav: false,
                dots: true,
                rtl: n.RtlCheck(),


            });

            jQuery('.page-carousel-lower').owlCarousel({
                loop: true,
                autoplay: true,
                items: 2,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                margin: 10,
                nav: true,
                dots: false,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    }
                }

            });



            jQuery('#sidr .product-carousel').owlCarousel({
                loop: false,
                margin: 5,
                items: 1,
                dots: true,
                nav: true,
                rtl: n.RtlCheck(),
            });

            jQuery('#secondary .product-carousel').owlCarousel({
                loop: false,
                margin: 5,
                items: 1,
                dots: true,
                nav: true,
                rtl: n.RtlCheck(),
            });

            jQuery('footer .product-carousel').owlCarousel({
                loop: false,
                margin: 5,
                items: 1,
                dots: true,
                nav: true,
                rtl: n.RtlCheck(),
            });

            jQuery('.product-carousel').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    630: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 5
                    }
                }
            });

            jQuery('#secondary .tabbed-product-carousel').owlCarousel({
                loop: false,
                margin: 10,
                items: 1,
                dots: false,
                nav: false,
                rtl: n.RtlCheck(),
            });

            jQuery('#sidr .tabbed-product-carousel').owlCarousel({
                loop: false,
                margin: 10,
                items: 1,
                dots: false,
                nav: false,
                rtl: n.RtlCheck(),
            });

            jQuery('footer .tabbed-product-carousel').owlCarousel({
                loop: false,
                margin: 10,
                items: 1,
                dots: false,
                nav: false,
                rtl: n.RtlCheck(),
            });

            jQuery('.tabbed-product-carousel').owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    630: {
                        items: 2
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 5
                    }
                }
            });

            jQuery('#secondary .product-slider').owlCarousel({
                loop: true,
                center: false,
                autoHeight: false,
                autoplay: true,
                margin: 10,
                nav: false,
                dots: false,
                slideSpeed: 300,
                thumbs: false,
                items: 1,
                rtl: n.RtlCheck(),
            });

            jQuery('#sidr .product-slider').owlCarousel({
                loop: true,
                center: false,
                autoHeight: false,
                autoplay: true,
                margin: 10,
                nav: false,
                dots: false,
                slideSpeed: 300,
                thumbs: false,
                items: 1,
                rtl: n.RtlCheck(),
            });

            jQuery('footer .product-slider').owlCarousel({
                loop: true,
                center: false,
                autoHeight: false,
                autoplay: true,
                margin: 10,
                nav: false,
                dots: false,
                slideSpeed: 300,
                thumbs: false,
                items: 1,
                rtl: n.RtlCheck(),
            });

            jQuery('.product-slider').owlCarousel({
                loop: true,
                center: true,
                autoHeight: false,
                margin: 10,
                nav: true,
                dots: false,
                slideSpeed: 300,
                thumbs: true,
                thumbsPrerendered: true,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1,
                        dots: true
                    },
                    768: {
                        items: 1,
                        dots: true
                    },
                    1024: {
                        items: 2
                    }
                }
            });

            jQuery('#secondary .latest-reviews-slider').owlCarousel({

                loop: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: true,
                margin: 10,
                dots: false,
                rtl: n.RtlCheck(),
                items: 1,
            });
            jQuery('#sidr .latest-reviews-slider').owlCarousel({

                loop: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: true,
                margin: 10,
                dots: false,
                items: 1,
                rtl: n.RtlCheck(),
            });
            jQuery('footer .latest-reviews-slider').owlCarousel({

                loop: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: true,
                margin: 10,
                dots: false,
                items: 1,
                rtl: n.RtlCheck(),
            });

            jQuery('.latest-reviews-slider').owlCarousel({

                loop: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: true,
                margin: 10,
                dots: false,
                items: 3,
                rtl: n.RtlCheck(),
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }

            });




        },


        n.faqAccordion = function () {


            jQuery(".aft-accordion-section").accordion({
                heightStyle: "content"
            });

        },


        e(document).ready(function () {
            n.mobileMenu.init(), n.DataBackground(), n.Preloader(), n.Search(), n.Offcanvas(), n.openCloseSearch(), n.OwlCarouselandSlider(), n.faqAccordion(), n.scroll_up();
        }), e(window).scroll(function () {
        n.show_hide_scroll_top();
    }), e(window).resize(function () {
        n.mobileMenu.menuMobile();
    })
})(jQuery);