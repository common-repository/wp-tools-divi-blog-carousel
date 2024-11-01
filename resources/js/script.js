function wptools_blog_carousel_slick_init(){
	jQuery('section.et_pb_wptools_blog_carousel').each(function(){
		var el = jQuery(this);
		if(!el.data('slick-initialised')){
			// console.log('here', el.data('carousel-props'));
			el.slick(el.data('carousel-props'))
				.on('setPosition', function (event, slick) {
				    slick.$slides.css('height', slick.$slideTrack.height() + 'px');
				});
			el.data('slick-initialised', true);
		} else {
			el.slick('unslick');
		}
	});

}

jQuery(document).ready(function($) {
	wptools_blog_carousel_slick_init();
});