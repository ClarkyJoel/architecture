<?php

/*-----------------------------------------------------------------------------------*/
/*	Paths Defenitions
/*-----------------------------------------------------------------------------------*/

define('PEGO_TINYMCE_PATH', PEGO_FILEPATH . '/tinymce');
define('PEGO_TINYMCE_URI', PEGO_DIRECTORY . '/tinymce');


/*-----------------------------------------------------------------------------------*/
/*	Load TinyMCE dialog
/*-----------------------------------------------------------------------------------*/

require_once( PEGO_TINYMCE_PATH . '/tinymce.class.php' );		// TinyMCE wrapper class
new pego_tinymce();											// do the magic

?>