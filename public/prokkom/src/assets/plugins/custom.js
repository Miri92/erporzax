//
// Navbar
//
;('use strict')

var NavbarCollapse = (function () {
  // Variables

  var $nav = $('#navbar-main'),
    $collapse = $('#navbar-main-collapse'),
    $navTop = $('#navbar-top-main')

  // Methods

  function showNavbarCollapse($this) {
    $nav.addClass('navbar-collapsed')
    $navTop.addClass('navbar-collapsed')
    $('#header-main').addClass('header-collapse-show')
  }

  function hideNavbarCollapse($this) {
    $this.removeClass('collapsing').addClass('collapsing-out')
    $nav.removeClass('navbar-collapsed').addClass('navbar-collapsed-out')
    $navTop.removeClass('navbar-collapsed').addClass('navbar-collapsed-out')
  }

  function hiddenNavbarCollapse($this) {
    $this.removeClass('collapsing-out')
    $nav.removeClass('navbar-collapsed-out')
    $navTop.removeClass('navbar-collapsed-out')
    $('#header-main').removeClass('header-collapse-show')
  }

  // Events

  if ($collapse.length) {
    $collapse.on({
      'show.bs.collapse': function () {
        showNavbarCollapse($collapse)
      },
    })

    $collapse.on({
      'hide.bs.collapse': function () {
        hideNavbarCollapse($collapse)
      },
    })

    $collapse.on({
      'hidden.bs.collapse': function () {
        hiddenNavbarCollapse($collapse)
      },
    })
  }
})()

//
// Sticky Navbar
//

var NavbarSticky = (function () {
  // Variables

  var $nav = $('.navbar-sticky')

  // Methods

  function init($this) {
    var scrollTop = $(window).scrollTop() // our current vertical position from the top

    // if we've scrolled more than the navigation, change its position to fixed to stick to top,
    // otherwise change it back to relative
    if (scrollTop > navOffsetTop) {
      $this.addClass('sticky')
    } else {
      $this.removeClass('sticky')
    }
  }

  // Events

  if ($nav.length) {
    var navOffsetTop = $nav.offset().top

    // Init sticky navbar
    init($nav)

    // re-calculate stickyness on scroll
    $(window).on({
      scroll: function () {
        init($nav)
      },
    })
  }
})()

//
// Dropdown
//

;('use strict')

var Dropdown = (function () {
  // Variables

  var $dropdown = $('.dropdown-animate'),
    $dropdownSubmenu = $('.dropdown-submenu [data-bs-toggle="dropdown"]')

  // Methods

  function hideDropdown($this) {
    // Add additional .hide class for animated dropdown menus in order to apply some css behind
    // var $dropdownMenu = $this.find('.dropdown-menu');
    //
    // $dropdownMenu.addClass('hide');
    //
    // setTimeout(function(){
    //     $dropdownMenu.removeClass('hide');
    // }, 300);
  }

  function initSubmenu($this) {
    if (!$this.next().hasClass('show')) {
      $this.parents('.dropdown-menu').first().find('.show').removeClass('show')
    }

    var $submenu = $this.next('.dropdown-menu')

    $submenu.toggleClass('show-child')
    $submenu.parent().toggleClass('show-parent')

    $this.parents('.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
      $('.dropdown-submenu .show').removeClass('show')
    })
  }

  // Events

  if ($dropdown.length) {
    $dropdown.on({
      'hide.bs.dropdown': function () {
        hideDropdown($dropdown)
      },
    })
  }

  if ($dropdownSubmenu.length) {
    $dropdownSubmenu.on('click', function (e) {
      initSubmenu($(this))

      return false
    })
  }
})()

const menuBtn = document.querySelector('.menu-btn')
//const body = document.querySelector("body");
let menuOpen = false
menuBtn.addEventListener('click', () => {
  if (!menuOpen) {
    menuBtn.classList.add('open')
    //body.classList.add("overflow-hidden");
    menuOpen = true
  } else {
    menuBtn.classList.remove('open')
    //body.classList.remove("overflow-hidden");
    menuOpen = false
  }
})

$(document).ready(function() {

  $(".showpass").on('click', function() {
    var passwordId = $(this).parents('.passdiv:first').find('input').attr('id');
    if ($(this).hasClass('fa-eye')) {
      $("#" + passwordId).attr("type", "text");
      $(this).parent().find(".fa-eye").addClass("fa-eye-slash").removeClass("fa-eye");
    } else {
      $("#" + passwordId).attr("type", "password");
      $(this).parent().find(".fa-eye-slash").addClass("fa-eye").removeClass("fa-eye-slash");
    }
  });
});