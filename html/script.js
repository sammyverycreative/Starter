jQuery(document).ready(function($) {

	// IE Alert
	/*$("body").iealert();*/

	// MMENU
	/*$('.menu-toggle').on('click', function (e) {
	    e.preventDefault();
	    $('body').toggleClass('menu-open');
	});

	$(document).on('click','.menu-open .menu-item-has-children > a',function(e){
	    console.log(e);
	    e.preventDefault();
	    $(this).parent().find('.sub-menu').toggleClass('active');
	    return false;
	});*/

	// mmenu (jquery)
	/*document.addEventListener(
        "DOMContentLoaded", () => {
        new Mmenu( "#my-menu", {
           "extensions": [
              "pagedim-black",
              "position-right"
           ],
           "iconPanels": true
        });
        }
    );*/

	// OTHERS
	//don't handle clicks for empty anchors
	/*$('a[href=""],a[href="#"]').on('click',function(e){
		e.preventDefault();
	});*/

	// AOS
	/*AOS.init({
		data-aos-offset: 120, //Change offset to trigger animations sooner or later (px)
		data-aos-duration: 400, //Duration of animation (ms)
		data-aos-easing: 'ease', //Choose timing function to ease elements in different ways
		data-aos-delay: 0, //Delay animation (ms)
		data-aos-anchor: 'null', //Anchor element, whose offset will be counted to trigger animation instead of actual elements offset
		data-aos-anchor-placement: 'top-bottom', //Anchor placement - which one position of element on the screen should trigger animation
		data-aos-once: false //Choose wheter animation should fire once, or every time you scroll up/down to element
	});*/

	// Fancybox
	//$(".fancybox").fancybox();

	// Slick
	/*$('.single-item').slick(
	//{
	//  option: value,
	//}
	);*/

	// Accordition
	/*$('.accordion-header').click(function(){
		$(this).parent().find('.accordion-hidden-content').slideToggle();
		$(this).parent().toggleClass('active');
		$(this).parent().siblings().find('.accordion-hidden-content').slideUp();
		$(this).parent().siblings().removeClass('active');
	});*/

	// Tabs
	/*$('.tabs-wrapper .navigator .tab-selector').on('click', function() {
		$('.tabs-wrapper .navigator .tab-selector.active').removeClass('active blue').addClass('grey');
		$(this).addClass('active blue');
		$(this).removeClass('grey');

		$('.tabs-wrapper .tab-wrapper .tab.active').removeClass('active');
		$($('.tabs-wrapper .tab-wrapper .tab').get($(this).index())).addClass('active');
	});*/

});

// MOBILE MENU
/*$(window).on('load', function() {
 $('#mobile-navigation-menu').removeClass('hide');
});*/