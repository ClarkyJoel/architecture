<?php

$input = array(get_option($pego_prefix.'fontUrlText'),
			   get_option($pego_prefix.'fontUrlH1'),
			   get_option($pego_prefix.'fontUrlH2'),
			   get_option($pego_prefix.'fontUrlH3'),
			   get_option($pego_prefix.'fontUrlH4'),
			   get_option($pego_prefix.'fontUrlH5'),
			   get_option($pego_prefix.'fontUrlList'),
			   get_option($pego_prefix.'fontUrlMenu'),		      
			   get_option($pego_prefix.'fontUrlSubmenu'),		      
			   get_option($pego_prefix.'fontUrlFilter'),		      
			   get_option($pego_prefix.'fontUrlPortfTitle')		      
	 		);
	 		
	 		$result = array_unique($input);
	 		foreach($result as $link)
	 		{
	 			echo $link;	
	 		}
?>