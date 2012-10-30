function addAllListeners() {
    jQuery('.pagin>ul>li>a').hover(
        function(){
            if (!jQuery(this).parent().hasClass('active'))
                jQuery(this).stop().animate({'backgroundPosition':'center top'},300,'easeOutExpo');
        },
        function(){
            if (!jQuery(this).parent().hasClass('active'))
                jQuery(this).stop().animate({'backgroundPosition':'center bottom'},500,'easeOutCubic');
        }
    );
    jQuery('.soc_icons>li>a').hover(
        function(){
            jQuery(this).children('img').stop().animate({'top':'-15px'},350,'easeOutExpo');
        },
        function(){
            jQuery(this).children('img').stop().animate({'top':'0'},600,'easeOutCubic');
        }
    );
    jQuery('.scrollDown').hover(
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center top'},300,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center bottom'},500,'easeOutExpo');
        }
    );
    jQuery('.scrollUp').hover(
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center bottom'},300,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center top'},500,'easeOutExpo');
        }
    );    
   jQuery('.scrollDownS').hover(
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center top'},300,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center bottom'},500,'easeOutExpo');
        }
    );
    jQuery('.scrollUpS').hover(
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center bottom'},300,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'backgroundPosition':'center top'},500,'easeOutExpo');
        }
    );    
    jQuery('.list1>li>figure>a,.imHolder1, .list3>li>a').hover(
        function(){
            jQuery(this).children('img:first-child').stop().animate({'opacity':'1'},400,'easeOutExpo');
        },
        function(){
            jQuery(this).children('img:first-child').stop().animate({'opacity':'0'},700,'easeOutCubic');
        }
    );
    var val1 = jQuery('.readMore').css('color');
    var val2 = jQuery('.readMore').css('backgroundColor');
    jQuery('.readMore').hover(
        function(){
            jQuery(this).stop().animate({'color':'#b33232','backgroundColor':'#fff'},400,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'color':val1,'backgroundColor':val2},600,'easeOutCubic');
        }
    );
    var val3 = jQuery('.list2>li>a').css('color');
    jQuery('.list2>li>a').hover(
        function(){
            jQuery(this).stop().animate({'color':'#fff','paddingLeft':'16px'},400,'easeOutExpo');
        },
        function(){
            jQuery(this).stop().animate({'color':val3,'paddingLeft':'0'},600,'easeOutCubic');
        }
    );
}

function showSplash(){
    content.stop().animate({'width':'0'},400,'easeInOutExpo');
	
}

function hideSplash(){
	var sirina='660px';
	if(isResponsive == 'AmResponsive') {
		
		var window_W = jQuery(document).width();
		if (window_W < 960) {sirina='528px';}
		if (window_W < 768) {sirina='460px';}
	}


	content.stop().animate({'width':'0'},400,'easeInOutExpo')
        .delay(250)
        .animate({'width':sirina},700,'easeOutExpo');
}

function hideSplash2(){
	var sirina='660px';
	if(isResponsive == 'AmResponsive') {
		var window_W = jQuery(document).width();
		if (window_W < 960) {sirina='528px';}
		if (window_W < 768) {sirina='460px';}
	}
		
    content.stop().animate({'width':sirina},800,'easeInOutExpo');
}


function hideSplashQ(){
    content.css({'width':'0'});
}

jQuery(document).ready(ON_READY);
function ON_READY() {
    /*SUPERFISH MENU*/
    jQuery('#menu').superfish({
      delay:       700,
      animation:   {height:'show'},
      speed:       450,
      autoArrows:  false,
      dropShadows: false
    });
	 
	 
	 (function(jQuery,sr){
 
  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;
 
      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null; 
          };
 
          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);
 
          timeout = setTimeout(delayed, threshold || 100); 
      };
  }
	// smartresize 
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
 
})(jQuery,'smartresize');	


jQuery(window).smartresize(function(){    
	var sirina='660px';	
	if(isResponsive == 'AmResponsive') {
		var window_W = jQuery(document).width();
		if (window_W < 960) {sirina='528px';}
		if (window_W < 768) {sirina='460px';}
		
	}
		content.stop().animate({'width':sirina},800,'easeInOutExpo');
	});
   
	 
	 
	 
	 
	     jQuery('.scroll').cScroll({
        duration: 500,
        easing: 'easeOutExpo',
        step:'335px'
    });
    jQuery('.scrollUp').click(function(){
		jQuery(this).parent().siblings('.scroll').cScroll('up')
		return false;
    });
    jQuery('.scrollDown').click(function(){
		jQuery(this).parent().siblings('.scroll').cScroll('down')
		return false;
    });
	 
	
	
	
	
	
	var containerS = jQuery('.around-foliosS');

	// initialize isotope

	      containerS.isotope({
        itemSelector : '.folio-item'
      });
	
	 var optionSetsS = jQuery('.option-setS'),
          optionLinksS = optionSetsS.find('a');

      optionLinksS.click(function(){
        var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var optionSet = $this.parents('.option-setS');
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
          containerS.isotope( options );
        }
        
        return false;
      });
	
	
	
	
	
}

jQuery(window).load(function (){
    //MSIE = (jQuery.browser.msie) && (jQuery.browser.version <= 8);
    jQuery('.spinner').fadeOut();
	
	//fancybox

	jQuery('a.portfPic').fancybox({
        'overlayColor'  :   '#1c1c1c',
        'transitionIn'	:	'elastic',
       	'transitionOut'	:	'elastic',
    	'speedIn'		:	500, 
    	'speedOut'		:	300
     });
	 
	  jQuery('a.iframe').fancybox({
	  'width'           : '70%',
	  'height'          : '70%',
	  'type'            : 'iframe',
      'transitionIn'	:	'elastic',
      'transitionOut'	:	'elastic',
	  'speedIn'			:	500, 
      'speedOut'		:	300
     });


	     jQuery('.scrollS').cScroll({
        duration: 500,
        easing: 'easeOutExpo',
        step:'335px'
    });
    jQuery('.scrollUpS').click(function(){
		jQuery(this).parent().siblings('.scrollS').cScroll('up')
		return false;
    });
    jQuery('.scrollDownS').click(function(){
		jQuery(this).parent().siblings('.scrollS').cScroll('down')
		return false;
    });
	
	 /*	Portfolio hover start */
	 
	var galleryColumnBoxes = jQuery('.columnBox-portfolio');
	galleryColumnBoxes.live({
	    mouseenter: function(){ // hover in
            var img = jQuery(this).find('a').children('img');
            var overlay = jQuery(this).find('.overlay');
            img.stop().animate({
                opacity: 0.5
            });
            
            overlay.css('left','-500px');
            overlayPos = (img.width()/2) - (overlay.width()/2-8);
            overlay.stop().animate({
                left: overlayPos
            });
        },
        mouseleave: function(){ // hover out
            var img = jQuery(this).find('a').children('img');
            var overlay = jQuery(this).find('.overlay');
                img.stop().animate({
                opacity: 1
            });
            overlay.stop().animate({
                left: 500
            });
        }
	});
	 /*	Portfolio hover end */
	
	
	
    
    jQuery('.list1>li>figure>a, .imHolder1, .list3>li>a').attr('rel','Appendix').fancybox({
        'centerOnScroll' : true,
        'overlayColor' : '#000'
    })
    .children('img:first-child').css({'opacity':'0'});
        

    
    //content switch
    content = jQuery('#contentHolder');
	var stevec=0;
	var homepage = jQuery('#homepage');
	var singlePage = jQuery('#pageSingleBlog');
    content.tabs({
        show:0,
        preFu:function(_){
            _.li.css({'visibility':'hidden'});	
            hideSplashQ();	
        },
        actFu:function(_){ 
			
			if (_.n == -1){ 
					stevec++;
					
					if (stevec > 1) {
						hideSplash(); 
					}
					homepage.stop().delay(400).show().animate({'left':'0px'},{duration:1000,easing:'easeOutExpo'});
					homepage.css({'height':'1200px'}); 
				
				
				
					singlePage.stop().delay(400).show().animate({'left':'0px'},{duration:1000,easing:'easeOutExpo'});
					singlePage.css({'height':'1200px', 'visibility':'visible'}); 
				
			 } 
			 else
			 {                    
                homepage.css({'left':'-660px'});        
			 }	
			 
            if (_.n == 0){
			
                showSplash()
            } else {
                if (_.curr) {
                    h = parseInt(_.curr.css('height'));
                    content.find('>ul').css({'height':h});
                    if (_.pren == 0) {
                        $(window).trigger('resize');
						
                        hideSplash2();
                    } else {
					
                        hideSplash();
                    }
                }
            }
            if(_.curr){
                _.curr
                    .css({'left':'-660px','visibility':'visible'}).stop(true).delay(400).show().animate({'left':'0px'},{duration:1000,easing:'easeOutExpo'});
            }   
    		if(_.prev){
  		        _.prev
                    .show().stop(true).animate({'left':'-660px'},{duration:400,easing:'easeInOutExpo',complete:function(){
                            if (_.prev){
                                _.prev.css({'visibility':'hidden'});
                            }
                        }
		              });
            }       
  		}
    });
    defColor = jQuery('#menu>li>a').eq(0).css('color'); 
    var nav = jQuery('.menu');
    nav.navs({
		useHash:true,
        defHash: '#!/',
		hoverIn:function(li){
		   	jQuery('>a',li).stop().animate(250,'easeOutSine');
		},
		hoverOut:function(li){
		    if (!li.hasClass('with_ul') || !li.hasClass('sfHover')){
                jQuery('>a',li).stop().animate(250,'easeOutSine');
            }
		}	
    })
    .navs(function(n){	
   	    content.tabs(n);
   	});
        
    setTimeout(function(){
        jQuery('#bgStretch').bgStretch({
    	   align:'leftTop',
           autoplay: false,
           navs:jQuery('.pagin').navs({})
        })
        .sImg({
            sleep: 1000,
            spinner:jQuery('<div class="spinner spinner_bg"></div>').css({'opacity':.5}).stop().hide(3000)
        });
    },0);
    
    setTimeout(function(){  jQuery('body').css({'overflow':'visible'}); },300);    
    addAllListeners();
    jQuery(window).trigger('resize');
});



//portfolio slider
jQuery(document).ready(function($) {
	jQuery('.portfolio-slider .slides').slides({
		preload: true,
		generateNextPrev: true,
		generatePagination: false,
		autoHeight: true,
		slideSpeed: 1000,
		play: 3500
	});	
});

//blog slider
jQuery(document).ready(function($) {
	jQuery('.blog-slider .slides').slides({
		preload: true,
		generateNextPrev: true,
		generatePagination: false,
		autoHeight: true,
		slideSpeed: 1000,
		play: 3500
	});	
});

/* Dropdown Menu */
jQuery(document).ready(function($){
	jQuery('.menu ul#menu').mobileMenu({
    	defaultText: 'Navigate to...',
    	className: 'select-menu',
    	subMenuDash: '&nbsp;&nbsp;&nbsp;&ndash;'
	});	 	
});


/* home slider */
jQuery(document).ready(function($) {
	$('.home-slider .slides').slides({
		preload: true,
		generateNextPrev: true,
		generatePagination: false,
		autoHeight: true,
		slideSpeed: 1000,
		play: 3500
	});	
});
