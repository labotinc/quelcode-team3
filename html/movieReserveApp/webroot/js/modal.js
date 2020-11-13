'use strict';

$(function () {
  $('.reservations-cancel-button').click(function () {
    $('#modalArea').fadeIn();
  });
  $('#closeModal, #modalBg, .abort').click(function () {
    $('#modalArea').fadeOut();
  });
  
});