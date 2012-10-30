<?php if ( have_comments() ) : ?>
		<div>
			<h1 style="margin-bottom: 10px; margin-top: 20px; padding: 0;" class="like_h3"><?php _e("COMMENTS", "pego_tr"); ?></h1>
		</div>	
		<h1 class="like_h3" style="color: #6f6e6e; margin-bottom: 30px; font-size: 12px; letter-spacing: 0px; padding-bottom: 0px; margin-top: 3px; margin-bottom: 20px;">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'pego_tr' ),
					number_format_i18n( get_comments_number() ), '' . get_the_title() . '' );
			?>
		</h1>
		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'adorable_comment' ) );
			?>
		</ol>
	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'pego_tr' ); ?></p>
	<?php endif; ?>
	
<?php comment_form(); ?>
	
	
	