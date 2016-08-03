function sesion_anterior(correo,tipo){
	//envio la consulta aqui
	var url = '../privado/procesos/iniciado.php';
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
					//cerrar_sesion(tipo);
					swal("SESIÓN ACTIVA","Al parecer tienes una sesión activa","info");
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