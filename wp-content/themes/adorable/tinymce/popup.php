<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new pego_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
<div id="pego-popup">

	<div id="pego-shortcode-wrap">
		
		<div id="pego-sc-form-wrap">
		
			<div id="pego-sc-form-head">
			
				<?php echo $shortcode->popup_title; ?>
			
			</div>
			<!-- /#pego-sc-form-head -->
			
			<form method="post" id="pego-sc-form">
			
				<table id="pego-sc-form-table">
				
					<?php echo $shortcode->output; ?>
					
					<tbody>
						<tr class="form-row">
							<?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
							<td class="field"><a href="#" class="button-primary pego-insert"><?php _e('Insert Shortcode','pego_tr'); ?></a></td>							
						</tr>
					</tbody>
				
				</table>
				<!-- /#pego-sc-form-table -->
				
			</form>
			<!-- /#pego-sc-form -->
		
		</div>
		<!-- /#pego-sc-form-wrap -->
		
		<div id="pego-sc-preview-wrap">		
			<div id="pego-sc-preview-head">		
				<?php _e('Shortcode Preview','pego_tr'); ?>		
			</div>
			<!-- /#pego-sc-preview-head -->
			
			<?php if( $shortcode->no_preview ) : ?>
			<div id="pego-sc-nopreview"><?php _e('Shortcode has no preview','pego_tr'); ?></div>		
			<?php else : ?>			
			<iframe src="<?php echo PEGO_TINYMCE_URI; ?>/preview.php?sc=" width="249" frameborder="0" id="pego-sc-preview"></iframe>
			<?php endif; ?>
			
		</div>
		<!-- /#pego-sc-preview-wrap -->
		
		<div class="clear"></div>
		
	</div>
	<!-- /#pego-shortcode-wrap -->

</div>
<!-- /#pego-popup -->

</body>
</html>