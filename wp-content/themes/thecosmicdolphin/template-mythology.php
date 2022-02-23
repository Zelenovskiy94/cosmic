<?php
/*
Template Name: History&Mythology
*/
get_header();

?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-mythology-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content mythology-content">
                <!-- <div class="mythology-content"> -->
                    <div class="mythology-left">
                        <div class="mythology-left__image animation-active-block">
                            <img src="<?php the_field('image') ?>" alt="">
                        </div>
                        
                    </div>
                    <div class="mythology-right animation-active-block">
                        <div class="hide-text">
                            <?php the_field('content') ?>
                        </div>
                        <div class="mythology-text-content ">
                            <div class="swiper-wrapper">

                            </div>
                            <div class="mythology-nav">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</main>

<script>
    jQuery(document).ready(function($){
    let tabletContent = $('.mythology-right').height() - 120 
        let hite_text = $('.hide-text').height()
    var pageCount = $('.hide-text').height()/tabletContent;
    // var pageCount = Math.ceil($('.hide-text').height()/tabletContent);
    var contentLength = $('.hide-text').html().length;
    var perPageLength = Math.floor(contentLength/pageCount);
    // console.log('tabletContent: ', tabletContent)
    // console.log('hite_text: ', hite_text)
    // console.log('pageCount: ', pageCount)
    // console.log('contentLength: ', contentLength)
    // console.log('perPageLength: ', perPageLength)
    var chunks = [];
    for(i=0;i<=pageCount;i++){
        let textContent = $('.hide-text').html().trim().substring(i*perPageLength,i*perPageLength+perPageLength)
        if(textContent) {
            chunks.push('<div class="swiper-slide">'+ textContent +'</div>');
        }
        
    }
    var paged = '' +chunks.join('')+ '';
    $('.mythology-text-content .swiper-wrapper').html(paged);
    console.log(chunks)
        let mythology_slider = new Swiper(".mythology-text-content", {
        spaceBetween: 16,
        slidesPerView: '1',
        pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    },(jQuery))
</script>
<?php
get_footer();