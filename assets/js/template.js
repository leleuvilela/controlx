$('#totop').click(function () {
  $('html, body').animate({
    scrollTop: 0
  }, 'slow');
  return false;
});
//$("#modal-blackfriday").modal("show");
$("#txtDataInicial").mask("99/99/9999");