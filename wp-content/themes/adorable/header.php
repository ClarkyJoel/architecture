<?php 
global $themedir, $pego_prefix;
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
	<!-- for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	
	<!-- Meta Tags -->
	<meta charset="UTF-8" />
	
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="<?php echo get_option($pego_prefix.'favicon'); ?>" type="image/vnd.microsoft.icon"/>
    <link rel="icon" href="<?php echo get_option($pego_prefix.'favicon'); ?>" type="image/x-ico"/>	
	
	
    <!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
	<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'></div>
	<![endif]-->
	
	     <!-- start for google maps -->	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>					
	<script type="text/javascript">
			(function() {
				window.onload = function(){
					var pinkParksStyles = '';
				var pinkMapType = new google.maps.StyledMapType(pinkParksStyles,
					{name: "Our Location"});
				var mapOptions = {
					zoom: 11,
					center: new google.maps.LatLng(<?php echo get_option($pego_prefix.'lat'); ?>, <?php echo get_option($pego_prefix.'lng'); ?>),
					mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'pink_parks']
					}
				};
				var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
				  map.mapTypes.set('pink_parks', pinkMapType);
				  map.setMapTypeId('pink_parks');
  
				
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(<?php echo get_option($pego_prefix.'lat'); ?>, <?php echo get_option($pego_prefix.'lng'); ?>),
					map: map
				}); 
				}
			})();

	</script>
	<!-- end for google maps -->
	<script type="text/javascript">
	var isResponsive = '<?php echo "NotResponsive"; ?>';
	</script>		

					
	<!-- Fonts -->
	<?php include("functions/fonts.php"); ?>
			
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>
	
	
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	
	<?php
			if (get_option($pego_prefix.'responsive_theme') != 'false') {
			?>
				<script type="text/javascript">
					isResponsive = '<?php echo "AmResponsive"; ?>';
				</script>
				<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/media.css">
			<?php
			}	
	?>	
	<!-- custom CSS -->
	<?php include("functions/customCssAdd.php"); ?>
</head>
<body <?php body_class(); ?>>
<script type="text/javascript">
var isSingle = '<?php echo "NisemSingle"; ?>';
</script>

<?php
$linkForHome='#close';
if (is_single()) {
	$linkForHome='http://trendis.si/wp-themes/projectus/#!/';
?>
<script type="text/javascript">
	isSingle = '<?php echo "SemSingle"; ?>';
</script>
<?php
}
?>
	<div class="spinner"></div>
    <div id="bgStretch">
	<?php
	$bg_image_strech = get_template_directory_uri().'/images/bg_pic1.jpg';
	if(get_option($pego_prefix.'bg_image_strech') != '') {
		$bg_image_strech = get_option($pego_prefix.'bg_image_strech');
	}
	?>	
	
        <img src="<?php echo $bg_image_strech; ?>" alt="" />
    </div>
    <div id="glob">
        
        <!-- CONTENT -->
        <section id="content">
            <div id="leftPanel">
                <div class="subLeftPanel">
                    <!-- HEADER -->
                    <header>
					<div class="logoWrapper">
					<?php
					$url_home='#!/';
					if (!is_front_page()){
							 $url_home = get_option("siteurl")."#!/";
					}
					if (get_option($pego_prefix.'logo')) { ?>
						<h1 style="text-align:center;"><a href="<?php echo $url_home; ?>" id="logo"><img src="<?php echo get_option($pego_prefix.'logo'); ?>" alt="" /></a></h1>
					<?php } 
						else {
					?>
					<h1 style="text-align:center;"><a href="<?php echo $url_home; ?>" id="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" /></a></h1>
					<?php
					}
					?>
					</div>
					
                    </header>
                    <!-- END HEADER -->
                    <!-- MENU -->
					
						<?php pego_nav(); ?>
					
                    <!-- END MENU -->
                    <!-- FOOTER -->
                    <div id="footer"> 
					<?php
						echo get_option($pego_prefix.'left_side_area_content');
				   ?>

				    </div>
                    <!-- END FOOTER -->
                </div>
            </div>