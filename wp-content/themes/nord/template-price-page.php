<?php
/*
Template name: Price page
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
				if($slider_image){
					foreach($slider_image as $image) {
				?>
					<div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>');"></div>
				<?php
					}
				}
			?>
		</div>

        <!-- end top slider -->
		
	   	<div class="booking__top">
			<div class="booking__form">
				<?php
					echo get_post_meta( '32', 'code_block_main_page', $single = true );
				?>
			</div>
		</div>
		
		<div class="text-block title-page"> <h1 class="h1-title-center"><?php the_title(); ?></h1></div>

        <div class="text-block price-block-mobile">
            <?php echo get_post_meta( get_the_ID(), 'text_price_tarif_page', $single = true ); ?>
		</div>
    </main>
	
<?php get_footer(); ?>