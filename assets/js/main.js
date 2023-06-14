/*================================================
[  Table of contents  ]
================================================

1. Variables
2. Mobile Menu
3. Mega Menu
4. One Page Navigation
5. Toogle Search
6. Current Year Copyright area
7. Background Image
8. wow js init
9. Tooltip
10. Nice Select
11. Default active and hover item active
12. Product Details Page
13. Isotope Gallery Active  ( Gallery / Portfolio )
14. LightCase jQuery Active
15. Slider One Active 
16. Product Slider One
17. Tab Product Slider One
18. Blog Slider One
19. Testimonial Slider - 1
20. Testimonial Slider - 2
21. Testimonial Slider - 3
22. Category Slider
23. Image Slide  - 1 (Screenshot) 
24. Image Slide - 2
25. Image Slide - 3
26. Image Slide - 4 
27. Brand Logo
28. Blog Gallery (Blog Page )
29. Countdown
30. Counter Up
31. Instagram Feed
32. Price Slider
33. Quantity plus minus
34. scrollUp active
35. Parallax active
36. Header menu sticky



======================================
[ End table content ]
======================================*/

(function($) {
  "use strict";
  var params;
    jQuery(document).ready(function(){
        params = new URLSearchParams(window.location.search);
      
        /* --------------------------------------------------------
            1. Variables
        --------------------------------------------------------- */
        var $window = $(window),
        $body = $('body');

        /* --------------------------------------------------------
            2. Mobile Menu
        --------------------------------------------------------- */
         /* ---------------------------------
            Utilize Function 
        ----------------------------------- */
        (function () {
            var $ltn__utilizeToggle = $('.ltn__utilize-toggle'),
                $ltn__utilize = $('.ltn__utilize'),
                $ltn__utilizeOverlay = $('.ltn__utilize-overlay'),
                $mobileMenuToggle = $('.mobile-menu-toggle');
            $ltn__utilizeToggle.on('click', function (e) {
                e.preventDefault();
                var $this = $(this),
                    $target = $this.attr('href');
                $body.addClass('ltn__utilize-open');
                $($target).addClass('ltn__utilize-open');
                $ltn__utilizeOverlay.fadeIn();
                if ($this.parent().hasClass('mobile-menu-toggle')) {
                    $this.addClass('close');
                }
            });
            $('.ltn__utilize-close, .ltn__utilize-overlay').on('click', function (e) {
                e.preventDefault();
                $body.removeClass('ltn__utilize-open');
                $ltn__utilize.removeClass('ltn__utilize-open');
                $ltn__utilizeOverlay.fadeOut();
                $mobileMenuToggle.find('a').removeClass('close');
            });
        })();

        /* ------------------------------------
            Utilize Menu
        ----------------------------------- */
        function mobileltn__utilizeMenu() {
            var $ltn__utilizeNav = $('.ltn__utilize-menu, .overlay-menu'),
                $ltn__utilizeNavSubMenu = $ltn__utilizeNav.find('.sub-menu');

            /*Add Toggle Button With Off Canvas Sub Menu*/
            $ltn__utilizeNavSubMenu.parent().prepend('<span class="menu-expand"></span>');

            /*Category Sub Menu Toggle*/
            $ltn__utilizeNav.on('click', 'li a, .menu-expand', function (e) {
                var $this = $(this);
                if ($this.attr('href') === '#' || $this.hasClass('menu-expand')) {
                    e.preventDefault();
                    if ($this.siblings('ul:visible').length) {
                        $this.parent('li').removeClass('active');
                        $this.siblings('ul').slideUp();
                        $this.parent('li').find('li').removeClass('active');
                        $this.parent('li').find('ul:visible').slideUp();
                    } else {
                        $this.parent('li').addClass('active');
                        $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                        $this.closest('li').siblings('li').find('ul:visible').slideUp();
                        $this.siblings('ul').slideDown();
                    }
                }
            });
        }
        mobileltn__utilizeMenu();

        /* --------------------------------------------------------
            3. Mega Menu
        --------------------------------------------------------- */
        $('.mega-menu').each(function(){
            if($(this).children('li').length){
                var ulChildren = $(this).children('li').length;
                $(this).addClass('column-'+ulChildren)
            }
        });
        

        /* Remove Attribute( href ) from sub-menu title in mega-menu */
        /*
        $('.mega-menu > li > a').removeAttr('href');
        */


        /* Mega Munu  */
        /* $(".mega-menu").parent().css({"position": "inherit"}); */
        $(".mega-menu").parent().addClass("mega-menu-parent");
        

        /* Add space for Elementor Menu Anchor link */
        $( window ).on( 'elementor/frontend/init', function() {
            elementorFrontend.hooks.addFilter( 'frontend/handlers/menu_anchor/scroll_top_distance', function( scrollTop ) {
                return scrollTop - 75;
            });
        });

        /* --------------------------------------------------------
            3-2. Category Menu
        --------------------------------------------------------- */

        $('.ltn__category-menu-title').on('click', function(){
            $('.ltn__category-menu-toggle').slideToggle(500);
        });	

        /* Category Menu More Item show */
        $('.ltn__category-menu-more-item-parent').on('click', function(){
            $('.ltn__category-menu-more-item-child').slideToggle();
            $(this).toggleClass('rx-change');

        });

        /* Category Submenu Column Count */
        $('.ltn__category-submenu').each(function(){
            if($(this).children('li').length){
                var ulChildren = $(this).children('li').length;
                $(this).addClass('ltn__category-column-no-'+ulChildren)
            }
        });

        /* Category Menu Responsive */
        function ltn__CategoryMenuToggle(){
            $('.ltn__category-menu-toggle .ltn__category-menu-drop > a').on('click', function(){
            if($(window).width() < 991){
                $(this).removeAttr('href');
                var element = $(this).parent('li');
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp();
                }
                else {
                    element.addClass('open');
                    element.children('ul').slideDown();
                    element.siblings('li').children('ul').slideUp();
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp();
                }
            }
            });
            $('.ltn__category-menu-toggle .ltn__category-menu-drop > a').append('<span class="expand"></span>');
        }
        ltn__CategoryMenuToggle();


        /* ---------------------------------------------------------
            4. One Page Navigation ( jQuery Easing Plugin )
        --------------------------------------------------------- */
        // jQuery for page scrolling feature - requires jQuery Easing plugin
        $(function() {
            $('a.page-scroll').bind('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        });


        /* --------------------------------------------------------
            5. Toogle Search
        -------------------------------------------------------- */
        // Handle click on toggle search button
        $('.header-search-1').on('click', function() {
            $('.header-search-1, .header-search-1-form').toggleClass('search-open');
            return false;
        });


        /* ---------------------------------------------------------
            6. Current Year Copyright area
        --------------------------------------------------------- */
        $(".current-year").text((new Date).getFullYear());


        /* ---------------------------------------------------------
            7. Background Image
        --------------------------------------------------------- */
        var $backgroundImage = $('.bg-image, .bg-image-top');
        $backgroundImage.each(function() {
            var $this = $(this),
                $bgImage = $this.data('bg');
            $this.css('background-image', 'url('+$bgImage+')');
        });


        /* ---------------------------------------------------------
            8. wow js init
        --------------------------------------------------------- */
        new WOW().init();


        /* ---------------------------------------------------------
            9. Tooltip
        --------------------------------------------------------- */
        $('[data-toggle="tooltip"]').tooltip();


        /* --------------------------------------------------------
            10. Nice Select
        --------------------------------------------------------- */
        $('select').not('.iconselectfa').niceSelect();

        $('select.posts-per-page').on('change', function() {
            if ($(this).val() == 6){
                params.delete('posts_to_show');
            }
            else{
                params.set('posts_to_show',$(this).val());
            }
            let newUrl = `${window.location.origin}${window.location.pathname}?${params.toString()}`;
            page=1;
            window.history.pushState(null, null, newUrl);
            if($('#grid-inmuebles').hasClass('active')){
                $.inmueblesGridFunction();   
            }
            else{
                $.inmueblesListFunction();
            }
          });

          $('select.order-by').on('change', function() {
            let args = $(this).val().split("?");
            params.delete('sortby');
            params.delete('orderby');
            if (args.length > 1){
                let query = args[1].split("&");
                if (query.length > 1){
                    query.forEach(item =>{
                        params.set(item.split("=")[0],item.split("=")[1]);
                    });
                }
                else{
                    params.set(query[0].split("=")[0],query[0].split("=")[1]);
                }
            }
            let newUrl = `${window.location.origin}${window.location.pathname}?${params.toString()}`;
            page = 1;
            window.history.pushState(null, null, newUrl);
            if($('#grid-inmuebles').hasClass('active')){
                $.inmueblesGridFunction();   
            }
            else{
                $.inmueblesListFunction();
            }
          });

          $('select.location-select').on('change',function(){
            let estado = $( this ).val();
            $.ajax( {
                url: objecto_inmuebles.apiurl + '/localidades',
                type: 'GET',
                dataType: 'json',
                data: {
                    estado: estado,
                },
                success: function( response ) {
                    if (response) {
                        let localidades = response;
                        let $localidadSelect = $( 'select.sublocation-select' );
                        $localidadSelect.niceSelect('destroy');
                        $localidadSelect.empty();
                        $localidadSelect.append('<option value="0">Sub Location</option>')
                        localidades.forEach(localidad =>{
                            $localidadSelect.append( '<option value="' + localidad + '">' + localidad + '</option>' );
                        });
                        $localidadSelect.niceSelect();
                    }
                }
            } );
          });

        
        /* --------------------------------------------------------
            11. Default active and hover item active
        --------------------------------------------------------- */
        var ltn__active_item = $('.ltn__feature-item-6, .ltn__our-journey-wrap ul li, .ltn__pricing-plan-item')
        ltn__active_item.mouseover(function() {
            ltn__active_item.removeClass('active');
            $(this).addClass('active');
        });

        /* --------------------------------------------------------
            12. Product Details Page
        --------------------------------------------------------- */
        $('.ltn__shop-details-large-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.ltn__shop-details-small-img'
        });
        $('.ltn__shop-details-small-img').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.ltn__shop-details-large-img',
            dots: false,
            arrows: true,
            focusOnSelect: true,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
          });
        $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        arrows: false,
        focusOnSelect: true
        });
        /* --------------------------------------------------------
            13. Isotope Gallery Active  ( Gallery / Portfolio )
        -------------------------------------------------------- */
        var $ltnGalleryActive = $('.ltn__gallery-active'),
            $ltnGalleryFilterMenu = $('.ltn__gallery-filter-menu');
        /*Filter*/
        $ltnGalleryFilterMenu.on( 'click', 'button, a', function() {
            var $this = $(this),
                $filterValue = $this.attr('data-filter');
            $ltnGalleryFilterMenu.find('button, a').removeClass('active');
            $this.addClass('active');
            $ltnGalleryActive.isotope({ filter: $filterValue });
        });
        /*Grid*/
        $ltnGalleryActive.each(function(){
            var $this = $(this),
                $galleryFilterItem = '.ltn__gallery-item';
            $this.imagesLoaded( function() {
                $this.isotope({
                    itemSelector: $galleryFilterItem,
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.ltn__gallery-sizer',
                    }
                });
            });
        });

        /* --------------------------------------------------------
            14. LightCase jQuery Active
        --------------------------------------------------------- */
        $('a[data-rel^=lightcase]').lightcase({
            transition: 'elastic', /* none, fade, fadeInline, elastic, scrollTop, scrollRight, scrollBottom, scrollLeft, scrollHorizontal and scrollVertical */
            swipe: true,
            maxWidth: 1170,
            maxHeight: 600,
        });

        /* --------------------------------------------------------
            15. Slider One Active 
        --------------------------------------------------------- */
        $('.ltn__slide-one-active').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            dots: true,
            fade: true,
            cssEase: 'linear',
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        dots: true,
                    }
                }
            ]
        }).on('afterChange', function(){
            new WOW().init();
        });
        /* --------------------------------------------------------
            15-2. Slider Active 2
        --------------------------------------------------------- */
        $('.ltn__slide-active-2').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: false,
            dots: true,
            fade: true,
            cssEase: 'linear',
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        dots: true,
                    }
                }
            ]
        }).on('afterChange', function(){
            new WOW().init();
        });

        
        /*----------------------
            Slider 11 active
        -----------------------*/
        $('.ltn__slider-11-active').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            $('.ltn__slider-11-pagination-count .count').text('0'+i);
            $('.ltn__slider-11-pagination-count .total').text('0' + slick.slideCount);

            $('.ltn__slider-11-slide-item-count .count').text('0'+i);
            $('.ltn__slider-11-slide-item-count .total').text('/0' + slick.slideCount);
            new WOW().init();
        }).slick({
            dots: false, /* slider left or right side pagination count with line */
            arrows: false, /* slider arrow  */
            appendDots: '.ltn__slider-11-pagination-count',
            infinite: true,
            autoplay: false,
            autoplaySpeed: 10000,
            speed: 500,
            asNavFor: '.ltn__slider-11-img-slide-arrow-active',
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                        dots: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('.ltn__slider-11-img-slide-arrow-active').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            initialSlide: 2,
            centerMode: false,
            centerPadding: '0px',
            asNavFor: '.ltn__slider-11-active',
            dots: false, /* image slide dots */
            arrows: false, /* image slide arrow */
            centerMode: true,
            focusOnSelect: true,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        arrows: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        arrows: true,
                        dots: false,
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            16-1. Product Slider One
        --------------------------------------------------------- */
        $('.ltn__product-slider-one-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            16-1. Product Slider One
        --------------------------------------------------------- */
        $('.ltn__product-slider-item-three-active').slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            16-2. Product Slider Item Four
        --------------------------------------------------------- */
        $('.ltn__product-slider-item-four-active').slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            16-2. Product Slider Item Four
        --------------------------------------------------------- */
        $('.ltn__product-slider-item-four-active-full-width').slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1800,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1600,
                    settings: {
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1400,
                    settings: {
                        arrows: false,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            16-3. Related Product Slider One
        --------------------------------------------------------- */
        $('.ltn__related-product-slider-one-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            ## Related Product Slider One
        --------------------------------------------------------- */
        $('.ltn__related-product-slider-two-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            ## Related Product Slider One
        --------------------------------------------------------- */
        $('.ltn__popular-product-widget-active').slick({
            arrows: false,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
        });

        /* --------------------------------------------------------
            17. Tab Product Slider One
        --------------------------------------------------------- */
        $('.ltn__tab-product-slider-one-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        /* --------------------------------------------------------
            17. Small Product Slider One
        --------------------------------------------------------- */
        $('.ltn__small-product-slider-active').slick({
            arrows: false,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            18. Blog Slider One
        --------------------------------------------------------- */
        $('.ltn__blog-slider-one-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            19. Testimonial Slider - 1
        --------------------------------------------------------- */
        $('.ltn__testimonial-slider-active').slick({
            arrows: true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            20. Testimonial Slider - 2
        --------------------------------------------------------- */
        $('.ltn__testimonial-slider-2-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            21. Testimonial Slider - 3
        --------------------------------------------------------- */
        $('.ltn__testimonial-slider-3-active').slick({
            arrows: true,
            centerMode: true,
            centerPadding: '80px',
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            21. Testimonial Slider - 5
        --------------------------------------------------------- */
        $('.ltn__testimonial-slider-5-active').slick({
            arrows: true,
            centerMode: false,
            centerPadding: '80px',
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        
        /* --------------------------------------------------------
            21. Testimonial Slider - 6
        --------------------------------------------------------- */
        $('.ltn__testimonial-slider-6-active').slick({
            arrows: true,
            dots: false,
            centerMode: false,
            centerPadding: '80px',
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        centerMode: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            22. Category Slider
        --------------------------------------------------------- */
        $('.ltn__category-slider-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 375,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            23. Image Slide  - 1 (Screenshot) 
        --------------------------------------------------------- */
        $('.ltn__image-slider-1-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '0px',
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            24. Image Slide - 2
        --------------------------------------------------------- */
        $('.ltn__image-slider-2-active').slick({
            rtl: false,
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '80px',
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerPadding: '50px'
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: '50px'
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            25. Image Slide - 3
        --------------------------------------------------------- */
        $('.ltn__image-slider-3-active').slick({
            rtl: false,
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '0px',
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            26. Image Slide - 4 
        --------------------------------------------------------- */
        $('.ltn__image-slider-4-active').slick({
            rtl: false,
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '0px',
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            ## Image Slide - 5
        --------------------------------------------------------- */
        $('.ltn__image-slider-5-active').slick({
            rtl: false,
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '450px',
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '250px',
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '200px',
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '150px',
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        centerPadding: '0px',
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        centerPadding: '0px',
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            27. Brand Logo
        --------------------------------------------------------- */
        if($('.ltn__brand-logo-active').length){
            $('.ltn__brand-logo-active').slick({
                rtl: false,
                arrows: false,
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
                nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 580,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        };


        /* --------------------------------------------------------
            # upcoming-project-slider-1
        --------------------------------------------------------- */
        $('.ltn__upcoming-project-slider-1-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        /* --------------------------------------------------------
            # ltn__search-by-place-slider-1-active
        --------------------------------------------------------- */
        $('.ltn__search-by-place-slider-1-active').slick({
            arrows: true,
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        dots: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        arrows: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        /* --------------------------------------------------------
            28. Blog Gallery (Blog Page )
        --------------------------------------------------------- */
        if($('.ltn__blog-gallery-active').length){
            $('.ltn__blog-gallery-active').slick({
                rtl: false,
                arrows: true,
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
                nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>'
            });
        };

        /* --------------------------------------------------------
            29. Countdown
        --------------------------------------------------------- */
        $('[data-countdown]').each(function () {

            var $this = $(this),
                finalDate = $(this).data('countdown');
            if (!$this.hasClass('countdown-full-format')) {
                $this.countdown(finalDate, function (event) {
                    $this.html(event.strftime('<div class="single"><h1>%D</h1><p>Days</p></div> <div class="single"><h1>%H</h1><p>Hrs</p></div> <div class="single"><h1>%M</h1><p>Mins</p></div> <div class="single"><h1>%S</h1><p>Secs</p></div>'));
                });
            } else {
                $this.countdown(finalDate, function (event) {
                    $this.html(event.strftime('<div class="single"><h1>%Y</h1><p>Years</p></div> <div class="single"><h1>%m</h1><p>Months</p></div> <div class="single"><h1>%W</h1><p>Weeks</p></div> <div class="single"><h1>%d</h1><p>Days</p></div> <div class="single"><h1>%H</h1><p>Hrs</p></div> <div class="single"><h1>%M</h1><p>Mins</p></div> <div class="single"><h1>%S</h1><p>Secs</p></div>'));
                });
            }

        });


        /* --------------------------------------------------------
            30. Counter Up
        --------------------------------------------------------- */
        // $('.ltn__counter').counterUp();

        $('.counter').counterUp({
          delay: 10,
          time: 2000
        });
        $('.counter').addClass('animated fadeInDownBig');  
        $('h3').addClass('animated fadeIn');
        

        /* --------------------------------------------------------
            31. Instagram Feed
        --------------------------------------------------------- */
        if($('.ltn__instafeed').length){
            $.instagramFeed({
                'username': 'envato',
                'container': ".ltn__instafeed",
                'display_profile': false,
                'display_biography': false,
                'display_gallery': true,
                'styling': false,
                'items': 12,
                "image_size": "600", /* 320 */
            });
            $('.ltn__instafeed').on("DOMNodeInserted", function (e) {
                if (e.target.className == 'instagram_gallery') {
                    $('.ltn__instafeed-slider-2 .' + e.target.className).slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
                        nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
                        responsive: [{
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2
                            }
                        }, {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    })
                    $('.ltn__instafeed-slider-1 .' + e.target.className).slick({
                        infinite: true,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
                        nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
                        responsive: [{
                            breakpoint: 119,
                            settings: {
                                slidesToShow: 4
                            }
                        }, {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 3
                            }
                        }, {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2
                            }
                        }, {
                            breakpoint: 575,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    });
                }
            });
        };


        /* ---------------------------------------------------------
            32. Price Slider
        --------------------------------------------------------- */
        let valorMinSliderUi = params.get("precio_min") != null ? params.get("precio_min") : 500;
        let valorMaxSliderUi = params.get("precio_max") != null ? params.get("precio_max") : 3000000;
        $( ".slider-range" ).slider({
            range: true,
            min: 500,
            max: 10000000,
            values: [ valorMinSliderUi, valorMaxSliderUi ],
            slide: function( event, ui ) {
                var formattedValue1 = ui.values[0].toLocaleString();
                var formattedValue2 = ui.values[1].toLocaleString();
                $( ".amount" ).val( "$" + formattedValue1 + " - $" + formattedValue2 );
                params.set("precio_min",ui.values[0]);
                params.set("precio_max",ui.values[1]);
            }
        });
        $( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ).toLocaleString() +
        " - $" + $( ".slider-range" ).slider( "values", 1 ).toLocaleString() ); 


        /* --------------------------------------------------------
            33. Quantity plus minus
        -------------------------------------------------------- */
        $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
        $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
        $(".qtybutton").on("click", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } 
            else {
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } 
                else {
                    newVal = 0;
                }
            }
            $button.parent().find("input").val(newVal);
        });


	    /* --------------------------------------------------------
            34. scrollUp active
        -------------------------------------------------------- */
        $.scrollUp({
            scrollText: '<i class="fa fa-angle-up"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade'
        });


	    /* --------------------------------------------------------
            35. Parallax active ( About Section  )
        -------------------------------------------------------- */
        /* 
        > 1 page e 2 ta call korle 1 ta kaj kore 
        */
        if($('.ltn__parallax-effect-active').length){
            var scene = $('.ltn__parallax-effect-active').get(0);
            var parallaxInstance = new Parallax(scene);
        }


	    /* --------------------------------------------------------
            36. Testimonial Slider 4
        -------------------------------------------------------- */
        var ltn__testimonial_quote_slider = $('.ltn__testimonial-slider-4-active');
        ltn__testimonial_quote_slider.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            fade: true,
            speed: 1500,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<a class="slick-prev"><i class="fas fa-arrow-left" alt="Arrow Icon"></i></a>',
            nextArrow: '<a class="slick-next"><i class="fas fa-arrow-right" alt="Arrow Icon"></i></a>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        autoplay: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        autoplay: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        autoplay: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        /* have to write code for bind it with static images */
        ltn__testimonial_quote_slider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var liIndex = nextSlide + 1;
            var slideImageliIndex = (slick.slideCount == liIndex) ? liIndex - 1 : liIndex;
            var cart = $('.ltn__testimonial-slider-4 .slick-slide[data-slick-index="' + slideImageliIndex + '"]').find('.ltn__testimonial-image');
            var imgtodrag = $('.ltn__testimonial-quote-menu li:nth-child(' + liIndex + ')').find("img").eq(0);
            if (imgtodrag) {
                AnimateTestimonialImage(imgtodrag, cart)
            }
        });

        /* have to write code for bind static image to slider accordion to slide index of images */
        $(document).on('click', '.ltn__testimonial-quote-menu li', function (e) {
            var el = $(this);
            var elIndex = el.prevAll().length;
            ltn__testimonial_quote_slider.slick('slickGoTo', elIndex);
            var cart = $('.ltn__testimonial-slider-4 .slick-slide[data-slick-index="' + elIndex + '"]').find('.ltn__testimonial-image');
            var imgtodrag = el.find("img").eq(0);
            if (imgtodrag) {
                AnimateTestimonialImage(imgtodrag, cart)
            }

        });



        function AnimateTestimonialImage(imgtodrag, cart) {
            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            }).css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '130px',
                'width': '130px',
                'z-index': '100'
            }).addClass('quote-animated-image').appendTo($('body')).animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 10,
                'width': 130,
                'height': 130
            }, 300);


            imgclone.animate({
                'visibility': 'hidden',
                'opacity': '0'
            }, function () {
                $(this).remove()
            });
        }


        /* --------------------------------------------------------
            Newsletter Popup
        -------------------------------------------------------- */
        $('#ltn__newsletter_popup').modal('show');




    });


    /* --------------------------------------------------------
        36. Header menu sticky
    -------------------------------------------------------- */
    $(window).on('scroll',function() {    
        var scroll = $(window).scrollTop();
        if (scroll < 445) {
            $(".ltn__header-sticky").removeClass("sticky-active");
        } else {
            $(".ltn__header-sticky").addClass("sticky-active");
        }
    }); 


    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        if($('#preloader').length){
            var preLoder = $("#preloader");
            preLoder.fadeOut(1000);

        };


    });
    /**
     * Seccion funciones api inmuebles
     */
    //Funcion para obtener el parametro de algun url
    //#region  parametro url
    $.urlParam = function(url, parametro){
        var partes = url.split('/');
        var indice = partes.indexOf(parametro);
        if (indice > -1 && indice < partes.length - 1) {
            return partes[indice + 1];
        }
        return null;
    }
    //#endregion

    //#region Funcion que retorna el html de grid y funcion que regresa el html de list
    $.gridHtml = function(data){
        let html = ''
        if (data != null && Array.isArray(data)){
            data.forEach(item => {
                const estado_inmueble = ( estado ) => {
                    if( estado ){
                        return `<div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">${ estado }</li>
                                    </ul>
                                </div>`
                    }
                    return ''
                }
                const estado = estado_inmueble( item.estado_inmueble )
                html+= `<div class="col-xl-6 col-sm-6 col-12">
                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                <div class="product-img">
                                    <a href="${item.permalink}"><img src="${item.image}" alt="Imagen del inmueble"></a>
                                </div>
                                <div class="product-info">
                                    ${ estado }
                                    <h2 class="product-title"><a href="${item.permalink}">${item.title}</a></h2>
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i> ${item.ciudad} 
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                        <li><span>${item.numero_recamaras} </span>
                                            Recámaras
                                        </li>
                                        <li><span>${item.numero_banos} </span>
                                            Baños
                                        </li>
                                        <li><span>${item.tamano_const} </span>
                                            m²
                                        </li>
                                    </ul>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                    <i class="flaticon-expand"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                    <i class="flaticon-heart-1"></i></a>
                                            </li>
                                            <li>
                                                <a href="${item.permalink}" title="Product Details">
                                                    <i class="flaticon-add"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info-bottom">
                                    <div class="product-price">
                                        <span>$${parseInt(item.precio).toLocaleString()}<label></label></span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
    
            });
        }
        else{
            html = "Sin datos de inmuebles";
        }
        return html;
    }

    $.listHtml = function(data){
        let html = ''
        if (data != null && Array.isArray(data)){
            data.forEach(item => {
                const estado_inmueble = ( estado ) => {
                    if( estado ){
                        return `<div class="product-badge">
                                    <ul>
                                        <li class="sale-badg">${ estado }</li>
                                    </ul>
                                </div>`
                    }
                    return ''
                }
                const estado = estado_inmueble( item.estado_inmueble )
                html+= `<div class="col-lg-12">
                            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                <div class="product-img">
                                    <a href="${item.permalink}"><img src="${item.image}" alt="Imagen del inmueble"></a>
                                </div>
                                <div class="product-info">
                                    <div class="product-badge-price">
                                        ${ estado }
                                        <div class="product-price">
                                            <span>$${parseInt(item.precio).toLocaleString()}<label></label></span>
                                        </div>
                                    </div>
                                    <h2 class="product-title"><a href="${item.permalink}">${item.title}</a></h2>
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <i class="flaticon-pin"></i> ${item.ciudad} 
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                        <li><span>${item.numero_recamaras} </span>
                                            Recámaras
                                        </li>
                                        <li><span>${item.numero_banos} </span>
                                            Baños
                                        </li>
                                        <li><span>${item.tamano_const} </span>
                                            m²
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-info-bottom">
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                                    <i class="flaticon-expand"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                    <i class="flaticon-heart-1"></i></a>
                                            </li>
                                            <li>
                                                <a href="${item.permalink}" title="Product Details">
                                                    <i class="flaticon-add"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });
        }
        else{
            html = "Sin datos de inmuebles";
        }
        return html;
    }

    //#endregion

    //#region Funcion para obtener la data
    
    var page = 1;
    $.inmueblesGridFunction = function(page = 1){
        $('#inmuebles-container-view').addClass('ltn__product-grid-view');
        $('#inmuebles-container-view').removeClass('ltn__product-list-view');
        let otherParams = location.href.split('/').slice(-1)[0];
        $.ajax({    
            dataType: 'json',
            url: objecto_inmuebles.apiurl + '/inmuebles/' + page + '/' + otherParams,
            method: 'GET',
            beforeSend: () =>{
                if(page == 1){
                    $('#div-grid-inmuebles').remove();
                }
                $('#resultados-texto').empty();
                const divInmuebles = `<div id="div-grid-inmuebles" class="row"></div>`
                $('#ci-show-inmuebles').append( divInmuebles );
                const spinner = `<div id="spinner-personalizado" class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>`;
              $('#llamar-spinner').append(
                spinner
              );
              $('.ltn__pagination-area .ltn__pagination ul').remove();
            },
            success: (data) =>{
                $('#div-grid-inmuebles').append($.gridHtml(data.inmuebles));
                if (data.max_pages == 1 || data.max_pages == page || data.message){
                    $("#cargar-mas").addClass("d-none");
                }
                else{
                    $("#cargar-mas").removeClass("d-none");
                }
                let postsPerPage = params.get('posts_to_show') ? params.get('posts_to_show') : 10;
                let inicio = postsPerPage*page < data.total ? postsPerPage*page : data.total;
                $('#resultados-texto').append(`<span>Mostrando ${inicio} de ${data.total} resultados</span>`);
            }
        });
        $('#llamar-spinner').remove();
    }

    $('#grid-inmuebles').click(function ( ){
        page=1;
        $.inmueblesGridFunction();
    });

    $.inmueblesListFunction = function(page = 1){
        let otherParams = location.href.split('/').slice(-1)[0];
        $('#inmuebles-container-view').addClass('ltn__product-list-view');
        $('#inmuebles-container-view').removeClass('ltn__product-grid-view');
        $.ajax({    
            dataType: 'json',
            async: false,
            url: objecto_inmuebles.apiurl + '/inmuebles/' + page + '/' + otherParams,
            method: 'GET',
            beforeSend: () =>{
                if(page == 1){
                    $('#div-grid-inmuebles').remove();
                }
                $('#resultados-texto').empty();
                const divInmuebles = `<div id="div-grid-inmuebles" class="row"></div>`
                $('#ci-show-inmuebles').append( divInmuebles );
                const spinner = `<div id="spinner-personalizado" class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>`;
                $('#llamar-spinner').append(
                    spinner
                );
                $('.ltn__pagination-area .ltn__pagination ul').remove();
            },
            success: (data) =>{
                $('#div-grid-inmuebles').append($.listHtml(data.inmuebles));
                if (data.max_pages == 1 || data.max_pages == page || data.message){
                    $("#cargar-mas").addClass("d-none");
                }
                else{
                    $("#cargar-mas").removeClass("d-none");
                }
                let postsPerPage = params.get('posts_to_show') ? params.get('posts_to_show') : 10;
                let inicio = postsPerPage*page < data.total ? postsPerPage*page : data.total;
                $('#resultados-texto').append(`<span>Mostrando ${inicio} de ${data.total} resultados</span>`);
            }
        });
        $('#llamar-spinner').remove();
    }

    $('#list-inmuebles').click(function ( ){
        page = 1;
        $.inmueblesListFunction();
    });
    //#endregion
    
    $('.check-tipo-inmueble').on('change', function() {
        let tipoInmueble = $(this).val();
        let tiposInmuebles = Array.from(params.keys())
          .filter(key => key.startsWith('tipo_inmueble['))
          .map(key => params.getAll(key))
          .flat();
        let newTiposInmuebles = [];
        if ($(this).is(':checked')) {
          newTiposInmuebles = tiposInmuebles.concat([tipoInmueble]);
        } else {
          let index = tiposInmuebles.indexOf(tipoInmueble);
          if (index > -1) {
            let paramKey = Array.from(params.keys()).find(key => {
              let paramValues = params.getAll(key);
              return paramValues.includes(tipoInmueble);
            });
            params.delete(paramKey);
            tiposInmuebles.splice(index, 1);
          }
          newTiposInmuebles = tiposInmuebles;
        }
        Array.from(params.keys())
        .filter(key => key.startsWith('tipo_inmueble['))
        .forEach(key => params.delete(key));
        newTiposInmuebles.forEach(function(tipoInmueble, i) {
            params.set(`tipo_inmueble[${i}]`, tipoInmueble);
        });
    });

    $('.check-amenidades-inmueble').on('change', function() {
        let amenidad = $(this).val();
        let amenidades = Array.from(params.keys())
          .filter(key => key.startsWith('amenidades_inmueble['))
          .map(key => params.getAll(key))
          .flat();
        let newAmenidades = [];
        if ($(this).is(':checked')) {
            newAmenidades = amenidades.concat([amenidad]);
        } else {
          let index = amenidades.indexOf(amenidad);
          if (index > -1) {
            let paramKey = Array.from(params.keys()).find(key => {
              let paramValues = params.getAll(key);
              return paramValues.includes(amenidad);
            });
            params.delete(paramKey);
            amenidades.splice(index, 1);
          }
          newAmenidades = amenidades;
        }
        Array.from(params.keys())
        .filter(key => key.startsWith('amenidades_inmueble['))
        .forEach(key => params.delete(key));
        newAmenidades.forEach(function(amenidad, i) {
            params.set(`amenidades_inmueble[${i}]`, amenidad);
        });
    });

    $('.check-estados-inmueble').on('change', function() {
        let estadoInmueble = $(this).val();
        let estadosInmuebles = Array.from(params.keys())
          .filter(key => key.startsWith('estados_inmueble['))
          .map(key => params.getAll(key))
          .flat();
        let newEstadosInmuebles = [];
        if ($(this).is(':checked')) {
            newEstadosInmuebles = estadosInmuebles.concat([estadoInmueble]);
        } else {
          let index = estadosInmuebles.indexOf(estadoInmueble);
          if (index > -1) {
            let paramKey = Array.from(params.keys()).find(key => {
              let paramValues = params.getAll(key);
              return paramValues.includes(estadoInmueble);
            });
            params.delete(paramKey);
            estadosInmuebles.splice(index, 1);
          }
          newEstadosInmuebles = estadosInmuebles;
        }
        Array.from(params.keys())
        .filter(key => key.startsWith('estados_inmueble['))
        .forEach(key => params.delete(key));
        newEstadosInmuebles.forEach(function(estadoInmueble, i) {
            params.set(`estados_inmueble[${i}]`, estadoInmueble);
        });
    });

    $("#buscar-inmuebles").submit(function(event){
        event.preventDefault();
        var search = $(this).find('input[name="search"]').val();
        params.set("search", search);
        let newUrl = `${window.location.origin}${window.location.pathname}?${params.toString()}`;
        page = 1;
        window.history.pushState(null, null, newUrl);
        if($('#grid-inmuebles').hasClass('active')){
            $.inmueblesGridFunction();   
        }
        else{
            $.inmueblesListFunction();
        }
    });

    $('#filtrar-inmuebles-sidebar').click(function(){
        page = 1;
        let newUrl = `${window.location.origin}${window.location.pathname}?${params.toString()}`;
        window.history.pushState(null, null, newUrl);
        if($('#grid-inmuebles').hasClass('active')){
            $.inmueblesGridFunction();   
        }
        else{
            $.inmueblesListFunction();
        }
    });

    $('#limpiar-filtro-inmuebles-sidebar').click(function(){
        page = 1;
        while (params.keys().next().done !== true) {
            params.delete(params.keys().next().value);
        }
        let newUrl = `${window.location.origin}${window.location.pathname}`;
        window.history.pushState(null, null, newUrl);
        $('.check-tipo-inmueble').each(function(){
            $(this).prop('checked', false);
        });
        $('.check-amenidades-inmueble').each(function(){
            $(this).prop('checked', false);
        });
        $('.check-estados-inmueble').each(function(){
            $(this).prop('checked', false);
        });
        $('select.posts-per-page').val( $('select.posts-per-page option:first').val());
        $('select.order-by').val($('select.order-by option:first').val());
        $('select').niceSelect('update');
        $('input[name="search"]').val("");
        if($('#grid-inmuebles').hasClass('active')){
            $.inmueblesGridFunction();   
        }
        else{
            $.inmueblesListFunction();
        }
    });

    $("#cargar-mas").click(function(){
        page++
        if($('#grid-inmuebles').hasClass('active')){
            $.inmueblesGridFunction(page);   
        }
        else{
            $.inmueblesListFunction(page);
        }
    });

    $("#search-form-front-page").on("click",function(event){
        event.preventDefault();
        let estadoInmueble = $(".search-form-front-page.active").text();
        let tipoInmueble = $("select.tipos-inmuebles-front-select").val();
        let locacionInmueble = $("select.location-select").val();
        let subLocacionInmueble = $("select.sublocation-select").val();
        let cantRecamaras = $("select.recamaras-select").val();
        let minConstruccion = $("#search-form-min-const").val();
        let maxConstruccion = $("#search-form-max-const").val();
        let minTerreno = $("#search-form-min-terreno").val();
        let maxTerreno = $("#search-form-max-terreno").val();
        let url = $("#form-search-inmuebles-front-page").attr("action");
        if (tipoInmueble != 0){
            params.set("tipo_inmueble[0]",tipoInmueble);
        }
        if (locacionInmueble != 0){
            params.set("location",locacionInmueble);
        }
        if (subLocacionInmueble != 0){
            params.set("sublocation", subLocacionInmueble);
        }
        if (cantRecamaras != 0){
            params.set("recamaras", cantRecamaras);
        }
        if (minConstruccion != "" && !isNaN(minConstruccion)){
            params.set("constr_min", minConstruccion);
        }
        if (maxConstruccion != "" && !isNaN(maxConstruccion) && Number(maxConstruccion) > Number(minConstruccion)){
            params.set("constr_max", maxConstruccion);
        }
        if (minTerreno != "" && !isNaN(minTerreno)){
            params.set("terreno_min",minTerreno);
        }
        if (maxTerreno != "" && !isNaN(maxTerreno) && Number(maxTerreno) > Number(minTerreno)){
            params.set("terreno_max", maxTerreno);
        }
        params.set("estados_inmueble[0]", estadoInmueble.toLowerCase());
        url = url + "?" + params.toString();
        window.location.href = url;
    });

    if (window.location.href.indexOf("inmuebles") > -1){
        $("#inmuebles-search-form-page").ready(function() {
            $.inmueblesGridFunction();   
        });
    }

})(jQuery);

(function( $ ) {
	'use strict';

	var maps = [];

	$( '.cmb-type-pw-map' ).each( function() {
		initializeMap( $( this ) );
	});

	function initializeMap( mapInstance ) {
		var searchInput = mapInstance.find( '.pw-map-search' );
		var mapCanvas = mapInstance.find( '.pw-map' );
		var latitude = mapInstance.find( '.pw-map-latitude' );
		var longitude = mapInstance.find( '.pw-map-longitude' );
		var latLng = new google.maps.LatLng( 54.800685, -4.130859 );
		var zoom = 5;

		// If we have saved values, let's set the position and zoom level
		if ( latitude.val().length > 0 && longitude.val().length > 0 ) {
			latLng = new google.maps.LatLng( latitude.val(), longitude.val() );
			zoom = 17;
		}

		// Map
		var mapOptions = {
			center: latLng,
			zoom: zoom
		};
		var map = new google.maps.Map( mapCanvas[0], mapOptions );

		// Marker
		var markerOptions = {
			map: map,
			draggable: true,
			title: 'Drag to set the exact location'
		};
		var marker = new google.maps.Marker( markerOptions );

		if ( latitude.val().length > 0 && longitude.val().length > 0 ) {
			marker.setPosition( latLng );
		}

		// Search
		var autocomplete = new google.maps.places.Autocomplete( searchInput[0] );
		autocomplete.bindTo( 'bounds', map );

		google.maps.event.addListener( autocomplete, 'place_changed', function() {
			var place = autocomplete.getPlace();
			if ( ! place.geometry ) {
				return;
			}

			if ( place.geometry.viewport ) {
				map.fitBounds( place.geometry.viewport );
			} else {
				map.setCenter( place.geometry.location );
				map.setZoom( 17 );
			}

			marker.setPosition( place.geometry.location );

			latitude.val( place.geometry.location.lat() );
			longitude.val( place.geometry.location.lng() );
		});

		$( searchInput ).keypress( function( event ) {
			if ( 13 === event.keyCode ) {
				event.preventDefault();
			}
		});

		// Allow marker to be repositioned
		google.maps.event.addListener( marker, 'drag', function() {
			latitude.val( marker.getPosition().lat() );
			longitude.val( marker.getPosition().lng() );
		});

		maps.push( map );
	}

	// Resize map when meta box is opened
	if ( typeof postboxes !== 'undefined' ) {
		postboxes.pbshow = function () {
			var arrayLength = maps.length;
			for (var i = 0; i < arrayLength; i++) {
				var mapCenter = maps[i].getCenter();
				google.maps.event.trigger(maps[i], 'resize');
				maps[i].setCenter(mapCenter);
			}
		};
	}

	// When a new row is added, reinitialize Google Maps
	$( '.cmb-repeatable-group' ).on( 'cmb2_add_row', function( event, newRow ) {
		var groupWrap = $( newRow ).closest( '.cmb-repeatable-group' );
		groupWrap.find( '.cmb-type-pw-map' ).each( function() {
			initializeMap( $( this ) );
		});
	});

})( jQuery );