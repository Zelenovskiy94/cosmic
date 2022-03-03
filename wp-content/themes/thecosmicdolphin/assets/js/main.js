'use strict'
window.onload = function() {
  if(jQuery('.tablet-content').length != 0) {
    jQuery('.tablet-content').addClass('active')
  }
};
jQuery(document).ready(function($){
    $('body').on('click', '.wpml-ls-current-language>a', function(e) {
      e.preventDefault()
    })
    function setWidthProductSpin () {
      // let wrapperElem = $('.product-image-inner')
      let wrapperElem = $('.tablet-content__left__container .images')
      let height = wrapperElem.height()
      let width = Math.floor(height * 1.76)
      wrapperElem.css('max-width', width + 'px' )
    }
    setWidthProductSpin()
    

    $('body').on('click', '.header-btn-menu', function(){
        $(this).toggleClass('active')
        $('.nav-menu-container, .modal_bg').toggleClass('active')
       
    })
    $(document).mouseup( function(e){ 
      let nav = $( ".nav-menu-container" ); 
      let btn = $( ".header-btn-menu" ); 
      if ( !nav.is(e.target) 
          && nav.has(e.target).length === 0 && !btn.is(e.target) 
          && btn.has(e.target).length === 0 ) { 
          if(nav.hasClass('active')){
            nav.removeClass('active')
            $('.modal_bg, .header-btn-menu').removeClass('active')
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
    

    
});


	$( 'body' ).on('click', '.filter-post__category', function(){
    $('.filter-post__category').removeClass('active')
    $('.loader-filter-container').show()
    const postsContainer = $('.blog-posts-container');
		let filterButtin = $(this);
    filterButtin.addClass('active')
    let value = filterButtin.data('value')
		$.post(myajax.url, { categoryfilter: value, action: "filter_post_category" }, function (respond){
      postsContainer.html(respond)
      $('.loader-filter-container').hide()
    })
		return false;
	});

},(jQuery))