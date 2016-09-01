var archivoblb = "";
var nombreblb = "";
var tipo = "";

$("#filenombre").change(function(){
	$("#lblseleccionado").empty();
	$("#lblseleccionado").append("Se ha seleccionado un archivo");
});

//CUANDO DE CLICK AL MENSAJE QUITO EL NO LEIDO
$("li").click(function(){
	var id = $(this).attr("id");
	actualizarmsj(id);
});

/*$(".btn-enviarmsj").click(function(){
	var id = $(this).attr("id");
	var nombrefrm = "#frm" + id;
	alert(id);
	alert(nombrefrm);
	$(nombrefrm).submit();
});*/

//LA FUNCION PARA ACTUZLIAR LOS MENSAJES
function actualizarmsj(id){	
	//OBTENGO EL ID DE LA CONVERSACION
	var texto = $("li#"+id).children("a").text();
	//OBTENGO LA CADENA
	var numero_letras = texto.length;
	//QUITO EL NO LEIDO
	var ntexto = texto.substring(0,(texto.length - 10));
	//ACTUALZIAR
	if(texto.substring((texto.length - 10),texto.length) == "(NO LEIDO)"){
		var url = 'privado/procesos/puente.php';
		var val = [];
		val.push(1);
		val.push(id);
		///ENVIO LOS PARAMETROS AL PUENTE
		var parametros = {"valores":val,"tabla":30,"accion":2};
		$.ajax({
			type:'POST',
			url:url,
			data:parametros,
			async:false,
			success:function(d){
				$("li#"+id).children("a").text(ntexto);
			}
		});
		return false;
	}
}

function enviarmsjp(id,emisor){	
	//var texto = $("li#"+id).children("a").text();
	//var numero_letras = texto.length;
	//var ntexto = texto.substring(0,(texto.length - 10));
	//archivo(id);
	///ENVIO UN NUEVO MENSAJE
	var url = 'privado/procesos/mensajeriapv.php';
	var valmsj = [];
	var idtext = "#mensaje" + id;
	//AGREGGO AL ARREGLO
	valmsj.push(id);
	valmsj.push($(idtext).val());
	//VEO SI EL EMISOR ES EL CLINTE O EL ADMIN
	if (emisor == 0) {
		valmsj.push(0);
	}else{
		valmsj.push(1);
	}
	///MANDO TODO AL AJAX
	var parametros = {"valores":valmsj};
	$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		async:false,
		success:function(d){
			var data = eval(d);
			if(data == 1){
				location.reload();
			}
			else{
				swal("¡OUCH!", "No ha sido posible enviar el mensaje. Por favor, revisa el mensaje. Gracias.", "error");
			}
		}
	});
	return false;
}

$(function(){
    $("input[name='file']").on("change", function(){
        archivo();
    });
 });

///AQUI HAGO EL ARCHIVO A BLOB
function archivo(){
	//var nombreinput = "#filenombre";
	//alert($(nombreinput).val());
	//OBTENGO LA FILA
	var formData = new FormData($("#formulario")[0]);
	//LO MANDO A BASE64
    var ruta = "privado/procesos/archivoct.php";
    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        async:false,
        success: function(datos)
        {	
        	//OBTENGO EL ARCHIVO
        	info = eval(datos);
        	//OBTENGO EL ARCHIVO BLOB
        	archivoblb = info[0];
        	//OBTENGO EL NOMBRE
        	nombreblb = info[1];
        	//OBTENGO EL TIPO
        	tipo = info[2];
        	//SUBO LA FILA
        	//alert(nombreblb);
        	//uploadfile();
        }
    });
}

///SUBO LA FILA
function uploadfile(){
	//HAGO EL ARREGLO
	var val = [];
	//AGREGO LOS PARAMETROS
	val.push(nombreblb);
	val.push(archivoblb);
	val.push(tipo);
	//alert(nombreblb);
	//PONGO EL ID DE LA CONVERSACON
	val.push($("#conver").val());
	//ENVIO A LA URL
	var url = "privado/procesos/puente.php";
	var parametros = {"valores":val,"tabla":31,"accion":1};
    $.ajax({
        type:'POST',
		url:url,
		data:parametros,
        success: function(datos)
        {
        	swal("Archivo enviado","Tu archivo fue enviado con exito para su cotizacion","success");
        }
    });	
}

//CON ESTA FUNCION DESCARGO EL ARCHIVO
function descargar_archivo(id){
	var url = "privado/procesos/descarga_archivo.php";
	var parametros = {"id":id};
    $.ajax({
        type:'POST',
		url:url,
		data:parametros,
        success: function(datos)
        {
        	
        }
    });	
}

//INGRESO LOS PEDIDOS DEL CLIENTE
function pedidos(id){
	var val = [];
	///HAGO LA FECHA
	var f = new Date();
	var fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
	val.push(id);
	val.push(fecha);
	///ENVIO A ESTA URL
	var url = "privado/procesos/puente.php";
	var parametros = {"valores":val,"tabla":34,"accion":1};
	///EJECUTO TODO EL AJAX
    $.ajax({
        type:'POST',
		url:url,
		data:parametros,
        success: function(datos)
        {
        	swal("Archivo enviado","Hemos a agregado tu archivo a nuestros pedidos","success");
        }
    });	
}


///CUANDO TERMINA EL CARRITO EL ADMIN
function terminado(id){
	//SOLO OBTENGO EL ID DEL CARRITO
	var val = [];
	val.push(id);
	var url = "privado/procesos/puente.php";
	var parametros = {"valores":val,"tabla":32,"accion":3};
	//EJECUTO EL AJAX
    $.ajax({
        type:'POST',
		url:url,
		data:parametros,
        success: function(datos)
        {
        	swal("¡TERMINADO!","Se ha terminao el trabajo, se le notificará el cliente","success");
        }
    });	
}


//CUANDO TERMINA UN PEDIDO
function terminadop(id){
	//HAGO EL ARREGLO
	var val = [];
	val.push(id);
	//LO ENVIO A LA URL
	var url = "privado/procesos/puente.php";
	var parametros = {"valores":val,"tabla":34,"accion":3};
    $.ajax({
        type:'POST',
		url:url,
		data:parametros,
        success: function(datos)
        {
        	swal("¡TERMINADO!","Se ha terminao el trabajo, se le notificará el cliente","success");
        }
    });	
}