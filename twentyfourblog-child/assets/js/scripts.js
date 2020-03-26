(function($){
    "use strict";
    var scrollticker;
    var rtl           = $( 'body' ).hasClass( 'rtl' );
    var simple        = $( 'body' ).hasClass( 'style-simple' );
    var top_bar_top   = '61px';
    var header_H      = 0;
    var mobile_init_W = ( window.mfn.mobile_init ) ? window.mfn.mobile_init : 1240;
    var lightbox_attr = false;
    if( ! window.mfn_lightbox.disable ){
    	if( ! ( window.mfn_lightbox.disableMobile && ( window.innerWidth < 768 ) ) ){
    		lightbox_attr = {
				title : window.mfn_lightbox.title  ? window.mfn_lightbox.title  : false,
    		};
    	}
    }
    function adminBarH(){
    	var height = 0;
    	if( $( 'body' ).hasClass( 'admin-bar' ) ){
    		height += $( '#wpadminbar' ).innerHeight();
    	}
    	return height;
    }
	function mfn_header(){
		var rightW = $('.top_bar_right').innerWidth();
		if( rightW && ! $('body').hasClass('header-plain') ){
			rightW += 10;
		}
		var parentW = $('#Top_bar .one').innerWidth();
		var leftW = parentW - rightW;
		$('.top_bar_left, .menu > li > ul.mfn-megamenu').css( 'width', leftW );
	}
	function fixStickyHeaderH(){
		var stickyH = 0;
		var topBar = $( '.sticky-header #Top_bar' );

		if( topBar.hasClass( 'is-sticky' ) ){
			stickyH = $( '.sticky-header #Top_bar' ).innerHeight();
		} else {
			topBar.addClass( 'is-sticky' );
			stickyH = $( '.sticky-header #Top_bar' ).innerHeight();
			topBar.removeClass( 'is-sticky' );
		}
		if( $( window ).width() < mobile_init_W  ){
			if( $( window ).width() < 768 ){
				if( ! $( 'body' ).hasClass( 'mobile-sticky' ) ){
					stickyH = 0;
				}
			} else {
				if( ! $( 'body' ).hasClass( 'tablet-sticky' ) ){
					stickyH = 0;
				}
			}
		} else {
			if( $( 'body' ).hasClass( 'header-creative' ) ){
				stickyH = 0;
			}
		}
		return stickyH;
	}
	function mfn_sectionH(){
		var windowH = $( window ).height();
		var offset = 0;
		if( $( '.section.full-screen:not(.hide-desktop)' ).length > 1 ){
			offset = 5;
		}
		$( '.section.full-screen' ).each( function(){
			var section = $( this );
			var wrapper = $( '.section_wrapper', section );
			section
				.css( 'padding', 0 )
				.css( 'min-height', windowH + offset );
			var padding = ( windowH + offset - wrapper.height() ) / 2;
			if( padding < 50 ) padding = 50;
			wrapper
				.css( 'padding-top', padding + 10 )			// 20 = column margin-bottom / 2
				.css( 'padding-bottom', padding - 10 );
		});
	}
	function hashNav(){
		var hash = window.location.hash;
		if( hash ){
			if( hash.indexOf( "&" ) > -1 || hash.indexOf( "/" ) > -1 ){
				return false;
			}
			if( $( hash ).length ){
				var tabsHeaderH = $( hash ).siblings( '.ui-tabs-nav' ).innerHeight();
				$( 'html, body' ).animate({
					scrollTop: $( hash ).offset().top - fixStickyHeaderH() - tabsHeaderH - adminBarH()
				}, 500 );
			}
		}
	}
	$( document ).ready( function(){
		$( '#Top_bar' ).removeClass( 'loading' );
		top_bar_top = parseInt( $('#Top_bar').css('top'), 10 );
		if( top_bar_top < 0 ) top_bar_top = 61;
		top_bar_top = top_bar_top + 'px';
		$( '.overlay-menu-toggle' ).click( function(e){
			e.preventDefault();
			$(this).toggleClass('focus');
			$( '#Overlay' ).stop(true,true).fadeToggle(500);
			var menuH = $('#Overlay nav').height() / 2;
			$( '#Overlay nav' ).css( 'margin-top', '-' + menuH + 'px' );
		});
		$( '.responsive-menu-toggle' ).on( 'click', function(e){
			e.preventDefault();
			var el = $(this);
			var menu = $('#Top_bar #menu');
			var menuWrap = menu.closest('.top_bar_left');
			el.toggleClass('active');
			if( el.hasClass('is-sticky') && el.hasClass('active') && ( window.innerWidth < 768 ) ){
				var top = 0;
				if( menuWrap.length ){
					top = menuWrap.offset().top - adminBarH();
				}
				$('body,html').animate({
					scrollTop: top
				}, 200);
			}
			menu.stop(true,true).slideToggle(200);
		});
		function sideSlide(){
			var slide 				= $( '#Side_slide' );
			var overlay 			= $( '#body_overlay' );
			var ss_mobile_init_W 	= mobile_init_W;
			var pos 				= 'right';
			var shift_slide			= -slide.data( 'width' );
			var shift_body			= shift_slide / 2;
			var constructor = function(){
				if( ! slide.hasClass( 'enabled' ) ){
					$( 'nav#menu' ).detach().appendTo( '#Side_slide .menu_wrapper' );
					slide.addClass( 'enabled' );
				}
			};
			var destructor = function(){
				if( slide.hasClass( 'enabled' ) ){
					close();
					$( 'nav#menu' ).detach().prependTo( '#Top_bar .menu_wrapper' );
					slide.removeClass( 'enabled' );
				}
			};
			var reload = function(){
				if( ( window.innerWidth < ss_mobile_init_W ) ){
					constructor();
				} else {
					destructor();
				}
			};
			var init = function(){
				if( slide.hasClass( 'left' ) ){
					pos = 'left';
				}
				if( $( 'body' ).hasClass( 'responsive-off' ) ){
					ss_mobile_init_W = 0;
				}
				if( $( 'body' ).hasClass( 'header-simple' ) ){
					ss_mobile_init_W = 9999;
				}
				reload();
			};
			var reset = function( time ){
				$( '.lang-active.active', slide ).removeClass('active').children('i').attr('class','icon-down-open-mini');
				$( '.lang-wrapper', slide ).fadeOut(0);
				$( '.icon.search.active', slide ).removeClass('active');
				$( '.search-wrapper', slide ).fadeOut(0);
				$( '.menu_wrapper, .social', slide ).fadeIn( time );
			};
			var button = function(){
				if( pos == 'left' ){
					slide.animate( { 'left': 0 }, 300 );
					$('body').animate( { 'right': shift_body }, 300 );
				} else {
					slide.animate( { 'right': 0 }, 300 );
					$('body').animate( { 'left': shift_body }, 300 );
				}
				overlay.fadeIn(300);
				reset(0);
			};
			var close = function(){
				if( pos == 'left' ){
					slide.animate( { 'left': shift_slide }, 300 );
					$('body').animate( { 'right': 0 }, 300 );
				} else {
					slide.animate( { 'right': shift_slide }, 300 );
					$('body').animate( { 'left': 0 }, 300 );
				}
				overlay.fadeOut(300);
			};
			$( '.icon.search', slide ).on( 'click', function(e){
				e.preventDefault();
				var el = $(this);
				if( el.hasClass('active') ){
					$( '.search-wrapper', slide ).fadeOut(0);
					$( '.menu_wrapper, .social', slide ).fadeIn(300);
				} else {
					$( '.search-wrapper', slide ).fadeIn(300);
					$( '.menu_wrapper, .social', slide ).fadeOut(0);
					$( '.lang-active.active', slide ).removeClass('active').children('i').attr('class','icon-down-open-mini');
					$( '.lang-wrapper', slide ).fadeOut(0);
				}
				el.toggleClass('active');
			});
			$( 'a.submit', slide ).on( 'click', function(e){
				e.preventDefault();
				$('#side-form').submit();
			});
			init();
			$( '.responsive-menu-toggle' ).off( 'click' );
			$( '.responsive-menu-toggle' ).on( 'click', function(e){
				e.preventDefault();
				button();
			});
			overlay.on( 'click', function(e){
				close();
			});
			$( '.close', slide ).on( 'click', function(e){
				e.preventDefault();
				close();
			});
			$( slide ).on( 'click', function(e){
				if( $( e.target ).is( slide ) ){
					reset(300);
				}
			});
			$( window ).on( 'debouncedresize', reload );
		}
		if( $( 'body' ).hasClass( 'mobile-side-slide' ) ){
			sideSlide();
		}
		function mainMenu(){
			var mm_mobile_init_W = mobile_init_W;
			if( $( 'body' ).hasClass( 'header-simple' ) || $( '#Header_creative.dropdown' ).length ){
				mm_mobile_init_W = 9999;
			}
			$( '#menu > ul.menu' ).mfnMenu({
				addLast		: true,
				arrows		: true,
				mobileInit	: mm_mobile_init_W,
				responsive	: window.mfn.responsive
			});
			$( '#secondary-menu > ul.secondary-menu' ).mfnMenu({
				mobileInit	: mm_mobile_init_W,
				responsive	: window.mfn.responsive
			});
		}
		mainMenu();
		var cHeader 	= 'body:not( .header-open ) #Header_creative';
		var cHeaderEl 	= $( cHeader );
		var cHeaderCurrnet;
		function creativeHeader(){
			$( '.creative-menu-toggle' ).click( function(e){
				e.preventDefault();
				cHeaderEl.addClass( 'active' );
				$( '.creative-menu-toggle, .creative-social', cHeaderEl ).fadeOut( 500 );
				$( '#Action_bar', cHeaderEl ).fadeIn( 500 );
			});

		}
		creativeHeader();
		$( document ).on( 'mouseenter', cHeader, function(){
			cHeaderCurrnet = 1;
		});
		$( document ).on( 'mouseleave', cHeader, function(){
			cHeaderCurrnet = null;
		    setTimeout(function(){
		    	if ( ! cHeaderCurrnet ){
		    		cHeaderEl.removeClass( 'active' );
		    		$( '.creative-menu-toggle, .creative-social', cHeaderEl ).fadeIn( 500 );
		    		$( '#Action_bar', cHeaderEl ).fadeOut( 500 );
		    	}
		    }, 1000);
		});
		function creativeHeaderFix(){
			if( $( 'body' ).hasClass( 'header-creative' ) && window.innerWidth >= 768 ){
				if( $( '#Top_bar' ).hasClass( 'is-sticky' ) ){
					$( '#Top_bar' ).removeClass( 'is-sticky' );
				}
			}
		}
		$("#search_button:not(.has-input), #Top_bar .icon_close").click(function(e){
			e.preventDefault();
			$('#Top_bar .search_wrapper').fadeToggle().find('.field').focus();
		});
		$("#search_button").click(function(event) {
			$('input.submit').css({
				display: 'block',
				position: 'absolute'
			});
		});
        $( '.tooltip, .hover_box' )
        .bind( 'touchstart', function(){
            $( this ).toggleClass( 'hover' );
        })
        .bind( 'touchend', function(){
            $( this ).removeClass( 'hover' );
        });
        if( $('body').hasClass('nice-scroll-on') && window.innerWidth >= 768 && ! navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/))
        {
        	$('html').niceScroll({
        		autohidemode		: false,
        		cursorborder		: 0,
        		cursorborderradius	: 5,
        		cursorcolor			: '#222222',
        		cursorwidth			: 10,
        		horizrailenabled	: false,
        		mousescrollstep		: ( window.mfn.nicescroll ) ? window.mfn.nicescroll : 40,
        		scrollspeed			: 60
        	});
        	$('body').removeClass('nice-scroll-on').addClass('nice-scroll');
	    }
		$( 'a.button_js' ).each(function(){
			var btn = $(this);
			if( btn.find('.button_icon').length && btn.find('.button_label').length ){
				btn.addClass('kill_the_icon');
			}
		});
		$('.fixed-nav').appendTo( 'body' );
		function checkIE(){
			var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");
	        if( msie > 0 && parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 9 ){
	        	$("body").addClass("ie");
			}
		}
		checkIE();
		$('#back_to_top').click(function(){
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		function isotopeFilter( domEl, isoWrapper ){
			var filter = domEl.attr('data-rel');
			isoWrapper.isotope({ filter: filter });
      		setTimeout( function(){
				$( window ).trigger( 'resize' );
			}, 50 );
		}
		$( window ).bind( 'debouncedresize', function(){
			mfn_header();
			mfn_sectionH();
			creativeHeaderFix();
		});
		mfn_header();
		mfn_sectionH();
	});
	$( window ).load( function(){
		function retinaLogo(){
			if( window.devicePixelRatio > 1 ){
				var el 		= '';
				var src 	= '';
				var height 	= '';
				var parent 	= $( '#Top_bar #logo' );
				var parentH	= parent.data( 'height' );
				var maxH	= {
					sticky : {
						init 			: 35,
						no_padding		: 60,
						overflow 		: 110
					},
					mobile : {
						mini 			: 50,
						mini_no_padding	: 60
					},
					mobile_sticky : {
						init 			: 50,
						no_padding		: 60,
						overflow 		: 80
					}
				};
				$( '#Top_bar #logo img' ).each( function( index ){
					el 		= $( this );
					src 	= el.data( 'retina' );
					height 	= el.height();
					if( el.hasClass( 'logo-main' ) ){
						if( $( 'body' ).hasClass( 'logo-overflow' ) ){
						} else if( height > parentH ){
							height = parentH;
						}
					}
					if( el.hasClass( 'logo-sticky' ) ){
						if( $( 'body' ).hasClass( 'logo-overflow' ) ){
							if( height > maxH.sticky.overflow ){
								height = maxH.sticky.overflow;
							}
						} else if( $( 'body' ).hasClass( 'logo-no-sticky-padding' ) ){
							if( height > maxH.sticky.no_padding ){
								height = maxH.sticky.no_padding;
							}
						} else if( height > maxH.sticky.init ){
							height = maxH.sticky.init;
						}
					}
					if( el.hasClass( 'logo-mobile' ) ){
						if( $( 'body' ).hasClass( 'mobile-header-mini' ) ){
							if( parent.data( 'padding' ) > 0 ){
								if( height > maxH.mobile.mini ){
									height = maxH.mobile.mini;
								}
							} else {
								if( height > maxH.mobile.mini_no_padding ){
									height = maxH.mobile.mini_no_padding;
								}
							}
						}
					}
					if( el.hasClass( 'logo-mobile-sticky' ) ){
						if( $( 'body' ).hasClass( 'logo-no-sticky-padding' ) ){
							if( height > maxH.mobile_sticky.no_padding ){
								height = maxH.mobile_sticky.no_padding;
							}
						} else if( height > maxH.mobile_sticky.init ){
							height = maxH.mobile_sticky.init;
						}
					}
					if( src ){
						el.parent().addClass( 'retina' );
						el.attr( 'src', src ).css( 'max-height', height + 'px' );
					}

				});

			}
		}
		retinaLogo();
		mfn_sectionH();
		$( window ).trigger( 'resize' );
	});
})(jQuery);