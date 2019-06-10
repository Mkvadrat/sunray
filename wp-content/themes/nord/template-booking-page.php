<?php
/*
Template name: Booking page
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header();
?>

    <main class="main-booking">

        <div class="owl-carousel owl-theme header-slider narrow-header-slider">
            <?php
            global $nggdb;
            $slider_id = getNextGallery('32', 'slider_for_all_pages');
            $slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
            if ($slider_image) {
                foreach ($slider_image as $image) {
                    ?>
                    <div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')">
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
        
        <?php echo get_post_meta(get_the_ID(), 'variable_booking_booking_page', $single = true); ?>
        <div class="bg__other">
        <div class="text-block">
            <?php echo get_post_meta(get_the_ID(), 'title_form_booking_page', $single = true); ?>
        </div>
        <div class="paragraph-button">
            <?php echo get_post_meta(get_the_ID(), 'button_block_booking_page', $single = true); ?>
        </div>

        <div class="text-block">
            <div id="booking-form-online">
                <?php echo get_post_meta(get_the_ID(), 'text_text_booking_page', $single = true); ?>
                
                <?php echo get_post_meta(get_the_ID(), 'code_block_booking_page', $single = true); ?>
            </div>

            <?php echo get_post_meta(get_the_ID(), 'additional_text_booking_page', $single = true); ?>
        </div>
        </div>
    </main>

    <div class="hidden">
        <div class="easy-reservation" id="easy-reservation">
            <div class="modal-form lightform">
                <div class="form__block form__light-book">
                    <?php
                        $forms_b = get_post_meta( get_the_ID(), 'light_booking_form_booking_page', $single = true );
    
                        if($forms_b){
                            echo do_shortcode('[contact-form-7 id=" ' . $forms_b . ' "]'); 
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>