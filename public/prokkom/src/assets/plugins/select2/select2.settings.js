$(document).ready(function () {

  $('.single-select-field').each(function () {
    // Check if the element already has Select2 initialized
    if ($(this).hasClass('custom__select')) {
      // Add Select2 to the element with a custom class
      let customSelect = $(this).select2({
        theme: 'bootstrap-5',
        placeholder: $(this).data('placeholder'),
        minimumResultsForSearch: -1,
        dropdownCssClass: 'custom__select-dropdown',
        // templateResult: function (option) {
        //   // Add a custom class to the option
        //   return $('<span class="custom-class-quliquli"/>').text(option.text);
        // }
      })


      customSelect.data().select2.$container.addClass('custom__select');
      customSelect.data().select2.$container.children().addClass('custom__select-selection');
    } else {
      $(this).select2({
        theme: 'bootstrap-5',
        placeholder: $(this).data('placeholder'),
      })
    
    }
  })


  $('.multiple-select-field').each(function () {
    // Check if the element already has Select2 initialized
    if ($(this).hasClass('inline__select')) {
      // Add Select2 to the element with a custom class
      let select2custom = $(this).select2({
        theme: 'bootstrap-5',
        closeOnSelect: false,
        placeholder: $(this).data('placeholder'),
      })

      select2custom.data().select2.$container.addClass('inline__select')
      select2custom.data().select2.$container.children().addClass('inline__select-selection')
      // select2custom.data().select2.$selection.addClass("swiper tabSwiper");
      // select2custom.data().select2.$selection.children().addClass("swiper-wrapper");

      $(this).change(function () {
        if ($(this).val() == '') {
          select2custom.data().select2.$container.children().addClass('selection__empty')
          select2custom.data().select2.$container.children().removeClass('selection__full')
        } else {
          select2custom.data().select2.$container.children().addClass('selection__full')
          select2custom.data().select2.$container.children().removeClass('selection__empty')
        }
      })
    } else {
      $(this).select2({
        theme: 'bootstrap-5',
        closeOnSelect: false,
      })
    }
  })
})
