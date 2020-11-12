'use strict';

$(function () {
  $('.open-modal').click(function () {
    $('#modalArea').fadeIn();
  });
  $('#closeModal, #modalBg, .abort').click(function () {
    $('#modalArea').fadeOut();
  });
  
});