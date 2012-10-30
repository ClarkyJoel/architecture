<?php

	/* for translating */
	load_theme_textdomain( 'pego_tr', get_template_directory() . '/languages' );
	include'functions/class.php';

	/* remove all p tags thats creates by themselfs */
	//remove_filter('the_excerpt', 'wpautop');
	remove_filter('the_content', 'wpautop');
	//remove_filter('comment_text', 'wpautop');
	

	$pego_prefix="pego_";
	$themedir = get_template_directory_uri();
	

	function my_javascripts() {
		/*wp_enqueue_script('jquery-color', get_template_directory_uri() . '/js/jquery.color.js','','',true);	*/
		wp_enqueue_script('jquery-backgroundpos', get_template_directory_uri() . '/js/jquery.backgroundpos.js','','',true);
		wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.js','','',true);
		wp_enqueue_script('slides-min-jquery', get_template_directory_uri() . '/js/slides.min.jquery.js','','',true);
		wp_enqueue_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js','','',true);
		wp_enqueue_script('jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js','','',true);
		wp_enqueue_script('jquery-ui-1.8.11', get_template_directory_uri() . '/js/jquery-ui-1.8.11.custom.min.js','','',true);
		wp_enqueue_script('cScroll', get_template_directory_uri() . '/js/cScroll.js','','',true);
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js','','',true);
		wp_enqueue_script('switcher', get_template_directory_uri() . '/js/switcher.js','','',true);
		wp_enqueue_script('bgStretch', get_template_directory_uri() . '/js/bgStretch.js','','',true);
		
		wp_enqueue_script('sImg', get_template_directory_uri() . '/js/sImg.js','','',true);
		wp_enqueue_script('jquery-mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js','','',true);
		/*wp_enqueue_script('MathUtils', get_template_directory_uri() . '/js/MathUtils.js','','',true);*/
		wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js','','',true);
		wp_enqueue_script('jquery-isotope-min', get_template_directory_uri() . '/js/jquery.isotope.min.js','','',true);
	}
	add_action('wp_enqueue_scripts', 'my_javascripts');
	
	
	function theme_styles()  
	{ 
	  wp_enqueue_style( 'google-font-style', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', array(), '1.0', 'all' );
	  wp_enqueue_style( 'reset-style', get_template_directory_uri() . '/css/reset.css', array(), '1.0', 'all' );
	  wp_enqueue_style( 'jquery-style', get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css', array(), '1.0', 'all' );
	  wp_enqueue_style( 'layout-style', get_template_directory_uri() . '/css/layout.css', array(), '1.0', 'all' );
	/*
	 wp_enqueue_style( 'css-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
     
	if (get_option($pego_prefix.'responsive_theme') != 'false') {
		 wp_enqueue_style( 'media-style', get_template_directory_uri() . '/css/media.css', array(), '1.0', 'all' );
	  }	
	*/
	  
	}
	add_action('wp_enqueue_scripts', 'theme_styles');
	
	
	
	/* start menu */
	function pego_addmenu() {
		register_nav_menus(
			array(
				'main_nav' => 'The Main Menu',
			)
		);
	}

	add_action( 'init', 'pego_addmenu' );

	function pego_nav() {
		if ( function_exists( 'wp_nav_menu' ) )
			wp_nav_menu( 'menu=main_nav&menu_id=menu&fallback_cb=pego_nav_fallback' );
		else
			pego_nav_fallback();
	}

	function pego_nav_fallback() {
		echo '<nav class="menu">';
				echo	'<ul id="menu">';
				
						$page_argss = array('parent' => 0,'sort_order' => 'ASC', 'sort_column' => 'menu_order');
						$pagess = get_pages($page_argss); 
						$numberOfPages=0;

						foreach ($pagess as $single_pagee) {
							$pageIdd=$single_pagee->ID;
							$show_page_in_menuu =  get_post_meta($pageIdd , 'show_page_in_menu' , true);
							if($show_page_in_menuu != 'No') {
									$numberOfPages++;
							}
						}
	
					$page_args = array('parent' => 0,'sort_order' => 'ASC', 'sort_column' => 'menu_order');
					$pages = get_pages($page_args); 
					foreach ($pages as $single_page) {
							$trenutni="";
							$pageId=$single_page->ID;
							$children = get_pages('child_of='.$pageId.'&sort_column=menu_order&parent='.$pageId);
							
							$external_link =  get_post_meta($pageId , 'external_link' , true);
							$page_template =  get_post_meta($pageId , 'page_template' , true);
							$show_page_in_menu =  get_post_meta($pageId , 'show_page_in_menu' , true);
						
							$trenutni='';
							global $blogReturn;
							if($page_template=='Blog') {$blogReturn= get_option("siteurl")."#!/".$single_page->post_name;}
							if(($page_template=='Blog')&&(is_single())){ $trenutni="class='markBlogAsActive'"; }	 
							$url_tab='#!/';
							if (!is_front_page()){
							 $url_tab = get_option("siteurl")."#!/";
						   }
						   if($show_page_in_menu != 'No')
						   {
											
								if(count($children) == 0){  
									if ($external_link == '') {
										if ($page_template == 'Home') {
												echo '<li><a href="'.$url_tab.'">' . $single_page->post_title . '</a></li>';
										}
										else {
										
											echo '<li '.$trenutni.' ><a href="'.$url_tab.''.$single_page->post_name .'">' . $single_page->post_title . '</a></li>';
									 } 
									}
									else
									if ($external_link == '#') {
										echo '<li><a href="'.$url_tab.'#">' . $single_page->post_title . '</a></li>';
									}
									else
									{
										echo '<li><a href="'.$external_link.'">' . $single_page->post_title . '</a></li>';
									}
								}
								if(count($children) != 0){  
									if ($external_link == '') {
										if ($page_template == 'Home') {
											echo '<li  class="with_ul"><a href="'.$linkForHome.'">' . $single_page->post_title . '</a>';
										}
										else {
											echo '<li  class="with_ul"><a href="'.$url_tab.''.$single_page->post_name .'">' . $single_page->post_title . '</a>';
										}
											
									}
									else 
									if ($external_link == '#') {
										echo '<li  class="with_ul"><a href="'.$url_tab.'#">' . $single_page->post_title . '</a>';
									}
									else {
										echo '<li  class="with_ul"><a href="'.$external_link.'">' . $single_page->post_title . '</a>';
									}
									echo '<ul class="submenu">';
									foreach($children as $child)
									{
										$subPageId=$child->ID;
										$grandChildren = get_pages('child_of='.$subPageId.'&sort_column=menu_order&parent='.$subPageId);
										$subPage_external_link =  get_post_meta($subPageId , 'external_link' , true);
										
											if ($subPage_external_link == '') {
												echo  '<li><a href="'.$url_tab.''.$child->post_name.'">'.$child->post_title.'</a></li>';
											}
											else
											{
												echo  '<li><a href="'.$subPage_external_link.'">'.$child->post_title.'</a></li>';
											}
										
									
							
									}
									echo '</ul>';
									echo '</li>';
								
								}
							}
						 
					}
				

				echo 	'</ul>';
				echo '</nav>';
	}
	/* end menu */
	
	
	
	
	add_theme_support( 'automatic-feed-links' );

	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size('PortfImg', 179, 125, true);
		add_image_size('HomeSliderImg', 660, 330, true);
		add_image_size('BlogImg', 291, 150, true);
	}



	
	
	
	
	/* specify content width */
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	
	function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count;
	}
	function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	
	function remove_wpautop($content) { 
			$content = do_shortcode( shortcode_unautop($content) ); 
			$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		return $content;
	}


	
	

function remove_empty_tags($html)
{
$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";
return preg_replace($pattern, '', $html);
}

function remove_images($posttext, $echo = true)
{
    $posttext1 = $posttext;
     
    // We will search for the src="" in the post content
    $regular_expression = '~src="[^"]*"~';
    $regular_expression1 = '~<img [^\>]*\ />~';
     
    // WE will grab all the images from the post in an array $allpics using preg_match_all
    preg_match_all( $regular_expression, $posttext, $allpics );
     
    // This time we replace/remove the images from the content
    
    $only_post_text = preg_replace( $regular_expression1, '' , $posttext1);
    $only_post_text = remove_empty_tags($only_post_text);
    
    if ($echo) echo $only_post_text; else return $only_post_text;
}





/* start for comments */
if ( ! function_exists( 'adorable_comment' ) ) :
function adorable_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php 'Pingback:' ?> <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 39;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf(  '%1$s <span class="date-and-time">%2$s</span>',
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf(  '%1$s at %2$s', get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'pego_tr' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'pego_tr' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'pego_tr' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for adorable_comment()
	
/* end for comments */






function no_wpautop($content) 
{ 
        $content = do_shortcode( shortcode_unautop($content) ); 
        $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
        return $content;
}

function page_have_children($id){
	$children = get_pages('child_of='.$id);
	if(count($children) == 0){
		return false;
	}
	else{
		return true;
	}
}


	include("functions/custom-page.php");
	include("functions/custom-portfolio.php");
	include("functions/custom-post.php");
	include("functions/custom-slider.php");
	include("functions/shortcodes.php");

	
	
	define('PEGO_FILEPATH', get_template_directory());
	define('PEGO_DIRECTORY', get_template_directory_uri());

	require_once (PEGO_FILEPATH . '/admin/admin-functions.php');
	require_once (PEGO_FILEPATH . '/admin/admin-interface.php');
	require_once (PEGO_FILEPATH . '/functions/theme-options.php');
	require_once (PEGO_FILEPATH . '/tinymce/tinymce.loader.php');
	
	
	
	



?>