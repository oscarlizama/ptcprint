var pasado = 0; 
var anterior = 0;

// Validamos y activamos el Permiso para Notificar
if(Notification.permission!=="granted") {
	Notification.requestPermission();
}

// var notificador = document.getElementById("notificadorThingy");

// Instanciamos el botón, para que al hacer Click en el, se proceda a lanzar la Notificación o un mensaje para actualizar el Navegador
//document.getElementById("btn_notificar").addEventListener("click", onNotificationButtonClick);
//$("#btn_notificar").click(function(){
//	onNotificationButtonClick();
//});

// Validamos si el Navegador soporta las Notificaciones en HTML 5
function notificacion_mensaje() {
	if (!isNotificationSupported()) {
		logg("Tu navegador no soporta Notificaciones. Por favor, utiliza una versión Reciente del Navegador Google Chrome o Safari.");
	return;
	}

	// Si el Navegador soporta las Notificaciones HTML 5, entonces que proceda a Notificar
	var notificacion = new Notification("Tienes mensajes nuevos", {
	    icon: 'privado/img/tw.jpg',
	    body: 'Abrir bandeja de mensajería.'
	});

	// Redireccionamos a un determinado Destino o URL al hacer click en la Notificación
	notificacion.onclick = function() {
		window.location = "cotizaciones";
	};					
}
		
// Solicitamos los Permisos del Sistema
function requestPermissions() {

}

// Luego del Permiso del Sistema, le indicamos que nos Muestre la Notificación
function isNotificationSupported() {
	return ("Notification" in window);
}

// Mostramos el Mensaje de la Notificación
function logg(mensaje) {
	notificador.innerHTML += "<p>"+mensaje+"</p>";
}

//notificacion_mensaje();
var mensajetimer = setInterval(timermensaje, 1000);
function timermensaje() {
	//ajax();
	//alert(pasa)
	$.ajax({
		type:'POST',
		url:"timer.php",
		data:{"pasado":pasado, "anterior":anterior},
		success:function(valores){
			var resp = eval(valores);
			arreglo = resp;
			anterior = arreglo[1];
			if (arreglo[0] == 1) {
				notificacion_mensaje();
			}
		}
	});
	pasado = 1;
}