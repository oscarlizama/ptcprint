function insertar(tabla,valores,repetida){
	var url = 'puente';
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
	var url = 'puente';
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
	//	valores(0);
	//alert($("#recaptcha-token").val());
	/*$.ajax({
	    url:"privado/procesos/vrfcaptcha.php",  // script al que le enviamos los datos
	    type:"POST",           // método de envío POST
	    //dataType:"json",       // la respuesta será en formato JSON
	    data:$("#formv").serialize(), // Datos que se envían (campos del formulario)
	    async:false,     // Llamada síncrona para que el código no continúe hasta obtener la respuesta
	    success: function(msg){
	           datos = eval(msg); // Obtenemos el valor de estado de la validación
	           alert(datos);
	           if(datos) {        // La validación ha sido correcta
	            // Eliminamos del formulario el campo que contiene los parámetros de validación
	            //$("#g-recaptcha-response","#form").remove();
	            valores(0);
	           } else {
	            alert('Fallo de validación'); // Mostramos mensaje
	           } 
	    }
	    }); // Final de la llamada en AJAX
	    // Si la respuesta es true continuará el evento submit, de lo contrario será cancelado
	    //	return $respuesta;
	    return false;*/
	var url = 'vrfcaptcha';
	//alert("entra al insertar")
	$.ajax({
		type:'POST',
		url:url,
		data:$("#formv").serialize(),
		success:function(d){
			switch (d) {
				case "malo": // Cuando algun campo sea invalido
					swal("¡UPS!", "Revise todos los campos", "warning");
				break;
				case "bueno": // Cuando todo funcione excelente
					valores(0);
				break;
				default: // Cuando ocurra un error en el server (no sea error del usuario)
					swal("¡HUY!",d, "warning");
					console.log(d);
				break;
			}
		}
	});
	return false;
});

function cargar(id){
	$("#formpr"+id).submit();
}