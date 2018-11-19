$(function() {

	$(".owl-carousel").owlCarousel({
		loop:true,
		items: 4,
		nav:false,
		dots:false,
		autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        580:{
            items:2,
            nav:false
        },
        770:{
            items:3,
            nav:false
        },
        992:{
            items:4,
            nav:false
        }
    }
	});


	$('#nav-icon').click(function() {
		$(this).toggleClass('open');
		$('.menu').slideToggle('fast');
	});

	$('.s-main').slick({
		slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 5000,
		dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear',
	});

	var mixer = mixitup('.portfolio-container');

	$(window).scroll(function() {
	if ($(this).scrollTop() > $(this).height()) {
		$('.top').addClass('active');
	} else {
		$('.top').removeClass('active');
	}
	});
	$('.top').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
	});


	
});
