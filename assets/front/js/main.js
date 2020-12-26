
(function ($) {

    "use strict";
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows();
        },
    };

    function parallax() {
        $(".bg--parallax").each(function () {
            var el = $(this),
                    xpos = "50%",
                    windowHeight = $(window).height();
            if (isMobile.any()) {
                $(this).css("background-attachment", "scroll");
            } else {
                $(window).scroll(function () {
                    var current = $(window).scrollTop(),
                            top = el.offset().top,
                            height = el.outerHeight();
                    if (top + height < current || top > current + windowHeight) {
                        return;
                    }
                    el.css("backgroundPosition", xpos + " " + Math.round((top - current) * 0.2) + "px");
                });
            }
        });
    }

    function backgroundImage() {
        var databackground = $("[data-background]");
        databackground.each(function () {
            if ($(this).attr("data-background")) {
                var image_path = $(this).attr("data-background");
                $(this).css({
                    background: "url(" + image_path + ")",
                });
            }
        });
    }

    function siteToggleAction() {
        var navSidebar = $(".navigation--sidebar"),
                filterSidebar = $(".ps-filter--sidebar");
        $(".menu-toggle-open").on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass("active");
            navSidebar.toggleClass("active");
            $(".ps-site-overlay").toggleClass("active");
        });

        $(".ps-toggle--sidebar").on("click", function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            $(this).toggleClass("active");
            $(this).siblings("a").removeClass("active");
            $(url).toggleClass("active");
            $(url).siblings(".ps-panel--sidebar").removeClass("active");
            $(".ps-site-overlay").toggleClass("active");
        });

        $("#filter-sidebar").on("click", function (e) {
            e.preventDefault();
            filterSidebar.addClass("active");
            $(".ps-site-overlay").addClass("active");
        });

        $(".ps-filter--sidebar .ps-filter__header .ps-btn--close").on("click", function (e) {
            e.preventDefault();
            filterSidebar.removeClass("active");
            $(".ps-site-overlay").removeClass("active");
        });

        $("body").on("click", function (e) {
            if ($(e.target).siblings(".ps-panel--sidebar").hasClass("active")) {
                $(".ps-panel--sidebar").removeClass("active");
                $(".ps-site-overlay").removeClass("active");
            }
        });
    }

    function subMenuToggle() {
        $(".menu--mobile .menu-item-has-children > .sub-toggle").on("click", function (e) {
            e.preventDefault();
            var current = $(this).parent(".menu-item-has-children");
            $(this).toggleClass("active");
            current.siblings().find(".sub-toggle").removeClass("active");
            current.children(".sub-menu").slideToggle(350);
            current.siblings().find(".sub-menu").slideUp(350);
            if (current.hasClass("has-mega-menu")) {
                current.children(".mega-menu").slideToggle(350);
                current.siblings(".has-mega-menu").find(".mega-menu").slideUp(350);
            }
        });
        $(".menu--mobile .has-mega-menu .mega-menu__column .sub-toggle").on("click", function (e) {
            e.preventDefault();
            var current = $(this).closest(".mega-menu__column");
            $(this).toggleClass("active");
            current.siblings().find(".sub-toggle").removeClass("active");
            current.children(".mega-menu__list").slideToggle(350);
            current.siblings().find(".mega-menu__list").slideUp(350);
        });
        var listCategories = $(".ps-list--categories");
        if (listCategories.length > 0) {
            $(".ps-list--categories .menu-item-has-children > .sub-toggle").on("click", function (e) {
                e.preventDefault();
                var current = $(this).parent(".menu-item-has-children");
                $(this).toggleClass("active");
                current.siblings().find(".sub-toggle").removeClass("active");
                current.children(".sub-menu").slideToggle(350);
                current.siblings().find(".sub-menu").slideUp(350);
                if (current.hasClass("has-mega-menu")) {
                    current.children(".mega-menu").slideToggle(350);
                    current.siblings(".has-mega-menu").find(".mega-menu").slideUp(350);
                }
            });
        }
    }

    function stickyHeader() {
        var header = $(".header"),
                scrollPosition = 0,
                checkpoint = 50;
        header.each(function () {
            if ($(this).data("sticky") === true) {
                var el = $(this);
                $(window).scroll(function () {
                    var currentPosition = $(this).scrollTop();
                    if (currentPosition > checkpoint) {
                        el.addClass("header--sticky");
                    } else {
                        el.removeClass("header--sticky");
                    }
                });
            }
        });

        var stickyCart = $("#cart-sticky");
        if (stickyCart.length > 0) {
            $(window).scroll(function () {
                var currentPosition = $(this).scrollTop();
                if (currentPosition > checkpoint) {
                    stickyCart.addClass("active");
                } else {
                    stickyCart.removeClass("active");
                }
            });
        }
    }






    $(".form_checkout").submit(function (e) {
        e.preventDefault();

        // if (is_required_form_checkout() === true) {
        $.ajax({
            type: "POST",
            url: baseURL + "checkoutPost",
            data: $(this).serialize(),
            dataType: "json",

            success: function (response) {
                // console.log(response);
                if (response.result == 1) {
                    window.location.assign(baseURL + response.redirect_link);
                } else {
                    toastr.error("Check required fileds");
                    // $("input[type=submit]").removeAttr("disabled");
                }
            },
        });
        // } else {
        //     toastr.error("Please check the required fields!");
        // }
    });

    $(".form-free-checkout").submit(function (e) {
        e.preventDefault();

        // if (is_required_form_checkout() === true) {
        $.ajax({
            type: "POST",
            url: baseURL + "checkoutPostFree",
            data: $(this).serialize(),
            dataType: "json",

            success: function (response) {
                // console.log(response);
                if (response.result == 1) {
                    toastr.success("Course successfully purchased");
                    setTimeout(function () {
                        window.location.assign(baseURL + "my-courses");
                    }, 1000);
                } else {
                    toastr.error("Check required fileds");
                    // $("input[type=submit]").removeAttr("disabled");
                }
            },
        });
        // } else {
        //     toastr.error("Please check the required fields!");
        // }
    });



    function owlCarouselConfig() {
        var target = $(".owl-slider");
        if (target.length > 0) {
            target.each(function () {
                var el = $(this),
                        dataAuto = el.data("owl-auto"),
                        dataLoop = el.data("owl-loop"),
                        dataSpeed = el.data("owl-speed"),
                        dataGap = el.data("owl-gap"),
                        dataNav = el.data("owl-nav"),
                        dataDots = el.data("owl-dots"),
                        dataAnimateIn = el.data("owl-animate-in") ? el.data("owl-animate-in") : "",
                        dataAnimateOut = el.data("owl-animate-out") ? el.data("owl-animate-out") : "",
                        dataDefaultItem = el.data("owl-item"),
                        dataItemXS = el.data("owl-item-xs"),
                        dataItemSM = el.data("owl-item-sm"),
                        dataItemMD = el.data("owl-item-md"),
                        dataItemLG = el.data("owl-item-lg"),
                        dataItemXL = el.data("owl-item-xl"),
                        dataNavLeft = el.data("owl-nav-left") ? el.data("owl-nav-left") : "<i class='icon-chevron-left'></i>",
                        dataNavRight = el.data("owl-nav-right") ? el.data("owl-nav-right") : "<i class='icon-chevron-right'></i>",
                        duration = el.data("owl-duration"),
                        datamouseDrag = el.data("owl-mousedrag") == "on" ? true : false;
                if (target.children("div, span, a, img, h1, h2, h3, h4, h5, h5").length >= 2) {
                    el.owlCarousel({
                        animateIn: dataAnimateIn,
                        animateOut: dataAnimateOut,
                        margin: dataGap,
                        autoplay: dataAuto,
                        autoplayTimeout: dataSpeed,
                        autoplayHoverPause: true,
                        loop: dataLoop,
                        nav: dataNav,
                        mouseDrag: datamouseDrag,
                        touchDrag: true,
                        autoplaySpeed: duration,
                        navSpeed: duration,
                        dotsSpeed: duration,
                        dragEndSpeed: duration,
                        navText: [dataNavLeft, dataNavRight],
                        dots: dataDots,
                        items: dataDefaultItem,
                        responsive: {
                            0: {
                                items: dataItemXS,
                            },
                            480: {
                                items: dataItemSM,
                            },
                            768: {
                                items: dataItemMD,
                            },
                            992: {
                                items: dataItemLG,
                            },
                            1200: {
                                items: dataItemXL,
                            },
                            1680: {
                                items: dataDefaultItem,
                            },
                        },
                    });
                }
            });
        }
    }

    function masonry($selector) {
        var masonry = $($selector);
        if (masonry.length > 0) {
            if (masonry.hasClass("filter")) {
                masonry.imagesLoaded(function () {
                    masonry.isotope({
                        columnWidth: ".grid-sizer",
                        itemSelector: ".grid-item",
                        isotope: {
                            columnWidth: ".grid-sizer",
                        },
                        filter: "*",
                    });
                });
                var filters = masonry.closest(".masonry-root").find(".ps-masonry-filter > li > a");
                filters.on("click", function (e) {
                    e.preventDefault();
                    var selector = $(this).attr("href");
                    filters.find("a").removeClass("current");
                    $(this).parent("li").addClass("current");
                    $(this).parent("li").siblings("li").removeClass("current");
                    $(this)
                            .closest(".masonry-root")
                            .find(".ps-masonry")
                            .isotope({
                                itemSelector: ".grid-item",
                                isotope: {
                                    columnWidth: ".grid-sizer",
                                },
                                filter: selector,
                            });
                    return false;
                });
            } else {
                masonry.imagesLoaded(function () {
                    masonry.masonry({
                        columnWidth: ".grid-sizer",
                        itemSelector: ".grid-item",
                    });
                });
            }
        }
    }

    function mapConfig() {
        var map = $("#contact-map");
        if (map.length > 0) {
            map.gmap3({
                address: map.data("address"),
                zoom: map.data("zoom"),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
            })
                    .marker(function (map) {
                        return {
                            position: map.getCenter(),
                            icon: "img/marker.png",
                        };
                    })
                    .infowindow({
                        content: map.data("address"),
                    })
                    .then(function (infowindow) {
                        var map = this.get(0);
                        var marker = this.get(1);
                        marker.addListener("click", function () {
                            infowindow.open(map, marker);
                        });
                    });
        } else {
            return false;
        }
    }

    function slickConfig() {
        var product = $(".ps-product--detail");
        if (product.length > 0) {
            var primary = product.find(".ps-product__gallery"),
                    second = product.find(".ps-product__variants"),
                    vertical = product.find(".ps-product__thumbnail").data("vertical");
            primary.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: ".ps-product__variants",
                fade: true,
                dots: false,
                infinite: false,
                arrows: primary.data("arrow"),
                prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
            });
            second.slick({
                slidesToShow: second.data("item"),
                slidesToScroll: 1,
                infinite: false,
                arrows: second.data("arrow"),
                focusOnSelect: true,
                prevArrow: "<a href='#'><i class='fa fa-angle-up'></i></a>",
                nextArrow: "<a href='#'><i class='fa fa-angle-down'></i></a>",
                asNavFor: ".ps-product__gallery",
                vertical: vertical,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            arrows: second.data("arrow"),
                            slidesToShow: 4,
                            vertical: false,
                            prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: second.data("arrow"),
                            slidesToShow: 4,
                            vertical: false,
                            prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 3,
                            vertical: false,
                            prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                ],
            });
        }
    }

    function tabs() {
        $(".ps-tab-list  li > a ").on("click", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(this).closest("li").siblings("li").removeClass("active");
            $(this).closest("li").addClass("active");
            $(target).addClass("active");
            $(target).siblings(".ps-tab").removeClass("active");
        });
        $(".ps-tab-list.owl-slider .owl-item a").on("click", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(this).closest(".owl-item").siblings(".owl-item").removeClass("active");
            $(this).closest(".owl-item").addClass("active");
            $(target).addClass("active");
            $(target).siblings(".ps-tab").removeClass("active");
        });
    }

    function rating() {
        $("select.ps-rating").each(function () {
            var readOnly;
            if ($(this).attr("data-read-only") == "true") {
                readOnly = true;
            } else {
                readOnly = false;
            }
            $(this).barrating({
                theme: "fontawesome-stars",
                readonly: readOnly,
                emptyValue: "0",
            });
        });
    }

    function productLightbox() {
        var product = $(".ps-product--detail");
        if (product.length > 0) {
            $(".ps-product__gallery").lightGallery({
                selector: ".item a",
                thumbnail: true,
                share: false,
                fullScreen: false,
                autoplay: false,
                autoplayControls: false,
                actualSize: false,
            });
            if (product.hasClass("ps-product--sticky")) {
                $(".ps-product__thumbnail").lightGallery({
                    selector: ".item a",
                    thumbnail: true,
                    share: false,
                    fullScreen: false,
                    autoplay: false,
                    autoplayControls: false,
                    actualSize: false,
                });
            }
        }
        $(".ps-gallery--image").lightGallery({
            selector: ".ps-gallery__item",
            thumbnail: true,
            share: false,
            fullScreen: false,
            autoplay: false,
            autoplayControls: false,
            actualSize: false,
        });
        $(".ps-video").lightGallery({
            thumbnail: false,
            share: false,
            fullScreen: false,
            autoplay: false,
            autoplayControls: false,
            actualSize: false,
        });
    }

    function backToTop() {
        var scrollPos = 0;
        var element = $("#back2top");
        $(window).scroll(function () {
            var scrollCur = $(window).scrollTop();
            if (scrollCur > scrollPos) {
                // scroll down
                if (scrollCur > 500) {
                    element.addClass("active");
                } else {
                    element.removeClass("active");
                }
            } else {
                // scroll up
                element.removeClass("active");
            }

            scrollPos = scrollCur;
        });

        element.on("click", function () {
            $("html, body").animate(
                    {
                        scrollTop: "0px",
                    },
                    800
                    );
        });
    }

    function filterSlider() {
        var el = $(".ps-slider");
        var min = el.siblings().find(".ps-slider__min");
        var max = el.siblings().find(".ps-slider__max");
        var defaultMinValue = el.data("default-min");
        var defaultMaxValue = el.data("default-max");
        var maxValue = el.data("max");
        var step = el.data("step");
        if (el.length > 0) {
            el.slider({
                min: 0,
                max: maxValue,
                step: step,
                range: true,
                values: [defaultMinValue, defaultMaxValue],
                slide: function (event, ui) {
                    var values = ui.values;
                    min.text("$" + values[0]);
                    max.text("$" + values[1]);
                },
            });
            var values = el.slider("option", "values");
            min.text("$" + values[0]);
            max.text("$" + values[1]);
        } else {
            // return false;
        }
    }

    function modalInit() {
        var modal = $(".ps-modal");
        if (modal.length) {
            if (modal.hasClass("active")) {
                $("body").css("overflow-y", "hidden");
            }
        }
        modal.find(".ps-modal__close, .ps-btn--close").on("click", function (e) {
            e.preventDefault();
            $(this).closest(".ps-modal").removeClass("active");
        });
        $(".ps-modal-link").on("click", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(target).addClass("active");
            $("body").css("overflow-y", "hidden");
        });
        $(".ps-modal").on("click", function (event) {
            if (!$(event.target).closest(".ps-modal__container").length) {
                modal.removeClass("active");
                $("body").css("overflow-y", "auto");
            }
        });
    }

    function searchInit() {
        var searchbox = $(".ps-search");
        $(".ps-search-btn").on("click", function (e) {
            e.preventDefault();
            searchbox.addClass("active");
        });
        searchbox.find(".ps-btn--close").on("click", function (e) {
            e.preventDefault();
            searchbox.removeClass("active");
        });
    }

    function countDown() {
        var time = $(".ps-countdown");
        time.each(function () {
            var el = $(this),
                    value = $(this).data("time");
            var countDownDate = new Date(value).getTime();
            var timeout = setInterval(function () {
                var now = new Date().getTime(),
                        distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24)),
                        hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                        minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                        seconds = Math.floor((distance % (1000 * 60)) / 1000);
                el.find(".days").html(days);
                el.find(".hours").html(hours);
                el.find(".minutes").html(minutes);
                el.find(".seconds").html(seconds);
                if (distance < 0) {
                    clearInterval(timeout);
                    el.closest(".ps-section").hide();
                }
            }, 1000);
        });
    }

    function productFilterToggle() {
        $(".ps-filter__trigger").on("click", function (e) {
            e.preventDefault();
            var el = $(this);
            el.find(".ps-filter__icon").toggleClass("active");
            el.closest(".ps-filter").find(".ps-filter__content").slideToggle();
        });
        if ($(".ps-sidebar--home").length > 0) {
            $(".ps-sidebar--home > .ps-sidebar__header > a").on("click", function (e) {
                e.preventDefault();
                $(this).closest(".ps-sidebar--home").children(".ps-sidebar__content").slideToggle();
            });
        }
    }

    function mainSlider() {
        var homeBanner = $(".ps-carousel--animate");
        homeBanner.slick({
            autoplay: true,
            speed: 1000,
            lazyLoad: "progressive",
            arrows: false,
            fade: true,
            dots: true,
            prevArrow: "<i class='slider-prev ba-back'></i>",
            nextArrow: "<i class='slider-next ba-next'></i>",
        });
    }

    function subscribePopup() {
        var subscribe = $("#subscribe"),
                time = subscribe.data("time");
        setTimeout(function () {
            if (subscribe.length > 0) {
                subscribe.addClass("active");
                $("body").css("overflow", "hidden");
            }
        }, time);
        $(".ps-popup__close").on("click", function (e) {
            e.preventDefault();
            $(this).closest(".ps-popup").removeClass("active");
            $("body").css("overflow", "auto");
        });
        $("#subscribe").on("click", function (event) {
            if (!$(event.target).closest(".ps-popup__content").length) {
                subscribe.removeClass("active");
                $("body").css("overflow-y", "auto");
            }
        });
    }

    function stickySidebar() {
        var sticky = $(".ps-product--sticky"),
                stickySidebar,
                checkPoint = 992,
                windowWidth = $(window).innerWidth();
        if (sticky.length > 0) {
            stickySidebar = new StickySidebar(".ps-product__sticky .ps-product__info", {
                topSpacing: 20,
                bottomSpacing: 20,
                containerSelector: ".ps-product__sticky",
            });
            if ($(".sticky-2").length > 0) {
                var stickySidebar2 = new StickySidebar(".ps-product__sticky .sticky-2", {
                    topSpacing: 20,
                    bottomSpacing: 20,
                    containerSelector: ".ps-product__sticky",
                });
            }
            if (checkPoint > windowWidth) {
                stickySidebar.destroy();
                stickySidebar2.destroy();
            }
        } else {
            return false;
        }
    }

    function accordion() {
        var accordion = $(".ps-accordion");
        accordion.find(".ps-accordion__content").hide();
        $(".ps-accordion.active").find(".ps-accordion__content").show();
        accordion.find(".ps-accordion__header").on("click", function (e) {
            e.preventDefault();
            if ($(this).closest(".ps-accordion").hasClass("active")) {
                $(this).closest(".ps-accordion").removeClass("active");
                $(this).closest(".ps-accordion").find(".ps-accordion__content").slideUp(350);
            } else {
                $(this).closest(".ps-accordion").addClass("active");
                $(this).closest(".ps-accordion").find(".ps-accordion__content").slideDown(350);
                $(this).closest(".ps-accordion").siblings(".ps-accordion").find(".ps-accordion__content").slideUp();
            }
            $(this).closest(".ps-accordion").siblings(".ps-accordion").removeClass("active");
            $(this).closest(".ps-accordion").siblings(".ps-accordion").find(".ps-accordion__content").slideUp();
        });
    }

    function progressBar() {
        var progress = $(".ps-progress");
        progress.each(function (e) {
            var value = $(this).data("value");
            $(this)
                    .find("span")
                    .css({
                        width: value + "%",
                    });
        });
    }

    function customScrollbar() {
        $(".ps-custom-scrollbar").each(function () {
            var height = $(this).data("height");
            $(this).slimScroll({
                height: height + "px",
                alwaysVisible: true,
                color: "#000000",
                size: "6px",
                railVisible: true,
            });
        });
    }

    function select2Cofig() {
        $("select.ps-select").select2({
            placeholder: $(this).data("placeholder"),
            minimumResultsForSearch: -1,
        });
    }

    function carouselNavigation() {
        var prevBtn = $(".ps-carousel__prev"),
                nextBtn = $(".ps-carousel__next");
        prevBtn.on("click", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(target).trigger("prev.owl.carousel", [1000]);
        });
        nextBtn.on("click", function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            $(target).trigger("next.owl.carousel", [1000]);
        });
    }

    function dateTimePicker() {
        $(".ps-datepicker").datepicker();
    }

    $(function () {
        backgroundImage();
        owlCarouselConfig();
        siteToggleAction();
        subMenuToggle();
        masonry(".ps-masonry");
        productFilterToggle();
        tabs();
        slickConfig();
        productLightbox();
        rating();
        backToTop();
        stickyHeader();
        filterSlider();
        mapConfig();
        modalInit();
        searchInit();
        countDown();
        mainSlider();
        parallax();
        stickySidebar();
        accordion();
        progressBar();
        customScrollbar();
        select2Cofig();
        carouselNavigation();
        dateTimePicker();
        $('[data-toggle="tooltip"]').tooltip();
        $(".ps-product--quickview .ps-product__images").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
            nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
        });
    });
    $("#product-quickview").on("shown.bs.modal", function (e) {
        $(".ps-product--quickview .ps-product__images").slick("setPosition");
    });

    $(window).on("load", function () {
        $("body").addClass("loaded");
        subscribePopup();
    });
})(jQuery);


// sub  function


$(".subscribe").submit(function (e) {
    e.preventDefault();


    var email_id = $(".subscribe input").first().val()


    if (email_id)
    {

        $.ajax({
            type: "POST",
            url: baseurl + "subscribe",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $(".btn-thm").attr("disabled", "true");
            },
            success: function (response) {
                if (response.result == 1)
                {


                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: ' thanks for subscription',
                        showConfirmButton: false,
                        timer: 1500
                    })

                } else if (response.result == 2)
                {


                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'email is already exist',
                        showConfirmButton: false,
                        timer: 1500
                    })

                } else
                {
                    alert('Something went wrong! Please try again later!');

                }

            },
        });
    }





});



$(".form_login").submit(function (e) {

    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseurl + "loginPost",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $(".btn-thm").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Login Successful!");
                $(".btn-thm").removeAttr("disabled");
                location.reload();
            } else if (response.result == 2) {
                toastr.error("Your account was blocked! Please contact support!");
                $(".btn-thm").removeAttr("disabled");
            } else {
                toastr.error("Incorrect credentials!");
                $(".btn-thm").removeAttr("disabled");
            }
        },
    });
});




$(".form_register").submit(function (e) {

    e.preventDefault();
    var validity = 0;
    var password = $("#Password2").val();
    var confirm_Password = $("#Password3").val();
    var email = $("input[name=email]").val();
    var phone = $("input[name=phone]").val();

    // if (!isValidEmailAddress(email)){
    //     toastr.error("Please enter a valid Email Id");
    //     return false;
    // }
    // else validity++;

    // if( !isValidPhoneNumber(phone) ){
    //     toastr.error("Please enter a valid Phone Number");
    //     return false;
    // }
    // else validity++;

    if (password == "" || confirm_Password == "") {
        toastr.error("Passwords cannot be empty");
        return false;
    } else if (password != confirm_Password)
    {
        toastr.error("Passwords do not match");
        $("#Password2").val("");
        $("#Password3").val("");
        return false;
    } else
        validity++;

    if ($("#termsCheck").prop("checked") == false) {
        toastr.error("Please Agree to Terms and Conditions");
        return false;
    } else
        validity++;

    if (validity == 2) {
        $.ajax({
            type: "POST",
            url: baseurl + "registerPost",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $(".btn-thm").attr("disabled", "true");
            },
            success: function (response) {
                if (response.result == 1) {
                    toastr.success("Thanks for registering with us!");
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                    //toastr.success("OTP sent to registered mobile number!");
                    // $('.form_register').hide();
                    // $('.registerPostOTP').show();
                    $(".btn-thm").removeAttr("disabled");
                } else if (response.result == 2) {
                    toastr.error("Your Email Id is already registered with us!");
                    $(".btn-thm").removeAttr("disabled");
                } else if (response.result == 3) {
                    toastr.error("Your Phone Number is already registered with us!");
                    $(".btn-thm").removeAttr("disabled");
                } else {
                    toastr.error("Something went wrong! Please try again later!");
                    $(".btn-thm").removeAttr("disabled");
                }
            },
        });
    }

    function isValidPhoneNumber(phone) {
        intRegex = /[0-9 -()+]+$/;
        console.log(phone.length, intRegex.test(phone));
        return phone.length >= 6 && intRegex.test(phone) && phone.length <= 11;
    }
    ;

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    ;
});

$(".registerPostOTP").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseurl + "registerPostOTP",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {

            if (response.result == 1) {
                toastr.success("Thanks for registering with us!");
                setTimeout(function () {
                    window.location.assign(baseURL + "my-profile");
                }, 1000);
                $("button[type=submit]").removeAttr("disabled");
            } else if (response.result == 2) {
                toastr.error("OTP does not matched!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".form_forget_password").submit(function (e) {
    e.preventDefault();

    alert('tesxt');
    $.ajax({
        type: "POST",
        url: baseURL + "form_forget_password_post",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
//        beforeSend: function () {
//            $("button[type=submit]").attr("disabled", "true");
//        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
//                $('.form_forget_password').hide();
//                $('.form_set_forget_password').hide();
//                $('.form_forget_password_otp').show();
                toastr.success("OTP sent to registered Email!");
                $("button[type=submit]").removeAttr("disabled");
            } else if (response.result == 2) {
                toastr.error("Mobile number does not exist!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".form_forget_password_otp").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "form_forget_password_otp",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                $('.form_forget_password').hide();
                $('.form_forget_password_otp').hide();
                $('.form_set_forget_password').show();
                toastr.success("OTP verified successfully!");
                $("button[type=submit]").removeAttr("disabled");
            } else if (response.result == 2) {
                toastr.error("OTP does not match!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".form_set_forget_password").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "form_set_forget_password",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                setTimeout(function () {
                    location.reload();
                }, 1000);
                toastr.success("Updated!");
                $("button[type=submit]").removeAttr("disabled");
            } else if (response.result == 2) {
                toastr.error("Password and Confirm Password are not matched!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

function is_mobile(inputtxt)
{
    var phoneno = /^\d{10}$/;
    if ((inputtxt.match(phoneno)))
    {
        return true;
    } else
    {
        return false;
    }
}

$(".seller-registration-form").submit(function (e) {
    e.preventDefault();

    var this_id = "form[form-id=" + $(this).attr("form-id") + "]";

    if (is_mobile($('.seller-registration-form input[name=phone_number]').val()))
    {
        if (is_required(this_id) === true) {
            if ($(this_id + " input[name=accept_seller_agreement]:checked").val() === "1") {
                $.ajax({
                    type: "POST",
                    url: baseURL + "sellerregistrationPost",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function () {
                        $("button[type=submit]").attr("disabled", "true");
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.result == 1) {
                            $(".register-seller-head li").removeClass("active");
                            $(".register-seller-head li.step-4").addClass("active");
                            $(".ps-tab").removeClass("active");
                            $("#step-4").addClass("active");
                            //$("#step-4 input[name=store_id]").val(response.store_id);
                            $("button[type=submit]").removeAttr("disabled");
                        } else if (response.result == 2) {
                            toastr.error("Mobile number has already registered with us!");
                            $("button[type=submit]").removeAttr("disabled");
                        } else {
                            toastr.error("Something went wrong! Please try again later!");
                            $("button[type=submit]").removeAttr("disabled");
                        }
                    },
                });
            } else {
                $(this_id + " input[name=accept_seller_agreement]")
                        .next()
                        .next("span")
                        .show();
            }
        }
    }
});

$(".seller-verify-form").submit(function (e) {
    e.preventDefault();

    var this_id = "form[form-id=" + $(this).attr("form-id") + "]";

    $.ajax({
        type: "POST",
        url: baseURL + "sellerregistrationverify",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                location.reload();
            } else if (response.result == 2) {
                toastr.error("Mobile number has already registered with us!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});
//GST Help check
$("input[name=need_gst_help]").click(function () {
    if ($(this).is(":checked")) {
        $("input[name=gst_number]").attr("disabled", "disabled");
    } else {
        $("input[name=gst_number]").removeAttr("disabled", "disabled");
    }
});

$(".seller-registration-form-step-2").submit(function (e) {
    e.preventDefault();

    var this_id = "form[form-id=" + $(this).attr("form-id") + "]";

    if (is_required(this_id) === true) {
        $.ajax({
            type: "POST",
            url: baseURL + "sellerregistrationStoreDetailsPost",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $("button[type=submit]").attr("disabled", "true");
            },
            success: function (response) {
                console.log(response);
                if (response.result == 1) {
                    location.reload();
                } else {
                    toastr.error("Something went wrong! Please try again later!");
                    $("button[type=submit]").removeAttr("disabled");
                }
            },
        });
    }
});

$(".update-profile-form").submit(function (e) {
    e.preventDefault();

    var this_id = "form[form-id=" + $(this).attr("form-id") + "]";

    if (is_required(this_id) === true) {
        $.ajax({
            type: "POST",
            url: baseURL + "update-profile-form-post",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $("button[type=submit]").attr("disabled", "true");
            },
            success: function (response) {
                console.log(response);
                if (response.result == 1) {
                    toastr.success("Your profile has been updated!");
                    $("button[type=submit]").removeAttr("disabled");
                } else {
                    toastr.error("Something went wrong! Please try again later!");
                    $("button[type=submit]").removeAttr("disabled");
                }
            },
        });
    }
});

$(".update-security-settings-form").submit(function (e) {
    e.preventDefault();

    var this_id = "form[form-id=" + $(this).attr("form-id") + "]";

    if (is_required(this_id) === true) {
        $.ajax({
            type: "POST",
            url: baseURL + "update-security-settings-form-post",
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $("button[type=submit]").attr("disabled", "true");
            },
            success: function (response) {
                console.log(response);
                if (response.result == 1) {
                    $(".update-security-settings-form")[0].reset();
                    toastr.success("Your credentials has been updated.");
                    $("button[type=submit]").removeAttr("disabled");
                } else if (response.result == 2) {
                    $(".update-security-settings-form")[0].reset();
                    toastr.error("Current password is wrong!");
                    $("button[type=submit]").removeAttr("disabled");
                } else {
                    $(".update-security-settings-form")[0].reset();
                    toastr.error("Something went wrong! Please try again later!");
                    $("button[type=submit]").removeAttr("disabled");
                }
            },
        });
    }
});


$("input[name=update_cart_product_quantity]").change(function () {
    update_cart(this);
});

function update_cart(tis) {
    $.ajax({
        type: "POST",
        url: baseURL + "update-cart",
        data: $(tis).parent().serialize(),
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Your cart has been updated!");
                if ($(tis).val() == "+") {
                    var amount = $(tis).prev().attr("data-amount");
                    var total = $(tis).prev().attr("data-total-amount");
                    amount = $("#" + amount)
                            .text()
                            .replace(",", "");
                    amount = amount.slice(0, -3);
                    $("#" + total).text((parseInt($(tis).prev().val()) * parseInt(amount)).toFixed(2));
                } else if ($(tis).val() == "-") {
                    var amount = $(tis).next().attr("data-amount");
                    var total = $(tis).next().attr("data-total-amount");
                    amount = $("#" + amount)
                            .text()
                            .replace(",", "");
                    amount = amount.slice(0, -3);
                    $("#" + total).text((parseInt($(tis).next().val()) * parseInt(amount)).toFixed(2));
                } else {
                    var amount = $(tis).attr("data-amount");
                    var total = $(tis).attr("data-total-amount");
                    amount = $("#" + amount)
                            .text()
                            .replace(",", "");
                    amount = amount.slice(0, -3);
                    $("#" + total).text((parseInt($(tis).val()) * parseInt(amount)).toFixed(2));
                }
                // update_cart_icon();
                location.reload();
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
}

$(".update_cart_plus").click(function () {
    var val = $(this).prev().val();
    if (parseInt(val) < $(this).prev().attr("max")) {
        $(this)
                .prev()
                .val(parseInt(val) + parseInt(1));
        update_cart(this);
    }
});

$(".update_cart_minus").click(function () {
    var val = $(this).next().val();
    if (parseInt(val) > $(this).next().attr("min")) {
        $(this)
                .next()
                .val(parseInt(val) - parseInt(1));
        update_cart(this);
    }
});

$(".cart_list_icon").on("click", ".cart_remove_btn", function () {
    var tis = this;

    $.ajax({
        type: "POST",
        url: baseURL + "remove-cart-item",
        data: "product_id=" + $(tis).parents(".cart_item_parent").attr("pr-id"),
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Your cart has been updated!");
                update_cart_icon();
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".cart-page-parent").on("click", ".cart_remove_btn", function () {
    var tis = this;

    $.ajax({
        type: "POST",
        url: baseURL + "remove-cart-item",
        data: "product_id=" + $(tis).parents(".cart_item_parent").attr("pr-id"),
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Your cart has been updated!");
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".product-wishlist").click(function () {
    $.ajax({
        type: "POST",
        url: baseURL + "product-wishlist",
        data: "data-product=" + $(this).attr("data-product"),
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Your favourites has been updated!");
                update_cart_icon();
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".single-add-to-cart-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "add-to-cart",
        data: $(this).serialize(),
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Your cart has been updated!");

                window.location.reload();

            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".seller-new-product-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "seller-new-product-form",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                $(".seller-new-product-form")[0].reset();
                toastr.success("Product has been created!");
                toastr.success("Your product is waiting for approval!");
                toastr.success("Generally it takes 2-3 hours.");
                $("button[type=submit]").removeAttr("disabled");
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".seller-update-product-form").submit(function (e) {
    e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    $.ajax({
        type: "POST",
        url: baseURL + "seller-update-product-form",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Product has been updated!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".seller-payment-settings-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "seller-payment-settings-post",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Payout information has been updated!");
                toastr.success("Your information will be updated soon!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".seller-tax-settings-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "seller-tax-settings-post",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Tax information has been updated!");
                toastr.success("Your information will be updated soon!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".from_contact_order_help").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "from_contact_order_help",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                $('.from_contact_order_help')[0].reset();
                toastr.success("Your request has been received!");
                toastr.success("Our representative will get in touch with you shortly!");
                $("button[type=submit]").removeAttr("disabled");
                $('.modal').modal('hide');
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".update-store-profile-form").submit(function (e) {
    e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    $.ajax({
        type: "POST",
        url: baseURL + "update-store-profile-form-post",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Store details has been updated!");
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$("#main_category").change(function () {
    $("#select2-sub_category-results").html("");
    $("#sub_category").html("");
    var data1 = {
        id: 0,
        text: "Default",
    };

    var newOption1 = new Option(data1.text, data1.id, false, false);
    $("#sub_category").append(newOption1);

    $("#select2-child_category-results").html("");
    $("#child_category").html("");
    var data2 = {
        id: 0,
        text: "Default",
    };

    var newOption2 = new Option(data2.text, data2.id, false, false);
    $("#child_category").append(newOption2);

    $.ajax({
        type: "POST",
        url: baseURL + "get_sub_categories",
        data: "main-category=" + $("#main_category").val(),
        dataType: "json",
        success: function (response) {
            if (response.result == 1) {
                $.each(response.subs, function (key, value) {
                    var data = {
                        id: value.value,
                        text: value.name,
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $("#sub_category").append(newOption);
                });
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$("#sub_category").change(function () {
    $("#select2-child_category-results").html("");
    $("#child_category").html("");
    var data1 = {
        id: 0,
        text: "Default",
    };

    var newOption1 = new Option(data1.text, data1.id, false, false);
    $("#child_category").append(newOption1);

    $.ajax({
        type: "POST",
        url: baseURL + "get_child_categories",
        data: "sub-category=" + $("#sub_category").val(),
        dataType: "json",
        success: function (response) {
            if (response.result == 1) {
                $.each(response.child, function (key, value) {
                    var data = {
                        id: value.value,
                        text: value.name,
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $("#child_category").append(newOption);
                });
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".get-a-quote-product-details-page").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "get-a-quote-product-details-page",
        data: $(this).serialize(),
        dataType: "json",
        success: function (response) {
            if (response.result == 1) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Our representative will get in touch with you shortly!");
                toastr.success("We will send you the best quote for you!");
                $(".modal").modal("hide");
            } else if (response.result == 2) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Please verify your contact number!");
                $(".quote-details").hide();
                $(".get-a-quote-product-details-page-otp-form").show();
                $(".get-a-quote-product-details-page-otp-form input[name=phone_number]").val(response.phone_number);
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

$(".get-a-quote-product-details-page-otp-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "get-a-quote-product-details-page-otp-form",
        data: $(this).serialize(),
        dataType: "json",
        success: function (response) {
            if (response.result == 1) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Our representative will get in touch with you shortly!");
                toastr.success("We will send you the best quote for you!");
                $(".modal").modal("hide");
                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                toastr.error("Something went wrong! Please try again later!");
            }
        },
    });
});

function is_required(this_id) {
    $(".error-span").hide();
    var inc = 0;
    $(this_id + " .required").each(function () {
        console.log($(this).attr("name"));
        if ($(this).val() !== "undefined") {
            if ($(this).val() != null) {
                if ($(this).val().length > 0) {
                } else {
                    console.log($(this).attr("name"));
                    $(this).next("span").show();
                    inc++;
                }
            } else {
                toastr.error("Something went wrong on " + $(this).attr("name"));
                inc++;
            }
        }
    });
    if (inc === 0) {
        return true;
    }
    return false;
}

$("#quantity_units").change(function () {
    if ($(this).val() == "other") {
        $("#specify_units").show();
    } else {
        $("#specify_units").hide();
    }
});

$("#ship-to-different-address-checkbox").click(function () {
    if ($(this).is(":checked")) {
        $(".shipping_address_div").show();
    } else {
        $(".shipping_address_div").hide();
    }
});


$(".update-order-status-form").submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "update-order-status-form",
        data: new FormData($(".update-order-status-form")[0]),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Order Status Updated!");
                setTimeout(function () {
                    location.reload();
                }, 1000);
                $("button[type=submit]").removeAttr("disabled");
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

$(".contact-form").submit(function (e) {
    // alert("hello");
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "contact-form-post",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Our representative will getin touch with you shortly!");
                $(".contact-form")[0].reset();
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});
$(".contact-admin").submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "contact-admin",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Our representative will getin touch with you shortly!");
                $(".contact-admin")[0].reset();
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});
$(".grievance-form").submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "grievance-form",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("Thanks for contacting us!");
                toastr.success("Our representative will getin touch with you shortly!");
                $(".grievance-form")[0].reset();
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

function is_required_form_checkout() {
    $(".error-span").hide();
    var inc = 0;
    $(".billing_details input.required").each(function () {
        //console.log($(this).attr('name'));
        if ($(this).val() !== "undefined") {
            if ($(this).val() != null) {
                if ($(this).val().length > 0) {
                } else {
                    console.log($(this).attr("name"));
                    $(this).next("span").show();
                    inc++;
                }
            } else {
                toastr.error("Something went wrong on " + $(this).attr("name"));
                inc++;
            }
        }
    });

    if (inc === 0) {
        if ($("#ship-to-different-address-checkbox").is(":checked")) {
            var inc1 = 0;
            $(".shipping_details input.required").each(function () {
                //console.log($(this).attr('name'));
                if ($(this).val() !== "undefined") {
                    if ($(this).val() != null) {
                        if ($(this).val().length > 0) {
                        } else {
                            //console.log($(this).attr('name'));
                            $(this).next("span").show();
                            inc1++;
                        }
                    } else {
                        toastr.error("Something went wrong on " + $(this).attr("name"));
                        inc1++;
                    }
                }
            });
            if (inc1 === 0) {
                if ($("#terms-checkbox").is(":checked")) {
                    return true;
                }
                $("label[for=terms-checkbox]").next("span").show();
                return false;
            } else {
                return false;
            }
        } else {
            if ($("#terms-checkbox").is(":checked")) {
                return true;
            }
            $("label[for=terms-checkbox]").next("span").show();
            return false;
        }
    } else {
        return false;
    }
}

$("input").attr("autocomplete", "off");

function readURL(input, id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#" + id).attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        $("#" + id).attr("src", "/uploads/common/default-image.jpg");
    }
}


$(function () {
    $('.input-images-1').imageUploader({
        imagesInputName: 'photos',
        extensions: ['.jpg', '.jpeg', '.png']
    });
    $('.input-images-2').imageUploader({
        imagesInputName: 'photos',
        extensions: ['.jpg', '.jpeg', '.png', '.pdf']
    });
    $('.select2').select2();
});
jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if (
                $(this)
                .parent()
                .hasClass("active")
                ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                    .parent()
                    .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
            $(this)
                    .parent()
                    .addClass("active");
        }
    });

    $("#close-sidebar").click(function () {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function () {
        $(".page-wrapper").addClass("toggled");
    });
});

$(".builder_login").submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: baseurl + "builder/builder-login",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $(".btn-thm").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                // toastr.success("Login Successful!");
                // $(".btn-thm").removeAttr("disabled");
                window.location.href = "builder-dashboard";
            } else if (response.result == 2) {
                toastr.error("Your account was blocked! Please contact support!");
                $(".btn-thm").removeAttr("disabled");
            } else {
                toastr.error("Incorrect credentials!");
                $(".btn-thm").removeAttr("disabled");
            }
        },
    });
});

$("tbody.cart_list").on("click", '.cart_remove_btn', function () {

    var tis = this;
    var tagName = "";
    var cart_list = ($(tis).parents('.cart_list'));

    $.ajax({
        type: 'POST',
        url: baseURL + "remove-cart-item",
        data: "product_id=" + ($(tis).parents('.cart_item_parent')).attr('pr-id'),
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.result == 1)
            {
                toastr.success('Your cart has been updated!');

                ($(tis).parents('.cart_item_parent')).remove();
                if (cart_list.children().length == 0)
                {
                    cart_list.html('<tr class="cart_item">' +
                            '<td colspan="6" class="text-center"> No products in cart.</td>' +
                            '</tr>');
                }
                // window.location.reload();
            } else
            {
                toastr.error('Something went wrong! Please try again later!');
            }
        }
    });
});
function count(quantity, amt) {

    $.ajax({
        type: 'POST',
        url: baseURL + "billing",
        data: {amount: amt, quantity: quantity},
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.result == 1)
            {

                window.location.reload();
            } else
            {
                toastr.error('Something went wrong! Please try again later!');
            }
        }
    });
}

$('.search-courses-title').submit(function (e) {
    e.preventDefault();


    var this_id = 'form[this_id=' + $(this).attr('this_id') + ']';
    if (is_required(this_id) === true)
    {
        $.ajax({
            type: 'POST',
            url: baseURL + "search-title",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(this_id + ' input[type=submit]').attr('disabled', 'true');
            },
            success: function (response) {
                console.log(response)
                if (response.result == 1)
                {
                    //location.reload();
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                    //alert(response.insert_id);

                    //window.location.href = "search-product-title";

                } else
                {
                    toastr.error('Something went wrong! Please try again later!');
                    $(this_id + ' input[type=submit]').removeAttr('disabled');
                }
            }
        });
    }

});

$(".comment-form").submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "comment-form-post",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("success");

                // $(".contact-form")[0].reset();
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});
$(".review-form").submit(function (e) {

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: baseURL + "review-form-post",
        data: $(this).serialize(),
        dataType: "json",
        beforeSend: function () {
            $("button[type=submit]").attr("disabled", "true");
        },
        success: function (response) {
            console.log(response);
            if (response.result == 1) {
                toastr.success("success");
                location.reload();
                // $(".contact-form")[0].reset();
            } else {
                toastr.error("Something went wrong! Please try again later!");
                $("button[type=submit]").removeAttr("disabled");
            }
        },
    });
});

