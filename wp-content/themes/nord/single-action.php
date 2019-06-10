<?php
/*
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header();
?>

<main class="service-in">

    <!-- start top slider -->

    <div class="owl-carousel owl-theme header-slider narrow-header-slider">
        <?php
            global $nggdb;
            $slider_id = getNextGallery('32', 'slider_for_all_pages');
            $slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
            if ($slider_image) {
                foreach ($slider_image as $image) {
        ?>
                    <div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></div>
        <?php
                }
            }
        ?>
    </div>

    <!-- start offers -->
    <?php echo get_post_meta(get_the_ID(), 'code_block_action_page', $single = true); ?>
    <div class="booking__top">
        <div class="booking__form">
            <?php				   
                $term = wp_get_post_terms(get_the_ID(), 'action-list');
                $cat_id = $term[0]->term_id;
                $cat_code = get_term_meta($cat_id, 'code_block_category_action');
                echo $cat_code[0];
            ?>
        </div>
    </div>
    <!-- end offers -->
    <!-- end top slider -->
    <div class="bg__other">
        <div class="text-block title-page">
            <h1 class="h1-title-center"><?php the_title(); ?></h1>
        </div>
            <?php echo get_post_meta(get_the_ID(), 'text_action_page', $single = true); ?>
        <div class="text-block">
            <span class="date">20.05.19</span>
        </div>
    </div>
</main>

<?php get_footer(); ?>
