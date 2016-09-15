/*//AQUI SE LLENA LA TABLA
function seleccionar_usuario(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 1};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				$('#apellido').val(datos[1]);
				$('#correo').val(datos[3]);
				$('#permiso').val(datos[4]);
			return false;
		}
	});
	return false;
}

function seleccionar_configuracion(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 15};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#id_proveedor').val(datos[0]);
				$('#contacto').val(datos[1]);
				$('#id_tipo_contacto').val(datos[2]);

			return false;
		}
	});
	return false;
}

function seleccionar_contactos_proveedor(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 17};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#id_proveedor').val(datos[0]);
				$('#contacto').val(datos[1]);
				$('#id_tipo_contacto').val(datos[2]);
			return false;
		}
	});
	return false;
}

function seleccionar_tipo_contacto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 16};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				

			return false;
		}
	});
	return false;
}


function seleccionar_red(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id":id,"tbl":20};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				$('#enlace').val(datos[1]);
				$('#imagenb64').val(datos[2]);
				$('#list').html("<img class='thumb img-responsive' src='data:image/*;base64," + datos[2]+ "'/>");
			return false;
		}
	});
	return false;
}

function seleccionar_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 7};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				$('#calificacion').val(datos[1]);
				$('#descripcion').val(datos[2]);
				$('#tipo-prod').val(datos[3]);

			return false;
		}
	});
	return false;
}

function seleccionar_tipo_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 8};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				$(".imgmenu").parent(".col-lg-2").css({"border":"none"});
				if (datos[1] == "flaticon-ads") {
					$(".imgmenu[id=1]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (datos[1] == "flaticon-balloons") {
					$(".imgmenu[id=2]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (datos[1] == "flaticon-clothes") {
					$(".imgmenu[id=3]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (datos[1] == "flaticon-two-presentation-cards-with-text-and-photograph") {
					$(".imgmenu[id=4]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (datos[1] == "flaticon-billboard") {
					$(".imgmenu[id=5]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-birthday-card") {
					$(".imgmenu[id=6]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-door") {
					$(".imgmenu[id=7]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-menu") {
					$(".imgmenu[id=8]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-mode-circular-button") {
					$(".imgmenu[id=9]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-rings") {
					$(".imgmenu[id=10]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-wanted") {
					$(".imgmenu[id=11]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
				if (id == "flaticon-round-add-button") {
					$(".imgmenu[id=12]").parent(".col-lg-2").css({"border":"2px solid #e91e63"});
				}
			return false;
		}
	});
	return false;
}


function seleccionar_medida_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 9};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#prod').val(datos[0]);
				$('#medida').val(datos[1]);

			return false;
		}
	});
	return false;
}


function seleccionar_foto_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id":id,"tbl":10};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#prod').val(datos[0]);
				$('#imagenb64').val(datos[1]);
				$('#list').html("<img class='thumb img-responsive' src='data:image/*;base64," + datos[1]+ "'/>");
				$("#uploaddiv").removeClass("col-lg-6");
      			$("#uploaddiv").addClass("col-lg-3");
			return false;
		}
	});
	return false;
}

function seleccionar_proveedor(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 21};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#proveedor').val(datos[0]);
				$('#direccion_proveedor').val(datos[1]);
			return false;
		}
	});
	return false;
}

function seleccionar_equipo(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 22};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#equipo').val(datos[0]);
				$('#costo_click_equipo').val(datos[1]);
			return false;
		}
	});
	return false;
}

function seleccionar_obra(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = 'seleccionar';
	var parametros = {"id": id,"tbl": 23};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#actividad').val(datos[0]);
				$('#costo_hora').val(datos[1]);
				$('#descripcion_actividad').val(datos[2]);
			return false;
		}
	});
	return false;
}


function seleccionar_permisos(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('input[value!=0]').prop("checked","");
	$('input[value=0]').prop("checked","checked");
	var url = 'seleccionar';
	var cp = ["configuraciones","usuarios","permisos","comentarios","clientes","informacion","redes","proveedores","facturacion","productos","medidas","precios","cantidadp","mano","recursos","equipo"];
	var parametros = {"id": id,"tbl": 2};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre_permiso').val(datos[0]);
				for (var i = 1; i < 16; i++) {
					if(datos[i] == 1){
						if(cp[i-1] == 'configuraciones'){
							$('#eli_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#eli_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#eli_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#eli_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#eli_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#eli_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#eli_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#eli_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#eli_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#eli_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#eli_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#eli_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#eli_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#eli_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#eli_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#eli_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 2){
						if(cp[i-1] == 'configuraciones'){
							$('#ed_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ed_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ed_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ed_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ed_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ed_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ed_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ed_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ed_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ed_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ed_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ed_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ed_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ed_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ed_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ed_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 3){
						if(cp[i-1] == 'configuraciones'){
							$('#ed_conf').prop("checked","checked");
							$('#eli_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ed_us').prop("checked","checked");
							$('#eli_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ed_pr').prop("checked","checked");
							$('#eli_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ed_comment').prop("checked","checked");
							$('#eli_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ed_cli').prop("checked","checked");
							$('#eli_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ed_ic').prop("checked","checked");
							$('#eli_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ed_rs').prop("checked","checked");
							$('#eli_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ed_pro').prop("checked","checked");
							$('#eli_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ed_fac').prop("checked","checked");
							$('#eli_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ed_prod').prop("checked","checked");
							$('#eli_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ed_mp').prop("checked","checked");
							$('#eli_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ed_pp').prop("checked","checked");
							$('#eli_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ed_cp').prop("checked","checked");
							$('#eli_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ed_mo').prop("checked","checked");
							$('#eli_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ed_rec').prop("checked","checked");
							$('#eli_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ed_eq').prop("checked","checked");
							$('#eli_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 4){
						if(cp[i-1] == 'configuraciones'){
							$('#ag_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ag_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ag_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ag_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ag_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ag_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ag_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ag_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ag_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ag_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ag_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ag_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ag_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ag_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ag_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ag_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 5){
						if(cp[i-1] == 'configuraciones'){
							$('#ag_conf').prop("checked","checked");
							$('#eli_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ag_us').prop("checked","checked");
							$('#eli_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ag_pr').prop("checked","checked");
							$('#eli_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ag_comment').prop("checked","checked");
							$('#eli_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ag_cli').prop("checked","checked");
							$('#eli_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ag_ic').prop("checked","checked");
							$('#eli_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ag_rs').prop("checked","checked");
							$('#eli_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ag_pro').prop("checked","checked");
							$('#eli_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ag_fac').prop("checked","checked");
							$('#eli_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ag_prod').prop("checked","checked");
							$('#eli_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ag_mp').prop("checked","checked");
							$('#eli_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ag_pp').prop("checked","checked");
							$('#eli_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ag_cp').prop("checked","checked");
							$('#eli_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ag_mo').prop("checked","checked");
							$('#eli_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ag_rec').prop("checked","checked");
							$('#eli_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ag_eq').prop("checked","checked");
							$('#eli_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 6){
						if(cp[i-1] == 'configuraciones'){
							$('#ag_conf').prop("checked","checked");
							$('#ed_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ag_us').prop("checked","checked");
							$('#ed_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ag_pr').prop("checked","checked");
							$('#ed_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ag_comment').prop("checked","checked");
							$('#ed_comment').prop("checked","checked");
							$('#ng_comment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ag_cli').prop("checked","checked");
							$('#ed_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ag_ic').prop("checked","checked");
							$('#ed_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ag_rs').prop("checked","checked");
							$('#ed_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ag_pro').prop("checked","checked");
							$('#ed_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ag_fac').prop("checked","checked");
							$('#ed_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ag_prod').prop("checked","checked");
							$('#ed_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ag_mp').prop("checked","checked");
							$('#ed_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ag_pp').prop("checked","checked");
							$('#ed_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ag_cp').prop("checked","checked");
							$('#ed_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ag_mo').prop("checked","checked");
							$('#ed_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ag_rec').prop("checked","checked");
							$('#ed_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ag_eq').prop("checked","checked");
							$('#ed_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
					if (datos[i] == 7){
						if(cp[i-1] == 'configuraciones'){
							$('#ag_conf').prop("checked","checked");
							$('#ed_conf').prop("checked","checked");
							$('#eli_conf').prop("checked","checked");
							$('#ng_conf').prop("checked","");
						}
						if(cp[i-1] == 'usuarios'){
							$('#ag_us').prop("checked","checked");
							$('#ed_us').prop("checked","checked");
							$('#eli_us').prop("checked","checked");
							$('#ng_us').prop("checked","");
						}
						if(cp[i-1] == 'permisos'){
							$('#ag_pr').prop("checked","checked");
							$('#ed_pr').prop("checked","checked");
							$('#eli_pr').prop("checked","checked");
							$('#ng_pr').prop("checked","");
						}
						if(cp[i-1] == 'comentarios'){
							$('#ag_coment').prop("checked","checked");
							$('#ed_coment').prop("checked","checked");
							$('#eli_coment').prop("checked","checked");
							$('#ng_coment').prop("checked","");
						}
						if(cp[i-1] == 'clientes'){
							$('#ag_cli').prop("checked","checked");
							$('#ed_cli').prop("checked","checked");
							$('#eli_cli').prop("checked","checked");
							$('#ng_cli').prop("checked","");
						}
						if(cp[i-1] == 'informacion'){
							$('#ag_ic').prop("checked","checked");
							$('#ed_ic').prop("checked","checked");
							$('#eli_ic').prop("checked","checked");
							$('#ng_ic').prop("checked","");
						}
						if(cp[i-1] == 'redes'){
							$('#ag_rs').prop("checked","checked");
							$('#ed_rs').prop("checked","checked");
							$('#eli_rs').prop("checked","checked");
							$('#ng_rs').prop("checked","");
						}
						if(cp[i-1] == 'proveedores'){
							$('#ag_pro').prop("checked","checked");
							$('#ed_pro').prop("checked","checked");
							$('#eli_pro').prop("checked","checked");
							$('#ng_pro').prop("checked","");
						}
						if(cp[i] == 'facturacion'){
							$('#ag_fac').prop("checked","checked");
							$('#ed_fac').prop("checked","checked");
							$('#eli_fac').prop("checked","checked");
							$('#ng_fac').prop("checked","");
						}
						if(cp[i] == 'productos'){
							$('#ag_prod').prop("checked","checked");
							$('#ed_prod').prop("checked","checked");
							$('#eli_prod').prop("checked","checked");
							$('#ng_prod').prop("checked","");
						}
						if(cp[i] == 'medidas'){
							$('#ag_mp').prop("checked","checked");
							$('#ed_mp').prop("checked","checked");
							$('#eli_mp').prop("checked","checked");
							$('#ng_mp').prop("checked","");
						}
						if(cp[i] == 'precios'){
							$('#ag_pp').prop("checked","checked");
							$('#ed_pp').prop("checked","checked");
							$('#eli_pp').prop("checked","checked");
							$('#ng_pp').prop("checked","");
						}
						if(cp[i] == 'cantidadp'){
							$('#ag_cp').prop("checked","checked");
							$('#ed_cp').prop("checked","checked");
							$('#eli_cp').prop("checked","checked");
							$('#ng_cp').prop("checked","");
						}
						if(cp[i] == 'mano'){
							$('#ag_mo').prop("checked","checked");
							$('#ed_mo').prop("checked","checked");
							$('#eli_mo').prop("checked","checked");
							$('#ng_mo').prop("checked","");
						}
						if(cp[i] == 'recursos'){
							$('#ag_rec').prop("checked","checked");
							$('#ed_rec').prop("checked","checked");
							$('#eli_rec').prop("checked","checked");
							$('#ng_rec').prop("checked","");
						}
						if(cp[i] == 'equipo'){
							$('#ag_eq').prop("checked","checked");
							$('#ed_eq').prop("checked","checked");
							$('#eli_eq').prop("checked","checked");
							$('#ng_eq').prop("checked","");
						}
					}
				}
			return false;
		}
	});
	return false;
}*/

// prueba de un cmb filtro

eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('m 2L(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":1};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#1o\').k(b[0]);$(\'#2Y\').k(b[1]);$(\'#2Z\').k(b[3]);$(\'#2R\').k(b[4]);n o}});n o}m 34(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":15};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2r\').k(b[0]);$(\'#2u\').k(b[1]);$(\'#2h\').k(b[2]);n o}});n o}m 31(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":17};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2r\').k(b[0]);$(\'#2u\').k(b[1]);$(\'#2h\').k(b[2]);n o}});n o}m 33(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":16};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#1o\').k(b[0]);n o}});n o}m 36(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":20};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#1o\').k(b[0]);$(\'#2C\').k(b[1]);$(\'#2i\').k(b[2]);$(\'#2j\').2k("<24 2l=\'2m 24-2v\' 2n=\'q:2o/*;2p,"+b[2]+"\'/>");n o}});n o}m 37(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":7};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#1o\').k(b[0]);$(\'#3j\').k(b[1]);$(\'#2w\').k(b[2]);$(\'#2B-2g\').k(b[3]);n o}});n o}m 2E(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":8};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#1o\').k(b[0]);$(".D").v(".r-s-2").H({"C":"32"});j(b[1]=="J-35"){$(".D[p=1]").v(".r-s-2").H({"C":"K L #I"})}j(b[1]=="J-38"){$(".D[p=2]").v(".r-s-2").H({"C":"K L #I"})}j(b[1]=="J-39"){$(".D[p=3]").v(".r-s-2").H({"C":"K L #I"})}j(b[1]=="J-3a-3b-3c-3d-t-3e-3h"){$(".D[p=4]").v(".r-s-2").H({"C":"K L #I"})}j(b[1]=="J-3i"){$(".D[p=5]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-3k-3l"){$(".D[p=6]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2x"){$(".D[p=7]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2y"){$(".D[p=8]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2z-2A-2t"){$(".D[p=9]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2D"){$(".D[p=10]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2F"){$(".D[p=11]").v(".r-s-2").H({"C":"K L #I"})}j(c=="J-2G-2H-2t"){$(".D[p=12]").v(".r-s-2").H({"C":"K L #I"})}n o}});n o}m 2I(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":9};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2g\').k(b[0]);$(\'#2J\').k(b[1]);n o}});n o}m 2K(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":10};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2g\').k(b[0]);$(\'#2i\').k(b[1]);$(\'#2j\').2k("<24 2l=\'2m 24-2v\' 2n=\'q:2o/*;2p,"+b[1]+"\'/>");$("#2s").3p("r-s-6");$("#2s").2M("r-s-3");n o}});n o}m 2N(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":21};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2O\').k(b[0]);$(\'#2P\').k(b[1]);n o}});n o}m 2Q(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":22};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#M\').k(b[0]);$(\'#2S\').k(b[1]);n o}});n o}m 2T(c){$(\'.u\').k();l d=\'B\';l e={"p":c,"G":23};$.F({A:\'z\',y:d,q:e,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#2U\').k(b[0]);$(\'#2V\').k(b[1]);$(\'#2W\').k(b[2]);n o}});n o}m 2X(c){$(\'u[2q!=0]\').h("g","");$(\'u[2q=0]\').h("g","g");l d=\'B\';l e=["N","14","13","Z","Y","X","W","V","U","T","R","Q","P","S","O","M"];l f={"p":c,"G":2};$.F({A:\'z\',y:d,q:f,x:m(a){l b=E(a);$(\'#w\').t(c);$(\'#3f\').k(b[0]);3g(l i=1;i<16;i++){j(b[i]==1){j(e[i-1]==\'N\'){$(\'#1z\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#1B\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#1D\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2e\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#1H\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1J\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1L\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1N\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1P\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1p\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1T\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1V\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1X\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1Z\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#25\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#27\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==2){j(e[i-1]==\'N\'){$(\'#29\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#2a\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#2b\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2d\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#2c\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1R\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1F\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1x\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1v\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1u\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1t\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1s\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1r\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1q\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#28\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#26\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==3){j(e[i-1]==\'N\'){$(\'#29\').h("g","g");$(\'#1z\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#2a\').h("g","g");$(\'#1B\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#2b\').h("g","g");$(\'#1D\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2d\').h("g","g");$(\'#2e\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#2c\').h("g","g");$(\'#1H\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1R\').h("g","g");$(\'#1J\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1F\').h("g","g");$(\'#1L\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1x\').h("g","g");$(\'#1N\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1v\').h("g","g");$(\'#1P\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1u\').h("g","g");$(\'#1p\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1t\').h("g","g");$(\'#1T\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1s\').h("g","g");$(\'#1V\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1r\').h("g","g");$(\'#1X\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1q\').h("g","g");$(\'#1Z\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#28\').h("g","g");$(\'#25\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#26\').h("g","g");$(\'#27\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==4){j(e[i-1]==\'N\'){$(\'#1Y\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#1W\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#1U\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2f\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#1S\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1Q\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1O\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1M\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1K\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1I\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1G\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1E\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1C\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1A\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#1y\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#1w\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==5){j(e[i-1]==\'N\'){$(\'#1Y\').h("g","g");$(\'#1z\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#1W\').h("g","g");$(\'#1B\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#1U\').h("g","g");$(\'#1D\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2f\').h("g","g");$(\'#2e\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#1S\').h("g","g");$(\'#1H\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1Q\').h("g","g");$(\'#1J\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1O\').h("g","g");$(\'#1L\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1M\').h("g","g");$(\'#1N\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1K\').h("g","g");$(\'#1P\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1I\').h("g","g");$(\'#1p\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1G\').h("g","g");$(\'#1T\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1E\').h("g","g");$(\'#1V\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1C\').h("g","g");$(\'#1X\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1A\').h("g","g");$(\'#1Z\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#1y\').h("g","g");$(\'#25\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#1w\').h("g","g");$(\'#27\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==6){j(e[i-1]==\'N\'){$(\'#1Y\').h("g","g");$(\'#29\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#1W\').h("g","g");$(\'#2a\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#1U\').h("g","g");$(\'#2b\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#2f\').h("g","g");$(\'#2d\').h("g","g");$(\'#1n\').h("g","")}j(e[i-1]==\'Y\'){$(\'#1S\').h("g","g");$(\'#2c\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1Q\').h("g","g");$(\'#1R\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1O\').h("g","g");$(\'#1F\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1M\').h("g","g");$(\'#1x\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1K\').h("g","g");$(\'#1v\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1I\').h("g","g");$(\'#1u\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1G\').h("g","g");$(\'#1t\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1E\').h("g","g");$(\'#1s\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1C\').h("g","g");$(\'#1r\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1A\').h("g","g");$(\'#1q\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#1y\').h("g","g");$(\'#28\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#1w\').h("g","g");$(\'#26\').h("g","g");$(\'#19\').h("g","")}}j(b[i]==7){j(e[i-1]==\'N\'){$(\'#1Y\').h("g","g");$(\'#29\').h("g","g");$(\'#1z\').h("g","g");$(\'#1b\').h("g","")}j(e[i-1]==\'14\'){$(\'#1W\').h("g","g");$(\'#2a\').h("g","g");$(\'#1B\').h("g","g");$(\'#1c\').h("g","")}j(e[i-1]==\'13\'){$(\'#1U\').h("g","g");$(\'#2b\').h("g","g");$(\'#1D\').h("g","g");$(\'#1d\').h("g","")}j(e[i-1]==\'Z\'){$(\'#3m\').h("g","g");$(\'#3n\').h("g","g");$(\'#3o\').h("g","g");$(\'#30\').h("g","")}j(e[i-1]==\'Y\'){$(\'#1S\').h("g","g");$(\'#2c\').h("g","g");$(\'#1H\').h("g","g");$(\'#1f\').h("g","")}j(e[i-1]==\'X\'){$(\'#1Q\').h("g","g");$(\'#1R\').h("g","g");$(\'#1J\').h("g","g");$(\'#1g\').h("g","")}j(e[i-1]==\'W\'){$(\'#1O\').h("g","g");$(\'#1F\').h("g","g");$(\'#1L\').h("g","g");$(\'#18\').h("g","")}j(e[i-1]==\'V\'){$(\'#1M\').h("g","g");$(\'#1x\').h("g","g");$(\'#1N\').h("g","g");$(\'#1i\').h("g","")}j(e[i]==\'U\'){$(\'#1K\').h("g","g");$(\'#1v\').h("g","g");$(\'#1P\').h("g","g");$(\'#1j\').h("g","")}j(e[i]==\'T\'){$(\'#1I\').h("g","g");$(\'#1u\').h("g","g");$(\'#1p\').h("g","g");$(\'#1k\').h("g","")}j(e[i]==\'R\'){$(\'#1G\').h("g","g");$(\'#1t\').h("g","g");$(\'#1T\').h("g","g");$(\'#1l\').h("g","")}j(e[i]==\'Q\'){$(\'#1E\').h("g","g");$(\'#1s\').h("g","g");$(\'#1V\').h("g","g");$(\'#1m\').h("g","")}j(e[i]==\'P\'){$(\'#1C\').h("g","g");$(\'#1r\').h("g","g");$(\'#1X\').h("g","g");$(\'#1h\').h("g","")}j(e[i]==\'S\'){$(\'#1A\').h("g","g");$(\'#1q\').h("g","g");$(\'#1Z\').h("g","g");$(\'#1e\').h("g","")}j(e[i]==\'O\'){$(\'#1y\').h("g","g");$(\'#28\').h("g","g");$(\'#25\').h("g","g");$(\'#1a\').h("g","")}j(e[i]==\'M\'){$(\'#1w\').h("g","g");$(\'#26\').h("g","g");$(\'#27\').h("g","g");$(\'#19\').h("g","")}}}n o}});n o}',62,212,'||||||||||||||||checked|prop||if|val|var|function|return|false|id|data|col|lg|text|input|parent|id_reg|success|url|POST|type|seleccionar|border|imgmenu|eval|ajax|tbl|css|e91e63|flaticon|2px|solid|equipo|configuraciones|recursos|cantidadp|precios|medidas|mano|productos|facturacion|proveedores|redes|informacion|clientes|comentarios||||permisos|usuarios||||ng_rs|ng_eq|ng_rec|ng_conf|ng_us|ng_pr|ng_mo|ng_cli|ng_ic|ng_cp|ng_pro|ng_fac|ng_prod|ng_mp|ng_pp|ng_comment|nombre|eli_prod|ed_mo|ed_cp|ed_pp|ed_mp|ed_prod|ed_fac|ag_eq|ed_pro|ag_rec|eli_conf|ag_mo|eli_us|ag_cp|eli_pr|ag_pp|ed_rs|ag_mp|eli_cli|ag_prod|eli_ic|ag_fac|eli_rs|ag_pro|eli_pro|ag_rs|eli_fac|ag_ic|ed_ic|ag_cli|eli_mp|ag_pr|eli_pp|ag_us|eli_cp|ag_conf|eli_mo|||||img|eli_rec|ed_eq|eli_eq|ed_rec|ed_conf|ed_us|ed_pr|ed_cli|ed_comment|eli_comment|ag_comment|prod|id_tipo_contacto|imagenb64|list|html|class|thumb|src|image|base64|value|id_proveedor|uploaddiv|button|contacto|responsive|descripcion|door|menu|mode|circular|tipo|enlace|rings|seleccionar_tipo_producto|wanted|round|add|seleccionar_medida_producto|medida|seleccionar_foto_producto|seleccionar_usuario|addClass|seleccionar_proveedor|proveedor|direccion_proveedor|seleccionar_equipo|permiso|costo_click_equipo|seleccionar_obra|actividad|costo_hora|descripcion_actividad|seleccionar_permisos|apellido|correo|ng_coment|seleccionar_contactos_proveedor|none|seleccionar_tipo_contacto|seleccionar_configuracion|ads|seleccionar_red|seleccionar_producto|balloons|clothes|two|presentation|cards|with|and|nombre_permiso|for|photograph|billboard|calificacion|birthday|card|ag_coment|ed_coment|eli_coment|removeClass'.split('|'),0,{}))