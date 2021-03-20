var $ = jQuery;
jQuery(document).on('ready', function () {
    $($('.afreg_extra_fields').detach()).insertBefore('.woocommerce.container.registration .form-row:eq(0)');
    if ($('.post-type-archive').length) {
        $('main .content .container').prepend($('.post-type-archive .woocommerce-breadcrumb').detach());
        $('main .content .container').prepend($('.post-type-archive .woocommerce-products-header').detach());
    }

    if ($('body').hasClass('woocommerce-cart')) {
        $('#ajaxsearchlite1 input[type="search"]').attr('placeholder', 'Add another product');
        arrangeCartBySupplier();

        $('.button[name="update_cart"]').on('click', function () {
            setTimeout(function () {
                location.reload();
            }, 4000);
        });

        $('.proinput input[type="search"]').on('keypress', function () {
            setInterval(() => {
                $('.resdrg a').each(function(){
                    $(this).attr('href', '/elevate-search-product'+'?post_class='+ encodeURIComponent( $(this).parents('.asl_r_pagepost ').attr('class') ));
                });
            }, 1000);
        });

    }

    if ($('.woocommerce-button.invoice').length) {
        $('.woocommerce-button.invoice').text('Order');
    }

    if ($('.order-total th').length) {
        $('.order-total th').text('Total Excluding GST');
        setTimeout(() => {
            $('.order-total th').text('Total Excluding GST');
        }, 4000);
    }


    if ($('.tax-product_cat').length) {
        $('main .content .container').prepend($('.tax-product_cat .woocommerce-breadcrumb').detach());
    }

    if ($('.single-product').length) {
        var sku = '<span class="sku">' + jQuery('.single-product .sku_wrapper .sku').text() + '</span>';
        var cate = '<span class="posted_in"><a href="' + jQuery('.single-product .product_meta .posted_in a').attr('href') + '">' + jQuery('.single-product .product_meta .posted_in a').text() + '</a></span>';
        jQuery('.single-product form.cart .product_meta:eq(0) .cfwc-custom-field-wrapper').append(' | ' + sku + ' | ' + cate);
        jQuery('.single-product form.cart').next().remove();
        jQuery('.single-product form.cart .product_meta:eq(0) .cfwc-custom-field-wrapper').removeClass('cfwc-custom-field-wrapper');
        jQuery('.single-product .entry-summary').prepend(jQuery('.single-product form.cart .product_meta:eq(0)').detach());
        var thumbHeight = jQuery('.woocommerce-product-gallery__image').height();
        var summaryHeight = jQuery('.single-product .entry-summary').height();
        if (summaryHeight < thumbHeight && jQuery(window).innerWidth() > 767) {
            jQuery('.single-product .entry-summary').height(thumbHeight + 125);
        }
    }

    if (jQuery('#billing_cstm_wp_order_number_field').length) {
        jQuery('.woocommerce-additional-fields__field-wrapper').append(jQuery('#billing_cstm_wp_order_number_field').detach());
    }

    $('.testing').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        arrows: true,
        autoplay: false
    });
    $('.autoplay-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000
    });

    $('.supplier-videos').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        dots: true,
        arrows: true
    });
    $('.supplier-videos').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $('.slick-current iframe').attr('src', $('.slick-current iframe').attr('src'));
        $('.slick-current video').each(function () {
            $(this)[0].pause();
        });

    });
});

function addToCartFromSearch() {
    $('.asl_simplebar-content-wrapper a.asl_res_url, .asl_simplebar-content-wrapper a span').on('click', function (e) {
        e.preventDefault();

    });
}

function arrangeCartBySupplier() {
    $(".woocommerce-cart-form tbody tr.woocommerce-product-seller").each(function () {
        $('.woocommerce-cart-form tbody tr[data-cat-id="' + $(this).data("cat-id") + '"]:not(:first)').remove();
    });

    $('.woocommerce-cart-form tbody tr.cart_item').each(function () {
        $($(this)).insertAfter($('.woocommerce-cart-form tbody tr.woocommerce-product-seller[data-cat-id="' + $(this).data('category') + '"]'));
    });

    $('<div class="elevate-cstm-checkout no-supplier-selected"><a class="elevate-checkout-btn" href="/custom-checkout/">Proceed to Checkout</a></div>').insertBefore($('.wc-proceed-to-checkout'));

    $('.woocommerce-product-seller .switch').on('change', function () {
        if ($('.woocommerce-product-seller .switch:checked').length == 0) {
            $('.elevate-cstm-checkout').addClass('no-supplier-selected');
        } else {
            $('.elevate-cstm-checkout').removeClass('no-supplier-selected');
        }

        if ($(this).prop('checked')) {
            $('.woocommerce-product-seller .switch').not($(this)).prop('checked', false);
            var total = $(this).parents('.woocommerce-product-seller').find('.sub-total strong').text();
            $('.shop_table .cart-subtotal bdi').html(total);
            $('.shop_table .order-total bdi').html(total);
        }
        elevateCheckoutProcess();
    });

    elevateSupplierTotal();

}

function elevateCheckoutProcess() {
    var href = '/custom-checkout';
    var category = $('.woocommerce-product-seller .switch:checked').parents('.woocommerce-product-seller').data('cat-id');
    var productIds = [];
    $('.woocommerce-cart-form .cart_item[data-category="' + category + '"]').each(function () {
        productIds.push($(this).data('productid'));
    });
    var nonce = $('.elevate-cstm-checkout-nonce').val();

    $('.elevate-cstm-checkout .elevate-checkout-btn').attr('href', href + '?nonce=' + nonce + '&products=' + productIds.toString());

}

// function elevateCheckoutProcessOld() {
//     $('.elevate-cstm-checkout .elevate-checkout-btn').on('click', function () {
//         $(this).text('Please wait...');
//         var postIds = [];
//         var checked = $('.woocommerce-product-seller .switch:checked').parents('.woocommerce-product-seller').data('cat-id');
//         $('.woocommerce-cart-form .cart_item[data-category="'+checked+'"]').each(function(){
//             postIds.push( $(this).data('productid') );
//         });

//         console.log($('.elevate-cstm-checkout-nonce').val());
//         return false;

//         $.ajax({
//             type : "post",
//             dataType : "json",
//             url : myAjax.ajaxurl,
//             data : {
//                 action: "elecate_cstm_checkout_process", 
//                 post_id : postIds, 
//                 nonce: $.trim($('.elevate-cstm-checkout-nonce').val())
//             },
//             success: function(response) {
//             //    if( response == 'Success' ){
//                    $('.wc-proceed-to-checkout .checkout-button').trigger('click');
//             //    }
//             }
//          }); 
//     });
// }

function elevateSupplierTotal() {
    $(".woocommerce-cart-form tbody tr.woocommerce-product-seller").each(function () {
        var q = 0,
            p = 0;
        $('.woocommerce-cart-form tbody tr.cart_item[data-category="' + $(this).data('cat-id') + '"]').each(function () {
            q += parseInt($.trim($(this).find('.product-quantity .quantity input').val()));
            p += parseFloat(stripCharacters($.trim($(this).find('.product-subtotal .woocommerce-Price-amount bdi').text())));
        });
        $(this).find('.quantity').text(q);
        $(this).find('.sub-total strong').text('$' + numberWithCommas(p));
    });
}

function stripCharacters(str) {
    str = str.replace('$', '');
    str = str.replace(',', '');
    return str;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}