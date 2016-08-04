var id_el = 0;
var id_md = 0;
var id_cl = 0;
function elegido(id) {
	$(".imagenesael").css("opacity","1");
	var imgel = "#imagenel" + id;
	var imgi = "#img" + id;
	var url = $(imgi).attr("src");
	$("#imgfirst").attr("src",url);
	$(".imagenesael"+imgel).siblings().css({"border":"none"});
	$(".imagenesael"+imgel).css({"border":"2px solid #01579b"});
	$(".imagenesael"+imgel).siblings().css("opacity","0.5");
	id_el = id;
	$("#id_prod").text(id_el);
	medidas_el();
}

$("#btn-el").click(function (){
	if($("#btn-el").text() == "ELEGIR DISEÑO"){
		$("#elegir_div").css("display","block");
		$("#btn-el").text("AGREGAR");
	}
	else{
		agregar_carrito();
	}
});

$("#btn-crrel").click(function(){
	$("#elegir_div").css("display","none");
	$("#btn-el").text("ELEGIR DISEÑO");
});

function agregar_carrito(){
	id_cl = $("#idcl").text();
	if(id_cl != 0){
		if (id_el != 0) {
			if (id_md != 0) {
				var cantidad = ($("#cantidad").val());
				if((!isNaN(cantidad)) && cantidad <= 5){
					var f = new Date();
					var fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
					var valores = [];
					valores.push(id_cl);
					valores.push(id_md);
					valores.push(cantidad);
					valores.push(fecha);
					var url = '../privado/procesos/puente.php';
					var parametros = {"valores":valores,"tabla":32, "accion":1};
					$.ajax({
						type:'POST',
						url:url,
						data:parametros,
						success:function(d){
							swal("¡EXITOSO!", "Hemos agregado el producto a tu carrito", "success");
						}
					});
					return false;
				}
				else{
					swal("ERROR", "Comprueba que la cantidad sea valida", "error");
				}
			}else{
				swal("ERROR", "Elige un tamaño por favor", "error");
			}
		}
		else{
			swal("ERROR", "Por favor elige un diseño", "error");
		}
	}else{
		swal("ERROR", "Por inicia sesion para poder agregar", "error");
	}
}

function medidas_el(){
	var url = '../privado/procesos/seleccionar.php';
	var medida_select = "";
	$("#medidassl").children().remove();
	var parametros = {"valores":valores,"tbl":33,"id":id_el};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success:function(d){
			var data = eval(d);
			for (var i = 0; i < data.length; i++) {
				medida_select += "<input type='radio' name='radio' value='"+data[i][0]+"'><label for='form-s-r'>"+data[i][1]+"</label><br>";
			}
			//alert(medida_select);
			$("#medidassl").append(medida_select);
			producto_descrip();
		}
	});
	/*var val = [];
	var $inputs = $('#medidassl :input');
	var values = {};
	$inputs.each(function() {
		val.push(values[this.name] = $(this).val());
		//alert(val[val.length-1]);
	});*/
	return false;
}

function producto_descrip(){
	var url = '../privado/procesos/seleccionar.php';
	var parametros = {"tbl":39,"id":id_el};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success:function(d){
			var data = eval(d);
			$("#descripcion").text(data[0]);
			$("#calift").text("Calificacion del producto " + data[1]);
			input();
		}
	});
	/*var val = [];
	var $inputs = $('#medidassl :input');
	var values = {};
	$inputs.each(function() {
		val.push(values[this.name] = $(this).val());
		//alert(val[val.length-1]);
	});*/
	return false;
}

function input(){
	$('#medidassl :input').change(function() {
	   id_md = $('input[name=radio]:checked', '#medidassl').val(); 
	});
}