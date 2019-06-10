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
	<main class="main-price">
		<div class="owl-carousel owl-theme header-slider narrow-header-slider">
			<?php
				global $nggdb;
				$slider_id = getNextGallery('32', 'slider_for_all_pages');
				$slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
				if($slider_image){
					foreach($slider_image as $image) {
				?>
					<div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')">
					</div>
				<?php
					}
				}
			?>
		</div>
		
		<!-- start offers -->

		<?php				   
			$term = get_queried_object();
			$cat_id = $term->term_id;
			$cat_code = get_term_meta($cat_id, 'code_block_category_rooms');
		?>
        <div class="booking__top">
            <div class="booking__form">
				<?php
				   echo $cat_code[0];
				?>
            </div>
        </div>
        <!-- end offers -->

		<div class="bg__other">
            <?php
            $term = get_queried_object();
            $cat_id = $term->term_id;
            $cat_description = get_term_meta($cat_id, 'text_category_rooms');
            echo $cat_description[0];
            ?>

            <?php
            $term = get_queried_object();
            $cat_id = $term->term_id;
            $cat_description = get_term_meta($cat_id, 'text_mobile_category_rooms');
            echo $cat_description[0];
            ?>
            <?php
            $term = get_queried_object();
            $cat_id = $term->term_id;
            $cat_description = get_term_meta($cat_id, 'text_general_category_rooms');
            echo $cat_description[0];
            ?>
        </div>
	</main>
	
<?php get_footer(); ?>
