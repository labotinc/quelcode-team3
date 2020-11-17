'use strict';

$(function() {
  // 座席番号のデータを保持する処理
  function setSeatNumber() {
    const selected = document.getElementsByClassName('selected');
    const selected_seat = selected[0].id;

    document.getElementById('seat-number').setAttribute('value', selected_seat);
  }

  // 選択可能な座席を押下した際の処理
  $(document).on('click', '.available', function() {
    if (!$(this).hasClass('selected')) {
      // 既に押下済みの状態で別の座席を選択した場合は、押下済みの選択が外れて新しく押下した座席を選択したこととする 
      $('.selected').removeClass('selected');
      $(this).addClass('selected');

      setSeatNumber();
    }
  });

  $(document).on('click', '.selected', function() {
    if ($(this).hasClass('selected')) {
      // 選択済みの座席を再度押下した場合は、選択を解除し座席情報のデータも空にする
      $(this).removeClass('selected');

      document.getElementById('seat-number').setAttribute('value', '');
    }
  })

});
