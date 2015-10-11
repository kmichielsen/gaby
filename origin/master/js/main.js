


(function($){

	//cache nav
	var nav = $("#topNav");
	/* 
	 * navigation
	 */

	//add indicators and hovers to submenu parents
	nav.find("li").each(function() {
		if ($(this).find("ul").length > 0) {
			
			// $("<span>").text("^").appendTo($(this).children(":first"));

			//show subnav on hover
			$(this).mouseenter(function() {
				$(this).find("ul").stop(true, true).slideDown();
			});
					
			//hide submenus on exit
			$(this).mouseleave(function() {
				$(this).find("ul").stop(true, true).slideUp();
			});
		}
	});

	var stickyNav = function(){
		var stickyNavTop = nav.offset().top;
		var scrollTop = $(window).scrollTop();
		if (scrollTop > stickyNavTop) { 
		    $('#topNav').addClass('sticky');
		} else {
		    $('#topNav').removeClass('sticky'); 
		}
	};

	/* 
	 * navigation / sticky header
	 */
	stickyNav();
	 
	$(window).scroll(function() {
	    stickyNav();
	});

	/* 
	 * gallery / swiper
	 */
	var mySwiper = new Swiper('.swiper-container', {
		speed: 800,
		pagination: '.swiper-pagination',
    	paginationClickable: true
		});   

})(jQuery);