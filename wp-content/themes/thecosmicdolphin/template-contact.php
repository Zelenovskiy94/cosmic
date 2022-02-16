<?php
/*
Template Name: Contact us page
*/
get_header();


?>
<main class="main-contact-page tablet-container">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="contact-us-form">
                    <h2>Contact Us</h2>
                    <div class="input-row">
                        <div class="half-input">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name">
                        </div>
                        <div>
                            <label for="email">email</label>
                            <input id="email" type="email" name="email">
                        </div>
                        
                    </div>
                    <div class="input-row">
                        <div class="full-input">
                            <label for="phone">phone</label>
                            <input id="phone" type="text" name="phone">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="full-input">
                            <label for="message">message</label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();