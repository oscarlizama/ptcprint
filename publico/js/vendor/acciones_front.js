function insertar(tabla,valores,repetida){
	var url = '../privado/procesos/puente.php';
	var parametros = {"valores":valores,"tabla":tabla,"accion":1,"repetida":repetida};
	//alert("entra al insertar")
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success:function(d){
			limpiar();
			switch (d) {
				case "invalid": // Cuando algun campo sea invalido
					swal("¡UPS!", "Revise todos los campos", "warning");
				break;
				case "success": // Cuando todo funcione excelente
					swal("¡EXITOSO!", "El registro se ha modificado con exito", "success");
					limpiar();
					location.reload();
				break;
				default: // Cuando ocurra un error en el server (no sea error del usuario)
					swal("¡HUY!",d, "warning");
					console.log(d);
				break;
			}
		}
	});
	return false;
}

function editar(tabla,valores,repetida){
	var url = '../privado/procesos/puente.php';
	var parametros = {"valores":valores,"tabla":tabla,"accion":2,"repetida":repetida};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success:function(d){
			switch (d) {
				case "invalid": // Cuando algun campo sea invalido
					swal("¡UPS!", "Revise todos los campos", "warning");
				break;
				case "success": // Cuando todo funcione excelente
					swal("¡EXITOSO!", "El registro se ha modificado con exito", "success");
					limpiar();
					location.reload();
				break;
				default: // Cuando ocurra un error en el server (no sea error del usuario)
					swal("¡HUY!", "Lo sentimos estamos experimentando problemas con nuestro servidor", "warning");
					console.log(d);
				break;
			}
		}
	});
	return false;
}

function limpiar(){
	$("input").val("");
	$("#modal-registrer").css("display","none");
}

function valores(num){
	//var num = num;
	var val = [];
	if(num == 0 || num == 1){
		var $inputs = $('#frm-u :input').not(".btn-scrud").not(".omitir");
		var values = {};
		$inputs.each(function() {
			val.push(values[this.name] = $(this).val());
			//alert(val[val.length-1]);
			//alert(val[val.length -1]);
		});
	};
	//VALORES PARA LAS CONSULTAS
	if (num == 0) {
		//alert("entro aqui");
		insertar(3,val,$("#txtClaveR").val());
	};
	if (num == 1) {
		val.push($("#id_reg").text());
		editar(3,val,$("#txtClaveR").val());
	};
}
//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-regc").click(function(event){
	valores(0);
});