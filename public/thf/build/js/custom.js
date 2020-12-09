(function () {
    'use strict';


    // user dropdown stopPropagation
    $('.dropdown__login .dropdown-menu').on('click', function(event){
        event.stopPropagation();
    });


    //megaMenu Carousel
     $('.JS-megaMenu__carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        mouseDrag: false,
        rtl: false,
        items:3,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive : {
            0 : {
                items:2
            },
            1200 : {
                items:3
            }
        },
        navText:["<i class='ion-ios-arrow-left'></i>","<i class='ion-ios-arrow-right'></i>"]
    })



    //trendingPost Carousel
     $('#JS-trendingPostCarousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        mouseDrag: false,
        rtl: false,
        items:3,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsive : {
            0 : {
                nav:false,
                items:1,
                touchDrag : true,
                mouseDrag: true,
            },
            768 : {
                nav:true,
                items:2,
                touchDrag : false,
                mouseDrag: false,
            },
            1200 : {
                items:3,
                nav:true
            }
        },
        navText:["<i class='ion-ios-arrow-left'></i>","<i class='ion-ios-arrow-right'></i>"]
    })



    //author Profile carousel
     $('.authorProfile__carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:true,
        touchDrag : true,
        mouseDrag: true,
        rtl: false,
        responsive : {
            0 : {
                nav:false,
                items:1,
                touchDrag : true,
                mouseDrag: true
            },
            768 : {
                items:2,
                touchDrag : false,
                mouseDrag: false
            },
            991 : {
                items:3,
                touchDrag : false,
                mouseDrag: false
            },
            1200 : {
                items:4
            }
        }
    })



    //gallery post Carousel
     $('.galleryThumb').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        mouseDrag: false,
        rtl: false,
        items:1,
        responsive : {
            0 : {
                nav:false,
                touchDrag : true,
                mouseDrag: true,
            },
            575 : {
                nav:true,
                touchDrag : false,
                mouseDrag: false,
            }
        },
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText:["<i class='ion-ios-arrow-left'></i>","<i class='ion-ios-arrow-right'></i>"]
    })



    //featuredPostCarousel
     $('.JS-featuredPostCarousel').owlCarousel({
        loop:true,
        margin:0,
        dots:false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        rtl: false,
        responsive:{
            0 : {
                nav:false,
                items:1,
                touchDrag : true,
                mouseDrag: true,
            },
            768 : {
                nav:true,
                items:1,
                touchDrag : false,
                mouseDrag: false,
            }
        },
        navText:["<i class='ion-ios-arrow-left'></i>","<i class='ion-ios-arrow-right'></i>"]
    })



    //recent Event Carousel
     $('.JS-recentEventCarousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        touchDrag : false,
        rtl: false,
        mouseDrag: false,
        items:1,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText:["<i class='ion-ios-arrow-left'></i>","<i class='ion-ios-arrow-right'></i>"]
    })


    //mobile side manu
    $('#JS-openButton').on('click',function(){
        $('body').addClass('JS-showMenu');
    })
    $('#JS-closeButton').on('click',function(){
        $('body').removeClass('JS-showMenu');
    })




     //Header search
     $('.JS-searchTrigger').on('click',function(){
         $('body').addClass('JS-searchActive').css({"height":"100%","overflow":"hidden"});
     })
     $('.JS-formClose').on('click',function(){
         $('body').removeClass('JS-searchActive').css({"height":"100%","overflow":"visible"});
     })



     //Sticky header active
     $("#JS-headerFixed").sticky({
         topSpacing:0,
         zIndex:99999,
         wrapperClassName:'JS-stickyWrapper',
         className:'JS-stickyActive'
     });



     // StickyKit activation
    $(document).ready(function(){
        function activeStickyKit() {
            $('[data-sticky_column]').stick_in_parent({
                parent: '[data-sticky_parent]',
                offset_top:123
            });

            $('[data-sticky_column]')
            .on('sticky_kit:bottom', function(e) {
                $(this).parent().css('position', 'static');
            })
            .on('sticky_kit:unbottom', function(e) {
                $(this).parent().css('position', 'relative');
            });
        };
        activeStickyKit();

        function detachStickyKit() {
            $('[data-sticky_column]').trigger("sticky_kit:detach");
        };

           var screen = 991;

           var windowHeight, windowWidth;
           windowWidth = $(window).width();
           if ((windowWidth < screen)) {
               detachStickyKit();
           } else {
               activeStickyKit();
           }

           function windowSize() {
               windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
               windowWidth = window.innerWidth ? window.innerWidth : $(window).width();

           }
           windowSize();

           $(window).on('resize',function() {
               windowSize();
               if (windowWidth < screen) {
                   detachStickyKit();
               } else {
                   activeStickyKit();
               }
           });
        });



    // video player nicescroll
    $("ul.playList__wrap").niceScroll({
        styler:"fb",
        cursorcolor:"#80819f",
        cursorwidth:"5px",
        zindex: "9",
        mousescrollstep: 20,
        background:"#f1f1f9",
    });



    // masonry post
    $('.wrapperGrid').isotope({
      percentPosition: false,
      itemSelector: '.grid',
      masonry: {
        columnWidth: '.categoryPostOffset'
      }
    })



    //magnific Popup activation
    $('.popup-ex-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });



})(jQuery);
