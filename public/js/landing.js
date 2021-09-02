

(function ($, root, undefined) {

    $(function () {



        'use strict';
        /*AOS*/


        /*Scroll Head*/
        var header = $('header').outerHeight();
        var top = $(document).scrollTop();
        if(top > header){
            $('header').addClass('scrolled');
        }
        else{
            $('header').removeClass('scrolled');
        }
        $(window).bind('scroll', function(){
            var top = $(document).scrollTop();
            if(top > header){
                $('header').addClass('scrolled');
            }
            else{
                $('header').removeClass('scrolled');
            }
        });


        $(document).ready(function () {
            // console.log($('.slick-track').find('.slick-slide').length)
            if($('.slick-track').find('.slick-slide').length <= 1) {
                $('.banner-buttons').addClass('opacity-0');
            }
        });


        //banner
        // $('.banner-section').slick({
        //     autoplay: false,
        //     infinite: true,
        //     dots: true,
        //     slidesToShow: 1,
        //     slideswToScroll: 1,
        //     arrows: false,
        //     fade: false,
        //     autoplaySpeed: 5000,
        //     pauseOnHover:false,
        // });
        //
        //
        // $('#prevSlide').click(function(){
        //     $(".banner-section").slick('slickPrev');
        // });
        //
        // $('#nextSlide').click(function(){
        //     $(".banner-section").slick('slickNext');
        // });




        // Mobile Navigation
        $(document).on('click', '.menu_burger', function () {
            // $('header navbar').slideToggle();
            $('header').toggleClass('open');
        });

        $(document).on('click', '.mobile-nav navbar ul li a', function () {
            $('header').removeClass('open');
        });



        $(document).ready(function(){
            $(".user-box").hover(function(){
                $(".user-box").removeClass('active');
                $(this).addClass('active');
            }, function(){
                $(".user-box").removeClass('active');
                $(".user-box.first-el").addClass('active');
            });
        });




    });

})(jQuery, this);