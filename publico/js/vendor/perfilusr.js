function perfil(valores,repetida,accion){
	var url = 'privado/procesos/editarperfil.php';
	var parametros = {"valores":valores, "repetida":repetida,"accion":accion};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			if (datos == 0) {
				swal("Lo sentimos", "Hubo un error al tratar de procesar los datos", "error");
			}else if (datos == 1) {
				swal("¡EXITOSO!", "Hemos actualizado tu información", "success");
			}else if(datos == 2){
				swal("ERROR", "Hay un error, puede que las contraseñas no conicidan o que tu nombre y la contraseña son iguales", "error");
			}else if (datos == 100) {
				swal("ERROR", "asgdsajhsahhasdgsahgd asdhgsah gsah", "error");
			}else if(datos == 3){
				swal("ERROR", "Puede que tu nombre u apellido contenga carateres inválidos", "error");
			}
			else{
				swal("ERROR", datos, "error");
			}
			return false;
		}
	});
	return false;
}

$("#guardar_perfil").click(function(){
	var config = [];
	config.push($("#nombres").val());
	config.push($("#apellidos").val());
	config.push($("#id").text());
	perfil(config,"repetida",1);
});

$("#guardar_contra").click(function(){
	var config = [];
	config.push($("#nombres").val());
	config.push($("#apellidos").val());
	config.push($("#clavec").val());
	var repetida = $("#claverc").val();
	config.push($("#id").text());
	perfil(config,repetida,2);
	//alert(repetida);
});

$("#cancelar").click(function(){
	window.location.replace("indexp.php");
});