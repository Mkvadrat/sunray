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

<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo sr_wp_title('','', true, 'right'); ?></title>
    <meta name="keywords" CONTENT="краткое описание страницы">
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_template_directory_uri() ); ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url( get_template_directory_uri() ); ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo esc_url( get_template_directory_uri() ); ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo esc_url( get_template_directory_uri() ); ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	
	<?php wp_head(); ?>

</head>

  <body <?php body_class(); ?>>
  
  <!-- HelloPreload https://hello-site.ru/preloader/
  <style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #8B2938 url(/wp-content/themes/nord/images/oval.svg) center center no-repeat;background-size:41px;}</style>
  <div id="hellopreloader"><div id="hellopreloader_preload"></div><p></p></div>
  <script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
   HelloPreload https://hello-site.ru/preloader/ -->
  
	<div id="page">
        <nav id="menu">
			<?php
				if (has_nav_menu('mobile_menu')){
					wp_nav_menu( array(
						'theme_location'  => 'mobile_menu',
						'menu'            => '',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => '',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul>%3$s</ul>',
						'depth'           => 2,
						'walker'          => new primary_menu(),
					) );
				}
			?>
        </nav>

    <!-- start header -->


    <div id="top"></div>

    <header class="header">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Top address")) : ?><?php endif; ?>
    	<a class="mmenu" href="#menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
    	<a href="#recall" class="call-back-mobile fancybox"><img src="/wp-content/themes/nord/images/icon-phone-mobile.png" alt="">Заказать обратный звонок</a>
        <div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="/wp-content/themes/nord/images/logo.svg" alt="logo"/></a>
        </div>

        <div class="mobile-phone-block">
        	<div><?php echo getMeta('phone_main_page'); ?></div>
        </div>

        <div class="menu">
            
            <div class="left-side">
				<?php
					if (has_nav_menu('primary_menu')){
						wp_nav_menu( array(
							'theme_location'  => 'primary_menu',
							'menu'            => '',
							'container'       => false,
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="first-menu">%3$s</ul>',
							'depth'           => 2,
							'walker'          => new primary_menu(),
						) );
					}
				?>
            </div>
            <div class="right-side">
              <?php
                if (has_nav_menu('second_menu')){
                  wp_nav_menu( array(
                    'theme_location'  => 'second_menu',
                    'menu'            => '',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="first-menu">%3$s</ul>',
                    'depth'           => 2,
                    'walker'          => new primary_menu(),
                  ) );
                }
              ?>
              
              <ul class="first-menu">
                <li class="phon"><?php echo getMeta('phone_main_page'); ?></li>
              </ul>
            </div>
        </div>
    </header>
	
    <!-- end header -->