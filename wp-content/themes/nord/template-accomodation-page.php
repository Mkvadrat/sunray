<?php
/*
Template name: Accomodation page
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header(); 
?>
    <main class="main-accomodation">

		<div class="owl-carousel owl-theme header-slider narrow-header-slider">
			<?php
				global $nggdb;
				$slider_id = getNextGallery('32', 'slider_for_all_pages');
				$slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
				if($slider_image){
					foreach($slider_image as $image) {
				?>
					<div>
						<img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>">
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

		<?php echo get_post_meta( get_the_ID(), 'text_accomodation_page', $single = true ); ?>

		<!-- start reviews-block -->
	
		<div class="reviews-block">
	
			<p class="white-title">Отзывы гостей отеля</p>
	
			<ul class="reviews-list">
				<?php
					$args = array(
						'status' => 'approve',
						'number' => '4',
						'post_id' => 363,
					);
				
					$comments = get_comments( $args );
				
					if(!empty($comments)){
					  foreach ($comments as $comment) {
				?>
				<li>
					<p class="white-paragraph"><strong><?php echo $comment->comment_author; ?></strong>
					<?php echo mb_substr( strip_tags( $comment->comment_content ), 0, 152 ); ?>
					<strong><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></strong></p>
				</li>
					<?php } ?>
				<?php } ?>
			</ul>
			
			<div class="owl-carousel owl-theme owl-carousel-half reviews-slider">
				<?php
					if(!empty($comments)){
					  foreach ($comments as $comment) {
				?>
                <div>
                    <p class="white-paragraph"><strong><?php echo $comment->comment_author; ?></strong><?php echo mb_substr( strip_tags( $comment->comment_content ), 0, 152 ); ?></strong></p>
                </div>
					<?php } ?>
				<?php } ?>
            </div>
			
			<p class="paragraph-button"><a class="get-more ancLinks" href="<?php echo get_permalink( 363 ); ?>">Читать все отзывы</a></p>
		</div>
	
		<!-- end reviews-block -->

    </main>
	
	
	
<?php get_footer(); ?>