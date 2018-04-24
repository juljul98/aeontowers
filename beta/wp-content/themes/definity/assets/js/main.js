(function($){
	'use strict';


/* --------------------------------------------------
	Initialization
-------------------------------------------------- */

    // Initialize all functions when the document is ready.
	$(document).ready(function(){

		initNavbar();
		initAnimation();
		initCircleCharts();
		initNbrCounters();
		initSliders();
		initGallery();
		initScroller();

		if ( document.getElementById('shop-slider-range') ) {
			initRangeSlider();
		}

		// Parallax disabled for mobile screens
		if ($(window).width() >= 1260 ) {

			$(window).stellar({
				hideDistantElements: false
			});
		}

	});

	// Initialize functions after elements are loaded.
	$(window).load(function() {

		// Preloader
		$('.preloader img').fadeOut(); // will first fade out the loading animation
		$('.preloader').delay(350).fadeOut('slow', function() {

		});

		initPortfolio();
		initBlogMasonry();

	});


/* --------------------------------------------------
	WordPress - Custom Edits 
-------------------------------------------------- */

	// Sidebar post single - serach widget icon
	$('.widget_search input[type="submit"]').after('<i class="fa fa-search search_widget_icon"></i>');
	$('.widget_search form input[type="text"]').attr('placeholder', 'Search...');

	// Footer Widgets - newsletter plane icon
	$('input[type="submit"].newsletter-widget-send-btn').before('<i class="fa fa-send-o footer_newsletter_send_icon"></i>');

	// Add class to open the Magnific Lightbox for the gallery items in blog post
	$('.bp-content .gallery .gallery-item .gallery-icon a').addClass('open-gallery');

	// Adds class to Crypto price change
	if ($('.ft-crypto-card')) {
		$(".change-24 .wpuc-txt:contains('-')").parent().addClass('price-down');
		$(".change-24 .wpuc-txt:contains('+')").parent().addClass('price-up');
	}
	


/* --------------------------------------------------
	Navigation | Navbar
-------------------------------------------------- */
	function initNavbar () {

		
		// Add 'navbar-ss' on mobile screens

		$(window).resize(function() {

			if ($(window).width() <= 992) {
				$('nav.d-nav').addClass('navbar-ss');
		    } else {
		    	$('nav.d-nav').removeClass('navbar-ss');
		    }

		}).resize();



		$(window).scroll(function() {

			// Trans nav handler for sticky nav

			if ($('nav').hasClass('d-nav-sticky')) {

				if ($(window).scrollTop() >= 400) {
					$('nav').removeClass('d-nav-trans', 305).animate(0);
				} else {
					if ($('nav').hasClass('d-nav-inline') || $('nav').hasClass('d-nav-full')) {
						$('nav').addClass('d-nav-trans', 305).animate(0);
					}
				}

				if ($(window).scrollTop() >= 400 && $('nav').hasClass('d-nav-float-on')) {
					$('nav').removeClass('d-nav-neue-float');
				} else if ($('nav').hasClass('d-nav-float-on')) {
					$('nav').addClass('d-nav-neue-float');
				}

				if ($(window).scrollTop() >= 150 && $(window).scrollTop() <= 400 && $('nav').hasClass('d-nav-neue')) {
					$('nav').addClass('d-nav-neue-sticky-handler');
				} else {
					$('nav').removeClass('d-nav-neue-sticky-handler');
				}

				if ($(window).scrollTop() <= 33) {
					$('.d-has-nav-extended').addClass('d-sticky-ext-spacing');
				} else {
					$('.d-has-nav-extended').removeClass('d-sticky-ext-spacing');
				}

			}

		});


		// Hamburger Button

		$('.d-mobile-nav-open').on('click', function() {
			$('#navbar').addClass('mobile-menu-open');
			$('.mobile-menu-wrapper').toggleClass('overlay-bg-on overlay-bg-off');
		});

		$('.d-mobile-nav-close').on('click', function() {
			$('#navbar').removeClass('mobile-menu-open');
			$('.mobile-menu-wrapper').toggleClass('overlay-bg-on overlay-bg-off');
		});


		//
		// Dropdown Menu
		//

		if ( $('li.menu-item').hasClass('menu-item-has-children') ) {

			// Add down icon if there is dropdown
			$('li.menu-item-has-children').append('<i class="d-sub-menu-click-tigger fa fa-angle-down"></i>');


			// Dropdown on hover/click
			if ( $('#navbar').hasClass('d-nav-sub-on-click') ) {
				$('li.menu-item-has-children').click(function(e) {
					$(this).toggleClass('sub-menu-show');
					$(this).siblings('li.menu-item-has-children').removeClass('sub-menu-show');
				});
			} else {
				$('li.menu-item-has-children').hover(function() {
					$(this).toggleClass('sub-menu-show', 300);
				});
			}
			

			$('i.d-sub-menu-click-tigger').click(function() {

				// Close the search before dropdown open (if exist)
				if ($('form.mobile-menu-search')) {
					$('form.mobile-menu-search').removeClass('mm-search-on').addClass('mm-search-off');
					$('.search-dropdown-toggle').parent('li').removeClass('current-menu-item');
				}
				
				// Open the dropdown by clicking on the arrow
				$('i.d-sub-menu-click-tigger').not(this).siblings('ul.sub-menu').removeClass('d-sub-menu-show');
				$(this).toggleClass('rotate-arrow-up').siblings('ul.sub-menu').toggleClass('d-sub-menu-show');

			});
    	}

    	// Search | Mobile Menu

    	$('.search-dropdown-toggle').click(function() {
    		$(this).parent('li').toggleClass('current-menu-item');
    		$('form.mobile-menu-search').toggleClass('mm-search-on mm-search-off');
    		$('i.d-sub-menu-click-tigger').removeClass('rotate-arrow-up').siblings('ul.sub-menu').removeClass('d-sub-menu-show');
    	});

    	$('span.form-close').click(function() {
    		$('.search-dropdown-toggle').parent('li').toggleClass('current-menu-item');
    		$('form.mobile-menu-search').toggleClass('mm-search-on mm-search-off');
    	});

    	// Nav Extended - hide 'no-text' links

    	$( "li.menu-item a:contains('no-text')" ).addClass('a-no-text').text('').parent().addClass('li-no-text');

	} // initNavbar


/* --------------------------------------------------
	Counters Circles
-------------------------------------------------- */

	function initCircleCharts () {

		$('.chart').easyPieChart({
			size: '150',
			lineWidth: 2,
			lineCap: 'square',
			trackColor: '',
		    barColor: '#f8f8f8',
		    scaleColor: false,
		    easing: 'easeOutBack',
		    animate: {
		    	duration: 1600,
		    	enabled: true 
		    }
		});
	}


/* --------------------------------------------------
	Number Counters
-------------------------------------------------- */

	function initNbrCounters () {

		$('.count-nbr').each(function () {
		    $(this).prop('Counter',0).animate({
		        Counter: $(this).text()
		    }, {
		        duration: 4700,
		        easing: 'easeOutBack',
		        step: function (now) {
		            $(this).text(Math.ceil(now));
		        }
		    });
		});
	}


/* --------------------------------------------------
	Sliders
-------------------------------------------------- */
	
	function initSliders() {

		// Testimonials Sliders
		$('.t-slider').each( function() {
			var t_slider = $(this);
			var arrows = $(this).data('arrows');
			var speed = $(this).data('speed');
			var autoplay = $(this).data('autoplay');
			var autoplay_speed = $(this).data('autoplay_speed');
			var animation = $(this).data('animation');
			var adaptive_height = $(this).data('adaptive_height');

			t_slider.slick({
				speed: speed,
				autoplay: autoplay,
				autoplaySpeed: autoplay_speed,
				fade: animation,
				slidesToShow: 1,
				slidesToScroll: 1,
				adaptiveHeight: adaptive_height,
				dots: false,
				arrows: arrows,
				prevArrow: '<button type="button" class="t-slider-nav slick-prev"><span class="linea-arrows-slim-left"></span></button>',
				nextArrow: '<button type="button" class="t-slider-nav slick-next"><span class="linea-arrows-slim-right"></span></button>',
			});
		});

		// Brands/Clients Slider
		$('.clients-slider').each( function() {
			var clients_slider = $(this);
			var speed = $(this).data('speed');
			var autoplay = $(this).data('autoplay');
			var autoplay_speed = $(this).data('autoplay_speed');
			var adaptive_height = $(this).data('adaptive_height');
			var slides_to_show = $(this).data('slides_to_show');
			var slides_to_scroll = $(this).data('slides_to_scroll');

			clients_slider.slick({
				speed: speed,
				autoplay: autoplay,
				autoplaySpeed: autoplay_speed,
				adaptiveHeight: adaptive_height,
				slidesToShow: slides_to_show, // 5
				slidesToScroll: slides_to_scroll, // 1
				dots: false,
				arrows: false,
				responsive: [
				    {
				      breakpoint: 999,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 2,
				        infinite: true,
				      }
				    },
				    {
				      breakpoint: 770,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 1
				      }
				    },
				    {
				      breakpoint: 599,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				]
			});
		});

		// Portfolio Single Slider
		$('.single-img-slider').each( function() {
			var single_img_slider = $(this);
			var speed = $(this).data('speed');
			var arrows = $(this).data('arrows');
			var dots = $(this).data('dots');
			var autoplay = $(this).data('autoplay');
			var autoplay_speed = $(this).data('autoplay_speed');
			var animation = $(this).data('animation');
			var adaptive_height = $(this).data('adaptive_height');
			var slides_to_show = $(this).data('slides_to_show');
			var slides_to_scroll = $(this).data('slides_to_scroll');

			single_img_slider.slick({
				speed: speed,
				autoplay: autoplay, // true
				autoplaySpeed: autoplay_speed, // 4000
				slidesToShow: slides_to_show, // 1
				slidesToScroll: slides_to_scroll, // 1
				adaptiveHeight: adaptive_height, // true
				fade: animation, // false
				dots: dots, // false
				arrows: arrows, // true
				prevArrow: '<button type="button" class="slider-nav sl-prev"><span class="linea-arrows-slim-left"></span></button>',
				nextArrow: '<button type="button" class="slider-nav sl-next"><span class="linea-arrows-slim-right"></span></button>',
			});
		});

	} // initSliders


/* --------------------------------------------------
	Portfolio
-------------------------------------------------- */
	
	function initPortfolio () {

		// Filters
		$('.portfolio-filters a').click(function (e) {
			  e.preventDefault();

			  $('li').removeClass('active');
			  $(this).parent().addClass('active');
		});

		
		// Full Width Gallery (3 columns)
		function pfolio3colFW () {
			
			var $container = $('#pfolio');
			// init
			$container.isotope({
				// options
				itemSelector: '.portfolio-item',
			});

			// Filter items
			$('#pfolio-filters').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({ filter: filterValue });
			});

		} // fwNogap3col


		function pfolioMasonry () {
			
			var $container = $('.pfolio-items');
			// init
			$container.isotope({
				// options
				itemSelector: '.p-item',
			    percentPosition: true,
			    layoutMode: 'packery',
			    masonry: {
			      columnWidth: '.grid-sizer'
			    }				
			});

			// Filter items
			$('#pfolio-filters').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({ filter: filterValue });
			});

		}


		// Portfolio (cutom post type)
		function pfolioCPT () {
			
			var $container = $('#pfolio-cpt');
			// init
			$container.isotope({
				// options
				itemSelector: '.pfolio-cpt-item',
				percentPosition: true,
				layoutMode: 'packery',
			});

			// Filter items
			$('#pfolio-cpt-filters').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$container.isotope({ filter: filterValue });
			});

		} // fwNogap3col


		pfolio3colFW();
		pfolioMasonry();
		if ('#pfolio-cpt') {
			pfolioCPT();
		}

	} // initPortfolio


/* --------------------------------------------------
	Light Gallery
-------------------------------------------------- */

	function initGallery () {

		// Image Lightbox
		var hasPopup = $('a').hasClass('open-gallery');

		if (hasPopup) {

			$('.open-gallery').magnificPopup({
				type:'image',
				gallery: {
				    enabled: true
				}
			});
			
		}

		// Single Image Slider Lightbox
		var hasSISPopup = $('a').hasClass('sis-open-gallery');

		if (hasSISPopup) {

			$('.sis-open-gallery').magnificPopup({
				type:'image',
				gallery: {
				    enabled: true
				}
			});
			
		}

		// Video Lightbox
		var hasVideoPopup = $('a').hasClass('popup-video');

		if (hasVideoPopup) {

			$('.popup-video').magnificPopup({
	          	disableOn: 700, 
	         	type: 'iframe',
	          	mainClass: 'mfp-fade',
	          	removalDelay: 160,
	          	preloader: false,

	          	fixedContentPos: false
			});

		}

	} // initGallery


/* --------------------------------------------------
	Blog Masonry Layout
-------------------------------------------------- */

	function initBlogMasonry () {

		var $container = $('.blog-container');
			// init
			$container.isotope({
				// options
				itemSelector: '.blog-selector',
				percentPosition: true
			});
	}
	

/* --------------------------------------------------
  Contact Pages
-------------------------------------------------- */

	$('.show-map').on('click', function(e){
	  e.preventDefault();
	  $('.contact-info-wrapper').toggleClass('map-open');
	  $('.show-info-link').toggleClass('info-open');
	});

	$('.show-info-link').on('click', function(e){
	  e.preventDefault();
	  $('.contact-info-wrapper').toggleClass('map-open');
	  $(this).toggleClass('info-open');
	});


/* --------------------------------------------------
	Scroller
-------------------------------------------------- */

	function initScroller () {

		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		      && 
		      location.hostname == this.hostname
		    ) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			      if (target.length) {
			        event.preventDefault();
			        $('html, body').animate({
			          scrollTop: target.offset().top + 15
			        }, 750, function() {
				          var $target = $(target);
				          $target.focus();
				          if ($target.is(":focus")) { // Checking if the target was focused
				            return false;
				          } else {
				            $target.attr('tabindex','-1');
				            $target.focus();
				        }
			        });
			    }
		    }
		});
	} // initScroller


/* --------------------------------------------------
	Animation
-------------------------------------------------- */

	function initAnimation () {
		
		new WOW().init();

	}

})(jQuery);