<?php
/*
Template name: Gallery page
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header(); 
?>
	
	<main class="main-photo-in">

		<div class="owl-carousel owl-theme header-slider narrow-header-slider">
			<?php
				global $nggdb;
				$slider_id = getNextGallery('32', 'slider_for_all_pages');
				$slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
				if($slider_image){
					foreach($slider_image as $image) {
				?>
					<div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>');">
					</div>
				<?php
					}
				}
			?>
		</div>
		
		<div class="booking__top">
			<div class="booking__form">
				<?php
					echo get_post_meta( '32', 'code_block_main_page', $single = true );
				?>
			</div>
		</div>
            
		<div class="text-block title-page">
			<h1 class="h1-title-center"><?php the_title(); ?></h1>
		</div>

		<?php echo get_post_meta( get_the_ID(), 'text_gallery_page', $single = true ); ?>
        <div class="text-block">
			<div class="block-galery">
	
					<ul class="galery-2">
						<?php
							global $nggdb;
							$gallery_id = getNextGallery(get_the_ID(), 'photo_gallery_page');
							$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
							if($gallery_image){
								foreach($gallery_image as $image) {
									if(!$image->exclude == 1){
							?>
								<li><a class="gallery" rel="group" href="<?php echo nextgen_esc_url($image->imageURL); ?>"><img src="<?php echo nextgen_esc_url($image->thumbnailURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>" <?php echo $image->size; ?>></a></li>
							
							<?php
									}
								}
							}
						?>
					</ul>
	
					<p><a class="get-more back" href="javascript:void(0)">Назад</a></p>
			</div>
		</div>
		
    </main>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.back').click(function(){
		parent.history.back();
		return false;
	});
});
</script>
	
<?php get_footer(); ?>