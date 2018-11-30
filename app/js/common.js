$(function() {

	$(window).on('load', function() {
		$('.preloader').delay(1000).fadeOut('slow');
	});

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

	var mixer = mixitup('.portfolio-mix');

	//E-mail Ajax Send
	$(".callback").submit(function() { //Change class
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change if file is not in folder
			data: th.serialize()
		}).done(function() {
			$(th).find('.success').addClass('active').css('display', 'flex').hide().fadeIn(); //Change alert
			setTimeout(function() {
				// Done Functions
				$(th).find('.success').removeClass('active').fadeOut();
				th.trigger("reset");
			}, 5000);
		});
		return false;
	});


	$(window).scroll(function() {
	if ($(window).scrollTop() > $(window).height()) {
		$('.top').addClass('active');
	} else {
		$('.top').removeClass('active');
	}
	});
	$('.top').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
	});


	
});
