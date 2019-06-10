<?php
/*
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/
?>
<footer>
    <div class="footer__carousel">
        <div class="slick-slider-block">
            <!--<ul class="slick-slider">
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-1.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-2.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-3.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-4.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-1.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-2.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-3.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-4.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-1.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-2.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-3.jpg')"></li>
                <li style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/f-c-4.jpg')"></li>
            </ul>-->
            <?php
                if ( function_exists('dynamic_sidebar') )
                    dynamic_sidebar('instagram-widget');
            ?>
        </div>
        <div class="inst-link-block"><?php echo getMeta('instagram_block_main_page'); ?></div>
    </div>

    <!-- start footer-block -->
    <div class="footer-block">
        <div class="max__wrap">
            <div class="contacts-block-2">
                <?php echo getMeta('wpapper_main_page'); ?>
        </div>
    </div>
    <!-- end footer-block -->
        <div class="hidden">
            <div class="easy-reservation" id="callback-form-header">
                <div class="modal-form callback">
                    <div class="form__block form__callback">
                        <?php
                            $forms_a = getMeta('callback_main_page');
                            if($forms_a){
                                echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>