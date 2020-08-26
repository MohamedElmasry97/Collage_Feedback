/*global $ , document , window */
$(document).ready(function () {

    // show links when click on icon

    "use strict";
    // $('header i.head-icon').click(function () {
    //     $('.nav-list').slideToggle();
    // });

    // height for home
    var WinH       = $(window).height(),
        HeaderH    = $('header').innerHeight();


        $('.home').height($(window).height());
        $('.contact').height($(window).height());
        $('.list-box').height($(window).height());

        $(window).resize(function(){

            $('.home').height($(window).height());
            $('.contact').height($(window).height());
            $('.list-box').height($(window).height());

        });


    $(window).scroll(function () {

        var SCtop = $(this).scrollTop();
        if( SCtop > 1981) {
            $('.time').countTo(); // Run Count To Plugin
            $(window).off('scroll');
        }
    });
    // portfolio

    //  $('.portfolio ul li').click(function(){

    //     $(this).addClass('active').siblings().removeClass('active');
    //     if ($(this).data('class') === 'all') {

    //         $('.shuffle-images .col-md-3').css("opacity",1);
    //     }
    //     else
    //     {
    //         $('.shuffle-images .col-md-3').css("opacity","0.1");
    //         $($(this).data('class')).parent().css("opacity",1);
    //     }
    // });

     // owl carousel >> Team Section

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    /******* global *********/
    // smooth scroll

    // $('.nav-list li a , .home_footer').click(function (e) {

    //     e.preventDefault();

    //     $('html , body').animate({

    //         scrollTop : $('.' + $(this).data('scroll')).offset().top -35

    //     }, 1000);
    // });

     // add class active

    // $('li a').click(function () {

    //     $(this).parent().addClass('active').siblings().removeClass('active');
    // });

    // scroll to top button

    $(window).scroll(function () {

        if ($(this).scrollTop() > 500) {
            $('.scroll-top').fadeIn(1000);
        } else {

            $('.scroll-top').fadeOut(500);
        }
    });

     // click on the buuton to go up

    $('.scroll-top').click(function () {

        $('html , body').animate({

            scrollTop : 0

        }, 1000);
    });

    //  $(window).on('load' , function(){

    //      $('.loading-overlay .spinner').fadeOut(3000, function(){

    //          $(this).parent().fadeOut(500,function(){
    //              $('body').css("overflow","auto");
    //              $(this).remove();
    //          })

    //      })

    //  });

     $('.chev , .part button').click(function (e) {

        e.preventDefault();

        $('html , body').animate({

            scrollTop : $('.' + $(this).data('scroll')).offset().top

        }, 1000);
    });



});
