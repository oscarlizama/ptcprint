function sesion_anterior(correo,tipo){
	//envio la consulta aqui
	var url = 'iniciado';
	//lleno los parametros
	var parametros = {"correo":correo,"tipo":tipo};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var resp = eval(valores);
				if (resp == 0) {
					swal("Error al conectar", "Se ha producido un error en nuestros servidores.", "error");
				}if (resp == 1) {
					$("#forml").submit();
				}if (resp == 2) {
					cerrar_sesion(1);
				}
			return false;
		}
	});
	return false;
}
$("#iniciar_sesion").click(function(){
	var correo = $("#correolg").val();
	sesion_anterior(correo,1);
});

function cerrar_sesion(tipo){
	swal({   title: "SESIÓN ACTIVA",
			 text: "Al parecer tienes una sesión activa",
			 type: "info",
			 showCancelButton: true,
			 confirmButtonColor: "#DD6B55",
			 confirmButtonText: "Cerrar sesiones",
			 closeOnConfirm: false },
			 function(){ 
			 	cerrar_sesionmth(tipo);
			 });
}

function cerrar_sesionmth(tipo){
	//alert(tipo);
	var correo = $("#correolg").val();
	//alert(correo);
	//envio la consulta aqui
	var url = 'cerraranteriores';
	//lleno los parametros
	var parametros = {"correo":correo,"tipo":tipo};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var resp = eval(valores);
				if (resp == 0) {
					swal("Error al conectar", "Se ha producido un error en nuestros servidores.", "error");
				}if (resp == 1) {
					swal("Sesiones cerradas", "Se han cerrado todas sus sesiones.", "success");
				}
			return false;
		}
	});
	return false;
}