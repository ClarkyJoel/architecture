<?php get_header(); ?>
            <div id="contentHolder">            
                <ul> 
					    <li id="page_splash" class="no_disp"></li>

<?php
$args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1'
  );
$main_query = new WP_Query($args); 
$page_number=0;
$portfolio_page='';
$numberOfPortfWithFilter=0;

global $portf_count;
$portf_count=0;


$homeContent='';
$homeTitle='';



/*if( have_posts() ) : */
    while ($main_query->have_posts()) : $main_query->the_post();
    


    global $post;
	
	global $portf_count;
	$portf_count=0;

    $post_name = $post->post_name;
    
    $title = $post->post_title;
    
    $post_id = get_the_ID();
    
    $content = get_the_content();
    
    $pageTemplate=  get_post_meta($post_id , 'page_template' , true);
    $pageTitle=  get_post_meta($post_id , 'page_title' , true);
	if ($pageTitle != '')
    {
		$titles = explode("::", $pageTitle);
	}
	


	
	
	
	
   if ($pageTemplate == 'Home')
   {
		$homeContent=$content;
	
									if ($pageTitle != '') {
										$homeTitle = '<h1><span class="color1">'. $titles[0].'</span>'.$titles[1].'</h1>';
									 }
									 else
									 {
									
									 $homeTitle = ' <h1><span class="color1">'.$title.'</span></h1>';
									  
									
									 }
							
	}
	else
    if ($pageTemplate == 'Contact')
   {

	?>
	
	 <li id="<?php echo $post_name; ?>">
                         <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
									<?php
									if ($pageTitle != '') {
									?>
										<h1><span class="color1"><?php echo $titles[0]; ?></span><?php echo ' '.$titles[1]; ?></h1>
									 <?php
									 }
									 else
									 {
									 ?>
									   <h1><span class="color1"><?php echo $title; ?></span></h1>
									 <?php
									 }
									 ?>
							   <div class="scroll v2">
								<div id="map">
									<div id="map_canvas" style="width:100%; height:202px; margin-bottom:30px;"></div>
								</div>
								<div class="contact-address">
									<?php the_content(); ?>	
								</div>
								<?php include("scripts/contact-form.php"); ?>
								<div class="contact-form">
								
			<h1 class="like_h4"><?php echo get_option($pego_prefix.'contact_form_title'); ?></h1>
			
			<?php if(isset($emailSent) && $emailSent == true) { ?>
                <p class="info">Your email was sent. Huzzah!</p>
            <?php } else { ?>
					<?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class="alert"><?php echo $send_unsuccess; ?></p>
                    <?php } ?>
			<?php } ?>
			
					<?php
					$nameError = '';
					$emailError = '';
					$commentError = '';
					?>
					<?php
					$messageSuccess='<p class="tick"><img src="http://trendis.si/wp-themes/adorable/wp-content/uploads/2012/08/logo-light.png" /><br />Thank you!<br />Your email has been delivered. We will contact you ASAP. </p>';
					if (get_option($pego_prefix.'success_send') != '') {
						$messageSuccess = get_option($pego_prefix.'success_send');
					} ?>
					<div class="testSlide"><?php echo $messageSuccess; ?></div>
					<form id="contact-form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">						
						<div class="fl" style="margin-right: 30px; margin-bottom:20px;">
						
						
							<!--<label for="contactName">Name<span class="required">*</span></label><br />-->
							<input type="text" onblur="if(value=='') value = '<?php echo get_option($pego_prefix.'field_one_prevalue'); ?>'" onfocus="this.value=''"  name="contactName" id="contactName" value="<?php echo get_option($pego_prefix.'field_one_prevalue'); ?> <?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField"  />
							<?php if($nameError != '') { ?>
								<br /><p class="error"><?php echo $nameError;?></p> 
							<?php } ?>
						</div>
						
						
                        <div class="fl" style="margin-bottom:20px;">
							<!--<label for="email">Email<span class="required">*</span></label><br />-->
							<input type="text" onblur="if(value=='') value = '<?php echo get_option($pego_prefix.'field_two_prevalue'); ?>'" onfocus="this.value=''" name="email" id="email" value="<?php echo get_option($pego_prefix.'field_two_prevalue'); ?> <?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" />
							<?php if($emailError != '') { ?>
								<br /><p class="error"><?php echo $emailError;?></p>
							<?php } ?>
						</div>
						
						<div class="fl">
							<!--<label for="commentsText">Message<span class="required">*</span></label><br />-->
							<textarea name="comments" id="commentsText" class="txtarea requiredField" onblur="if(value=='') value = '<?php echo get_option($pego_prefix.'textarea_prevalue'); ?>'" onfocus="this.value=''"><?php echo get_option($pego_prefix.'textarea_prevalue'); ?><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								<?php if($commentError != '') { ?>
									<br /><p class="error"><?php echo $commentError;?></p> 
								<?php } ?>
						</div>
						
						<input type="submit" value="<?php echo get_option($pego_prefix.'send_button'); ?>" id="submit-button" name="submit"  />
						<input type="hidden" name="submitted" id="submitted" value="true" />  
					</form>							
				</div>
				<?php 
				$messageAfterSend='poslano';
				
				?>
				<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	<!--//--><![CDATA[//><!--
	jQuery(document).ready(function($) {
		jQuery('form#contact-form1').submit(function() {
			jQuery('form#contact-form1 .error').remove();
			var hasError = false;
			jQuery('.requiredField').each(function() {
				if(jQuery.trim(jQuery(this).val()) == '') {
					var labelText = jQuery(this).prev('label').text();
					jQuery(this).parent().append('<p class="error"><?php echo get_option($pego_prefix.'required_message'); ?></p>');
					jQuery(this).addClass('inputError');
					hasError = true;
				} else if(jQuery(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
						var labelText = jQuery(this).prev('label').text();
						jQuery(this).parent().append('<p class="error"><?php echo get_option($pego_prefix.'valid_field_two'); ?></p>');
						jQuery(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = jQuery(this).serialize();
				jQuery.post(jQuery(this).attr('action'),formInput, function(data){
					jQuery('form#contact-form1').slideUp("slow", function() {				   
						jQuery('.testSlide').slideDown(2000);
					});
				});
			}
			
			return false;	
		});
	});
	//-->!]]>
	//-->!]]>
</script>			
								 </div>
                                  <div class="scrollBtns">
                                        <a href="#" class="scrollDown"></a>
                                        <a href="#" class="scrollUp"></a>
                                    </div>
								
								
								
                                </div>    
                            </div>    
                        </div>    
                    </li>
	<?php
	}
	else
    if ($pageTemplate == 'Portfolio')
   {
   
   $portf_count++;
	global $portf_cat, $one_cat_only;
	$portf_cat = get_post_meta($post->ID, 'include_category' , true);
	$show_filter = get_post_meta($post->ID, 'show_filter' , true);
	if($show_filter == 'Yes') {
		$numberOfPortfWithFilter++;
	}
	if($numberOfPortfWithFilter > 1) {
		if($numberOfPortfWithFilter == 2) {
			$portfolio_page=1;
		}
		else{
			$portfolio_page++;
		}
		
	
	}
	$one_cat_only = false;
	if($portf_cat != '') {
		$one_cat_only = true;
	}
	?>
	<script type="text/javascript">
jQuery(window).load(function($) {

	  	var container<?php echo $portfolio_page; ?> = jQuery('.around-folios<?php echo $portfolio_page; ?>');

	// initialize isotope

	      container<?php echo $portfolio_page; ?>.isotope({
        itemSelector : '.folio-item'
      });
	
	 var optionSets<?php echo $portfolio_page; ?> = jQuery('.option-set<?php echo $portfolio_page; ?>'),
          optionLinks<?php echo $portfolio_page; ?> = optionSets<?php echo $portfolio_page; ?>.find('a');

      optionLinks<?php echo $portfolio_page; ?>.click(function(){
        var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var optionSet = $this.parents('.option-set<?php echo $portfolio_page; ?>');
        optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          container<?php echo $portfolio_page; ?>.isotope( options );
        }
        
        return false;
      });
	  

});
</script>
     <li id="<?php echo $post_name; ?>">
                        <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
                                    <div>
                                       <?php
											if ($pageTitle != '') {
										?>
											<h1><span class="color1"><?php echo $titles[0]; ?></span><?php echo ' '.$titles[1]; ?></h1>
										 <?php
										 }
										 else
										 {
										 ?>
										   <h1><span class="color1"><?php echo $title; ?></span></h1>
										 <?php
										 }
										 ?>
										
										<!-- filter -->
										<?php
										if($show_filter == 'Yes') {
										?>
										<div class="filters option-set<?php echo $portfolio_page; ?>" data-option-key="filter">
										<?php
											echo '<div class="filter-cat left"><a href="#filter" data-option-value="*" class="selected">All</a></div>';
											$terms = get_terms("portfolio_categories");
											$count = count($terms);
											if ( $count > 0 ){ 
											
												if ($one_cat_only == true){
																$allCat = explode("::", $portf_cat);
																		foreach($allCat as $singleCat)
																		{
																				 $term22 = get_term_by('slug', $singleCat, 'portfolio_categories');
																					
																				 
																				//echo '<li style="vertical-align: middle; text-align: center;">/</li><li><a href="#" data-name="'.$singleCat.'" class="'.$singleCat.'"><span></span>'.$singleCat.'</a></li>';
																				echo '<div class="filter-cat left">/</div>
																					  <div class="filter-cat left"><a href="#filter" data-option-value=".'.$singleCat.'">'.$term22->name.'</a></div>';
																		}
																
												}
												
												else
												{
																		foreach ( $terms as $term ) {
																			echo '<div class="filter-cat left">/</div>
																			<div class="filter-cat left"><a href="#filter" data-option-value=".'.$term->slug.'">'.$term->name.'</a></div>';
																		}
												}
											}
										?>	
										</div>
										<?php
										} //end if show filter 
										?>
									
										<div class="clear"></div>
										<div class="scroll v2">
									<!-- portf items -->
									<?php
									$argsPortf = array('post_type'=> 'portfolio', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
									$postsPortf = get_posts($argsPortf);
									$idd=0;
											if($postsPortf) {
											?>
											
												<div class="portfolio-items around-folios<?php echo $portfolio_page; ?> isotope" >
											<?php
											//$portfolio_opening_type=get_option($pego_prefix.'portfolio_type');									
													
													foreach($postsPortf as $postPortf)
													{ 
														setup_postdata($postPortf); 	
														
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
														if( is_array($termsSingle) ) {														
														$numberOfCat = count($termsSingle);
																foreach( $termsSingle as $termSingle ) {
																	$currentItem++;
																	if ($currentItem == $numberOfCat) {
																	    $terms_list .= $termSingle->name; 	
																		$term_list_for_filter .= $termSingle->slug;
																	}
																	else
																	{
																		$terms_list .= $termSingle->name.', ';
																		$term_list_for_filter .= $termSingle->slug.' ';
																	}
																}
														}
														$ustreza=false;
															if( is_array($terms) ) {
																	foreach( $terms as $term ) {

																	//checking categories
																		$allCat = explode("::", $portf_cat);
																		foreach($allCat as $singleCat)
																		{
																		
																		
																		
																			if ( $singleCat == $term->slug) 
																			{

																				$ustreza=true;
																				break;
																			}
																		}
																		/*
																		if ( $portf_cat == $term->slug) 
																		{									                        	 
																				$ustreza=true;									                        	 
																		}
																		*/
																	}
															}
																								
														if($one_cat_only  == false ) {
																$ustreza=true;	
														}
														
														if($ustreza == true) {
														$idd++;
														if ($portfolioOpeningType == 'Description Page')
														{
														?>
														<div class="folio-item <?php echo $term_list_for_filter; ?>" style="float:left;">
															<div class="columnBox-portfolio">
																<div>
																	<a href="#!/<?php echo $portf_slug; ?>">
																		<?php echo get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder')); ?>
																		<?php
																		if ($portfolioType == 'Image')
																		{
																		?>
																			<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-image.png" alt=""></span>
																		<?php
																		}
																		if ($portfolioType == 'Video')
																		{
																		?>
																			<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-video.png" alt=""></span>
																		<?php
																		}
																		if ($portfolioType == 'Slideshow')
																		{
																		?>
																			<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-slideshow.png" alt=""></span>
																		<?php
																		}
																		?>
																	</a>
																	<h1 class="folio-title"><a href="#!/<?php echo $portf_slug; ?>"><?php echo $portf_title; ?></a></h1>
																</div>
															</div>
														</div>
														
														<?php
														}
														//if ($portfolioOpeningType == 'PopUp')
														else
														{
														?>
															<?php
															if($portfolioType == 'Image') 		
															{										 
															?>
																<div class="folio-item <?php echo $term_list_for_filter; ?>">
																	<div class="columnBox-portfolio">
																		<div>
																			<a class="portfPic" href="<?php echo $image[0]; ?>">
																				<?php echo get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder')); ?>
																				<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-image.png" alt=""></span>
																			</a>
																		<h1 class="folio-title"><a class="portfPic" href="<?php echo $image[0]; ?>"><?php echo $portf_title; ?></a></h1>
															
																	</div>
																</div>
															</div>
															<?php
															}
															if($portfolioType == 'Video') 		
															{		
															$video_url_gal= get_post_meta($postPortf->ID, 'portfolio_video_url_gal' , true); 
															?>
																<div class="folio-item <?php echo $term_list_for_filter; ?>">
																	<div class="columnBox-portfolio">
																		<div>
																		<a class="iframe" href="<?php echo $video_url_gal; ?>">
																			<?php echo get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder')); ?>
																				<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-video.png" alt=""></span>
																			</a>
																		<h1 class="folio-title"><a class="iframe" href="<?php echo $video_url_gal; ?>"><?php echo $portf_title; ?></a></h1>
																	</div>
																</div>
															</div>
																<?php
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
															?>
																<div class="folio-item <?php echo $term_list_for_filter; ?>">
																	<div class="columnBox-portfolio">
																		<div>
																			<a class="<?php echo $portf_slug; ?>" href="javascript:;">
																					<?php echo get_the_post_thumbnail($postPortf->ID,'PortfImg', array('alt' => '', 'class' => 'imgWithBorder')); ?>
																				<span class="overlay"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-slideshow.png" alt=""></span>
																			</a>
																		<h1 class="folio-title"><a class="<?php echo $portf_slug; ?>" href="javascript:;"><?php echo $portf_title; ?></a></h1>
																	</div>
																</div>
																</div>
																  <script type="text/javascript">
																jQuery(document).ready(function($) {
																	jQuery(".<?php echo $portf_slug; ?>").click(function() {
																		$.fancybox([
																		<?php
																		foreach($attachments as $att_id => $attachment) {
																					$currentSlide++;
																					$full_img_url = wp_get_attachment_url($attachment->ID);
																		?>
																		<?php
																		if ($currentSlide == $countSlides ) { ?> '<?php echo $full_img_url; ?>' <?php }
																		else
																		 { ?> '<?php echo $full_img_url; ?>', <?php }
																		}																		
																		?>
																		], {
																			'transitionIn'	:	'elastic',
																			'transitionOut'	:	'elastic',
																			'type'              : 'image'
																	});
																});
																});
																</script>
															<?php
															}
														  }
														  if ($idd % 3) { } else {echo '<div class="clear"></div>';}
														 
												
														}
														}	
														?>
														</div>								
													<?php	
													} //end if posts
													?>
										                                    </div>
                                    <div class="scrollBtns">
                                        <a href="#" class="scrollDown"></a>
                                        <a href="#" class="scrollUp"></a>
                                    </div>			
								</div>
                            </div>
                        </div>
					</div>
                    </li>
	<?php
	
	}
	
	
	else
	if ($pageTemplate == 'Blog')
   {
   
   ?>   
     <li id="<?php echo $post_name; ?>">
                         <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
                                    <?php
									if ($pageTitle != '') {
									?>
										<h1><span class="color1"><?php echo $titles[0]; ?></span><?php echo ' '.$titles[1]; ?></h1>
									 <?php
									 }
									 else
									 {
									 ?>
									   <h1><span class="color1"><?php echo $title; ?></span></h1>
									 <?php
									 }
									 ?>
                                    <div class="scroll v2">
					
                    	<!-- start POSTS holder -->
										<div class="arround-posts">
										    <?php
												$args = array('post_type'=> 'post', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
												$posts = get_posts($args);
												$idd=0;
												if($posts) {
												
													foreach($posts as $post)
													{	
														$post_name = $post->post_name;
														$post_type = get_post_meta($post->ID, 'post_type_selected' , true);
														$post_summary = get_post_meta($post->ID, 'post_summary' , true);
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														$link=get_permalink();
														$idd++;
												
												?>
													<!-- start post -->
													
					
												<div class="postBlogTemplate">
												<h1 class="blog-post-time"><?php the_time('F j, Y'); ?></h1>
												<h1 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>							
												<div>
													<a href="<?php the_permalink(); ?>">
													<?php echo get_the_post_thumbnail($post->ID,'BlogImg', array('alt' => '', 'class' => 'imgWithBorder')); ?>
													</a>	
												</div>
												<?php
												$readMore="Read";
												if(get_option($pego_prefix.'blog_read_more') != '') {
													$readMore = get_option($pego_prefix.'blog_read_more');
												}
												?>
												<div style="" class="circle1 circle">
													<a class="" href="<?php the_permalink(); ?>"><?php echo $readMore; ?></a>
												</div>
											</div>
													<!-- end post -->
												<?php
													if ($idd % 4) { } else {echo '<div class="clear"></div>';}
													}												
												}										
												?>						
										</div>
										<!-- end POSTS holder -->
                                    </div>
                                    <div class="scrollBtns">
                                        <a href="#" class="scrollDown"></a>
                                        <a href="#" class="scrollUp"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>   
   <?php
   
   }
   else	
    {
   //page with no template
   ?>
     <li id="<?php echo $post_name; ?>">
                         <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
                                    <?php
									if ($pageTitle != '') {
									?>
										<h1><span class="color1"><?php echo $titles[0]; ?></span><?php echo ' '.$titles[1]; ?></h1>
									 <?php
									 }
									 else
									 {
									 ?>
									   <h1><span class="color1"><?php echo $title; ?></span></h1>
									 <?php
									 }
									 ?>
                                    <div class="scroll v2">
									<?php the_content(); ?>	
                                    </div>
                                    <div class="scrollBtns">
                                        <a href="#" class="scrollDown"></a>
                                        <a href="#" class="scrollUp"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
   
<?php

}
	endwhile;
	//portfolio single items
									$args = array('post_type'=> 'portfolio', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
									$posts = get_posts($args);
									$idd=0;
											if($posts) {
											?>
										
											<?php
																								
													foreach($posts as $post)
													{ 
													
														setup_postdata($post);
														$portfolioOpeningType = get_post_meta($post->ID, 'portfolio_opening_type' , true); 
													if($portfolioOpeningType == 'Description Page')	
													{														
														$idd++;
														$currentID=$post->ID;
														$portfolioType = get_post_meta($post->ID, 'portfolio_type_selected' , true); 
														$contentPortf = get_the_content($post->ID);														
														//$termss = get_the_term_list( $post->ID,'portfolio_categories', '', ', ');
														$termsSingle =  get_the_terms( $post->ID, 'portfolio_categories' );
														$portf_slug = $post->post_name;
														$term_listSingle = '';
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
														
														$currentItem=0;
														$terms_list= '';
														$term_list_for_filter= '';
														if( is_array($termsSingle) ) {														
														$numberOfCat = count($termsSingle);
																foreach( $termsSingle as $termSingle ) {
																	$currentItem++;
																	if ($currentItem == $numberOfCat) {
																	    $terms_list .= $termSingle->name; 	
																		$term_list_for_filter .= $termSingle->slug;
																	}
																	else
																	{
																		$terms_list .= $termSingle->name.', ';
																		$term_list_for_filter .= $termSingle->slug.' ';
																	}
																}
														}
														?>
     <li id="<?php echo $portf_slug; ?>">
                         <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
									   <h1><span class="color1"><?php the_title(); ?><a href="javascript:history.go(-1)" title=""><span class="backPortf">&larr; back</span></a></span></h1>
                                    <div class="scrollS v2">
																		
																			<div class="col-full-withScroller">
																			<?php
																			if($portfolioType == 'Image') 		
																			{										 
																			?>
																				<img class="singlePortfImg imgWithBorder" src="<?php echo $image[0]; ?>" alt="" />
																			<?php
																												
																			}
																			if($portfolioType == 'Video') 		
																			{										 
																			
																				$video_url= get_post_meta($post->ID, 'portfolio_video_url' , true);   
																				if(!empty($video_url)) 
																				{
																					echo '<div class="portfVideo"><div class="video-wrapper"><div class="video-container">'.$video_url.'</div></div></div>';
																				}		
																			
																												
																			}
																			if($portfolioType == 'Slideshow') 			 
																			{
																			
																						$attachments = get_children(array('post_parent' => $post->ID,
																							'post_status' => 'inherit',
																							'post_type' => 'attachment',
																							'post_mime_type' => 'image',
																							'order' => 'ASC',
																							'orderby' => 'menu_order ID'));
																					echo '<div class="imgWithBorder">';
																					echo '<div class="portfolio-slider">';
																						echo '<div class="slides">';
																						echo '<div class="slides_container">';
																						foreach($attachments as $att_id => $attachment) {
																							$full_img_url = wp_get_attachment_url($attachment->ID);
																							echo '<div class="slide">';
																							?>																							
																							<a href="#"><img src="<?php echo $full_img_url; ?>" title="" alt=""></a>
																							<?php
																							echo '</div>';
																					} //end foreach
																						echo '</div>';
																					echo '</div>';
																					echo '</div>';
																					echo '<div class="clear"></div>';
																					echo '</div>';
																																						
																			
																			  }
																			?>
																			</div>
																			<div class="singlePortfContent">
																				<?php the_content(); ?>	
																			</div>
																			<?php
																			if($portfolioType == 'Slideshow') 			 
																			{
																				echo '<div style="width:100%; height:400px;"></div>';
																			}
																			?>
										</div>
                                    <div class="scrollBtnsS">
                                        <a href="#" class="scrollDownS"></a>
                                        <a href="#" class="scrollUpS"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
														<?php
														}
														}
														?>
														
													<?php
													} //end if posts
													?>	
                </ul>
				
							<div id="homepage">
			                        <div class="container">
										<div class="col1">
											<div class="wrapper">											 
											  	<?php
												$homeScrollType="v2";
												if (get_option($pego_prefix.'slider_homepage') != 'false') {
													$homeScrollType="v3";
												?>
													<div class="home-slider">
													<?php
														$args_slider = array('post_type'=> 'slider', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'post_date'  );
														$slides= get_posts($args_slider);
														if($slides) {	
														?>
																<div class="slides">
																	<div class="slides_container">	
																		<?php
																			$idSlide=0;
																			foreach($slides as $slide)
																			{ 
																					
																				setup_postdata($slide); 	
																				//$picAlign =	get_post_meta($slide->ID, 'pic_position' , true);	
																				$slideCaption = get_post_meta($slide->ID, 'show_caption' , true);  
																				$slideURL = get_post_meta($slide->ID, 'slide_url' , true);   
																				$caption1 = get_the_title($slide->ID);
																				$caption2 = get_the_content($slide->ID);
																				$idSlide++;
																				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), 'single-post-thumbnail' );
																					
																				?>
																				
																				<div class="slide">	
																				<?php if($slideURL != '') { ?> <a href="<?php echo $slideURL; ?>"> <?php } ?>
																					<?php echo get_the_post_thumbnail($slide->ID,'HomeSliderImg', array('alt' => '')); ?>
																					<?php 
																					if ($slideCaption != 'No')
																					{
																					?>
																						<div class="caption"><div class="text1"><?php echo $caption1; ?></div><div class="text2"><?php echo $caption2; ?></div></div>
																					<?php
																					}
																					?>
																				<?php if($slideURL != '') { ?> </a> <?php } ?>
																				</div>
																				
																				
																			<?php
																			} //end foreach
																			?>
																	   </div>  
																	 </div>
																 <?php
																   } //end if posts
															?>		
												</div>	
												<div class="clear"></div>
												<?php
												if ((get_option($pego_prefix.'sloganMainText') != '')&&(get_option($pego_prefix.'sloganText') != '')) {
												?>	
													<div class="slogan">
														<h1 class="slogan-title"><?php echo get_option($pego_prefix.'sloganMainText'); ?></h1>
														<?php echo get_option($pego_prefix.'sloganText'); ?>
													</div>
												<?php
												}
												?>
												</div>	
												</div>	
													<div class="col3 col640width">
											<div class="wrapper">	
												<?php
												}	  //end if show slider
												?>	
											<div class="clear"></div>
											
													<div class="scroll <?php echo $homeScrollType; ?> pad1" style="margin-top:20px;">
									
													
														 <?php
														if ($homeContent != ''){
														
															echo do_shortcode($homeContent);
														}
														?>
													</div>
													<div class="scrollBtnsS pad1">
														<a href="#" class="scrollDown"></a>
															<a href="#" class="scrollUp"></a>
													</div>										
											
									</div>
								</div>
                      </div>
				</div>
            </div>            
<?php get_footer(); ?>