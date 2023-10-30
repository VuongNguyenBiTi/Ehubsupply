(function ($) {
  $(document).ready(function () {
    /* AOS Animate */
    AOS.init({ once: true });

    $("#banner_home_owl").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 4000,
      autoplaySpeed: 2000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
    $("#owl_feedback").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplaySpeed: 2000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
    $("#owl_our_partners").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplaySpeed: 2000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 6,
        },
      },
    });
    $("#owl_product_related").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      // autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav : false,
      dots: false,
      responsive: {
        0: {
          items: 2,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 6,
        },
      },
    });

    //lướt chuột cố định menu
    $(window).scroll(function () {
      if ($(this).scrollTop() > 72) {
        $(".header").addClass("header_active");
      } else {
        $(".header").removeClass("header_active");
      }
    });

    // Lấy các nút và phần tử cần thay đổi
    const button1 = document.getElementById("button1");
    const button2 = document.getElementById("button2");
    const shopProduct = document.querySelectorAll(".shop_product_main");
    const shop_product_wrap = document.querySelectorAll(".shop_product_wrap");
    const elementsToModify = document.querySelectorAll(
      ".col-lg-12, .col-md-12, .col-6"
    );
    const images = document.querySelectorAll(
      ".shop_product1 .shop_product_left img"
    );
    const product_sale_p = document.querySelectorAll(
      ".shop_product_center .product_sale p "
    );
    const product_sale = document.querySelectorAll(
      ".shop_product_center .product_sale "
    );
    const product_price_p = document.querySelectorAll(
      ".shop_product_center .product_price p"
    );
    const shop_product_right = document.querySelectorAll(".shop_product_right");
    const btn_cart = document.querySelectorAll(".shop_product_right .btn_cart");
    const shop_product1 = document.querySelectorAll(".shop_product1");
    const add_wishlist = document.querySelectorAll(
      ".yith-wcwl-add-to-wishlist"
    );
    var shopProducts = document.querySelectorAll(".shop_product1");

    button2.addEventListener("click", function () {
      button2.classList.add("icon_layout_active");
      button1.classList.remove("icon_layout_active");

      shopProduct.forEach(function (element) {
        element.classList.add("shop_product_customer");
      });
      shop_product_wrap.forEach(function (element) {
        element.classList.add("shop_product_wrap_customer");
      });

      elementsToModify.forEach(function (element) {
        element.classList.remove("col-lg-12", "col-md-12", "col-6");
        element.classList.add("col-lg-4", "col-md-6", "col-6");
      });
      images.forEach(function (image) {
        image.style.width = "100%";
        image.style.height = "180px";
        image.style.objectFit = "cover";
      });
      product_sale_p.forEach(function (element) {
        element.style.fontSize = "14px";
        element.style.margin = "0px";
      });
      product_sale.forEach(function (element) {
        element.style.justifyContent = "space-between";
      });
      product_price_p.forEach(function (element) {
        element.style.marginBottom = "0px";
      });
      shop_product_right.forEach(function (element) {
        element.style.flexDirection = "row";
      });

      const yith_wishlist_bt = $(".yith-wcwl-add-to-wishlist");
      yith_wishlist_bt.each(function () {
        $(this).css("width", "33%");
      });
      //   const add_wishlist = $(".yith-wcwl-add-to-wishlist");
      //   add_wishlist.each(function () {
      //     $(this).css("width", "33% !important");
      //   });

      btn_cart.forEach(function (element) {
        element.style.marginBottom = "0px";
      });
      shop_product1.forEach(function (element) {
        element.style.padding = "10px ";
        element.style.height = "402px ";
      });
      shopProducts.forEach(function (shopProduct) {
        shopProduct.addEventListener("mouseover", function () {
          shopProduct.style.boxShadow = "10px 7px 20px 3px rgba(0, 0, 0, 0.14)";
          shopProduct.style.transform = "translate3d(0px, -8px, 15px)";
        });

        shopProduct.addEventListener("mouseout", function () {
          shopProduct.style.boxShadow = "none"; // Loại bỏ box-shadow
          shopProduct.style.transform = "none"; // Loại bỏ transform
        });
      });
    });

    button1.addEventListener("click", function () {
      button1.classList.add("icon_layout_active");
      button2.classList.remove("icon_layout_active");

      shopProduct.forEach(function (element) {
        element.classList.remove("shop_product_customer");
      });
      shop_product_wrap.forEach(function (element) {
        element.classList.remove("shop_product_wrap_customer");
      });
      elementsToModify.forEach(function (element) {
        element.classList.remove("col-lg-4", "col-md-6", "col-6");
        element.classList.add("col-lg-12", "col-md-12", "col-6");
      });
      images.forEach(function (image) {
        image.style.width = "160px";
        image.style.height = "160px";
      });
      product_sale_p.forEach(function (element) {
        element.style.fontSize = "16px";
        element.style.marginBottom = "1rem";
      });
      product_sale.forEach(function (element) {
        element.style.justifyContent = "normal";
      });
      product_price_p.forEach(function (element) {
        element.style.marginBottom = "1rem";
      });
      shop_product_right.forEach(function (element) {
        element.style.flexDirection = "column";
      });
      const yith_wishlist_bt = $(".yith-wcwl-add-to-wishlist");
      yith_wishlist_bt.each(function () {
        $(this).css("width", "100%");
      });
      const add_wishlist = $(".yith-wcwl-add-to-wishlist");
      add_wishlist.each(function () {
        $(this).css("width", "100%");
      });
      btn_cart.forEach(function (element) {
        element.style.marginBottom = "20px";
      });
      shop_product1.forEach(function (element) {
        element.style.padding = "20px 10px 20px 10px";
        element.style.height = "auto ";

      });
    });



  

    
  });
})(jQuery);

// ///Ajax cập nhật giá tiền trang giỏ hàng
jQuery(document).ready(function ($) {
  var woocommerce_form = $(".woocommerce-cart form");
  woocommerce_form.on("change", ".qty", function () {
    form = $(this).closest("form");

    // emulates button Update cart click
    $(
      "<input type='hidden' name='update_cart' id='update_cart' value='1'>"
    ).appendTo(form);

    // get the form data before disable button...
    formData = form.serialize();

    // disable update cart and proceed to checkout buttons before send ajax request
    // $("input[name='update_cart']").val('Updating…').prop('disabled', true);
    // $("a.checkout-button.wc-forward").addClass('disabled').html('Updating…');

    // update cart via ajax
    $.post(form.attr("action"), formData, function (resp) {
      // get updated data on response cart
      var shop_table = $("table.shop_table.cart", resp).html();
      var cart_totals = $(".cart-collaterals .cart_totals", resp).html();

      // replace current data by updated data
      $(".woocommerce-cart table.shop_table.cart").html(shop_table);
      $(".woocommerce-cart .cart-collaterals .cart_totals").html(cart_totals);
    });
  });

  $(".woocommerce-cart").on(
    "click",
    "a.checkout-button.wc-forward.disabled",
    function (e) {
      e.preventDefault();
    }
  );
});

document.addEventListener("DOMContentLoaded", function() {
    var breadcrumbNav = document.querySelector(".woocommerce-breadcrumb");
    if (breadcrumbNav) {
        breadcrumbNav.classList.add("container" ,"woocommerce_breadcrumb_ct");
    }
});
