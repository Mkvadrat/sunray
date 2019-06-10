<?php
/*
Template name:Reviews page
Theme Name: Stars
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта Stars
Version: 1.0
*/

get_header(); 
?>
    
	<main class="main-rewiews">
		
        <!-- start top slider -->
		<div class="owl-carousel owl-theme header-slider narrow-header-slider">
			<?php
				global $nggdb;
				$slider_id = getNextGallery('32', 'slider_for_all_pages');
				$slider_image = $nggdb->get_gallery($slider_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
				if($slider_image){
					foreach($slider_image as $image) {
				?>
					<div style="background-image: url('<?php echo nextgen_esc_url($image->imageURL); ?>')"></div>
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
		
		<?php echo get_post_meta( get_the_ID(), 'text_reviews_page', $single = true ); ?>
		
		<div class="footer-form-block reviews-form">
			<?php echo get_post_meta( get_the_ID(), 'title_reviews_page', $single = true ); ?>
			
			<div id="respond"></div>
			<form class="form reviews-form" id="commentform">
				<input type="text" name="author" id="author" placeholder="Ваше имя">
				<input type="email" name="email" id="email" placeholder="Ваш Email">
				<textarea  name="comment" id="comment" placeholder="Ваше сообщение"></textarea>
				<?php echo comment_id_fields(); ?>   
			</form>

			<button class="submit-reviews" onclick="submit();"><span id="submit">Отправить</span></button>
		</div>
		
		<div class="text-block reviews-list">
			<?php echo get_post_meta( get_the_ID(), 'subtitle_reviews_page', $single = true ); ?>
			
			<?php 
			
				define( 'DEFAULT_COMMENTS_PER_PAGE', $GLOBALS['wp_query']->query_vars['comments_per_page']);
			
				$page = (get_query_var('page')) ? get_query_var('page') : 1;
			
				$limit = DEFAULT_COMMENTS_PER_PAGE;
			
				$offset = ($page * $limit) - $limit;
			
				$param = array(
					'status'	=> 'approve',
					'offset'	=> $offset,
					'number'	=> $limit
				);
			
				$total_comments = get_comments(array(
					'orderby' => 'comment_date',
					'order'   => 'ASC',
					'status'  => 'approve',
					'parent'  => 0
			
				));
			
				$pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);
			
				$comments = get_comments( $param );
			
				$args = array(
					'base'         => @add_query_arg('page','%#%'),
					'format'       => '?page=%#%',
					'total'        => $pages,
					'current'      => $page,
					'show_all'     => false,
					'mid_size'     => 4,
					'prev_next'    => true,
					'prev_text'    => __('&laquo; В начало'),
					'next_text'    => __('В конец &raquo;'),
					//'type'         => 'comment'
					'type' => 'array'
				);
				
				if($comments){
				foreach($comments as $comment){
					global $cnum;
			
					// определяем первый номер, если включено разделение на страницы
			
					$per_page = $limit;
			
					if( $per_page && !isset($cnum) ){
						$com_page = $page;
						if($com_page>1)
							$cnum = ($com_page-1)*(int)$per_page;
					}
					// считаем
					$cnum = isset($cnum) ? $cnum+1 : 1;
			?>
            <p><b><?php echo get_comment_author($comment->comment_ID); ?></b><?php echo $comment->comment_content; ?><time><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></time></p>		
			<?php } ?>
			<?php } ?>
			
			<?php //echo paginate_links( $args ); ?>
			<?php $pagination = paginate_links($args);
				
			if($pagination){
			?>
			<ul class="list-pages">
				<?php foreach ($pagination as $pag){ ?>
					<li><?php echo $pag; ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
    </main>
	
	<script language="javascript">
		function submit(){
			$(".reviews-form").submit();
		}
	</script>
 
<?php get_footer(); ?>