(function($) {
    "use strict";

    $(document).ready(function() {

        /*--------------------------------------------------*/
        /*  Mobile Navigation Menu
        /*--------------------------------------------------*/
        $(function() {
            function mmenuInit() {
                var wi = $(window).width();
                if (wi <= '1099') {
                    $(".mmenu-init").remove();
                    $("#navigation").clone().addClass("mmenu-init").insertBefore("#navigation").removeAttr('id').removeClass('style-1 style-2')
                        .find('ul, div').removeClass('style-1 style-2 mega-menu mega-menu-content mega-menu-section').removeAttr('id');
                    $(".mmenu-init").find("ul").addClass("mm-listview");
                    $(".mmenu-init").find(".mobile-styles .mm-listview").unwrap();

                    $(".mmenu-init").mmenu({
                        "counters": true
                    }, {

                        offCanvas: {
                            pageNodetype: "#wrapper"
                        }
                    });

                    var mmenuAPI = $(".mmenu-init").data("mmenu");
                    var $icon = $(".mmenu-trigger .hamburger");

                    $(".mmenu-trigger").on('click', function() {
                        mmenuAPI.open();
                    });

                }
                $(".mm-next").addClass("mm-fullsubopen");
            }
            mmenuInit();
            $(window).resize(function() {
                mmenuInit();
            });
        });

        /*--------------------------------------------------*/
        /*  Sticky Header
        /*--------------------------------------------------*/
        function stickyHeader() {
            $(window).on('scroll load', function() {
                if ($(window).width() < '1099') {
                    $("#utf-header-container-block").removeClass("cloned");
                }
                if ($(window).width() > '1099') {
                    $("#utf-header-container-block").css({
                        position: 'fixed',
                    });
                    var headerOffset = $("#utf-header-container-block").height();
                    if ($(window).scrollTop() >= headerOffset) {
                        $("#utf-header-container-block").addClass('cloned');
                        $(".utf-wrapper-utf-transparent-header-block-part #utf-header-container-block").addClass('cloned').removeClass("utf-transparent-header-block unsticky");
                    } else {
                        $("#utf-header-container-block").removeClass("cloned");
                        $(".utf-wrapper-utf-transparent-header-block-part #utf-header-container-block").addClass('utf-transparent-header-block unsticky').removeClass("cloned");
                    }

                    var transparentLogo = $('#utf-header-container-block #logo img').attr('data-transparent-logo');
                    var stickyLogo = $('#utf-header-container-block #logo img').attr('data-sticky-logo');

                    if ($('.utf-wrapper-utf-transparent-header-block-part #utf-header-container-block').hasClass('cloned')) {
                        $("#utf-header-container-block.cloned #logo img").attr("src", stickyLogo);
                    }

                    if ($('.utf-wrapper-utf-transparent-header-block-part #utf-header-container-block').hasClass('utf-transparent-header-block')) {
                        $("#utf-header-container-block #logo img").attr("src", transparentLogo);
                    }

                    $(window).on('load resize', function() {
                        var headerOffset = $("#utf-header-container-block").height();
                        $("#wrapper").css({
                            'padding-top': headerOffset
                        });
                    });
                }
            });
        }
        stickyHeader();

        /*--------------------------------------------------*/
        /*  Transparent Header Spacer Adjustment
        /*--------------------------------------------------*/
        $(window).on('load resize', function() {
            var transparentHeaderHeight = $('.utf-transparent-header-block').outerHeight();
            $('.utf-transparent-header-block-spacer').css({
                height: transparentHeaderHeight,
            });
        });

        /*----------------------------------------------------*/
        /*  Back to Top
        /*----------------------------------------------------*/
        function backToTop() {
            $('body').append('<div id="backtotop"><a href="#"></a></div>');
        }
        backToTop();

        var pxShow = 600;
        var scrollSpeed = 500;

        $(window).on('scroll', function() {
            if ($(window).scrollTop() >= pxShow) {
                $("#backtotop").addClass('visible');
            } else {
                $("#backtotop").removeClass('visible');
            }
        });

        $('#backtotop a').on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, scrollSpeed);
            return false;
        });

        /*--------------------------------------------------*/
        /*  Ripple Effect
        /*--------------------------------------------------*/
        $('.ripple-effect, .utf-ripple-effect-dark').on('click', function(e) {
            var rippleDiv = $('<span class="ripple-overlay">'),
                rippleOffset = $(this).offset(),
                rippleY = e.pageY - rippleOffset.top,
                rippleX = e.pageX - rippleOffset.left;

            rippleDiv.css({
                top: rippleY - (rippleDiv.height() / 2),
                left: rippleX - (rippleDiv.width() / 2),
                // background: $(this).data("ripple-color");
            }).appendTo($(this));

            window.setTimeout(function() {
                rippleDiv.remove();
            }, 800);
        });

        /*--------------------------------------------------*/
        /*  Interactive Effects
        /*--------------------------------------------------*/
        $(".switch, .radio").each(function() {
            var intElem = $(this);
            intElem.on('click', function() {
                intElem.addClass('interactive-effect');
                setTimeout(function() {
                    intElem.removeClass('interactive-effect');
                }, 400);
            });
        });

        /*--------------------------------------------------*/
        /*  Sliding Button Icon
        /*--------------------------------------------------*/
        $(window).on('load', function() {
            $(".button.utf-button-sliding-icon").not(".task-listing .button.utf-button-sliding-icon").each(function() {
                var buttonWidth = $(this).outerWidth() + 30;
                $(this).css('width', buttonWidth);
            });
        });

        /*--------------------------------------------------*/
        /*  Sliding Button Icon
        /*--------------------------------------------------*/
        $('.bookmark-icon').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('bookmarked');
        });

        $('.bookmark-button').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('bookmarked');
        });

        /*----------------------------------------------------*/
        /*  Notifications Boxes
        /*----------------------------------------------------*/
        $("a.close").removeAttr("href").on('click', function() {
            function slideFade(elem) {
                var fadeOut = {
                    opacity: 0,
                    transition: 'opacity 0.5s'
                };
                elem.css(fadeOut).slideUp();
            }
            slideFade($(this).parent());
        });

        /*--------------------------------------------------*/
        /*  Notification Dropdowns
        /*--------------------------------------------------*/
        $(".utf-header-notifications").each(function() {
            var userMenu = $(this);
            var userMenuTrigger = $(this).find('.utf-header-notifications-trigger a');
            $(userMenuTrigger).on('click', function(event) {
                event.preventDefault();
                if ($(this).closest(".utf-header-notifications").is(".active")) {
                    close_user_dropdown();
                } else {
                    close_user_dropdown();
                    userMenu.addClass('active');
                }
            });
        });

        function close_user_dropdown() {
            $('.utf-header-notifications').removeClass("active");
        }

        var mouse_is_inside = false;
        $(".utf-header-notifications").on("mouseenter", function() {
            mouse_is_inside = true;
        });
        $(".utf-header-notifications").on("mouseleave", function() {
            mouse_is_inside = false;
        });
        $("body").mouseup(function() {
            if (!mouse_is_inside) close_user_dropdown();
        });

        $(document).keyup(function(e) {
            if (e.keyCode == 27) {
                close_user_dropdown();
            }
        });

        /*--------------------------------------------------*/
        /*  User Status Switch
        /*--------------------------------------------------*/
        if ($('.status-switch label.user-invisible').hasClass('current-status')) {
            $('.status-indicator').addClass('right');
        }
        $('.status-switch label.user-invisible').on('click', function() {
            $('.status-indicator').addClass('right');
            $('.status-switch label').removeClass('current-status');
            $('.user-invisible').addClass('current-status');
        });
        $('.status-switch label.user-online').on('click', function() {
            $('.status-indicator').removeClass('right');
            $('.status-switch label').removeClass('current-status');
            $('.user-online').addClass('current-status');
        });

        /*--------------------------------------------------*/
        /*  Full Screen Page Scripts
        /*--------------------------------------------------*/

        function wrapperHeight() {
            var headerHeight = $("#utf-header-container-block").outerHeight();
            var windowHeight = $(window).outerHeight() - headerHeight;
            $('.full-page-content-container, .utf-dashboard-content-container-aera, .utf-dashboard-sidebar-item-inner, .utf-dashboard-container-aera, .full-page-container').css({
                height: windowHeight
            });
            $('.utf-dashboard-content-inner-aera').css({
                'min-height': windowHeight
            });
        }

        function fullPageScrollbar() {
            $(".full-page-sidebar-inner, .utf-dashboard-sidebar-item-inner").each(function() {
                var headerHeight = $("#utf-header-container-block").outerHeight();
                var windowHeight = $(window).outerHeight() - headerHeight;
                var sidebarContainerHeight = $(this).find(".utf-sidebar-container-aera, .utf-dashboard-nav-container").outerHeight();
                if (sidebarContainerHeight > windowHeight) {
                    $(this).css({
                        height: windowHeight
                    });
                } else {
                    $(this).find('.simplebar-track').hide();
                }
            });
        }

        $(window).on('load resize', function() {
            wrapperHeight();
            fullPageScrollbar();
        });

        $('.enable-filters-button').on('click', function() {
            $('.full-page-sidebar').toggleClass("enabled-sidebar");
            $(this).toggleClass("active");
            $('.filter-button-tooltip').removeClass('tooltip-visible');
        });

        $(window).on('load', function() {
            $('.filter-button-tooltip').css({
                    left: $('.enable-filters-button').outerWidth() + 48
                })
                .addClass('tooltip-visible');
        });

        function avatarSwitcher() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            };
            $(".file-upload").on('change', function() {
                readURL(this);
            });
            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        }
        avatarSwitcher();

        /*----------------------------------------------------*/
        /* Dashboard Submenu
        /*----------------------------------------------------*/
        $('.utf-dashboard-nav ul li a').on('click', function(e) {
            if ($(this).closest("li").children("ul").length) {
                if ($(this).closest("li").is(".active-submenu")) {
                    $('.utf-dashboard-nav ul li').removeClass('active-submenu');
                } else {
                    $('.utf-dashboard-nav ul li').removeClass('active-submenu');
                    $(this).parent('li').addClass('active-submenu');
                }
                e.preventDefault();
            }
        });

        $('.utf-dashboard-responsive-trigger-item').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            var dashboardNavContainer = $('body').find(".utf-dashboard-nav");
            if ($(this).hasClass('active')) {
                $(dashboardNavContainer).addClass('active');
            } else {
                $(dashboardNavContainer).removeClass('active');
            }
            $('.utf-dashboard-responsive-trigger-item .hamburger').toggleClass('is-active');
        });

        function funFacts() {
            /*jslint bitwise: true */
            function hexToRgbA(hex) {
                var c;
                if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                    c = hex.substring(1).split('');
                    if (c.length == 3) {
                        c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                    }
                    c = '0x' + c.join('');
                    return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',0.07)';
                }
            }

            $(".fun-fact").each(function() {
                var factColor = $(this).attr('data-fun-fact-color');
                if (factColor !== undefined) {
                    $(this).find(".fun-fact-icon").css('background-color', hexToRgbA(factColor));
                    $(this).find("i").css('color', factColor);
                }
            });
        }
        funFacts();

        $('.utf-buttons-to-right').each(function() {
            var btr = $(this).width();
            if (btr < 36) {
                $(this).addClass('single-right-button');
            }
        });

        $(window).on('load resize', function() {
            var smallFooterHeight = $('.utf-small-footer').outerHeight();
            $('.utf-dashboard-footer-spacer-aera').css({
                'padding-top': smallFooterHeight + 45
            });
        });

        jQuery.each(jQuery('textarea[data-autoresize]'), function() {
            var offset = this.offsetHeight - this.clientHeight;
            var resizeTextarea = function(el) {
                jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
            };
            jQuery(this).on('keyup input', function() {
                resizeTextarea(this);
            }).removeAttr('data-autoresize');
        });

        /*--------------------------------------------------*/
        /*  Star Rating
        /*--------------------------------------------------*/
        function starRating(ratingElem) {
            $(ratingElem).each(function() {
                var dataRating = $(this).attr('data-rating');

                function starsOutput(firstStar, secondStar, thirdStar, fourthStar, fifthStar) {
                    return ('' +
                        '<span class="' + firstStar + '"></span>' +
                        '<span class="' + secondStar + '"></span>' +
                        '<span class="' + thirdStar + '"></span>' +
                        '<span class="' + fourthStar + '"></span>' +
                        '<span class="' + fifthStar + '"></span>');
                }
                var fiveStars = starsOutput('star', 'star', 'star', 'star', 'star');
                var fourHalfStars = starsOutput('star', 'star', 'star', 'star', 'star half');
                var fourStars = starsOutput('star', 'star', 'star', 'star', 'star empty');
                var threeHalfStars = starsOutput('star', 'star', 'star', 'star half', 'star empty');
                var threeStars = starsOutput('star', 'star', 'star', 'star empty', 'star empty');
                var twoHalfStars = starsOutput('star', 'star', 'star half', 'star empty', 'star empty');
                var twoStars = starsOutput('star', 'star', 'star empty', 'star empty', 'star empty');
                var oneHalfStar = starsOutput('star', 'star half', 'star empty', 'star empty', 'star empty');
                var oneStar = starsOutput('star', 'star empty', 'star empty', 'star empty', 'star empty');

                // Rules
                if (dataRating >= 4.75) {
                    $(this).append(fiveStars);
                } else if (dataRating >= 4.25) {
                    $(this).append(fourHalfStars);
                } else if (dataRating >= 3.75) {
                    $(this).append(fourStars);
                } else if (dataRating >= 3.25) {
                    $(this).append(threeHalfStars);
                } else if (dataRating >= 2.75) {
                    $(this).append(threeStars);
                } else if (dataRating >= 2.25) {
                    $(this).append(twoHalfStars);
                } else if (dataRating >= 1.75) {
                    $(this).append(twoStars);
                } else if (dataRating >= 1.25) {
                    $(this).append(oneHalfStar);
                } else if (dataRating < 1.25) {
                    $(this).append(oneStar);
                }
            });
        }
        starRating('.utf-star-rating');

        /*--------------------------------------------------*/
        /*  Enabling Scrollbar in User Menu
        /*--------------------------------------------------*/
        function userMenuScrollbar() {
            $(".utf-header-notifications-scroll").each(function() {
                var scrollContainerList = $(this).find('ul');
                var itemsCount = scrollContainerList.children("li").length;
                var notificationItems;

                if (scrollContainerList.children("li").outerHeight() > 140) {
                    var notificationItems = 2;
                } else {
                    var notificationItems = 3;
                }
                if (itemsCount > notificationItems) {
                    var listHeight = 0;
                    $(scrollContainerList).find('li:lt(' + notificationItems + ')').each(function() {
                        listHeight += $(this).height();
                    });
                    $(this).css({
                        height: listHeight
                    });
                } else {
                    $(this).css({
                        height: 'auto'
                    });
                    $(this).find('.simplebar-track').hide();
                }
            });
        }
        userMenuScrollbar();

        /*--------------------------------------------------*/
        /*  Tippy JS 
        /*--------------------------------------------------*/
        tippy('[data-tippy-placement]', {
            delay: 100,
            arrow: true,
            arrowType: 'sharp',
            size: 'regular',
            duration: 200,
            animation: 'shift-away',
            animateFill: true,
            theme: 'dark',
            distance: 10,
        });

        /*----------------------------------------------------*/
        /*	Accordion
        /*----------------------------------------------------*/
        var accordion = (function() {

            var $accordion = $('.js-accordion');
            var $accordion_header = $accordion.find('.js-accordion-header');
            var settings = {
                speed: 400,
                oneOpen: false
            };
            return {
                init: function($settings) {
                    $accordion_header.on('click', function() {
                        accordion.toggle($(this));
                    });
                    $.extend(settings, $settings);
                    if (settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                        $('.js-accordion-item.active:not(:first)').removeClass('active');
                    }
                    $('.js-accordion-item.active').find('> .js-accordion-body').show();
                },
                toggle: function($this) {
                    if (settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                        $this.closest('.js-accordion')
                            .find('> .js-accordion-item')
                            .removeClass('active')
                            .find('.js-accordion-body')
                            .slideUp();
                    }
                    $this.closest('.js-accordion-item').toggleClass('active');
                    $this.next().stop().slideToggle(settings.speed);
                }
            };
        })();
        $(document).ready(function() {
            accordion.init({
                speed: 300,
                oneOpen: true
            });
        });

        /*--------------------------------------------------*/
        /*  Tabs
        /*--------------------------------------------------*/
        $(window).on('load resize', function() {
            if ($(".tabs")[0]) {
                $('.tabs').each(function() {
                    var thisTab = $(this);
                    var activePos = thisTab.find('.tabs-header .active').position();

                    function changePos() {
                        activePos = thisTab.find('.tabs-header .active').position();
                        thisTab.find('.tab-hover').stop().css({
                            left: activePos.left,
                            width: thisTab.find('.tabs-header .active').width()
                        });
                    }
                    changePos();
                    var tabHeight = thisTab.find('.tab.active').outerHeight();

                    function animateTabHeight() {
                        tabHeight = thisTab.find('.tab.active').outerHeight();
                        thisTab.find('.tabs-content').stop().css({
                            height: tabHeight + 'px'
                        });
                    }
                    animateTabHeight();

                    function changeTab() {
                        var getTabId = thisTab.find('.tabs-header .active a').attr('data-tab-id');
                        thisTab.find('.tab').stop().fadeOut(300, function() {
                            $(this).removeClass('active');
                        }).hide();
                        thisTab.find('.tab[data-tab-id=' + getTabId + ']').stop().fadeIn(300, function() {
                            $(this).addClass('active');
                            animateTabHeight();
                        });
                    }
                    thisTab.find('.tabs-header a').on('click', function(e) {
                        e.preventDefault();
                        var tabId = $(this).attr('data-tab-id');
                        thisTab.find('.tabs-header a').stop().parent().removeClass('active');
                        $(this).stop().parent().addClass('active');
                        changePos();
                        tabCurrentItem = tabItems.filter('.active');
                        thisTab.find('.tab').stop().fadeOut(300, function() {
                            $(this).removeClass('active');
                        }).hide();
                        thisTab.find('.tab[data-tab-id="' + tabId + '"]').stop().fadeIn(300, function() {
                            $(this).addClass('active');
                            animateTabHeight();
                        });
                    });
                    var tabItems = thisTab.find('.tabs-header ul li');
                    var tabCurrentItem = tabItems.filter('.active');
                    thisTab.find('.tab-next').on('click', function(e) {
                        e.preventDefault();
                        var nextItem = tabCurrentItem.next();
                        tabCurrentItem.removeClass('active');
                        if (nextItem.length) {
                            tabCurrentItem = nextItem.addClass('active');
                        } else {
                            tabCurrentItem = tabItems.first().addClass('active');
                        }
                        changePos();
                        changeTab();
                    });
                    thisTab.find('.tab-prev').on('click', function(e) {
                        e.preventDefault();
                        var prevItem = tabCurrentItem.prev();
                        tabCurrentItem.removeClass('active');
                        if (prevItem.length) {
                            tabCurrentItem = prevItem.addClass('active');
                        } else {
                            tabCurrentItem = tabItems.last().addClass('active');
                        }
                        changePos();
                        changeTab();
                    });
                });
            }
        });

        /*--------------------------------------------------*/
        /*  Keywords
        /*--------------------------------------------------*/
        $(".keywords-container").each(function() {
            var keywordInput = $(this).find(".keyword-input");
            var keywordsList = $(this).find(".keywords-list");

            function addKeyword() {
                var $newKeyword = $("<span class='keyword'><span class='keyword-remove'></span><span class='keyword-text'>" + keywordInput.val() + "</span></span>");
                keywordsList.append($newKeyword).trigger('resizeContainer');
                keywordInput.val("");
            }

            keywordInput.on('keyup', function(e) {
                if ((e.keyCode == 13) && (keywordInput.val() !== "")) {
                    addKeyword();
                }
            });

            $('.keyword-input-button').on('click', function() {
                if ((keywordInput.val() !== "")) {
                    addKeyword();
                }
            });

            $(document).on("click", ".keyword-remove", function() {
                $(this).parent().addClass('keyword-removed');

                function removeFromMarkup() {
                    $(".keyword-removed").remove();
                }
                setTimeout(removeFromMarkup, 500);
                keywordsList.css({
                    'height': 'auto'
                }).height();
            });

            keywordsList.on('resizeContainer', function() {
                var heightnow = $(this).height();
                var heightfull = $(this).css({
                    'max-height': 'auto',
                    'height': 'auto'
                }).height();

                $(this).css({
                    'height': heightnow
                }).animate({
                    'height': heightfull
                }, 200);
            });

            $(window).on('resize', function() {
                keywordsList.css({
                    'height': 'auto'
                }).height();
            });

            $(window).on('load', function() {
                var keywordCount = $('.keywords-list').children("span").length;
                if (keywordCount > 0) {
                    keywordsList.css({
                        'height': 'auto'
                    }).height();
                }
            });
        });

        /*--------------------------------------------------*/
        /*  Bootstrap Range Slider
        /*--------------------------------------------------*/
        function ThousandSeparator(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        var avgValue = (parseInt($('.bidding-slider').attr("data-slider-min")) + parseInt($('.bidding-slider').attr("data-slider-max"))) / 2;
        if ($('.bidding-slider').data("slider-value") === 'auto') {
            $('.bidding-slider').attr({
                'data-slider-value': avgValue
            });
        }

        $('.bidding-slider').slider();
        $(".bidding-slider").on("slide", function(slideEvt) {
            $("#biddingVal").text(ThousandSeparator(parseInt(slideEvt.value)));
        });
        $("#biddingVal").text(ThousandSeparator(parseInt($('.bidding-slider').val())));

        var currencyAttr = $(".range-slider").attr('data-slider-currency');

        $(".range-slider").slider({
            formatter: function(value) {
                return currencyAttr + ThousandSeparator(parseInt(value[0])) + " - " + currencyAttr + ThousandSeparator(parseInt(value[1]));
            }
        });

        $(".range-slider-single").slider();

        /*----------------------------------------------------*/
        /*  Payment Accordion
        /*----------------------------------------------------*/
        var radios = document.querySelectorAll('.utf-payment-tab-trigger > input');
        for (var i = 0; i < radios.length; i++) {
            radios[i].addEventListener('change', expandAccordion);
        }

        function expandAccordion(event) {
            var tabber = this.closest('.payment');
            var allTabs = tabber.querySelectorAll('.payment-tab');
            for (var i = 0; i < allTabs.length; i++) {
                allTabs[i].classList.remove('payment-tab-active');
            }
            event.target.parentNode.parentNode.classList.add('payment-tab-active');
        }

        $('.utf-plan-radios-item').on("click", function() {
            if ($('.billed-yearly-radio input').is(':checked')) {
                $('.utf-pricing-plans-container-block').addClass('billed-yearly');
            }
            if ($('.utf-monthly-radio-item input').is(':checked')) {
                $('.utf-pricing-plans-container-block').removeClass('billed-yearly');
            }
        });

        /*--------------------------------------------------*/
        /*  Quantity Buttons
        /*--------------------------------------------------*/
        function qtySum() {
            var arr = document.getElementsByName('qtyInput');
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
        }
        qtySum();
        $(".qtyDec, .qtyInc").on("click", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.hasClass('qtyInc')) {
                $button.parent().find("input").val(parseFloat(oldValue) + 1);
            } else {
                if (oldValue > 1) {
                    $button.parent().find("input").val(parseFloat(oldValue) - 1);
                } else {
                    $button.parent().find("input").val(1);
                }
            }
            qtySum();
            $(".qtyTotal").addClass("rotate-x");
        });

        /*----------------------------------------------------*/
        /*  Inline CSS Replacement
        /*----------------------------------------------------*/
        function inlineBG() {
            $(".single-page-header, .intro-banner").each(function() {
                var attrImageBG = $(this).attr('data-background-image');
                if (attrImageBG !== undefined) {
                    $(this).append('<div class="background-image-container"></div>');
                    $('.background-image-container').css('background-image', 'url(' + attrImageBG + ')');
                }
            });

        }
        inlineBG();

        $(".utf-intro-search-field-item").each(function() {
            var bannerLabel = $(this).children("label").length;
            if (bannerLabel > 0) {
                $(this).addClass("with-label");
            }
        });

        $(".photo-box, .utf-photo-section-block, .utf-video-container-block").each(function() {
            var photoBox = $(this);
            var photoBoxBG = $(this).attr('data-background-image');
            if (photoBox !== undefined) {
                $(this).css('background-image', 'url(' + photoBoxBG + ')');
            }
        });

        /*----------------------------------------------------*/
        /*  Tabs
        /*----------------------------------------------------*/
        var $tabsNav = $('.utf-popup-tabs-nav-item'),
            $tabsNavLis = $tabsNav.children('li');
        $tabsNav.each(function() {
            var $this = $(this);
            $this.next().children('.utf-popup-tab-content-item').stop(true, true).hide().first().show();
            $this.children('li').first().addClass('active').stop(true, true).show();
        });
        $tabsNavLis.on('click', function(e) {
            var $this = $(this);
            $this.siblings().removeClass('active').end().addClass('active');
            $this.parent().next().children('.utf-popup-tab-content-item').stop(true, true).hide()
                .siblings($this.find('a').attr('href')).fadeIn();
            e.preventDefault();
        });

        var hash = window.location.hash;
        var anchor = $('.tabs-nav a[href="' + hash + '"]');
        if (anchor.length === 0) {
            $(".utf-popup-tabs-nav-item li:first").addClass("active").show(); //Activate first tab
            $(".utf-popup-tab-content-item:first").show(); //Show first tab content
        } else {
            anchor.parent('li').click();
        }

        $('.register-tab').on('click', function(event) {
            event.preventDefault();
            $(".utf-popup-tab-content-item").hide();
            $("#register.utf-popup-tab-content-item").show();
            $("body").find('.utf-popup-tabs-nav-item a[href="#register"]').parent("li").click();
        });

        $('.login-tab').on('click', function(event) {
            event.preventDefault();
            $(".utf-popup-tab-content-item").hide();
            $("#login.utf-popup-tab-content-item").show();
            $("body").find('.utf-popup-tabs-nav-item a[href="#login"]').parent("li").click();
        });

        $('.utf-popup-tabs-nav-item').each(function() {
            var listCount = $(this).find("li").length;
            if (listCount < 2) {
                $(this).css({
                    'pointer-events': 'none'
                });
            }
        });

        /*----------------------------------------------------*/
        /*  Indicator Bar
        /*----------------------------------------------------*/
        $('.indicator-bar').each(function() {
            var indicatorLenght = $(this).attr('data-indicator-percentage');
            $(this).find("span").css({
                width: indicatorLenght + "%"
            });
        });

        /*----------------------------------------------------*/
        /*  Custom Upload Button
        /*----------------------------------------------------*/
        var uploadButton = {
            $button: $('.uploadButton-input'),
            $nameField: $('.uploadButton-file-name')
        };

        uploadButton.$button.on('change', function() {
            _populateFileField($(this));
        });

        function _populateFileField($button) {
            var selectedFile = [];
            for (var i = 0; i < $button.get(0).files.length; ++i) {
                selectedFile.push($button.get(0).files[i].name + '<br>');
            }
            uploadButton.$nameField.html(selectedFile);
        }

        /*----------------------------------------------------*/
        /*  Slick Carousel
        /*----------------------------------------------------*/
        $('.utf-testimonial-carousel-block').slick({
            centerMode: true,
            centerPadding: '18%',
            slidesToShow: 1,
            dots: true,
            arrows: true,
            nav: true,
            rewind: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            adaptiveHeight: true,
            responsive: [{
                    breakpoint: 1025,
                    settings: {
                        centerPadding: '10px',
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        centerPadding: '10px',
                        slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });

        $('.utf-logo-carousel-block').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            nav: true,
            rewind: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: [{
                    breakpoint: 1365,
                    settings: {
                        slidesToShow: 5,
                        dots: true,
                        arrows: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        dots: true,
                        arrows: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });

        $('.utf-blog-carousel-block').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            nav: true,
            rewind: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: [{
                    breakpoint: 1365,
                    settings: {
                        slidesToShow: 3,
                        dots: true,
                        arrows: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });

        $('.utf-blog-carousel-block-related').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            nav: true,
            rewind: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: [{
                    breakpoint: 1365,
                    settings: {
                        slidesToShow: 2,
                        dots: false,
                        arrows: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        dots: false,
                        arrows: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });

        /*----------------------------------------------------*/
        /*  Magnific Popup
        /*----------------------------------------------------*/
        $('.mfp-gallery-container').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                type: 'image',
                delegate: 'a.mfp-gallery',
                fixedContentPos: true,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: false,
                preloader: true,
                removalDelay: 0,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    tCounter: ''
                }
            });
        });

        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.mfp-image').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            image: {
                verticalFit: true
            }
        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
    /*-----------------------------------------
    /*  Preloader
    -----------------------------------------*/
    $(window).on('load', function() {
        $('.vfx-loader').delay(400).fadeOut(500);
    });
})(this.jQuery);