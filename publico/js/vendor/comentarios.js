$("#enviar_comment").click(function () {
	//se genera un arreglo
	var val = [];
	//INSERTO LOS VALORES PARA EL COMENTARIO
	val.push($("#comentario").val());
	val.push($("#calificacionf").text());
	val.push($("#id_prod").text());
	val.push($("#idcl").text());
	alert($("#id_prod").text());
	//EJECUTO LA FUNCION
	comentario(val,1);
});

$(".btn-combk").click(function(){
	mascomentarios(id);
});

//CON ESTE SE VEN LOS DEMAS COMENTARIOS Y LA CALIFIACION
$("#mas_comentarios").click(function(){
	var val = [];
	val.push($("#id_prod").text());
	mascomentarios(val);
});

//AQUI HAGO EL EFECTO DE HACER DE COLOR LAS ESTRELLAS
$("#star1").click(function (){
	$("#star1").css("color","#1565c0");
	$("#star2").css("color","black");
	$("#star3").css("color","black");
	$("#star4").css("color","black");
	$("#star5").css("color","black");
	$("#calificacionf").text("1");
});

$("#star2").click(function (){
	$("#star1").css("color","#1565c0");
	$("#star2").css("color","#1565c0");
	$("#star3").css("color","black");
	$("#star4").css("color","black");
	$("#star5").css("color","black");
	$("#calificacionf").text("2");
});

$("#star3").click(function (){
	$("#star1").css("color","#1565c0");
	$("#star2").css("color","#1565c0");
	$("#star3").css("color","#1565c0");
	$("#star4").css("color","black");
	$("#star5").css("color","black");
	$("#calificacionf").text("3");
});

$("#star4").click(function (){
	$("#star1").css("color","#1565c0");
	$("#star2").css("color","#1565c0");
	$("#star3").css("color","#1565c0");
	$("#star4").css("color","#1565c0");
	$("#star5").css("color","black");
	$("#calificacionf").text("4");
});

$("#star5").click(function (){
	$("#star1").css("color","#1565c0");
	$("#star2").css("color","#1565c0");
	$("#star3").css("color","#1565c0");
	$("#star4").css("color","#1565c0");
	$("#star5").css("color","#1565c0");
	$("#calificacionf").text("5");
});

//la funcion del comentario
function comentario(valores,accion){
	var url = '../privado/procesos/comentarios.php';
	var parametros = {"valores": valores, "accion":accion};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			if (datos == 0) {
				swal("LO SENTIMOS", "Tu comentario es tan genial que sobrecargó nuestros servidores :C", "error");
			}else if (datos == 1) {
				swal("¡GENIAL!", "Gracias por calificar y comentar.", "success");
			}else if(datos == 2){
				swal("¡OUCH!", "No podemos reconocer la calificación que le otorgaste. Por favor, revisa de nuevo. Gracias.", "error");
			}else if(datos == 3){
				swal("¡UPS!", "Al parecer tu comentario está vacío o contiene carateres erroneos, por favor escribe una opinión de este producto", "error");
			}else if (datos == 4) {
				swal("¡ÉXITO!", "Esperemos que algún día lo vuelvas a calificar.", "success");
			}
			return false;
		}
	});
	return false;
}

function mascomentarios(id){
	var url = 'privado/procesos/mascomentarios.php';
	var parametros = {"idp": id};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			$(".comentario-panel").empty();
			//AGREGAR ALGO A UN ELEMENTO
			$(".panel-comentarios").append(datos[0]);
			//LE ASIGNAS LA CALIFICAION
			$("#calificacion_prom").text(datos[1]);
			return false;
		}
	});
	return false;
}

function mascomentariosb(id){
	var url = 'privado/procesos/mascomentariosb.php';
	var parametros = {"idp": id};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			$(".comentario-panel").empty();
			//AGREGAR ALGO A UN ELEMENTO
			$(".panel-comentarios").append(datos[0]);
			//LE ASIGNAS LA CALIFICAION
			$("#calificacion_prom").text(datos[1]);
			$("#elim_commentbk").click(function(){eliminar_comentario()});
			return false;
		}
	});
	return false;
}

//VE SI YA ESTA COMENTADA
function estrellas(){
	var idc = $("#id_clien").text();
	var idp = $("#id_prod").text();
	var url = '../privado/procesos/comentarioc.php';
	var parametros = {"idc": idc, "idp": idp};
		$.ajax({
			type:'POST',
			url:url,
			data:parametros,
			async:false,
			success: function(estrella){
				var datos = eval(estrella);
				if (datos == 1) {
					//SI DEVULVE EL 1 ES PORQUE COMENTO
					//LIMPIA LAS ESTRELLAS
					$("#calificar_cliente").empty();
					//LE AGREGAS EL BOTON DE ELIMINAR MI COMENTARIO
					$("#calificar_cliente").append("<button class='btn btn-buy btn-comment' id='elim_comment'>Eliminar mi valoración</button>");
					//AQUI MIRA LOS DEMAS COMENTARIOS
					$("#calificar_cliente").append("<a class='btn btn-buy btn-comment' id='mas_comentarios' data-toggle='modal' data-target='#comments'>Más comentarios</a>");
					$("#elim_comment").click(function(){
						eliminar_comentariobk();
					});
					$("#mas_comentarios").click(function(){
						var val = [];
						val.push($("#id_prod").text());
						mascomentarios(val);
					});
				}
			}
		});
}
function eliminar_comentario(accion){
	swal({   title: "¿De verdad quieres eliminar tu comentario?",
			 text: "Puedes volver a caliciar este producto cuando desees.",
			 type: "warning",
			 showCancelButton: true,
			 confirmButtonColor: "#DD6B55",
			 confirmButtonText: "Si, eliminar",
			 closeOnConfirm: false },
			 function(){ 
			 	var val = [];
				val.push($("#id_prod").text());
				val.push($("#id_clien").text());
				comentario(val,3);
			 });    
}

function eliminar_comentariobk(id){
	swal({   title: "¿De verdad quieres eliminar tu comentario?",
			 text: "Puedes volver a caliciar este producto cuando desees.",
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