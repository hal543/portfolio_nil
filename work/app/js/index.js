$(function () {

  $('.new_register1').hover(
    function () {
      $(this).find('.new_register2').addClass("appear");
    },
    function () {
      $(this).find('.new_register2').removeClass("appear");
    });

  $('.new_login1').hover(
    function () {
      $(this).find('.new_login2').addClass("appear");
    },
    function () {
      $(this).find('.new_login2').removeClass("appear");
    });
});