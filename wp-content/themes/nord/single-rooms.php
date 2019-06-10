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
	<main class="main-price-in">
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
			$term = get_the_terms($post->ID, 'rooms-list');
			$cat_id = $term[0]->term_id;
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
		<?php echo get_post_meta( get_the_ID(), 'first_text_block_single_page_rooms', $single = true ) ?>
		<div class="gallery-room">
            <div class="text-block">
                <div class="block-galery">
					<?php echo get_post_meta( get_the_ID(), 'text_gallery_single_page_rooms', $single = true ) ?>
                    <ul class="galery-2">
						<?php
							global $nggdb;
							$gallery_id = getNextGallery(get_the_ID(), 'gallery_single_page_rooms');
							$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
							if($gallery_image){
								foreach($gallery_image as $image) {
							?>
								<li><a class="gallery" rel="group" href="<?php echo nextgen_esc_url($image->imageURL); ?>" style="background-image: url('<?php echo nextgen_esc_url($image->thumbnailURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>')"></a></li>
							<?php
								}
							}
						?>
                    </ul>
                </div>
            </div>
        </div>
		<?php echo get_post_meta( get_the_ID(), 'second_text_block_single_page_rooms', $single = true ) ?>
        </div>
	</main>
	
<?php get_footer(); ?>
