$(document).ready(function(){
  $('.ir-arriba').click(function(){
    $('body, html').animate({
      scrollTop: '0px'
    }, 300);
  });

  $(window).scroll(function(){
	if( $(this).scrollTop() > 0 ){
	  $('.ir-arriba').slideDown(300);
	}else {
	  $('.ir-arriba').slideUp(300);
	}
  });
});

/** Show a modal with the information of an url
 * 
 * @param {url} url Direccion de la informacion a mostrar
 * @param {string} title Titulo del modal
 */
function modalGet(url, title, szModal){
    if(szModal){
      if(szModal == "lg"){
        myModalLabel = "#myModalLabel-lg";
        myModal = "#myModal-lg";
        formModal = "#formModal-lg";
      }
      else{
        myModalLabel = "#myModalLabel-sm";
        myModal = "#myModal-sm";
        formModal = "#formModal-sm";
      }
    }
    else{
      myModalLabel = "#myModalLabel";
      myModal = "#myModal";
      formModal = "#formModal";
    }
    $(myModalLabel).text(title);
    $(myModal).modal('show');
    data='_method=GET';
    $.get(url, data, function(result) {
      $(formModal).html(result.bodyContent);
      $(".modal-footer2").html(result.footer);
    });
}


function muestaMunicipios(){
  var idEstado = $('#Estado').val();

  $("#Municipio option").addClass('d-none');
  $("#Municipio optgroup").addClass('d-none');
  $('#Municipio option:first-child').removeClass('d-none');
  $('#Municipio option[data-filter="'+idEstado+'"]').removeClass('d-none');
  $('#Municipio optgroup[data-filter="'+idEstado+'"]').removeClass('d-none');
}


function muestraSubsectores(){
  var idEstado = $('#Sector').val();

  $("#Subsector option").addClass('d-none');
  $("#Subsector optgroup").addClass('d-none');
  $('#Subsector option:first-child').removeClass('d-none');
  $('#Subsector option[data-filter="'+idEstado+'"]').removeClass('d-none');
  $('#Subsector optgroup[data-filter="'+idEstado+'"]').removeClass('d-none');
}