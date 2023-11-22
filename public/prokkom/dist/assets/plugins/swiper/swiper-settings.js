var swiper = new Swiper('.swiper__testimonials', {
	slidesPerView: 3,
	spaceBetween: 10,
	freeMode: true,
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	breakpoints: {
		640: {
			slidesPerView: 1,
			spaceBetween: 10,
		},
		768: {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		1024: {
			slidesPerView: 3,
			spaceBetween: 20,
		},
	},
	scrollbar: {
		el: '.swiper-scrollbar',
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
})
