<?php 
global $themedir, $pego_prefix;

	$pego_prefix = "pego_";
	$themedir = get_template_directory_uri();

	
//typography
function paragraph( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => '',
		'align' => ''
	), $atts ) );
	$together='';
	if(($color !='')||($align !='')) { $together = ' style=" '; }
	if($color !='') { $together .= ' color:'.$color.'; ';}
	if($align !='') { $together .= ' text-align:'.$align.'; ';}
	if(($color !='')||($align !='')) { $together .= '" '; }
	return	'<p'.$together.'>' . do_shortcode($content) . '</p>';
  
}
add_shortcode('p', 'paragraph');



function headingH1( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'left' => ''
	), $atts ) );
	return	'<h1><span class="color1">'.$left.'</span>' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h1', 'headingH1');

function headingH2 ( $atts, $content = null ) {
	return	'<h1 class="like_h2">' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h2', 'headingH2');

function headingH3 ( $atts, $content = null ) {
	return	'<h1 class="like_h3">' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h3', 'headingH3');

function headingH4 ( $atts, $content = null ) {
	return	'<h1 class="like_h4">' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h4', 'headingH4');

function headingH5 ( $atts, $content = null ) {
	return	'<h1 class="like_h5">' . do_shortcode($content) . '</h1>';
  
}
add_shortcode('h5', 'headingH5');

/*
function headingH6 ( $atts, $content = null ) {
	return	'<h6>' . do_shortcode($content) . '</h6>';
  
}
add_shortcode('h6', 'headingH6');*/


function strong ( $atts, $content = null ) {
	return	'<strong>' . do_shortcode($content) . '</strong>';
}
add_shortcode('strong', 'strong');

function pre ( $atts, $content = null ) {
	return	'<pre>' . do_shortcode($content) . '</pre><div class="clear"></div>';
  
}
add_shortcode('pre', 'pre');

function li ( $atts, $content = null ) {
	return	'<li>' . do_shortcode($content) . '</li>';
  
}
add_shortcode('li', 'li');

function ul ( $atts, $content = null ) {
	return	'<ul>' . do_shortcode($content) . '</ul>';
  
}
add_shortcode('ul', 'ul');


/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

function tz_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'tz_one_third');

function tz_one_third_last( $atts, $content = null ) {
   return '<div class="one_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_third_last', 'tz_one_third_last');

function tz_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_third', 'tz_two_third');

function tz_two_third_last( $atts, $content = null ) {
   return '<div class="two_third column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('two_third_last', 'tz_two_third_last');

function tz_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'tz_one_half');

function tz_one_half_last( $atts, $content = null ) {
   return '<div class="one_half column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_half_last', 'tz_one_half_last');

function tz_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fourth', 'tz_one_fourth');

function tz_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_fourth_last', 'tz_one_fourth_last');

function tz_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fourth', 'tz_three_fourth');

function tz_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('three_fourth_last', 'tz_three_fourth_last');

function tz_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_fifth', 'tz_one_fifth');

function tz_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_fifth_last', 'tz_one_fifth_last');

function tz_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('two_fifth', 'tz_two_fifth');

function tz_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'tz_two_fifth_last');

function tz_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('three_fifth', 'tz_three_fifth');

function tz_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('three_fifth_last', 'tz_three_fifth_last');

function tz_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}

add_shortcode('four_fifth', 'tz_four_fifth');

function tz_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('four_fifth_last', 'tz_four_fifth_last');

function tz_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_sixth', 'tz_one_sixth');

function tz_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_sixth_last', 'tz_one_sixth_last');

function tz_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}

add_shortcode('five_sixth', 'tz_five_sixth');

function tz_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('five_sixth_last', 'tz_five_sixth_last');
function clear( $atts, $content = null ) {
   return '<div class="clear"></div>';
}
add_shortcode('clear', 'clear');

function youtube_video( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 'auto',
		'height' => 'auto'
	), $atts ) );
	  
	return '<div class="video-wrapper"><div class="video-container"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'"></iframe></div></div>';
}

add_shortcode('youtube', 'youtube_video');

function vimeo_video( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => '560',
		'height' => '315'
	), $atts ) );
	  
	return '<div class="video-wrapper"><div class="video-container"><iframe src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'"></iframe></div></div>';
}

add_shortcode('vimeo', 'vimeo_video');

function highlight( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => ''
	), $atts ) );
	  
	return '<span class="hl '.$color.'"> ' . do_shortcode($content) .' </span>';
}

add_shortcode('hl', 'highlight');	

function dotUnd( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'color' => ''
	), $atts ) );
	  
	return '<span class="dottedUnderline">' . do_shortcode($content) .'</span>';
}
add_shortcode('dotUnd', 'dotUnd');	

function img( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'url' => '',
		'title' => ''
	), $atts ) );  
	$return = '<img class="imgWithBorder"  src="'.$url.'" style="max-width:95%; height:auto;" alt="" />';
	return $return;	
}
add_shortcode('img', 'img');

function url( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'url' => '#',
		'target' => '_self'
	), $atts ) );
	
	
	return '<a  href="'.$url.'" target="'.$target.'">'. do_shortcode($content) . '</a>';                    
}
add_shortcode('a', 'url');



//lists
function listt( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'type' => 'arrow',
		'icon' => ''
	), $atts ) );  
	$listStyle='';
	if($icon != '')
	{
		$listStyle =  'style="list-style-image: url('.$icon.');"';
	}
	
	$return = '<ul class="list list-'.$type.'" '.$listStyle.'>';
	$return .= remove_wpautop($content);
	$return .= '</ul>';		
	
	return $return;	
}
add_shortcode('list', 'listt');

function list_li( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'url' => '#'
	), $atts ) );  
	$return = '<li>';
	$return .= remove_wpautop($content);
	$return .= '</li>';		
	
	return $return;	
}
add_shortcode('list_li', 'list_li');

function list_a( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'url' => '#'
	), $atts ) );  
	$return = '<li><a href="'.$url.'">';
	$return .= remove_wpautop($content);
	$return .= '</a></li>';		
	
	return $return;	
}
add_shortcode('list_a', 'list_a');




function button( $atts, $content = null  ) {
	extract( shortcode_atts( array(
		'url' => '#',
		'color' => 'black',
		'type' => 'small',
		'codecol' => ''
	), $atts ) );
	
	$stil = '';
	if ( !empty($codecol)) {
		$stil = 'style=" background-color:'.$codecol.'; " ';
	}
	
	
	return '<a class="a_button '.$type.' '.$color.'" href="'.$url.'" '.$stil.'><span>'. do_shortcode($content) . '</span></a>';                    
}
add_shortcode('button', 'button');


function team( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'type' => ''
	), $atts ) );  

	$return = '<ul class="images-list">' . do_shortcode($content) .'</ul>';
	return $return;	
}
add_shortcode('team', 'team');

function team_member( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'name' => '',
		'position' => '',
		'img' => ''
	), $atts ) );  
	$return = '<li>';
	$return .= '<img class="imgWithBorder" src="'.$img.'" alt="" />';
	$return .= '<p>'.$name.' <span>'.$position.'</span></p>';
	$return .= '</li>';		
	
	return $return;	
}
add_shortcode('team_member', 'team_member');

function latestportfolio( $atts, $content = null  ) {
		extract( shortcode_atts( array(
		'number' => '5'
	), $atts ) );  
	$return='<div class="portfolio-items around-foliosS isotope">';
	$args = array('post_type'=> 'portfolio', 'posts_per_page' => $number, 'order'=> 'DESC', 'orderby' => 'post_date'  );
									$posts = get_posts($args);
									$idd=0;
											if($posts) {
																																		
													foreach($posts as $postPortf)
													{ 
													
													
														$idd++;
														$currentID=$postPortf->ID;
														$portfolioType = get_post_meta($postPortf->ID, 'portfolio_type_selected' , true); 														
														$portfolioOpeningType = get_post_meta($postPortf->ID, 'portfolio_opening_type' , true); 
														$contentPortf = get_the_content($postPortf->ID);														
														//$termss = get_the_term_list( $post->ID,'portfolio_categories', '', ', ');
														$termsSingle =  get_the_terms( $postPortf->ID, 'portfolio_categories' );
														$terms =  get_the_terms( $postPortf->ID, 'portfolio_categories' );
														$portf_slug = $postPortf->post_name;
														$term_listSingle = '';
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postPortf->ID ), 'single-post-thumbnail' );
														$portf_title=get_the_title($postPortf->ID);
														$currentItem=0;
														$terms_list= '';
														$term_list_for_filter= '';
														if ($portfolioOpeningType == 'Description Page')
														{
														
														$return .= '<div class="folio-item" style="float:left;">';
															$return .= '<div class="columnBox-portfolio">';
																$return .= '<div>';
																	$return .= '<a href="#!/'.$portf_slug.'">';
																		$return .= get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder'));
																		
																		if ($portfolioType == 'Image')
																		{
																	
																			$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-image.png" alt=""></span>';
																	
																		}
																		if ($portfolioType == 'Video')
																		{
																	
																			$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-video.png" alt=""></span>';
																		
																		}
																		if ($portfolioType == 'Slideshow')
																		{
																	
																			$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-slideshow.png" alt=""></span>';
																		
																		}
																		
																	$return .= '</a>';
																	$return .= '<h1 class="folio-title"><a href="#!/'.$portf_slug.'">'.$portf_title.'</a></h1>';
																$return .= '</div>';
															$return .= '</div>';
														$return .= '</div>';
														
													
														}
														else
														{
															if($portfolioType == 'Image') 		
															{										 
															
																$return .= '<div class="folio-item">';
																	$return .= '<div class="columnBox-portfolio">';
																		$return .= '<div>';
																			$return .= '<a class="portfPic" href="'.$image[0].'">';
																				$return .= get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder'));
																				$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-image.png" alt=""></span>';
																			$return .= '</a>';
																		$return .= '<h1 class="folio-title"><a class="portfPic" href="'.$image[0].'">'.$portf_title.'</a></h1>';
																	$return .= '</div>';
																$return .= '</div>';
															$return .= '</div>';
														
															}
															if($portfolioType == 'Video') 		
															{		
															$video_url_gal= get_post_meta($postPortf->ID, 'portfolio_video_url_gal' , true); 																										
																	$return .= '<div class="folio-item">';
																	$return .= '<div class="columnBox-portfolio">';
																		$return .= '<div>';
																			$return .= '<a class="iframe" href="'.$video_url_gal.'">';
																				$return .= get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder'));
																				$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-video.png" alt=""></span>';
																			$return .= '</a>';
																		$return .= '<h1 class="folio-title"><a class="iframe" href="'.$video_url_gal.'">'.$portf_title.'</a></h1>';
																	$return .= '</div>';
																$return .= '</div>';
															$return .= '</div>';
															}
															if($portfolioType == 'Slideshow') 		
															{	
															
																							$attachments = get_children(array('post_parent' => $postPortf->ID,
																							'post_status' => 'inherit',
																							'post_type' => 'attachment',
																							'post_mime_type' => 'image',
																							'order' => 'ASC',
																							'orderby' => 'menu_order ID'));	
																$currentSlide=0;
																$countSlides = count($attachments);		
																
																	$return .= '<div class="folio-item">';
																	$return .= '<div class="columnBox-portfolio">';
																		$return .= '<div>';
																			$return .= '<a class="'.$portf_slug.'" href="javascript:;">';
																				$return .= get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder'));
																				$return .= '<span class="overlay"><img src="'.get_bloginfo('template_url').'/images/icon-slideshow.png" alt=""></span>';
																			$return .= '</a>';
																		$return .= '<h1 class="folio-title"><a class="'.$portf_slug.'" href="javascript:;">'.$portf_title.'</a></h1>';
																	$return .= '</div>';
																$return .= '</div>';
															$return .= '</div>';
														
													
															}
														  }
														  if ($idd % 3) { } else { $return .= '<div class="clear"></div>';}
													}
														
											}
										$return .='</div>';
	
	return $return;	
}
add_shortcode('latestportfolio', 'latestportfolio');

function columnwithicon( $atts, $content = null  ) { 
		extract( shortcode_atts( array(
		'title' => '',
		'icon' => '',
		'url' => '',
		'readmore' => 'Read More &rarr;'
	), $atts ) );  
	
	$return = '<div class="icon">';
	$return .= '<img src="'.$icon.'" alt="">';
	$return .= '</div>';
	$return .= '<div class="title">';
	$return .= '<a href="#"><h2>'.$title.'</h2></a>';
	$return .= '</div>';
	$return .= '<div class="clear"></div>';
	$return .= do_shortcode($content);
	if($url != '') {
		$return .= '<div class="read-arrow">';
		$return .= '<a href="'.$url.'" class="">'.$readmore.'</a>';
		$return .= '</div>';
	}
	return $return;	
}
add_shortcode('columnwithicon', 'columnwithicon');


?>