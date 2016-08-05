var img = "";
function insertar_usr(valores){
	var repetida = $("#claver").val();
	var url = 'privado/procesos/registrarusr.php';
	var parametros = {"valores": valores,"repetida":repetida};
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
					swal("¡EXITOSO!", "El registro se ha agregado con exito", "success");
					limpiar();
					selec_tbl($("#tbl").val(),1);
				break;
				case "mala": // Cuando todo funcione excelente
					swal("Error", "Las contraseñas no coinciden. Es posible que intente ingresar su nombre o correo como contraseña.", "info");
				break;
				case "validacion": // Cuando todo funcione excelente
					swal("Error", "Por favor revise los campos", "info");
				break;
				default: // Cuando ocurra un error en el server (no sea error del usuario)
					swal("¡HUY!", d, "warning");
					
				break;
			}
			//vista_tabla(vista);
		}
	});
	return false;
}

function insertar(tabla,valores){
	if (tabla != 1) {
		var url = 'privado/procesos/puente.php';
		var parametros = {"valores": valores,"tabla":tabla, "accion":1};
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
						swal("¡EXITOSO!", "El registro se ha agregado con exito", "success");
						limpiar();
						selec_tbl($("#tbl").val(),1);
					break;
					default: // Cuando ocurra un error en el server (no sea error del usuario)
						swal("¡HUY!", "Lo sentimos estamos experimentando problemas con nuestro servidor", "warning");
						//alert(d);
					break;
				}
				//vista_tabla(vista);
			}
		});
		return false;
	}else{
		insertar_usr(valores);
	}
}

function editar(tabla,valores){
	var url = 'privado/procesos/puente.php';
	var parametros = {"valores":valores,"tabla":tabla, "accion":2};
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
					selec_tbl($("#tbl").val(),1);
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


function eliminar(tabla,valores){
	var url = 'privado/procesos/puente.php';
	var parametros = {"valores":valores,"tabla":tabla, "accion":3};
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
					swal("¡EXITOSO!", "El registro se ha eliminado con exito", "success");
					limpiar();
					selec_tbl($("#tbl").val(),1);
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

function cerrarpv(){
	$.ajax( "privado/procesos/cerrarpv.php")
  	.done(function() {
    	window.location = ("private.php"); 
  	});
}

function imagen(){
	var ruta = "../privado/procesos/imgdefault64.php";
	var parametros = {"default":"../img/default.jpg"};
    $.ajax({
        url: ruta,
        type: "POST",
        data: parametros,
        async: false,
        success: function(datos)
        {
        	img = eval(datos);
        	$("#imagenb64").val(img);
        }
    });
}

function valores(num){
	//var num = num;
	var tbl = $("#tbl").val();
	var val = [];
	if(num == 0 || num == 1 || num == 3){
		var $inputs = $('#frm :input').not(".btn-scrud").not(".omitir").not("#imagen");
		var values = {};
		$inputs.each(function() {
			val.push(values[this.name] = $(this).val());
			//alert(val[val.length-1]);
		});
		if (tbl == 20 || tbl == 18 || tbl == 10) { //aqui poner todas las tablas que manejan imagenes
			if(img == ""){
				if ($("#imagenb64").val() == "ninguna") {
					imagen();
					val.push($("#imagenb64").val());
				}
				else{
					val.push($("#imagenb64").val());
				}
			}else{
				val.push(img);
			}
		};
	};
	//VALORES PARA LAS CONSULTAS
	if (num == 0) {
		//alert($("#imagenb64").val());
		//alert(val[val.length-1]);
		insertar(tbl,val);
	};
	if (num == 1) {
		val.push($("#id_reg").text());
		editar(tbl,val);
	};
	if (num == 2) {
		val.push($("#id_reg").text());
		eliminar(tbl,val);
	};
	if(num == 3){
		loginpv(val);
	}
}

//AQUI LIMPIA TODOS LOS INPUT
function limpiar(){
	$(".input").val("");
	$("option[value=0]").prop("selected",true);
}

function msjActualizar(){
	swal({
		title: "¿Seguro de actualizar?",
		text: "Sa actualizarán los cambios en este usuario",
		type: "info",
		showCancelButton: true,
		confirmButtonColor: "#1e88e5",
		confirmButtonText: "Sí, actualizar",
		closeOnConfirm: false },
		function(){ 
			valores(1);
		});
}

function msjCerrar(){
	swal({
		title: "¿Quieres cerrar sesión?",
		text: "La sesión actual se cerrará",
		type: "info",
		showCancelButton: true,
		confirmButtonColor: "#1e88e5",
		confirmButtonText: "Cerrar sesión",
		cancelButtonText: "No, mantenerme aquí",
		closeOnConfirm: false },
		function(){ 
			cerrarpv();
		});
}

function msjEliminar(){
	swal({
		title: "¿Seguro de eliminar?",
		text: "Ten en cuenta que no se podra recuperar esta informacion",
		type: "info",
		showCancelButton: true,
		confirmButtonColor: "#b71c1c",
		confirmButtonText: "Sí, eliminar",
		closeOnConfirm: false },
		function(){ 			
			valores(2);
		});
}

$(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "privado/procesos/imagenb64.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
            	img = eval(datos);
            }
        });
    });
 });


//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-regc").click(function(event){
	valores(0);
});

//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-ag").click(function(event){
	valores(0);
});
//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-ed").click(function(event){
	msjActualizar();
});
//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-el").click(function(event){
	msjEliminar();
});


//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-ag-pr").click(function(event){
	valores_check(1);
});
//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-ed-pr").click(function(event){
	msjActualizarP();
});
//AQUI ESTAN LOS EVENTOS DE LOS BOTONES
$(".btn-el-pr").click(function(event){
	msjEliminar();
});

$(".btn-nv").click(function(event){
	$(".btn-ed").prop("disabled",true);
	$(".btn-ed").addClass("disabled");
	$(".btn-el").prop("disabled",true);
	$(".btn-el").addClass("disabled");
	$(".btn-ag").prop("disabled",false);
	$(".btn-ag").removeClass("disabled");
	limpiar();
});

$(".btn-nv-pr").click(function(event){
	$(".btn-ed-pr").prop("disabled",true);
	$(".btn-ed-pr").addClass("disabled");
	$(".btn-el-pr").prop("disabled",true);
	$(".btn-el-pr").addClass("disabled");
	$(".btn-ag-pr").prop("disabled",false);
	$(".btn-ag-pr").removeClass("disabled");
	limpiar();
});

$(".btn-table").click(function(event){
	$(".btn-ed").prop("disabled",false);
	$(".btn-ed").removeClass("disabled");
	$(".btn-el").prop("disabled",false);
	$(".btn-el").removeClass("disabled");
	$(".btn-ag").prop("disabled",true);
	$(".btn-ag").addClass("disabled");
});

$(".btn-table-pr").click(function(event){
	$(".btn-ed-pr").prop("disabled",false);
	$(".btn-ed-pr").removeClass("disabled");
	$(".btn-el-pr").prop("disabled",false);
	$(".btn-el-pr").removeClass("disabled");
	$(".btn-ag-pr").prop("disabled",true);
	$(".btn-ag-pr").addClass("disabled");

});

$("#icon-usuario").click(function(event){
	msjCerrar();
});