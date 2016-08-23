function selec_tbl(tbl,ruta){
	if (tbl == 1) {
		tbl_usuarios(ruta);
	};
	if (tbl == 2) {
		tbl_permisos(ruta);
	}
	if (tbl == 15) {
		tbl_configuraciones(ruta);
	}
	if (tbl == 16) {
		tbl_tipo_contacto(ruta);
	}
	if (tbl == 17) {
	    tbl_contactos_proveedor(ruta);
	}
	if (tbl == 7) {
	    tbl_productos(ruta);
	}
	if (tbl == 8) {
	    tbl_tipo_productos(ruta);
	}
	if (tbl == 9) {
	    tbl_medidas_productos(ruta);
	}
	if (tbl == 10) {
	    tbl_fotos_productos(ruta);
	}
	if (tbl == 21) {
	    tbl_proveedor(ruta);
	}
	if (tbl == 22) {
		tbl_equipos(ruta);
	}
	if (tbl == 23) {
		tbl_mano_obra(ruta);
	}
}
//
function tbl_usuarios(ruta){
	var url = "";
	var parametros = "";
	var id_rg = $("#id_reglog").text();
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 1,"id_reg":id_rg};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 1, "buscar": texto,"id_reg":id_rg};
	}
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Nombre</strong></th>" +
							"<th><strong>Apellidos</strong></th>" +
							"<th><strong>Correo electrónico</strong></th>" +
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+datos[i][3]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_usuario("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}
function tbl_permisos(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 2};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 2, "buscar": texto};
	}
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Nombre permiso</strong></th>" +							
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_usuario("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}
function tbl_configuraciones(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 15};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 15, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Nombre configuracion</strong></th>" +
							"<th><strong>Configuracion</strong></th>" +
							"<th><strong>Descripción</strong></th>" +
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+datos[i][3]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_configuracion("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}
function tbl_contactos_proveedor(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 17};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 17, "buscar": texto};
	}
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Proveedor</strong></th>" +
							"<th><strong>Contacto</strong></th>" +
							"<th><strong>Tipo de contacto</strong></th>" +
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+datos[i][3]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_contactos_proveedor("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}
function tbl_tipo_contacto(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 16};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 16, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Tipo de contacto</strong></th>" +
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_tipo_contacto("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}


//espacio para el guapo

function tbl_tipo_productos(ruta){  //recargar la tabla del CRUD de tipo productos
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 8};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 8, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Tipo de Producto</strong></th>"+
							"<th><strong></strong></th>"+
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_tipo_producto("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_productos(ruta){  //recargar la tabla del CRUD de productos
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 7};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 7, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Nombre</strong></th>"+
							"<th><strong>Tipo de Producto</strong></th>"+
							"<th><strong></strong></th>"+
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_producto("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_medidas_productos(ruta){  //recargar la tabla del CRUD de tipo productos
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 9};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 9, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Producto</strong></th>"+
							"<th><strong>Medida del producto</strong></th>"+
							"<th><strong></strong></th>"+
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_medida_producto("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_fotos_productos(ruta){  //recargar la tabla del CRUD de fotos de productos
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 10};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 10, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Producto</strong></th>"+
							"<th><strong>Miniatura</strong></th>"+
							"<th><strong></strong></th>"+
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td><img class='thumb img-responsive img-circle' src='data:image/*;base64, "+datos[i][2]+"' width='70' height='60'/></td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_foto_producto("+datos[i][0]+")'>"+
									"Ver imagen"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_proveedor(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 21};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 21, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>" +
						"<tr class='tb-heading'>" +
							"<th><strong>#</strong></th>" +
							"<th><strong>Proveedor</strong></th>" +
							"<th><strong>Direccion Proveedor</strong></th>" +
							"<th></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_proveedor("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_equipos(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 22};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 22, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>"+
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Nombre Equipo</strong></th>"+
							"<th><strong>Costo Click Equipo</strong></th>"+
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_equipo("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}

function tbl_mano_obra(ruta){
	var url = "";
	var parametros = "";
	var texto = $("#buscar").val();
	if (ruta == 1) {
		url = 'privado/procesos/info_tbl.php';
		parametros = {"sql": 23};
	}
	if (ruta == 2){
		url = 'privado/procesos/buscar.php';	
		parametros = {"sql": 23, "buscar": texto};
	}
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valores){
				var datos = eval(valores);
				$('.table-bk').remove();
				var tabla = 
					"<table class='table-bk'>"+
						"<tr class='tb-heading'>"+
							"<th><strong>#</strong></th>"+
							"<th><strong>Actividad</strong></th>"+
							"<th><strong>Costo por Hora</strong></th>"+
							"<th><strong>Descripción Actividad</strong></th>"+
							"<th><strong></strong></th>" +
						"</tr>";
				for (var i = 0; i < datos.length; i++) {
					tabla += 
						"<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+datos[i][1]+"</td>"+
							"<td>"+datos[i][2]+"</td>"+
							"<td>"+datos[i][3]+"</td>"+
							"<td>"+
								"<button class='btn-table' onclick='seleccionar_obra("+datos[i][0]+")'>"+
									"SELECCIONAR"+
									"<span class='flaticon-loupe'></span>"+
								"</button>"+
							"</td>"+
						"</tr>";
					}
				tabla += "</table>";
				$('#tabla_div').append(tabla);
				asignar();
			return false;
		}
	});
	return false;
}


function asignar(){
	$(".btn-table").click(function(event){
		$(".btn-ed").prop("disabled",false);
		$(".btn-ed").removeClass("disabled");
		$(".btn-el").prop("disabled",false);
		$(".btn-el").removeClass("disabled");
		$(".btn-ag").prop("disabled",true);
		$(".btn-ag").addClass("disabled");
	});
}