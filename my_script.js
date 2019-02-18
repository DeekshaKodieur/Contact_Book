$ ("#sub").click( function() {

  $.POST ( $("#myform") . attr("action") , $("#myform : input") .serializeArray() , function(info) { $("#result") . html(info);} );
  clearInput();
});


$("#myform") . submit(function(){

   return  false;
});


function clearInput(){

  $("#myform : input") . each(function(){
    $(this).val('');});

}
