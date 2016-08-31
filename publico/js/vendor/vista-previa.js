function archivo(evt) {
  var files = evt.target.files; // FileList object             
    // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
    //Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
        continue;
      }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
    return function(e) {
      // Insertamos la imagen
      document.getElementById("list").innerHTML = ['<img class="thumb img-responsive" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
      $("#uploaddiv").removeClass("col-lg-6");
      $("#uploaddiv").addClass("col-lg-3");
    };
  })(f);           
  reader.readAsDataURL(f);
}
}             
document.getElementById('imagen').addEventListener('change', archivo, false);