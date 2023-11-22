$(document).ready(function () {

	$(".owl-carousel").on("initialized.owl.carousel", () => {
		setTimeout(() => {
			$(".owl-item.active .owl-slide-animated").addClass("is-transitioned");
			$("section").show();
		}, 200);
	});
	

	const $owlCarousel = $(".owl-carousel").owlCarousel({
		items: 1,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		loop: true,
		// animateOut: 'animate__backOutLeft',
		// animateIn: 'animate__backInLeft',
		nav: true,
		navText: [
			'<i class="fa-regular fa-chevron-left"></i>',
			'<i class="fa-regular fa-chevron-right"></i>' /* icons from https://iconmonstr.com */],
		dotsContainer: $('.owl-dots'),
		navContainer: $('.slider_nav')
	// 	responsive:{
	// 		0:{
	// 			dotsEach: 5
	// 		},
	// 		600:{
	// 			dotsEach: 2
	// 		},
	// 		1000:{
	// 			dotsEach: 2
	// 		}
	//   }
	});

	// function callback(event) {
	// 	var itemsa = event.item.count;
	// 	if (itemsa > 10) {
	// 	  //if total count of items = 1 - we change value        
	// 	  var navValue = 6;
	// 	  //check if changed
	// 	  console.log('New nav value = ' + navValue);
	// 	}
	//  };


	$owlCarousel.on("changed.owl.carousel", e => {
		$(".owl-slide-animated").removeClass("is-transitioned");

		const $currentOwlItem = $(".owl-item").eq(e.item.index);
		$currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");

		const $target = $currentOwlItem.find(".owl-slide-text");
		doDotsCalculations($target);
	});

	$owlCarousel.on("resize.owl.carousel", () => {
		setTimeout(() => {
			setOwlDotsPosition();
		}, 50);
	});

	/*if there isn't content underneath the carousel*/
	//$owlCarousel.trigger("refresh.owl.carousel");

	setOwlDotsPosition();

	function setOwlDotsPosition() {
		const $target = $(".owl-item.active .owl-slide-text");
		doDotsCalculations($target);
	}

	function doDotsCalculations(el) {
		const height = el.height();
		const { top, left } = el.position();
		const res = height + top + 20;

		$(".owl-carousel .owl-dots").css({
			top: `${res}px`,
			left: `${left}px`
		});

	}
});