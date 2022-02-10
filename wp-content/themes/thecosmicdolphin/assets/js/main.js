'use strict'
jQuery(document).ready(function($){
  window.onload = function() {
    if($('.tablet-content').length != 0) {
      $('.tablet-content').addClass('active')
    }
  };
  
    

    $('body').on('click', '.header-btn-menu', function(){
        $(this).toggleClass('active')
        $('.nav-menu-container').toggleClass('active')
        $('.modal_bg').toggleClass('active')
    })
    $(document).mouseup( function(e){ 
      let nav = $( ".nav-menu-container" ); 
      if ( !nav.is(e.target) 
          && nav.has(e.target).length === 0 ) { 
          if(nav.hasClass('active')){
            nav.removeClass('active')
            $('.modal_bg').removeClass('active')
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