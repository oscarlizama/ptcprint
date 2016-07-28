function comenzar(){
	$("#btnVer").on("click",function(){
		Guardar(elemento); //Botón para cargar la imagen en la prevista
	})
	var elemento = document.getElementById("canvasedi"); //se obtiene el elemento del canvas mediante el ID
	var lienzo;
	lienzo = elemento.getContext("2d"); // Se obtiene el contexto del canvas
	var imagen = new Image();
	imagen.src="img/cm-f.png"; //Ingresamos la imagen de la camisa
	imagen.addEventListener("load", function(){
	lienzo.drawImage(imagen,180,0,1000,elemento.height)},false); // Se ubica la imagen en el canvas en las posiciones establecidas
}
window.addEventListener("load",comenzar,false);

function Guardar(canvas){ //Funcion para convertir de canvas a imagen
	var dataCanvas = canvas.toDataURL();
	document.getElementById('canvasImg').src = dataCanvas; //la src de la img se delimita como
}
