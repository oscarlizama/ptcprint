//AQUI SE LLENA LA TABLA
function seleccionar_usuario(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
	var parametros = {"id": id,"tbl": 7};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('#id_reg').text(id);
				$('#nombre').val(datos[0]);
				$('#existencia').val(datos[1]);
				$('#calificacion').val(datos[2]);
				$('#descripcion').val(datos[3]);
				$('#tipo-prod').val(datos[4]);

			return false;
		}
	});
	return false;
}

function seleccionar_tipo_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = '../privado/procesos/seleccionar.php';
	var parametros = {"id": id,"tbl": 8};
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


function seleccionar_medida_producto(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
			return false;
		}
	});
	return false;
}

function seleccionar_proveedor(id){
	//swal("¡AHORA SE CARGA!", "El seleccionado es " + id, "success");
	$('.input').val();
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
	var url = '../privado/procesos/seleccionar.php';
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
}

// prueba de un cmb filtro

