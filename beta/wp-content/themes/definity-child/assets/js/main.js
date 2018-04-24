
jQuery(document).ready(function(){
	jQuery(window).scroll(function(){
		if ( jQuery(this).scrollTop() >= jQuery('#welcome').offset().top) {
			jQuery('.mainNav').removeClass('active');
			jQuery('.nextNav').addClass('active');
		} else {
			jQuery('.mainNav').addClass('active');
			jQuery('.nextNav').removeClass('active');
		}
	});

    jQuery('.commercial-slider').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      centerPadding: '60px',
      prevArrow: jQuery('.commercial-slider-pager .pager-prev'),
      nextArrow: jQuery('.commercial-slider-pager .pager-next'),
      responsive: [
        {
          breakpoint: 968,
          settings: {
            autoPlay: true,
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
            }
        }, {
          breakpoint: 568,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        }]
    });

    jQuery('.vivid-slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: jQuery('.vivid-slider-pager .pager-prev'),
      nextArrow: jQuery('.vivid-slider-pager .pager-next')
    });
    
	
 	var prev; //keep track of previous selected link
    var isVisible= function(el){
        el = jQuery(el);
        
        if(!el || el.length === 0){
            return false
        };

        var docViewTop = jQuery(window).scrollTop();
        var docViewBottom = docViewTop + jQuery(window).height();
        
        var elemTop = el.offset().top;
        var elemBottom = elemTop + el.height();
        return ((elemBottom >= docViewTop) && (elemTop <= (docViewBottom)));
    }
        
    jQuery(window).scroll(function(){

      jQuery(".parallax").css("background-position","100% " + (jQuery(this).scrollTop() / 25) + "px");
        jQuery('.navbar-nav li a').each(function(index, el){

            el = jQuery(el);
            console.log(isVisible(el.attr('href')));
            if(isVisible(el.attr('href'))){
                if(prev){
                    prev.parent().removeClass('active');
                }
                el.parent().addClass('active');
                prev = el;
                
                //break early to keep highlight on the first/highest visible element
                //remove this you want the link for the lowest/last visible element to be set instead
                return false; 
            }
        });
    });
    
    //trigger the scroll handler to highlight on page load
    jQuery(window).scroll();
  
});