/**
 * Load content via Ajax call.
 * Beside open content in a overlay by requesting the showOverlay method.
 */
var loadContent = function(url){
	$.ajax({
		url:url + '.content'
	}).done(function(html){
		showOverlay(html);
	});

}
/**
 * Display overlay, by handling clicks, the content will be given with a parameter.
 */
 var showOverlay = function(content){
 	var overlay = $(".p-overlay");
 	overlay.find('.p-overlay-content').html(content);

 	//Handle header
 	 $('header').fadeOut(200);
 	 //Add class to disable page scrolling, and scroll only in overlay.
 	 $('body').addClass('p-overlay-body');

 	overlay.find(".p-close").click(function(){hideOverlay()});
 	overlay.fadeIn(500);
 }

/**
 * Hide the overlay on close.
 */
 var hideOverlay = function(){
 	var overlay = $(".p-overlay");
 	overlay.fadeOut(500);

 	$('header').fadeIn(200);
 	stickyNav();
 	$('body').removeClass('p-overlay-body');
 }

/**
 * Open overlay.
 */
$("a[data-overlay]").click(function(){
	//Prevent handling normal anchor click
	event.preventDefault()
	//Get url and open ion overlay.
	loadContent($(this).attr('href'));
});
