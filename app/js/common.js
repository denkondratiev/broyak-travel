$(function() {

	$('.s-main').slick({
		slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 5000,
		dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear'
	});


	var mixer = mixitup('.portfolio-container');
	
});
