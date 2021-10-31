jQuery(document).ready(function () {
 var focusGridSwiper = new Swiper(".walkermag-focus-news", {
    spaceBetween: 20,
    slidesPerView:1,
        pagination: {
          el: ".focusnews-pagination",
          clickable: true,
        },
         autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.focusnews-next',
          prevEl: '.focusnews-prev',
          clickable: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });

 var focusTickerSwiper = new Swiper(".walkermag-ticker-news", {
    spaceBetween: 20,
    slidesPerView:1,
        pagination: {
          el: ".focusnews-pagination",
          clickable: true,
        },
         autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.focusnews-next',
          prevEl: '.focusnews-prev',
          clickable: true,
      },
  });

  var focusTickerSwiper = new Swiper(".walkermag-focus-ticker", {
      spaceBetween: 30,
      slidesPerView:1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
  });

  var featuredGridSwiper = new Swiper(".walkermag-featured-grid-slider", {
      spaceBetween: 30,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".grid-slider-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.walkermag-slide-next',
          prevEl: '.walkermag-slide-prev',
          clickable: true,
        },
        
  });
  var featuredSliderSwiper = new Swiper(".walkermag-featured-slider-centered", {
    spaceBetween: 0,
    slidesPerView:1,
    centeredSlides: true,
    roundLengths: true,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walkermag-slide-next',
          prevEl: '.walkermag-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 2,
        },
        1180: {
          slidesPerView: 2,
        },
      }
  });

  var featuredTwoSwiper = new Swiper(".walkermag-featured-slider-two", {
    spaceBetween: 0,
    slidesPerView:1,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.walkermag-slide-next',
          prevEl: '.walkermag-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 3,
        },
      }
  });

  var singleStyleSwiper = new Swiper(".walkermag-single-category", {
    spaceBetween: 30,
    slidesPerView:1,
    loop: true,
    loopAdditionalSlides: 30,
        pagination: {
          el: ".singlecat-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: '.singlecat-next',
          prevEl: '.singlecat-prev',
          clickable: true,
      },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 4,
        },
        1180: {
          slidesPerView: 4,
        },
      }
  });

  jQuery('.search-toggle').on('click', function(e) {
    e.preventDefault();
    jQuery('body').addClass('modal-active');
    jQuery('.search-modal').fadeIn('fast');
  });
  jQuery('.modal-close').on('click', function(e){
     e.preventDefault();
     jQuery('body').removeClass('modal-active');
    jQuery('.search-modal').fadeOut('fast');
  });
  jQuery('#searchModel button.btn-default').on('keydown', function(e){
    jQuery('#searchModel button.modal-close').focus();
    e.preventDefault();
  });


  jQuery('.secondary-menu-toggle').on('click', function(e) {
    e.preventDefault();
    jQuery('body').addClass('modal-active');
    jQuery('.secondary-menu-modal').fadeIn('fast');
  });
  jQuery('.menu-modal-close').on('click', function(e){
     e.preventDefault();
     jQuery('body').removeClass('modal-active');
    jQuery('.secondary-menu-modal').fadeOut('fast');
  });
  jQuery('#secondaryMenuModel ul li:last-child').on('keydown', function(e){
    jQuery('#secondaryMenuModel button.menu-modal-close').focus();
    e.preventDefault();
  });

   jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() >= 90) {
            jQuery('.nav-wraper').addClass('active-sticky');
        }
        else {
            jQuery('.nav-wraper').removeClass('active-sticky');
        }
    });

jQuery(window).scroll(function(){ 
      if (jQuery(this).scrollTop() > 100) { 
          jQuery('a.walkermag-top').fadeIn(); 
      } else { 
          jQuery('a.walkermag-top').fadeOut(); 
      } 
}); 
jQuery('a.walkermag-top').click(function(){ 
        jQuery("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
}); 
  /*navmenu-toggle control*/
  var menuFocus, navToggleItem, focusBackward;
var menuToggle = document.querySelector('.menu-toggle');
var navMenu = document.querySelector('.nav-menu');
var navMenuLinks = navMenu.getElementsByTagName('a');
var navMenuListItems = navMenu.querySelectorAll('li');
var nav_lastIndex = navMenuListItems.length - 1;
var navLastParent = document.querySelectorAll('.main-navigation > ul > li').length - 1;

document.addEventListener('menu_focusin', function () {
    menuFocus = document.activeElement;
    if (navToggleItem && menuFocus !== navMenuLinks[0]) {
        document.querySelectorAll('.main-navigation > ul > li')[navLastParent].querySelector('a').focus();
    }
    if (menuFocus === menuToggle) {
        navToggleItem = true;
    } else {
        navToggleItem = false;
    }
}, true);


document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        focusBackward = true;
    } else {
        focusBackward = false;
    }
});


for (el of navMenuLinks) {
    el.addEventListener('blur', function (e) {
        if (!focusBackward) {
            if (e.target === navMenuLinks[nav_lastIndex]) {
                menuToggle.focus();
            }
        }
    });
}
menuToggle.addEventListener('blur', function (e) {
    if (focusBackward) {
        navMenuLinks[nav_lastIndex].focus();
    }
});

});