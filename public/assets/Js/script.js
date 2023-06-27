var w = 0;
$(function() {
    "use strict";

        $(window).scroll(function() {
            if ($(this).scrollTop() > 90){  
                $('.top-scrolling').addClass("sticky");
            }
            else{
                $('.top-scrolling').removeClass("sticky");
            }
        });

        function responsive_dropdown (){
            /*---- Scrolling js -----*/
            $(".scrollTo").on('click', function(e) {
                e.preventDefault();
                var target = $(this).attr('href');
                $('html, body').animate({
                   scrollTop: ($(target).offset().top)
                }, 1000);
            });
            /* Responsive menu */
            $(".navbar-toggle").on("click", function(){
                $(".navbar-toggle, .header-menu").toggleClass("active");
            });

            $(".level-1").on("click", function(){
              $(".level-1, .megamenu-1").toggleClass("active");
            });

            $(".set > .opener").on("click", function() {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    $(this)
                        .siblings(".megamenu")
                        .slideUp(200);
                    $(".set > a i")
                        .removeClass("fa-minus")
                        .addClass("fa-plus");
                } else {
                $(".set > a i")
                    .removeClass("fa-minus")
                    .addClass("fa-plus");
                $(this)
                    .find("i")
                    .removeClass("fa-plus")
                    .addClass("fa-minus");
                $(".set > .opener").removeClass("active");
                $(this).addClass("active");
                $(".megamenu").slideUp(200);
                $(this)
                    .siblings(".megamenu")
                    .slideDown(200);
                }
            });

            $(".set").on("click", function() {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                    $(this)
                    $(".set")
                        .removeClass("")
                        .addClass("");
                } else {
                $(".set")
                    .removeClass("")
                    .addClass("");
                $(this)
                    .find("i")
                    .removeClass("s")
                    .addClass("");
                $(".set").removeClass("active");
                $(this).addClass("active");
                }
            });
            /* Responsive menu End */

            /* Responsive cart Drop Down */

            $(".cart-icon").on("click", function(){
                $(".cart-dropdown, .cart-icon").toggleClass("active");
            });

            /* Responsive cart Drop Down End */

            /* Product Detail choose size */

            $('ul.Choose li').on("click", function(){
                $('ul.Choose li').removeClass('current');
                $(this).addClass('current');
            })

            $('ul.Size li').on("click", function(){
                $('ul.Size li').removeClass('current');
                $(this).addClass('current');
            })

            /* Product Detail choose size  End */

            /* Product Detail description tab */

            $('ul.panel-tab li').on("click", function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.panel-tab li').removeClass('current');
                $('.product-desc-tab').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            })

            /* Product Detail description tab End */
        };


        $(window).on("load", function() {
            /* -------- preloader ------- */
            $('#preloader').delay(2000).fadeOut(500);
            /*------End----------*/
        });

        /* Custom select drop dwon */

        $(".custom-select").each(function() {
            var classes = $(this).attr("class"),
                id      = $(this).attr("id"),
                name    = $(this).attr("name");
            var template =  '<div class="' + classes + '">';
                template += '<span class="custom-select-trigger">' + $(this).data("placeholder") + '</span>';
                template += '<div class="custom-options">';
                $(this).find("option").each(function() {
                    template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
                });
            template += '</div></div>';
        
            $(this).wrap('<div class="custom-select-wrapper"></div>');
            $(this).hide();
            $(this).after(template);
        });
        $(".custom-option:first-of-type").hover(function() {
            $(this).parents(".custom-options").addClass("option-hover");
        }, function() {
            $(this).parents(".custom-options").removeClass("option-hover");
        });
        $(".custom-select-trigger").on("click", function() {
            $('html').one('click',function() {
                $(".custom-select").removeClass("opened");
            });
            $(this).parents(".custom-select").toggleClass("opened");
            event.stopPropagation();
        });
        $(".custom-option").on("click", function() {
            $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
            $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
            $(this).addClass("selection");
            $(this).parents(".custom-select").removeClass("opened");
            $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
        });

        /* Custom select drop dwon End */

        /* Home page banner */

        if ($(".banner-carousel").length > 0) {
            $('.banner-carousel').owlCarousel({
                loop:true,
                nav: true,
                dots: false,
                items: 1,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause: true,
                autoHeight:true,
                responsive: {
                    0: {
                        arrow: false,
                        nav: false,
                        dots: true,
                    },
                    768: {
                        arrow: false,
                        nav: true,
                        dots: false,
                    },
                }
            });
        }


        /* Home page chef banner */

        if ($(".chef-banner").length > 0) {
            $('.chef-banner').owlCarousel({
                loop:true,
                nav: false,
                items: 4,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout:5000,
                responsive: {
                    0: {
                        dots: true,
                        nav: false,
                        items: 1,
                    },
                    768: {
                        items: 3,
                        nav: true,
                    },
                    992: {
                        items: 4,
                        nav: true,
                    },
                }
            });
        }

        /* Customer Reviews */

        if ($(".customer-slide").length > 0) {
            $('.customer-slide').owlCarousel({
                loop:true,
                nav: false,
                items: 1,
                responsiveClass: true,
                autoplay:true,
                autoplayTimeout:5000,
                animateOut: 'slideOutUp',
                animateIn: 'slideInUp',
                responsive: {
                    767: {
                        nav: false,
                    },
                }
            });
        }

        $(document).ready(function() {
            responsive_dropdown ();
        });

});


$("#list").click(function() {
    $('.menu-list-box-2').css("flex-direction" , "row"); 
});
$("#grid").click(function() {
    $('.menu-list-box-2').css("flex-direction" , "column"); 
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 