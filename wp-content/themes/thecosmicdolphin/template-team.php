<?php
/*
Template Name: Team page
*/
get_header();

?>
<?php 
    $background_image = get_field('background');
?>
<main class="main-team-page tablet-container" style="<?php echo $background_image ? 'background: url('. $background_image .''  : '' ?>">
    <div class="tablet-outer">
        <div class="tablet-inner">
            <?php echo do_action('breadcrumbs') ?>
            <div class="tablet-content">
                <div class="tablet-content__left">
                    <div class="team-list-wrapper animation-active-block">
                        <div class="team-list ">
                            <?php
                                $team_list = get_field('team');
                                foreach($team_list as $team_person) {
                            ?>
                                <div class="team-list__item">
                                    <img src="<?php echo $team_person['image'] ?>" alt="photo_team">
                                    <div class="team-list__item__text">
                                        <span class="team-list__item__text__name"><?php echo $team_person['name'] ?></span>
                                        <span class="team-list__item__text__position p_md"><?php echo $team_person['position'] ?></span>
                                    </div>
                                    
                                    <div class="team-list__item__gradient"></div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                   
                </div>
                <div class="tablet-content__right">
                    <h2 class="tablet-content__right__title"><?php the_field('title') ?></h2>
                    <div class="tablet-content__right__content">
                        <div class="right-content">
                            <?php the_field('subtitle') ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();