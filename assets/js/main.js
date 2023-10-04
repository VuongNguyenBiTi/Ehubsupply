(function ($) {
  $(document).ready(function () {
    /* AOS Animate */
    AOS.init({ once: true });

    $('#banner_home_owl').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      dots:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  });
  $('#owl_feedback').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('#owl_our_partners').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
})


  });
})(jQuery);
