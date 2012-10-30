<?php 
global $themedir, $pego_prefix;

	$mainTemplateColor= '';
	if (get_option($pego_prefix.'main_template_color') != ''){
		$mainTemplateColor .= ' 
		#footer p a,
		.filters .filter-cat  a:hover,
		.filters .filter-cat  a.selected,
		ul.images-list li p span,
		h1.blog-post-time,
		span.published,
		.required,
		.comment-awaiting-moderation,
		#cancel-comment-reply-link,
		.logged-in-as a,
		.home-slider 	.text2,
		.read-arrow a
		{ color: '.get_option($pego_prefix.'main_template_color').'; } ';
		
		/*#menu li.with_ul ul.submenu li a:hover,
		ul#menu li.with_ul a:hover,
		#menu  li a:hover,
		ul#menu li.with_ul a:hover,*/
		
		$mainTemplateColor .= ' 
		input#submit-button,
		.post-details,
		.slogan 
		{ background-color: '.get_option($pego_prefix.'main_template_color').'; } ';
		
		$mainTemplateColor .= ' 
		.circle1,
		p.form-submit input#submit,
		input#submit-comment		
		{ background: '.get_option($pego_prefix.'main_template_color').'; } ';
	}
	
//fonts
	//default font
	$fontText = ' body, p  { ';
	if (get_option($pego_prefix.'fontFamText') != ''){
		$fontText .= ' '. get_option($pego_prefix.'fontFamText').' ';
	}
	if (get_option($pego_prefix.'fontSizeText') != ''){
		$fontText .= 'font-size: '. get_option($pego_prefix.'fontSizeText').'px; ';
	}
	if (get_option($pego_prefix.'fontColText') != ''){
		$fontText .= 'color: '. get_option($pego_prefix.'fontColText').'; ';
	}
	if (get_option($pego_prefix.'fontShadowText') != ''){
		$fontText .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowText').'; ';
	}
	$fontText .= ' } ';
	
	//heading h1 settings
	$fontH1 = ' h1 { ';
	if (get_option($pego_prefix.'fontFamH1') != ''){
		$fontH1 .= ' '. get_option($pego_prefix.'fontFamH1').' ';
	}
	if (get_option($pego_prefix.'fontSizeH1') != ''){
		$fontH1 .= 'font-size: '. get_option($pego_prefix.'fontSizeH1').'px; ';
	}
	if (get_option($pego_prefix.'fontColH1') != ''){
		$fontH1 .= 'color: '. get_option($pego_prefix.'fontColH1').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH1') != ''){
		$fontH1 .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowH1').'; ';
	}
	$fontH1 .= ' } ';
	
	$fontH1 .= ' .color1 { ';
	if (get_option($pego_prefix.'fontColH1Span') != ''){
		$fontH1 .= 'color: '. get_option($pego_prefix.'fontColH1Span').'; ';
	}
	$fontH1 .= ' } ';
	
	
	//heading h2 settings
	$fontH2 = ' h1.like_h2 { ';
	if (get_option($pego_prefix.'fontFamH2') != ''){
		$fontH2 .= ' '. get_option($pego_prefix.'fontFamH2').' ';
	}
	if (get_option($pego_prefix.'fontSizeH2') != ''){
		$fontH2 .= 'font-size: '. get_option($pego_prefix.'fontSizeH2').'px; ';
	}
	if (get_option($pego_prefix.'fontColH2') != ''){
		$fontH2 .= 'color: '. get_option($pego_prefix.'fontColH2').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH2') != ''){
		$fontH2 .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowH2').'; ';
	}
	$fontH2 .= ' } ';
	
	//heading h3 settings
	$fontH3 = ' h1.like_h3 { ';
	if (get_option($pego_prefix.'fontFamH3') != ''){
		$fontH3 .= ' '. get_option($pego_prefix.'fontFamH3').' ';
	}
	if (get_option($pego_prefix.'fontSizeH3') != ''){
		$fontH3 .= 'font-size: '. get_option($pego_prefix.'fontSizeH3').'px; ';
	}
	if (get_option($pego_prefix.'fontColH3') != ''){
		$fontH3 .= 'color: '. get_option($pego_prefix.'fontColH3').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH3') != ''){
		$fontH3 .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowH3').'; ';
	}
	$fontH3 .= ' } ';
	
	//heading h4 settings
	$fontH4 = ' h1.like_h4 { ';
	if (get_option($pego_prefix.'fontFamH4') != ''){
		$fontH4 .= ' '. get_option($pego_prefix.'fontFamH4').' ';
	}
	if (get_option($pego_prefix.'fontSizeH4') != ''){
		$fontH4 .= 'font-size: '. get_option($pego_prefix.'fontSizeH4').'px; ';
	}
	if (get_option($pego_prefix.'fontColH4') != ''){
		$fontH4 .= 'color: '. get_option($pego_prefix.'fontColH4').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH4') != ''){
		$fontH4 .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowH4').'; ';
	}
	$fontH4 .= ' } ';
	
	//heading h5 settings
	$fontH5 = ' h1.like_h5 { ';
	if (get_option($pego_prefix.'fontFamH5') != ''){
		$fontH5 .= ' '. get_option($pego_prefix.'fontFamH5').' ';
	}
	if (get_option($pego_prefix.'fontSizeH5') != ''){
		$fontH5 .= 'font-size: '. get_option($pego_prefix.'fontSizeH5').'px; ';
	}
	if (get_option($pego_prefix.'fontColH5') != ''){
		$fontH5 .= 'color: '. get_option($pego_prefix.'fontColH5').'; ';
	}
	if (get_option($pego_prefix.'fontShadowH5') != ''){
		$fontH5 .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowH5').'; ';
	}
	$fontH5 .= ' } ';
	
	//list settings
	$fontList = ' .list li { ';
	if (get_option($pego_prefix.'fontFamList') != ''){
		$fontList .= ' '. get_option($pego_prefix.'fontFamList').' ';
	}
	if (get_option($pego_prefix.'fontSizeList') != ''){
		$fontList .= 'font-size: '. get_option($pego_prefix.'fontSizeList').'px; ';
	}
	if (get_option($pego_prefix.'fontColList') != ''){
		$fontList .= 'color: '. get_option($pego_prefix.'fontColList').'; ';
	}
	if (get_option($pego_prefix.'fontShadowList') != ''){
		$fontList .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowList').'; ';
	}
	$fontList .= ' } ';
	

//fitler font settings
	$fontFilter = ' .filters .filter-cat, .filters .filter-cat a { ';
	if (get_option($pego_prefix.'fontFamFilter') != ''){
		$fontFilter .= ' '. get_option($pego_prefix.'fontFamFilter').' ';
	}
	if (get_option($pego_prefix.'fontSizeFilter') != ''){
		$fontFilter .= 'font-size: '. get_option($pego_prefix.'fontSizeFilter').'px; ';
	}
	if (get_option($pego_prefix.'fontColFilter') != ''){
		$fontFilter .= 'color: '. get_option($pego_prefix.'fontColFilter').'; ';
	}
	if (get_option($pego_prefix.'fontShadowFilter') != ''){
		$fontFilter .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowFilter').'; ';
	}
	$fontFilter .= ' } ';
	
	$fontFilter .= ' .filters .filter-cat a:hover, .filters .filter-cat a.selected { ';
	if (get_option($pego_prefix.'fontColFilterHover') != ''){
		$fontFilter .= 'color: '. get_option($pego_prefix.'fontColFilterHover').'; ';
	}

	$fontFilter .= ' } ';
	
	
	
	//portfolio titles font settings
	$fontPortfTitle = ' h1.folio-title a { ';
	if (get_option($pego_prefix.'fontFamPortfTitle') != ''){
		$fontPortfTitle .= ' '. get_option($pego_prefix.'fontFamPortfTitle').' ';
	}
	if (get_option($pego_prefix.'fontSizePortfTitle') != ''){
		$fontPortfTitle .= 'font-size: '. get_option($pego_prefix.'fontSizePortfTitle').'px; ';
	}
	if (get_option($pego_prefix.'fontColPortfTitle') != ''){
		$fontPortfTitle .= 'color: '. get_option($pego_prefix.'fontColPortfTitle').'; ';
	}
	if (get_option($pego_prefix.'fontShadowPortfTitle') != ''){
		$fontPortfTitle .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowPortfTitle').'; ';
	}
	$fontPortfTitle .= ' } ';
	
	$fontPortfTitle .= ' h1.folio-title a:hover { ';
	if (get_option($pego_prefix.'fontColPortfTitleHover') != ''){
		$fontPortfTitle .= 'color: '. get_option($pego_prefix.'fontColPortfTitleHover').'; ';
	}

	$fontPortfTitle .= ' } ';
	
	
//backgrounds
	$leftSideBG = ' #leftPanel { ';
	
	if ((get_option($pego_prefix.'left_side_bg_color') != '')||(get_option($pego_prefix.'left_side_bg_image') != '')) { $leftSideBG .= ' backgorund:none;'; }
	
	
	$leftSideBG .= ' background: ';
	if (get_option($pego_prefix.'left_side_bg_color') != ''){
		$leftSideBG .=' '. get_option($pego_prefix.'left_side_bg_color').' ';						
	}
	if (get_option($pego_prefix.'left_side_bg_image') != ''){
		$leftSideBG .= ' url('. get_option($pego_prefix.'left_side_bg_image').') '. get_option($pego_prefix.'left_side_bg_tags');			
	}
	$leftSideBG .= ';  } ';
	
	
	$contentAreaBG = ' #contentHolder, #contentHolder1 { ';
	
	if ((get_option($pego_prefix.'content_area_bg_image') != '')||(get_option($pego_prefix.'content_area_bg_color') != '')) { $contentAreaBG .= ' backgorund:none;'; }
	
	$contentAreaBG .= ' background: ';
	if (get_option($pego_prefix.'content_area_bg_color') != ''){
		$contentAreaBG .=' '. get_option($pego_prefix.'content_area_bg_color').' ';						
	}
	if (get_option($pego_prefix.'content_area_bg_image') != ''){
		$contentAreaBG .= ' url('. get_option($pego_prefix.'content_area_bg_image').') '. get_option($pego_prefix.'content_area_bg_tags');			
	}
	$contentAreaBG .= ';  } ';
	
	
	//menu fonts
	$fontMenu = ' #menu > li a, li.with_ul a  { ';
	if (get_option($pego_prefix.'fontFamMenu') != ''){
		$fontMenu .= ' '. get_option($pego_prefix.'fontFamMenu').' ';
	}
	if (get_option($pego_prefix.'fontSizeMenu') != ''){
		$fontMenu .= 'font-size: '. get_option($pego_prefix.'fontSizeMenu').'px; ';
	}
	if (get_option($pego_prefix.'fontColMenu') != ''){
		$fontMenu .= 'color: '. get_option($pego_prefix.'fontColMenu').' !important; ';
	}
	if (get_option($pego_prefix.'fontShadowMenu') != ''){
		$fontMenu .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowMenu').'; ';
	}
	$fontMenu .= ' } ';
	
	
	$fontMenu .= '  #menu >li.active>a, #menu >li.active>a:hover, #menu  li a:hover { ';
	if (get_option($pego_prefix.'fontColMenuHover') != ''){
		$fontMenu .= 'color: '. get_option($pego_prefix.'fontColMenuHover').' !important; ';
	}

	$fontMenu .= ' } ';
	
	
	//submenu fonts
	$fontSubmenu = ' #menu li.with_ul ul.submenu li a { ';
	if (get_option($pego_prefix.'fontFamSubmenu') != ''){
		$fontSubmenu .= ' '. get_option($pego_prefix.'fontFamSubmenu').' ';
	}
	if (get_option($pego_prefix.'fontSizeSubmenu') != ''){
		$fontSubmenu .= 'font-size: '. get_option($pego_prefix.'fontSizeSubmenu').'px; ';
	}
	if (get_option($pego_prefix.'fontColSubmenu') != ''){
		$fontSubmenu .= 'color: '. get_option($pego_prefix.'fontColSubmenu').' !important; ';
	}
	if (get_option($pego_prefix.'fontShadowSubmenu') != ''){
		$fontSubmenu .= ' text-shadow: 0.5px 0.5px 0.5px #'. get_option($pego_prefix.'fontShadowSubmenu').'; ';
	}
	$fontSubmenu .= ' } ';
	
	
	
	//menu bg
	$bgMenu = ' #menu >li.active>a, #menu >li.active>a:hover  { ';
	if (get_option($pego_prefix.'menu_bg_1A') != ''){
		$bgMenu .= 'background-color: '. get_option($pego_prefix.'menu_bg_1A').'; ';
	}
	$bgMenu .= ' } ';
	

	$bgMenu .= ' #menu  li a:hover { ';
	if (get_option($pego_prefix.'menu_bg_1') != ''){
		$bgMenu .= 'background-color: '. get_option($pego_prefix.'menu_bg_1').'; ';
	}
	$bgMenu .= ' } ';
	
	$bgMenu2 = ' #menu li.with_ul ul.submenu li a:hover  { ';
	if (get_option($pego_prefix.'menu_bg_2') != ''){
		$bgMenu2 .= 'background-color: '. get_option($pego_prefix.'menu_bg_2').' !important; ';
	}
	$bgMenu2 .= ' } ';
	
	

	
	
	
	
//css output

	echo '<style type="text/css">';

//main template color
	echo $mainTemplateColor;	
	
	
//fonts
	echo $fontText;
	echo $fontH1;
	echo $fontH2;
	echo $fontH3;
	echo $fontH4;
	echo $fontH5;
	echo $fontList;
	echo $fontMenu;
	echo $fontSubmenu;
	echo $fontFilter;
	echo $fontPortfTitle;

//backgrounds
	echo $leftSideBG;
	echo $contentAreaBG;
	echo $bgMenu;
	echo $bgMenu2;
	
	echo '</style>';
	
	
	
	

?>

