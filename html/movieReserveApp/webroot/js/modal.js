'use strict';

$(function () {
  $('.reservations-cancel-button').click(function () {
    $('#modalArea').fadeIn();
    const reservation_id = $(this)[0].id;
    document.getElementById('reservation_id').setAttribute('value', reservation_id);
  });
  $('#closeModal, #modalBg, .abort').click(function () {
    $('#modalArea').fadeOut();
    document.getElementById('reservation_id').setAttribute('value', '');
  });
  
});
