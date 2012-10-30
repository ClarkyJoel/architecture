<?php

add_action('init','pego_options');

if (!function_exists('pego_options')) {
function pego_options(){
	
// VARIABLES

$theme_data = wp_get_theme();
$themename = $theme_data->Name;
$themeversion = $theme_data->Version;

//$theme_data = get_theme_data(STYLESHEETPATH . '/style.css');
//$themename = $theme_data['Name'];
//$themeversion = $theme_data['Version'];


$shortname = "pego_";

// Populate option in array for use in theme
global $pego_options;
$pego_options = get_option('pego_options');

$GLOBALS['template_path'] = PEGO_DIRECTORY;

//Access the WordPress Categories via an Array
$pego_categories = array();  
$pego_categories_obj = get_categories('hide_empty=0');
foreach ($pego_categories_obj as $pego_cat) {
    $pego_categories[$pego_cat->cat_ID] = $pego_cat->cat_name;}
$categories_tmp = array_unshift($pego_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$pego_pages = array();
$pego_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($pego_pages_obj as $pego_page) {
    $pego_pages[$pego_page->ID] = $pego_page->post_name; }
$pego_pages_tmp = array_unshift($pego_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => __("Left",'pego_tr'),"alignright" => __("Right",'pego_tr'),"aligncenter" => __("Center",'pego_tr')); 

// Image Links to Options
$options_image_link_to = array("image" => __("The Image",'pego_tr'),"post" => __("The Post",'pego_tr')); 

//Stylesheets Reader
$alt_stylesheet_path = PEGO_FILEPATH . '/css/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = '';
if(isset($uploads_arr['path'])) $all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('pego_uploads');
$other_entries = array(__("Select a number:",'pego_tr'),"1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// Set the Options Array
$options = array();


$options[] = array( "name" => __('General Settings','pego_tr'),
                    "type" => "heading");
                    
                  
$options[] = array( "name" => __('Logo','pego_tr'),
					"desc" => __('Upload a logo for your theme.','pego_tr'),
					"id" => $shortname."logo",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __('Favicon','pego_tr'),
					"desc" => __('Upload a favicon for your theme.','pego_tr'),
					"id" => $shortname."favicon",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __('Main template color','pego_tr'),
					"desc" => __('Choose the main template color.','pego_tr'),
					"id" => $shortname."main_template_color",
					"std" => "#92ae6a",
					"type" => "color");			
					
$options[] = array( "name" => __('Make theme responsive?','pego_tr'),
					"desc" => __('Check this to make theme responsive.','pego_tr'),
					"id" => $shortname."responsive_theme",
					"std" => "true",
					"type" => "checkbox");
					
$left_area_content='
<div id="socials">
							<ul class="social-links">
								<li class="twitter"><a target="_blank" title="" href="#">Twitter</a></li>
								<li class="facebook"><a target="_blank" title="" href="#">Facebook</a></li>
								<li class="linkedin"><a target="_blank" title="" href="#">LindkedIn</a></li>
								<li class="googleplus"><a target="_blank" title="" href="#">GooglePlus</a></li>
								<li class="skype"><a target="_blank" title="" href="#">Skype</a></li>
							</ul><!-- end .social-links -->						
						</div>

						
                        <p>ADORABLE &copy; 2012 &#149; made by <a href="http://themeforest.net/user/pego/portfolio?WT.ac=item_portfolio&WT.seg_1=item_portfolio&WT.z_author=pego" target="_blank" title="Responsive wordpress premium">PEGO</a></p>        
                ';

$options[] = array( "name" => __('Left area content','pego_tr'),
					"desc" => __('Insert content for left area.','pego_tr'),
					"id" => $shortname."left_side_area_content",
					"std" => $left_area_content,
					"type" => "textarea");	
					
$options[] = array( "name" => __('Home Settings','pego_tr'),
                    "type" => "heading");	
					
$options[] = array( "name" => __('Show slider on homepage?','pego_tr'),
					"desc" => __('Check this to display slider on the homepage.','pego_tr'),
					"id" => $shortname."slider_homepage",
					"std" => "true",
					"type" => "checkbox");
					
$options[] = array( "name" => __('Slogan main text','pego_tr'),
					"desc" => __('Insert main text for slogan','pego_tr'),
					"id" => $shortname."sloganMainText",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Slogan secondary text','pego_tr'),
					"desc" => __('Insert secondary text for slogan','pego_tr'),
					"id" => $shortname."sloganText",
					"std" => "",
					"type" => "textarea");	
					
$options[] = array( "name" => __('Background Settings','pego_tr'),
                    "type" => "heading");	
					
					
$options[] = array( "name" => __('Background Image','pego_tr'),
					"desc" => __('Upload an image for the background.','pego_tr'),
					"id" => $shortname."bg_image_strech",
					"std" => "",
					"type" => "upload");		
					
$options[] = array( "name" => __('Left Area Background Color', 'pego_tr'),
                    "desc" => __('Select the background color for the left area.', 'pego_tr'),
                    "id" => $shortname."left_side_bg_color",
                    "std" => "",
                    "type" => "color");     
					
$options[] = array( "name" => __('Left Area Background Image','pego_tr'),
					"desc" => __('Upload an image for the left area background.','pego_tr'),
					"id" => $shortname."left_side_bg_image",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __('Left Area Background Options/Positions','pego_tr'),
					"desc" => __('Insert left area background options/positions','pego_tr'),
					"id" => $shortname."left_side_bg_tags",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => __('Content Area Background Color', 'pego_tr'),
                    "desc" => __('Select the background color for the content area.', 'pego_tr'),
                    "id" => $shortname."content_area_bg_color",
                    "std" => "",
                    "type" => "color");     
					
$options[] = array( "name" => __('Content Area Background Image','pego_tr'),
					"desc" => __('Upload an image for the content area background.','pego_tr'),
					"id" => $shortname."content_area_bg_image",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => __('Content Area Background Options/Positions','pego_tr'),
					"desc" => __('Insert background options/positions','pego_tr'),
					"id" => $shortname."content_area_bg_tags",
					"std" => "",
					"type" => "text");
					
					
$options[] = array( "name" => __('Menu Hover Background Color', 'pego_tr'),
                    "desc" => __('Select the background color for the hover menu item.', 'pego_tr'),
                    "id" => $shortname."menu_bg_1",
                    "std" => "",
                    "type" => "color");  
					
$options[] = array( "name" => __('Menu Active Background Color', 'pego_tr'),
                    "desc" => __('Select the background color for the active menu item.', 'pego_tr'),
                    "id" => $shortname."menu_bg_1A",
                    "std" => "",
                    "type" => "color");  					

$options[] = array( "name" => __('Submenu Hover Background Color', 'pego_tr'),
                    "desc" => __('Select the background color for the hover submenu item.', 'pego_tr'),
                    "id" => $shortname."menu_bg_2",
                    "std" => "",
                    "type" => "color"); 

		
$options[] = array( "name" => __('Font Settings','pego_tr'),
                    "type" => "heading");	
					
					
$options[] = array( "name" => __('Text font family','pego_tr'),
					"desc" => __('Insert font family for text','pego_tr'),
					"id" => $shortname."fontFamText",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Text font url','pego_tr'),
					"desc" => __('Insert font url for text','pego_tr'),
					"id" => $shortname."fontUrlText",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Text font size','pego_tr'),
					"desc" => __('Insert font size for text','pego_tr'),
					"id" => $shortname."fontSizeText",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Text font color','pego_tr'),
					"desc" => __('Insert font color for text','pego_tr'),
					"id" => $shortname."fontColText",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('Text font shadow','pego_tr'),
					"desc" => __('Insert font shadow for text','pego_tr'),
					"id" => $shortname."fontShadowText",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H1 font family','pego_tr'),
					"desc" => __('Insert font family for H1','pego_tr'),
					"id" => $shortname."fontFamH1",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H1 font url','pego_tr'),
					"desc" => __('Insert font url for H1','pego_tr'),
					"id" => $shortname."fontUrlH1",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H1 font size','pego_tr'),
					"desc" => __('Insert font size for H1','pego_tr'),
					"id" => $shortname."fontSizeH1",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('H1 font color','pego_tr'),
					"desc" => __('Insert font color for H1','pego_tr'),
					"id" => $shortname."fontColH1",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H1 seconddary font color','pego_tr'),
					"desc" => __('Insert font color for H1 span','pego_tr'),
					"id" => $shortname."fontColH1Span",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H1 font shadow','pego_tr'),
					"desc" => __('Insert font shadow for H1','pego_tr'),
					"id" => $shortname."fontShadowH1",
					"std" => "",
					"type" => "text");	
			
$options[] = array( "name" => __('H2 font family','pego_tr'),
					"desc" => __('Insert font family for H2','pego_tr'),
					"id" => $shortname."fontFamH2",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H2 font url','pego_tr'),
					"desc" => __('Insert font url for H2','pego_tr'),
					"id" => $shortname."fontUrlH2",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H2 font size','pego_tr'),
					"desc" => __('Insert font size for H2','pego_tr'),
					"id" => $shortname."fontSizeH2",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('H2 font color','pego_tr'),
					"desc" => __('Insert font color for H2','pego_tr'),
					"id" => $shortname."fontColH2",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H2 font shadow','pego_tr'),
					"desc" => __('Insert font shadow for H2','pego_tr'),
					"id" => $shortname."fontShadowH2",
					"std" => "",
					"type" => "text");		
				
$options[] = array( "name" => __('H3 font family','pego_tr'),
					"desc" => __('Insert font family for H3','pego_tr'),
					"id" => $shortname."fontFamH3",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H3 font url','pego_tr'),
					"desc" => __('Insert font url for H3','pego_tr'),
					"id" => $shortname."fontUrlH3",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H3 font size','pego_tr'),
					"desc" => __('Insert font size for H3','pego_tr'),
					"id" => $shortname."fontSizeH3",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('H3 font color','pego_tr'),
					"desc" => __('Insert font color for H3','pego_tr'),
					"id" => $shortname."fontColH3",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H3 font shadow','pego_tr'),
					"desc" => __('Insert font shadow for H3','pego_tr'),
					"id" => $shortname."fontShadowH3",
					"std" => "",
					"type" => "text");					
		
$options[] = array( "name" => __('H4 font family','pego_tr'),
					"desc" => __('Insert font family for H4','pego_tr'),
					"id" => $shortname."fontFamH4",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H4 font url','pego_tr'),
					"desc" => __('Insert font url for H4','pego_tr'),
					"id" => $shortname."fontUrlH4",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H4 font size','pego_tr'),
					"desc" => __('Insert font size for H4','pego_tr'),
					"id" => $shortname."fontSizeH4",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('H4 font color','pego_tr'),
					"desc" => __('Insert font color for H4','pego_tr'),
					"id" => $shortname."fontColH4",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H4 font shadow','pego_tr'),
					"desc" => __('Insert font shadow for H4','pego_tr'),
					"id" => $shortname."fontShadowH4",
					"std" => "",
					"type" => "text");	
					
					
$options[] = array( "name" => __('H5 font family','pego_tr'),
					"desc" => __('Insert font family for H5','pego_tr'),
					"id" => $shortname."fontFamH5",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H5 font url','pego_tr'),
					"desc" => __('Insert font url for H5','pego_tr'),
					"id" => $shortname."fontUrlH5",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('H5 font size','pego_tr'),
					"desc" => __('Insert font size for H5','pego_tr'),
					"id" => $shortname."fontSizeH5",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('H5 font color','pego_tr'),
					"desc" => __('Insert font color for H5','pego_tr'),
					"id" => $shortname."fontColH5",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('H5 font shadow','pego_tr'),
					"desc" => __('Insert font shadow for H5','pego_tr'),
					"id" => $shortname."fontShadowH5",
					"std" => "",
					"type" => "text");			

$options[] = array( "name" => __('List font family','pego_tr'),
					"desc" => __('Insert font family for list','pego_tr'),
					"id" => $shortname."fontFamList",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('List font url','pego_tr'),
					"desc" => __('Insert font url for list','pego_tr'),
					"id" => $shortname."fontUrlList",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('List font size','pego_tr'),
					"desc" => __('Insert font size for list','pego_tr'),
					"id" => $shortname."fontSizeList",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('List font color','pego_tr'),
					"desc" => __('Insert font color for list','pego_tr'),
					"id" => $shortname."fontColList",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('List font shadow','pego_tr'),
					"desc" => __('Insert font shadow for list','pego_tr'),
					"id" => $shortname."fontShadowList",
					"std" => "",
					"type" => "text");			
				
$options[] = array( "name" => __('Menu font family','pego_tr'),
					"desc" => __('Insert font family for menu','pego_tr'),
					"id" => $shortname."fontFamMenu",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Menu font url','pego_tr'),
					"desc" => __('Insert font url for menu','pego_tr'),
					"id" => $shortname."fontUrlMenu",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Menu font size','pego_tr'),
					"desc" => __('Insert font size for menu','pego_tr'),
					"id" => $shortname."fontSizeMenu",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Menu font color','pego_tr'),
					"desc" => __('Insert font color for menu','pego_tr'),
					"id" => $shortname."fontColMenu",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('Menu hover/active font color','pego_tr'),
					"desc" => __('Insert hover/active font color for menu','pego_tr'),
					"id" => $shortname."fontColMenuHover",
					"std" => "",
					"type" => "color");						
					
$options[] = array( "name" => __('Menu font shadow','pego_tr'),
					"desc" => __('Insert font shadow for menu','pego_tr'),
					"id" => $shortname."fontShadowMenu",
					"std" => "",
					"type" => "text");			

$options[] = array( "name" => __('Submenu font family','pego_tr'),
					"desc" => __('Insert font family for submenu','pego_tr'),
					"id" => $shortname."fontFamSubmenu",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Submenu font url','pego_tr'),
					"desc" => __('Insert font url for submenu','pego_tr'),
					"id" => $shortname."fontUrlSubmenu",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Submenu font size','pego_tr'),
					"desc" => __('Insert font size for submenu','pego_tr'),
					"id" => $shortname."fontSizeSubmenu",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Submenu font color','pego_tr'),
					"desc" => __('Insert font color for submenu','pego_tr'),
					"id" => $shortname."fontColSubmenu",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('Submenu font shadow','pego_tr'),
					"desc" => __('Insert font shadow for submenu','pego_tr'),
					"id" => $shortname."fontShadowSubmenu",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Portfolio filter font family','pego_tr'),
					"desc" => __('Insert font family for Portfolio filter','pego_tr'),
					"id" => $shortname."fontFamFilter",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Portfolio filter font url','pego_tr'),
					"desc" => __('Insert font url for Portfolio filter','pego_tr'),
					"id" => $shortname."fontUrlFilter",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Portfolio filter font size','pego_tr'),
					"desc" => __('Insert font size for Portfolio filter','pego_tr'),
					"id" => $shortname."fontSizeFilter",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Portfolio filter font color','pego_tr'),
					"desc" => __('Insert font color for Portfolio filter','pego_tr'),
					"id" => $shortname."fontColFilter",
					"std" => "",
					"type" => "color");	
					
					
$options[] = array( "name" => __('Portfolio filter hover/active font color','pego_tr'),
					"desc" => __('Insert font hover/active color for Portfolio filter','pego_tr'),
					"id" => $shortname."fontColFilterHover",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('Portfolio filter font shadow','pego_tr'),
					"desc" => __('Insert font shadow for Portfolio filter','pego_tr'),
					"id" => $shortname."fontShadowFilter",
					"std" => "",
					"type" => "text");		
					
					
					
$options[] = array( "name" => __('Portfolio titles font family','pego_tr'),
					"desc" => __('Insert font family for Portfolio titles','pego_tr'),
					"id" => $shortname."fontFamPortfTitle",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Portfolio titles font url','pego_tr'),
					"desc" => __('Insert font url for Portfolio titles','pego_tr'),
					"id" => $shortname."fontUrlPortfTitle",
					"std" => "",
					"type" => "text");	
					
$options[] = array( "name" => __('Portfolio titles font size','pego_tr'),
					"desc" => __('Insert font size for Portfolio titles','pego_tr'),
					"id" => $shortname."fontSizePortfTitle",
					"std" => "",
					"type" => "text");	

$options[] = array( "name" => __('Portfolio titles font color','pego_tr'),
					"desc" => __('Insert font color for Portfolio titles','pego_tr'),
					"id" => $shortname."fontColPortfTitle",
					"std" => "",
					"type" => "color");	
					
					
$options[] = array( "name" => __('Portfolio titles hover/active font color','pego_tr'),
					"desc" => __('Insert font hover/active color for Portfolio titles','pego_tr'),
					"id" => $shortname."fontColPortfTitleHover",
					"std" => "",
					"type" => "color");	
					
$options[] = array( "name" => __('Portfolio titles font shadow','pego_tr'),
					"desc" => __('Insert font shadow for Portfolio titles','pego_tr'),
					"id" => $shortname."fontShadowPortfTitle",
					"std" => "",
					"type" => "text");		
					

					
					
				
$options[] = array( "name" => __('Portfolio/Blog Settings','pego_tr'),
                    "type" => "heading");	

			
$options[] = array( "name" => __('Single blog page title','pego_tr'),
					"desc" => __('Input the single blog title.','pego_tr'),
					"id" => $shortname."single_blog_page_title",
					"std" => "Blog",
					"type" => "text");

$options[] = array( "name" => __('Read more blog button text','pego_tr'),
					"desc" => __('Input the text for Ream more button on blog template.','pego_tr'),
					"id" => $shortname."blog_read_more",
					"std" => "Read",
					"type" => "text");	
		

$options[] = array( "name" => __('Contact Page','pego_tr'),
                    "type" => "heading");	
					
$options[] = array( "name" => __('Map Lat','pego_tr'),
					"desc" => __('Insert the Latitude','pego_tr'),
					"id" => $shortname."lat",
					"std" => "40.4166909",
					"type" => "text");
					
$options[] = array( "name" => __('Map Lng','pego_tr'),
					"desc" => __('Insert Longitude','pego_tr'),
					"id" => $shortname."lng",
					"std" => "-3.7003454",
					"type" => "text");
					
$options[] = array( "name" => __('Contact Form Email Address','pego_tr'),
					"desc" => __('Insert email address where emails will be send','pego_tr'),
					"id" => $shortname."contact_form_email",
					"std" => "",
					"type" => "text");		
					
$options[] = array( "name" => __('Contact Form Title','pego_tr'),
					"desc" => __('Insert title for the contact form','pego_tr'),
					"id" => $shortname."contact_form_title",
					"std" => "Use contact form",
					"type" => "text");
					
$options[] = array( "name" => __('Field one prevalue','pego_tr'),
					"desc" => __('Insert prevalue for the first field.','pego_tr'),
					"id" => $shortname."field_one_prevalue",
					"std" => "Name:",
					"type" => "text");
					
$options[] = array( "name" => __('Field two prevalue','pego_tr'),
					"desc" => __('Insert prevalue for the second field.','pego_tr'),
					"id" => $shortname."field_two_prevalue",
					"std" => "Email:",
					"type" => "text");	

$options[] = array( "name" => __('Textarea prevalue','pego_tr'),
					"desc" => __('Insert prevalue for the textarea.','pego_tr'),
					"id" => $shortname."textarea_prevalue",
					"std" => "Message:",
					"type" => "text");

$options[] = array( "name" => __('Required field message','pego_tr'),
					"desc" => __('Insert message for required field.','pego_tr'),
					"id" => $shortname."required_message",
					"std" => "*This field is required.",
					"type" => "text");		


$options[] = array( "name" => __('Email not valid message','pego_tr'),
					"desc" => __('Insert message for invalid email.','pego_tr'),
					"id" => $shortname."valid_field_two",
					"std" => "*This is not a valid email address.",
					"type" => "text");		


$options[] = array( "name" => __('Message send ','pego_tr'),
					"desc" => __('Insert text for successful message send. You can use HTML.','pego_tr'),
					"id" => $shortname."success_send",
					"std" => "",
					"type" => "textarea");	
					
$options[] = array( "name" => __('Send button text','pego_tr'),
					"desc" => __('Insert text for the send button.','pego_tr'),
					"id" => $shortname."send_button",
					"std" => "send",
					"type" => "text");		
					

update_option('template_name',$options); 					  
update_option('pego_themename',$themename);   
update_option('pego_shortname',$shortname);

    }
}

?>