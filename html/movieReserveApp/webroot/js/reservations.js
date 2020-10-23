'use strict';

$(function() {

  function setSeatNumber() {
    var selected = document.getElementsByClassName('selected');
    var selected_seat = selected[0].id;

    document.getElementById('seat-number').setAttribute('value', selected_seat);
  }

  $(document).on('click', '.available', function() {
    $('.selected').toggleClass('selected');
    $(this).addClass('selected');

    setSeatNumber();
  });

  $(document).on('click', '.selected', function() {
    if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');

      document.getElementById('seat-number').setAttribute('value', '');
    }

    setSeatNumber();
  })

});
