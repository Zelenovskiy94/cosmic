'use strict'
jQuery(document).ready(function($){

    var single_slider = new Swiper(".single-slider", {
        pagination: {
          el: ".swiper-pagination",
        },
      });

    $('body').on('click', '.btn-show-search', function(){
      $(this).addClass('hide')
      $('.btn-header-catalog').addClass('hide')
      $('.header-search ').addClass('active')
      $(this).next().addClass('active')
    })

    $(document).mouseup( function(e){ 
      let div = $( ".header-search .search-form-container" ); 
      if ( !div.is(e.target) 
          && div.has(e.target).length === 0 ) { 
        if(div.hasClass('active')){
          div.removeClass('active')
          $('.btn-header-catalog ').removeClass('hide')
          $('.header-search ').removeClass('active')
          setTimeout(function(){
            $('.btn-show-search').removeClass('hide')
          },200)
        }
      }
    });

    $('body').on('click', '.show-catalog_filter', function(){
      let height = $('.wpfMainWrapper').height()
      $(this).toggleClass('active')
      $(this).parent().toggleClass('active')
      $('.catalog_filter').css('max-height', '55px')
      $('.catalog_filter.active').css('max-height', height + 'px')
    })

    $('body').on('click', '.burger-button', function(){
        $(this).toggleClass('active')
        $('.mobile-menu').toggleClass('active')
    })
    $('body').on('click', '.btn-header-catalog', function(){
        $(this).toggleClass('active')
        $('.catalog-menu-desktop').toggleClass('active')
        $('.banner-slider').toggleClass('none-pointer-events')
    })
    $(document).mouseup( function(e){ 
      let div = $( ".catalog-menu-desktop" ); 
      if ( !div.is(e.target) 
          && div.has(e.target).length === 0 ) { 
          if(div.hasClass('active')){
            div.removeClass('active')
            $('.btn-header-catalog').removeClass('active')
            $('.banner-slider').removeClass('none-pointer-events')
          }
      }
    });
 
          
    $('body').on( 'click', '.input_quantity button.plus,.input_quantity button.minus', function() {
    var qty = $( this ).closest( '.input_quantity' ).find( '.qty' );
    var val   = parseFloat(qty.val());
    var max = parseFloat(qty.attr( 'max' ));
    var min = parseFloat(qty.attr( 'min' ));
    var step = parseFloat(qty.attr( 'step' ));
    let timer = 800;
    clearTimeout(jQuery(qty).data('timer'));
    $( '.woocommerce-cart-form' ).find( ':input[name="update_cart"]' ).prop( 'disabled', false ).attr( 'aria-disabled', false );
    if ( $( this ).is( '.plus' ) ) {
        if ( max && ( max <= val ) ) {
          qty.attr('value', max );
        } 
    else {
        qty.attr('value', val + step );
          }
    } 
    else { 
        if ( min && ( min >= val ) ) {
          qty.attr('value', min );
        } 
        else if ( val > 1 ) {
          qty.attr('value', val - step );
        }
    } 
    
    jQuery(qty).data('timer', setTimeout(function(){ 
        jQuery("[name='update_cart']").trigger("click");
    }, timer))
    
});

$('body').on('click', '.continue-shopping', function(){
  $('.vi-wcaio-sidebar-cart-close-wrap').trigger('click')
})


//my account menu
$('.woocommerce-MyAccount-navigation ul').on('click', function() {
  if($(this).hasClass('menu-show')) {
    $(this).removeClass('menu-show')
  } else {
    $(this).addClass('menu-show')
  }
    
})

},(jQuery))