<?php
/*
Template name: Main page
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header();
?>

    <main class="main-index">

        <div class="block-header-slider">
            <div class="owl-carousel header-slider">
                <?php
                global $nggdb;
                $slider_id = getNextGallery(get_the_ID(), 'slider_main_page');
                $slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                if ($slider_image) {
                    foreach ($slider_image as $image) {
                        ?>
                        <div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>');">
                            <div class="title-slider-box"><?php echo html_entity_decode($image->description); ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- end top slider -->

            <!-- start booking -->
            <!-- start order-line -->
            
            <div class="booking__top">
                <div class="booking__form">
                    <?php echo get_post_meta(get_the_ID(), 'code_block_main_page', $single = true); ?>
                </div>
            </div>
            <!-- end order-line -->
            <!-- end booking -->

            <!-- start offers -->
            <?php $actions = getRelatedMeta(get_the_ID(), 'related_actions_main_page'); ?>
            <?php if($actions){ ?>
            <div class="offers">
                <div class="max__wrap">
                    <ul class="slick-slider-top">
                        <?php $i = 0; ?>
                        <?php foreach($actions as $action){ ?>
                        <?php $i++; ?>
                        <?php if($i >3) break; ?>
                        <?php
                            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($action->ID), 'full');
                        ?>
                        <li>
                            <a href="<?php echo get_permalink($action->ID); ?>">
                                <div class="offers__title"><?php echo $action->post_title; ?></div>
                                <div class="offers__img" style="background-image: url('<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/no_image.jpg' ?>')"></div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- end offers -->

        <div class="bg__main">
            <!-- start our-rooms -->

            <?php
            $args = array(
                'numberposts' => -1,
                'post_type' => 'rooms',
                'orderby' => 'date',
                'order' => 'ASC',
            );

            $rooms_list = get_posts($args);

            if ($rooms_list) {
                ?>
                <div class="our-rooms">
                    <div class="max__wrap m-w-510">

                        <div class="title text-center"><?php echo get_post_meta(get_the_ID(), 'title_rooms_main_page', $single = true); ?></div>

                        <div class="sub-title"><?php echo get_post_meta(get_the_ID(), 'text_rooms_main_page', $single = true); ?></div>
                        
                        <ul>
                            <?php
                            foreach ($rooms_list as $list) {
                                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($list->ID), 'full');
                                $qnt_rooms = get_post_meta($list->ID, 'quantity_single_page_rooms', $single = true);
                                ?>
                                <li>

                                    <?php if (!empty($image_url)) { ?>

                                        <a href="<?php echo get_permalink($list->ID) ?>"
                                           style="background-image: url('<?php echo $image_url[0]; ?>')">
                                            <figcaption>
                                                <p><strong><?php echo $list->post_title; ?></strong>
                                                    <?php if ($qnt_rooms == '1'){ ?>
                                                    <b><?php echo $qnt_rooms; ?>-о местный</b></p>
                                                <?php } else { ?>
                                                    <b><?php echo $qnt_rooms; ?>-х местный</b></p>
                                                <?php } ?>
                                            </figcaption>
                                        </a>

                                    <?php } else { ?>

                                        <a href="<?php echo get_permalink($list->ID) ?>"
                                           style="background: url('<?php echo esc_url(get_template_directory_uri()); ?>/images/room-3.png')">
                                            <figcaption>
                                                <p><strong><?php echo $list->post_title; ?></strong>
                                                    <?php if ($qnt_rooms == '1'){ ?>
                                                    <b><?php echo $qnt_rooms; ?>-но местный</b></p>
                                                <?php } else { ?>
                                                    <b><?php echo $qnt_rooms; ?>-х местный</b></p>
                                                <?php } ?>
                                            </figcaption>
                                        </a>

                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                    <!-- end our-rooms -->
                </div>
            <?php } ?>


            <div class="video__block">
                <div class="max__wrap m-w-900 text-left">
                    <div class="title text-center"><?php echo get_post_meta(get_the_ID(), 'title_welcome_main_page', $single = true); ?></div>
                    <div class="sub-title"><?php echo get_post_meta(get_the_ID(), 'text_a_welcome_main_page', $single = true); ?></div>
                    
                    <?php $image_welcome = get_field('image_welcome_main_page'); ?>
                    
                    <img src="<?php echo $image_welcome['url']; ?>" alt=""/>
                    
                    <div class="bg__div"><?php echo get_post_meta(get_the_ID(), 'text_b_welcome_main_page', $single = true); ?></div>
                </div>
            </div>

            <!-- start half-blocks -->

            <div class="block-for-half">
                <div class="left-side">
                    <div class="owl-carousel owl-theme owl-carousel-half">
                        <?php
                            global $nggdb;
                            $slider_id = getNextGallery(get_the_ID(), 'gallery_around_main_page');
                            $slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                            if ($slider_image) {
                                foreach ($slider_image as $image) {
                                    ?>
                                    <div><img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt=""></div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="right-side side-description">
                    <div class="description-half">
                        <?php echo get_post_meta(get_the_ID(), 'text_around_main_page', $single = true); ?>
                    </div>
                </div>
            </div>

            <div class="block-for-half">
                <div class="left-side side-description">
                    <div class="description-half">
                        <?php echo get_post_meta(get_the_ID(), 'text_massandra_main_page', $single = true); ?>
                </div>
                <div class="right-side">
                    <div class="owl-carousel owl-theme owl-carousel-half">
                            <?php
                                global $nggdb;
                                $slider_id = getNextGallery(get_the_ID(), 'gallery_massandra_main_page');
                                $slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                                if ($slider_image) {
                                    foreach ($slider_image as $image) {
                                        ?>
                                        <div><img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt=""></div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end half-blocks -->

            <div class="home__galery-ch">
                <div class="max__wrap">
                    <!-- start galery-title -->
                    <div class="title text-center"><?php echo get_post_meta(get_the_ID(), 'title_last_images_main_page', $single = true); ?></div>
                    <div class="sub-title"><?php echo get_post_meta(get_the_ID(), 'text_last_images_main_page', $single = true); ?></div>
                    <!-- end galery-title -->
                    <!-- start galery -->
                    <?php echo do_shortcode(get_post_meta(get_the_ID(), 'last_images_main_page', $single = true)); ?>
                    <!-- end galery -->
                    <!-- start see-all-photos-block -->
                    <div class="see-all-photos-block">
                        <a class="get-more ancLinks btn-transparent" href="<?php echo get_page_link(142); ?>">Больше фотографий</a>
                    </div>
                    <!-- end see-all-photos-block -->
                </div>
            </div>
        </div>


        <!-- start reviews-block -->

        <div class="reviews-block">

            <div class="title"><?php echo get_post_meta(get_the_ID(), 'title_reviews_main_page', $single = true); ?></div>

            <ul class="reviews-list owl-carousel">
                <?php
                $args = array(
                    'status' => 'approve',
                    'number' => '4',
                    'post_id' => 363,
                );

                $comments = get_comments($args);

                if (!empty($comments)) {
                    foreach ($comments as $comment) {
                        ?>
                        <li>
                            <p class="white-paragraph"><strong><?php echo $comment->comment_author; ?></strong>
                                <?php echo mb_substr(strip_tags($comment->comment_content), 0, 152); ?>
                                <strong><?php comment_date('d.m.y', $comment->comment_ID); ?></strong></p>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>

            <!--<div class="owl-carousel owl-theme owl-carousel-half reviews-slider">
                <?php
            if (!empty($comments)) {
                foreach ($comments as $comment) {
                    ?>
                        <div>
                            <p class="white-paragraph">
                                <strong><?php echo $comment->comment_author; ?></strong><?php echo mb_substr(strip_tags($comment->comment_content), 0, 152); ?></strong>
                            </p>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>-->

            <p><a class="get-more ancLinks btn-transparent" href="<?php echo get_permalink(363); ?>">Все отзывы</a></p>

        </div>
        <div class="cont__block"><?php echo get_post_meta(get_the_ID(), 'contacts_main_page', $single = true) ?></div>
        <!-- end reviews-block -->
        
    </main>
<?php get_footer(); ?>