$(document).ready(function () {
  $('.partners-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: true,
    dots: false,
    prevArrow: "<button class='slick-prev pull-left'>Back<i class='fa-solid fa-circle-chevron-left'></i></button>",
    nextArrow: "<button class='slick-next pull-right'><i class='fa-solid fa-circle-chevron-right'></i>Next</button>",
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 3,
          arrows: false,
        },
      },
    ],
  })

  $('.more-news').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    loop: true,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: true,
    dots: false,
    prevArrow: "<button class='slick-prev pull-left'><span>Back</span><i class='fa-solid fa-circle-chevron-left'></i></button>",
    nextArrow: "<button class='slick-next pull-right'><i class='fa-solid fa-circle-chevron-right'></i><span>Next</span></button>",
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 1,
          arrows: true,
        },
      },
    ],
  })

  $('.branch-slide').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    loop: false,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: true,
    dots: false,
    prevArrow: "<button class='slick-prev pull-left'><i class='fa-solid fa-circle-chevron-left'></i></button>",
    nextArrow: "<button class='slick-next pull-right'><i class='fa-solid fa-circle-chevron-right'></i></button>",
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 1,
          arrows: true,
        },
      },
    ],
  })
})

$('.main-slide').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav',
  prevArrow: "<button class='slick-prev pull-left'><i class='fa-solid fa-circle-chevron-left'></i></button>",
  nextArrow: "<button class='slick-next pull-right'><i class='fa-solid fa-circle-chevron-right'></i></button>",
})

$('.slider-nav').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.main-slide',
  dots: false,
  centerMode: false,
  focusOnSelect: false,
  prevArrow: '<button class="slick-prev "><i class="fa-regular fa-arrow-left"></i></button>',
  nextArrow: '<button class="slick-next "><i class="fa-regular fa-arrow-right"></i></button>',
  responsive: [
    {
      breakpoint: 768,
      settings: {
        centerMode: false,
        slidesToShow: 1,
      },
    },
    {
      breakpoint: 520,
      settings: {
        centerMode: false,
        slidesToShow: 4,
        arrows: false,
      },
    },
  ],
})
  ; ('use strict')
$('.partners__slide').length &&
  $('.partners__slide').each(function (s, e) {
    var o = $(this).attr('id'),
      i = '#' + o + '-arrows'
    $('#' + o).slick({
      infinite: !0,
      slidesToShow: 7,
      slidesToScroll: 1,
      autoplay: !0,
      dots: !1,
      arrows: !0,
      speed: 1e3,
      loop: !0,
      adaptiveHeight: !0,
      responsive: [
        { breakpoint: 1025, settings: { slidesToShow: 3, slidesToScroll: 1 } },
        { breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 1 } },
        { breakpoint: 480, settings: { slidesToShow: 2, slidesToScroll: 1, centerMode: false, arrows: !1 } },
      ],
      prevArrow: '<button class="slick-prev"><i class="fa-regular fa-chevron-left"></i></button>',
      nextArrow: '<button class="slick-next"><i class="fa-regular fa-chevron-right"></i></button>',
      appendArrows: i,
    })
  })
