<?php get_header(); ?> 

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php setPostViews(get_the_ID()); ?><!--  counting views of post -->	
				<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$post_type = get_post_meta($post->ID, 'post_type_selected' , true);
				?>
            <div id="contentHolder1">            
              
				
				<div id="pageSingleBlog" >
                         <div class="container">
                            <div class="col3 pad1">
                                <div class="wrapper">
								<?php
									$singleBlogtitle="Blog::single";
									if(get_option($pego_prefix.'single_blog_page_title') != '') {
										$singleBlogtitle = get_option($pego_prefix.'single_blog_page_title');
									}
								    if ($singleBlogtitle != '')
									{
										$titless = explode("::", $singleBlogtitle);
									}
								?>
                                      <h1><span class="color1"><?php echo $titless[0]; ?></span><?php echo $titless[1]; ?></h1>
									
                                    <div class="scrollS v2">	
		
							
										<!-- start SINGLE post -->
										<div class="single-post-item" style="float:left;">										
											<div class="post-meta">
												<span class="published"><?php the_time('F j, Y'); ?></span>											
												<h1 class="post-titles-single"><?php the_title(); ?></h1>
												<div class="num-comments">
													<img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon-comments.png"><p><?php comments_number( '0', '1', '%' ); ?></p>
												</div>
												
												
											</div>
											<div class="single-content">
											<?php
											if ($post_type == 'Image')
											{
											?>
												<img class="singleBlogImg imgWithBorder" src="<?php echo $image[0]; ?>" alt="" />
											<?php
											}
											if ($post_type == 'Video')
											{
												$video_url= get_post_meta($post->ID, 'post_video_url' , true);   
												if(!empty($video_url)) 
												{
													echo '<div class="singleBlogImg"><div class="postVideo"><div class="video-wrapper"><div class="video-container">'.$video_url.'</div></div></div></div>';
												}	
											}
											if($post_type == 'Slideshow') 			 
											{
																			
																				$attachments = get_children(array('post_parent' => $post->ID,
																							'post_status' => 'inherit',
																							'post_type' => 'attachment',
																							'post_mime_type' => 'image',
																							'order' => 'ASC',
																							'orderby' => 'menu_order ID'));
																					
																					echo '<div class="imgWithBorder">';
																					echo '<div class="blog-slider">';
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
												<div class="singleTextContent">
													
													
													<div class="post-details">
														<ul>
															<li><span><?php echo getPostViews(get_the_ID()); ?></span><?php _e('Views','pego_tr'); ?></li>
															<li>/</li>
															<li><span><?php comments_number( '0', '1', '%' ); ?></span> <?php _e('Comments','pego_tr'); ?></li>
															<li>/</li>
															<li><span><?php _e('in','pego_tr'); ?> <?php $cats= get_the_category_list(', '); echo strip_tags($cats); ?></span></li>
															<li>/</li>
															<li><span><?php _e('by','pego_tr'); ?> <?php the_author(); ?></span></li>	
														</ul>
													</div>
													<div class="title_box_shadow_post"></div>
													
													
													<?php the_content(); ?>
												</div>
												<div class="clear"></div>
											</div>
																					
										
															<!-- start comments -->
															<div id="comments">
																<?php comments_template(); ?>
															</div>
															
															<!-- end comments -->
										</div>
										<!-- end SINGLE post -->
										<div class="clear"></div>
										<?php
										if($post_type == 'Slideshow') 			 
										{
										?>
											<div style="width:100%; height:400px;"></div>
										<?php
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
                    </div>

	
            
				
			
				
				<?php endwhile; endif; ?>
	
	</div> 


 <?php get_footer(); ?> 	
				