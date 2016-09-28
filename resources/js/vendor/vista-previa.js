function mostrarImagen(input) {
 if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
   $('#vistaPrevia').attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]);
 }
}
 
$("input[name='file']").change(function(){
 	mostrarImagen(this);
});

$("input[name='fileslide']").change(function(){
	mostrarImagen(this);
});