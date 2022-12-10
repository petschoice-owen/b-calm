var $ = jQuery;

// top navigation function
var windowScrolled = () => {
    function checkScroll() {
        if ($(window).scrollTop() >= 50) {
            $(".top-navigation").addClass("scrolled");
        } else {
            $(".top-navigation").removeClass("scrolled");
        }
    }

    $(document).ready(function() {
        checkScroll();
        $(window).scroll(checkScroll);
    });
}
  
// slider function
var customSlider = () => {
    if ($(".custom-slider")) {
        $('.custom-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 1500,
            dots: false,
            prevArrow: false,
            nextArrow: false,
            swipe: false,
            // fade: true,
            // cssEase: 'linear'
        });
    }  
}
  
// main element - auto padding-top
var mainAutoPadding = () => {
    if ($(".top-navigation")) {
        var topNavHeight = $(".top-navigation").height();
    
        $(".top-navigation + main").css("padding-top", topNavHeight+"px");
        $(".top-navigation + #primary").css("padding-top", topNavHeight+"px");
        
        // var footerHeight = $(".footer-section").outerHeight();
        // var heroHeight = topNavHeight + footerHeight;
        
        // $(".hero").css("height", "calc(100vh - " + heroHeight + "px)");
    
        // var contentHeight = $(".hero .wrapper").outerHeight();
        // var heroHeight = contentHeight + 200;
        // var heroHeightMobile = contentHeight + 100;
    
        // if ($(window).width() <= 767) {
        //     $(".hero").css("min-height", heroHeightMobile);
        // }
        // else {
        //     $(".hero").css("min-height", heroHeight);
        // }
    }
}

// footer functions
var footerFunctions = () => {
    if ($(".footer-section .phone-number").length) {
        var phoneNumber = $(".footer-section .phone-number").text();
        var numberFormatted = phoneNumber.replace(/\s/g, '').replace(/[^a-zA-Z0-9 ]/g, '');

        $(".footer-section .phone-number").attr("href", "tel:+" +numberFormatted);
    }
}

// top-navigation - click to scroll to section
var scrollTarget = () => {
    // top navigation - menu links
    if ($(".top-navigation .navbar-nav a").length) {
        if ($("body").hasClass("home")) {
            $(".top-navigation .navbar-nav a").each(function() {
                var defaultHref = $(this).attr("href");
                
                if ( $(this).text() != "Shop" ) {
                    $(this).attr("data-href",defaultHref);
                    setTimeout(() => {
                        $(this).attr("href", "#");
                    }, 100);
                }
        
                $(this).click(function(e) {
                    if ( $(this).text() != "Shop" ) {
                        e.preventDefault();
                        var navHref = $(this).attr("data-href");
                        var windowSize = $(window).width();
    
                        if (windowSize < 768) {
                            $('html, body').animate({
                                scrollTop: $(navHref).offset().top-68
                            }, 'fast'); 
                        }
                        else if (windowSize < 992) {
                            $('html, body').animate({
                                scrollTop: $(navHref).offset().top-75
                            }, 'fast'); 
                        }
                        else if (windowSize < 1200) {
                            $('html, body').animate({
                                scrollTop: $(navHref).offset().top-76
                            }, 'fast'); 
                        }
                        else {
                            $('html, body').animate({
                                scrollTop: $(navHref).offset().top-80
                            }, 'fast'); 
                        }
                    }                    
                });
            });
        }

        else {
            $(".top-navigation .navbar-nav a").each(function() {
                if ( $(this).text() != "Shop" ) {
                    var defaultHref = $(this).attr("href");
                    setTimeout(() => {
                        $(this).attr("href" , "/" + defaultHref);
                    }, 100);
                }
            });
        }
    }

    // hero section - button
    if ($(".calming-spray .button-holder a").length) {
        var heroButton = $(".calming-spray .button-holder a");
        var heroButtonHref = heroButton.attr("href");
        heroButton.attr("href","#"); 
        heroButton.attr("data-href",heroButtonHref);
    
        heroButton.click(function(e) {
            e.preventDefault();
            var windowSize = $(window).width();

            if (windowSize < 768) {
                $('html, body').animate({
                    scrollTop: $(heroButtonHref).offset().top-68
                }, 'fast'); 
            }
            else if (windowSize < 992) {
                $('html, body').animate({
                    scrollTop: $(heroButtonHref).offset().top-75
                }, 'fast'); 
            }
            else if (windowSize < 1200) {
                $('html, body').animate({
                    scrollTop: $(heroButtonHref).offset().top-76
                }, 'fast'); 
            }
            else {
                $('html, body').animate({
                    scrollTop: $(heroButtonHref).offset().top-80
                }, 'fast'); 
            }
        });
    }

    // top navigation - logo link
    if ($("body").hasClass("home")) {
        var logoHref = $(this).attr("data-href");
        var logoLink = $(".top-navigation .logo-link");

        logoLink.attr("data-href", "home");
        $(".top-navigation .logo-link").click(function(e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $(logoHref)
            }, 'fast');            
        });
    }
}

// top navigation - mobile - toggle navbar-toggler when clicking on menu
var navToggler = () => {
    if ($(window).width() < 992) {
        $(".top-navigation .navbar-toggler").addClass("collapsed").attr("aria-expanded", "false");
        $(".top-navigation .navbar-collapse").removeClass("show").addClass("collapse");
        $(".top-navigation .navbar-nav a").each(function() {
            $(this).click(function() {
                $(".top-navigation .navbar-toggler").click();
            });
        });
    }
}

// accordion - open/show the first item
var accordion = () => {
    if ($("#accordion_custom").length) {
        $("#accordion_custom .accordion-item:first-child button").removeClass("collapsed").attr("aria-expanded", "true");
        $("#accordion_custom .accordion-item:first-child .accordion-collapse").addClass("show");
    }
}

// product quantity function
var productQuantity = () => {
    if ($(".qty-input").length) {
        $('.increment-btn').click(function (e) {
            e.preventDefault();
        
            var inc_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            
            if (value < 99) {
                value++;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                // var newQuantity = $("#qty_display").val();                
                var newQuantity = $(this).closest('.product-quantity').find('.qty-input').val();

                $(this).closest(".variation-quantity").find(".woocommerce-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
        
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
        
            var dec_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                // var newQuantity = $("#qty_display").val();                
                var newQuantity = $(this).closest('.product-quantity').find('.qty-input').val();

                // $(this).closest(".variation-quantity")(".quantity .input-text.qty.text").val(newQuantity);
                $(this).closest(".variation-quantity").find(".woocommerce-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
    }
}

// single product carousel or featured image function
var productCarousel = () => {
    if ($(".product-thumbnails").length) {
        // remove 5th and succeeding product thumbnails
        $(".product-thumbnails .woocommerce-product-gallery__image:nth-child(1n+5)").remove();

        // check if there is a product thumbnail
        // if yes, show product nav (or carousel arrows)
        $(".product-nav").show();

        // product thumbnail - change selected image and add active class on selected thumbnail
        $(".product-thumbnails .woocommerce-product-gallery__image:first-child").addClass("active");
        $(".product-thumbnails .woocommerce-product-gallery__image").each(function() {
            $(this).click(function(e) {
                var featuredImage = $(".product-featured .wp-post-image");
                var selectedImage = $(this).find("img").attr("src");

                e.preventDefault();
                $(featuredImage).attr("src",selectedImage);
                $(".product-thumbnails .woocommerce-product-gallery__image").removeClass("active");
                $(this).addClass("active");
            })
        });

        // change active selected thumbnail and update the featured image
        $(".product-nav-right").click(function(e) {
            e.preventDefault();

            if ($(".product-thumbnails .active").next().length) {
                $(".product-thumbnails .active").removeClass("active").next().addClass("active");
                
                var featuredImage = $(".product-featured .wp-post-image");
                var selectedImage = $(".product-thumbnails .active").find("img").attr("src");
                $(featuredImage).attr("src",selectedImage);
            }
        });

        // change active selected thumbnail and update the featured image
        $(".product-nav-left").click(function(e) {
            e.preventDefault();

            if ($(".product-thumbnails .active").prev().length) {
                $(".product-thumbnails .active").removeClass("active").prev().addClass("active");
                
                var featuredImage = $(".product-featured .wp-post-image");
                var selectedImage = $(".product-thumbnails .active").find("img").attr("src");
                $(featuredImage).attr("src",selectedImage);
            }
        });
    }
}

// single product - show product information
var productInformation = () => {
    if ($(".single-product .entry-summary").length) {
        setTimeout(() => {
            $(".single-product .entry-summary").css("opacity" , "1");
        }, 100);
    }
}

  
/* Initialize the Functions */
windowScrolled();
  
$(document).ready(function() {
    // customSlider();
    scrollTarget();
    navToggler();
    footerFunctions();
    productQuantity();
    productInformation();
});
  
$(window).resize(function() {
    navToggler();
    mainAutoPadding();
});

$(window).on("load", function() {
    mainAutoPadding();
    accordion();
    productCarousel();
    new WOW().init();
});