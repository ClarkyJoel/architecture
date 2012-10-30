<?php

/*-----------------------------------------------------------------------------------*/
/* Head Hook
/*-----------------------------------------------------------------------------------*/

function pego_head() { do_action( 'pego_head' ); }


/*-----------------------------------------------------------------------------------*/
/* Get the style path currently selected */
/*-----------------------------------------------------------------------------------*/

function pego_style_path() {
    $style = $_REQUEST['style'];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = get_option('pego_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}


/*-----------------------------------------------------------------------------------*/
/* Add default options after activation */
/*-----------------------------------------------------------------------------------*/

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	add_action('admin_head','pego_option_setup');
}

function pego_option_setup(){

	//Update EMPTY options
	$pego_array = array();
	add_option('pego_options',$pego_array);

	$template = get_option('template_name');
	$saved_options = get_option('pego_options');
	
	foreach($template as $option) {
		if($option['type'] != 'heading' && isset($option['id'])){
			$id = $option['id'];
			$std = $option['std'];
			$db_option = get_option($id);
			if(empty($db_option)){
				if(is_array($option['type'])) {
					foreach($option['type'] as $child){
						$c_id = $child['id'];
						$c_std = $child['std'];
						update_option($c_id,$c_std);
						$pego_array[$c_id] = $c_std; 
					}
				} else {
					update_option($id,$std);
					$pego_array[$id] = $std;
				}
			}
			else { //So just store the old values over again.
				$pego_array[$id] = $db_option;
			}
		}
	}
	update_option('pego_options',$pego_array);
}


/*-----------------------------------------------------------------------------------*/
/* Admin Backend */
/*-----------------------------------------------------------------------------------*/

function pegoframework_admin_head() { 
	
	//Tweaked the message on theme activate
	?>
    <script type="text/javascript">
    jQuery(function(){
	var message = 'This theme has integrated theme options to configure settings. This theme also supports widgets.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}

add_action('admin_head', 'pegoframework_admin_head'); 

?>