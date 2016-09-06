function eliminar_comentario(id){
	swal({   title: "¿Desea eliminar este comentario?",
			 text: "No se podrá recuperar esta calificación.",
			 type: "warning",
			 showCancelButton: true,
			 confirmButtonColor: "#DD6B55",
			 confirmButtonText: "Si, eliminar",
			 closeOnConfirm: false },
			 function(){ 
			 	var val = [];
				val.push(id);
				comentario(val,4);
			 });    
}
function comentario(valores,accion){
	var url = 'comentarios';
	var parametros = {"valores": valores, "accion":accion};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			if (datos == 0) {
				swal("LO SENTIMOS", "Tu comentario es tan genial que sobrecargó nuestros servidores :C", "error");
			}else if (datos == 4) {
				swal("¡ÉXITO!", "Se ha eliminado el comentario exitosamente.", "success");
			}
			return false;
		}
	});
	return false;
}