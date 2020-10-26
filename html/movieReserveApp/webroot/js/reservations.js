'use strict';

$(function() {

  function setSeatNumber() {
    var selected = document.getElementsByClassName('selected');
    var selected_seat = selected[0].id;

    document.getElementById('seat-number').setAttribute('value', selected_seat);
  }

  $(document).on('click', '.available', function() {
    // 座席選択後に別の席をクリックした際の処理
    if (!$(this).hasClass('selected')) {
      $('.selected').removeClass('selected');
      $(this).addClass('selected');

      setSeatNumber();
    }
  });

  $(document).on('click', '.selected', function() {
    if ($(this).hasClass('selected')) {
      $(this).removeClass('selected');

      document.getElementById('seat-number').setAttribute('value', '');
    }
  })

});
