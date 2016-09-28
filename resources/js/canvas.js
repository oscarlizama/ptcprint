function readURL(input,number) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var numberparametro = number;
            reader.onload = function (e) {
                $('#hid' + numberparametro)
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
//////////////////////////////////////////////////
var canvas = new fabric.Canvas("maincanvas",{hoverCursor: 'pointer'});
canvas.selectionColor = 'rgba(0,255,0,0.3)';
  canvas.selectionBorderColor = 'red';
  canvas.selectionLineWidth = 2;
  var iden = 0;
canvas.on({
    'object:moving': function(e) {
      	e.target.opacity = 0.5;
      	if (inden = 0)
      	{
			var top = canvas.getActiveObject().top;
			var left = canvas.getActiveObject().left;
			var obhe = canvas.getActiveObject().height;
			var bottom = top + obhe;
			var obwi = canvas.getActiveObject().width;
			var right = left + obwi;
			canvas.getActiveObject().setLeft(Math.min(Math.max(left, leftm1), rightm1 - obwi));
	      	canvas.getActiveObject().setTop(Math.min(Math.max(top, topm1), bottomm1 - obhe));
	      	render();
	      	
      	}
      	else{
      		if (e.target.get('type') == "path")
      		{
      			console.log("es un camino tio");//considerar si limitar dibujo
      			var top = canvas.getActiveObject().top;
				var left = canvas.getActiveObject().left;
				var obhe = canvas.getActiveObject().getHeight();
				var obwi = canvas.getActiveObject().getWidth();
				var bottom = top + obhe;
				var right = left + obwi;
				canvas.getActiveObject().setLeft(Math.min(Math.max(left, leftm1 ), rightm1 - obwi + 190));
		      	canvas.getActiveObject().setTop(Math.min(Math.max(top, topm1), bottomm1 - obhe + 80));
		      	render();  
      		}
      		else{
	      		var top = canvas.getActiveObject().top;
				var left = canvas.getActiveObject().left;
				var obhe = canvas.getActiveObject().getHeight();
				var obwi = canvas.getActiveObject().getWidth();
				var bottom = top + obhe;
				var right = left + obwi;
				canvas.getActiveObject().setLeft(Math.min(Math.max(left, leftm1), rightm1 - obwi));
		      	canvas.getActiveObject().setTop(Math.min(Math.max(top, topm1), bottomm1 - obhe));
		      	render();      		
	      	}
      	}
      //onChange(e);
    },
    'object:modified': function(e) {
      e.target.opacity = 1;
      right = 0;
      bottom = 0;
      inden = 1;
      console.log("width" +canvas.getActiveObject().getWidth());
      console.log("height" +canvas.getActiveObject().getHeight());
      console.log("top" +canvas.getActiveObject().getTop());
      console.log("left" + canvas.getActiveObject().getLeft());
      console.log(e.target.get('type'));
    },
    'object:scaling': function(e){
    	right = 0;
    	bottom = 0;
    }
    //'object:scaling': onChange,
    //'object:rotating': onChange,
  });
var color_HEX = "#000000";
var color_RGB;
var edit_num;
var dibujando = false;
var brush;
function render(){
	canvas.renderAll();
}
function clearCanvas(){
	//habilitar botones, limpiar canvas
	canvas.clear();
	cargarFondo();
	for (var i = 1; i <= 3; i++) {
	document.getElementById("btns" + i).removeAttribute('disabled');
	document.getElementById("btns" + i).title = "";		
	};	
}
function eliminar(){
	if (canvas.getActiveGroup() != null){
		canvas.getActiveGroup().forEachObject(function(o){ canvas.remove(o) });
      	canvas.discardActiveGroup().renderAll();
	}
	else{
		canvas.remove(canvas.getActiveObject());
	}	
	
}
function update(picker) {
    color_HEX = picker.toHEXString();
    color_RGB = picker.toRGBString(); 
    actualizarBrush();
    if (canvas.getActiveObject != null) //si se ha seleccionado algo
    {
    	canvas.getActiveObject().set("fill",color_HEX);
    }   
    render();
    }
function cargarFondo(identificador){
	var Editando = document.getElementById("editando").value;	
	switch (Editando){
		case "Camisa":  //Editando una camisa
		canvas.setBackgroundImage("resources/img/camisablanca3.png");
		var boundingBox = new fabric.Rect({
		  fill: "none",
		  width: 550,
		  height: 479,
		  left: 190,
		  top: 20,
		  hasBorders: false,
		  hasControls: false,
		  hasRotatingPoint: false,
		  lockRotation: false,
		  selectable: false,
		  lockMovementX: true,
		  lockMovementY: true,
		  evented: false,
		  stroke: "red",
		  opacity: 0.0
		});
		canvas.add(boundingBox);

		var topm1 = boundingBox.top;
		var leftm1 = boundingBox.left;
		var bottomm1 = topm1 + boundingBox.height;
		var rightm1 = leftm1 + boundingBox.width;
		break;
		case "Taza": //Editando una taza
		canvas.setBackgroundImage("resources/img/taza3-bak.png");
		var boundingBox = new fabric.Rect({
		  fill: "none",
		  width: 550,
		  height: 479,
		  left: 190,
		  top: 20,
		  hasBorders: false,
		  hasControls: false,
		  hasRotatingPoint: false,
		  lockRotation: false,
		  selectable: false,
		  lockMovementX: true,
		  lockMovementY: true,
		  evented: false,
		  stroke: "red",
		  opacity: 0.0
		});
		canvas.add(boundingBox);

		var topm1 = boundingBox.top;
		var leftm1 = boundingBox.left;
		var bottomm1 = topm1 + boundingBox.height;
		var rightm1 = leftm1 + boundingBox.width;
		break;
		default:		
		alert("Escoga algo que editar");
	}
}
function actualizarBrush(){
	canvas.freeDrawingBrush.color = color_HEX;
    canvas.freeDrawingBrush.width = parseInt(document.getElementById("fsize").value);
}

function habilitarDibujo(id){
	if (id != 69){
		if (!dibujando) {
			canvas.isDrawingMode = true;
			dibujando = true;
			brush = id;
			canvas.freeDrawingBrush = new fabric[brush + 'Brush'](canvas);
			if (canvas.freeDrawingBrush) {
			      actualizarBrush();
			    }
		}	
	}
	else{
		canvas.isDrawingMode = false;
		dibujando = false;
	}
}
function CambiarEditando(identificador){
	switch (identificador){
		case 1:
			document.getElementById("editando").setAttribute('value','Camisa');
			clearCanvas();

			break;
		case 2:
			document.getElementById("editando").setAttribute('value','Taza');
			clearCanvas();
			break;
		default:
			alert("no disponible");
			break;
	}
	cargarFondo();
	//limpiar todo el canvas
}

function CambiarLetra() {		 // Este solo cambia la letra del text Area
        var cmb = document.getElementById('tipo_letra');
        var family = cmb.options[cmb.selectedIndex].value;
        var txtA = document.getElementById('txtdes')
        txtA.style.fontFamily = family;       
      }
function añadirTexto(){
	var texto = document.getElementById("txtdes").value;
	var cmb = document.getElementById('tipo_letra');
	var family = cmb.options[cmb.selectedIndex].value;
	if (texto != ""){
		var textTOadd = new fabric.Text("" + texto, { left: 100, top: 100, fontSize: parseInt(document.getElementById("fsize").value),
			fontFamily: family, fill: "" + color_HEX, borderColor: 'black', cornerColor: 'purple',
			cornerSize: 15, transparentCorners: true });
		canvas.add(textTOadd);
		document.getElementById("txtdes").value = "";
	}		
	render();
}
function añadirImagen(idnum_img){
	var imagen = document.getElementById("hid" + idnum_img);
	var srcimg = document.getElementById("hid" + idnum_img).src;
	if (imagen != null && (srcimg != "#" && srcimg != "" && !srcimg.includes("http"))){ //verificar eso de includes con el server
		//si la imagen ya fue cargada
		var imagenInstancia = new fabric.Image(imagen,{
		left: 100,
  		top: 100,
  		width: 200,
  		height: 200,
  		borderColor: 'black', cornerColor: 'purple',
		cornerSize: 15, transparentCorners: true
		});
		canvas.add(imagenInstancia);
		render();
		document.getElementById("btns" + idnum_img).disabled = "true";
		document.getElementById("btns" + idnum_img).title = "Se Habilita al Limpiar";
	}
	else{
		alert("Escoga una imagen que agregar");
	}		
}
function crearCirculo(){
	var circle = new fabric.Circle({
  		radius: 40, fill: "" + color_HEX, left: 100, top: 100, borderColor: 'black', cornerColor: 'purple',
		cornerSize: 15, transparentCorners: true
	});
	canvas.add(circle);
	render();
}
function crearTriangulo(){
	var triangle = new fabric.Triangle({
	  width: 80, height: 80, fill: "" + color_HEX, left: 100, top: 100, borderColor: 'black', cornerColor: 'purple',
		cornerSize: 15, transparentCorners: true
	});
	canvas.add(triangle);
	render();
}
function crearCuadro(){
	var cuadro = new fabric.Rect({
		width: 80, height:80, fill: "" + color_HEX, left: 100, top: 100, borderColor: 'black', cornerColor: 'purple',
		cornerSize: 15, transparentCorners: true
	});
	canvas.add(cuadro);
	render();
}
function crearLinea(){
	var linea = new fabric.Line({
		height: 40, width: 12, fill: "" + color_HEX, left: 100, top: 100, borderColor: 'black', cornerColor: 'purple',
		cornerSize: 15, transparentCorners: true
	});
	canvas.add(linea);
	render();
}
var boundingBox = new fabric.Rect({
  fill: "none",
  width: 550,
  height: 479,
  left: 190,
  top: 20,
  hasBorders: false,
  hasControls: false,
  hasRotatingPoint: false,
  lockRotation: false,
  selectable: false,
  lockMovementX: true,
  lockMovementY: true,
  evented: false,
  stroke: "red",
  opacity: 0.0
});
canvas.add(boundingBox);

var topm1 = boundingBox.top;
var leftm1 = boundingBox.left;
var bottomm1 = topm1 + boundingBox.height;
var rightm1 = leftm1 + boundingBox.width;


function traeradelante(){ 
	canvas.bringForward(canvas.getActiveObject());
	render();
}
function enviaratras(){ 
	canvas.sendBackwards(canvas.getActiveObject());
	render();
}
function traerfrente(){ 
	canvas.bringToFront(canvas.getActiveObject());
	render();
}
function enviarfondo(){ 
	canvas.sendToBack(canvas.getActiveObject());
	render();
}

// canvas.on('object:selected',function (e){
// 	if (canvas.getActiveObject != null && canvas.getActiveObject.isType('text')){
// 		document.getElementById("txtdes").value = canvas.getActiveObject().get('text');
// 	}
// })
// canvas.on('object:deselected',function (e){
// 		alert("deseleccion");
// 		document.getElementById("txtdes").value = "";
// })

var wage = document.getElementById("bodyxd"); //eventlistener
wage.addEventListener("keydown", function (e) {
    if (e.keyCode === 46) {  //Si se presiona la tecla suprimir
        //chequear si canvas esta cargado y eso
	    if (canvas.getActiveObject != null) //si hay un objeto seleccionado
	    {
	    	eliminar();
	    }
    }
    if (e.keyCode === 27) //Si se presiona la tecla escape
    {
    	if (canvas.freeDrawingBrush != null){
    		habilitarDibujo('69');
    	}
    }
});


$("#Saves").click(function(){
	$("#maincanvas").get(0).toBlob(function(blob){
		var reader = new window.FileReader();
		 reader.readAsDataURL(blob); 
		 reader.onloadend = function() {
		                base64data = reader.result;                
		                inputhide = document.getElementById("blobimg");
						inputhide.value = base64data;
		  }
		  swal({   
		  	title: "¿Terminado?",   
		  	text: "¿Ya has terminado de editar tu diseño?",   
		  	type: "success",   
		  	showCancelButton: true,   
		  	confirmButtonColor: "#DD6B55",   
		  	confirmButtonText: "Si",   
		  	cancelButtonText: "No",   
		  	closeOnConfirm: false,   
		  	closeOnCancel: true }, 
		  	function(isConfirm){   
		  		if (isConfirm) { 
		  				swal({   
					  	title: "Formato",   
					  	text: "¡en qué formato desea su diseño?",   
					  	type: "info",   
					  	showCancelButton: true,   
					  	confirmButtonColor: "#DD6B55",   
					  	confirmButtonText: "PDF",   
					  	cancelButtonText: "Imagen",   
					  	closeOnConfirm: false,   
					  	closeOnCancel: false }, 
					  	function(isConfirm){   
					  		if (isConfirm) {     
					  			document.getElementById("formurep").submit();	  
					  		} else {     
					  			png();
					  		} 
					  	});	 
		  		} else {     
		  			
		  		} 
		  	});

		  	
		
	});
});

function png(){
	$("#maincanvas").get(0).toBlob(function(blob){
		var reader = new window.FileReader();
		 reader.readAsDataURL(blob); 
		 reader.onloadend = function() {
		                base64data = reader.result;                
		                inputhide = document.getElementById("blobimg");
						inputhide.value = base64data;
		  }		
		saveAs(blob,"Diseño_Personalizado_" + document.getElementById("editando").value +".png");		
		window.location = "canvas";	//ne?
	});
}

function onChange(options) { //interponer las figuras/imagenes
    options.target.setCoords();
    canvas.forEachObject(function(obj) {
      if (obj === options.target) return;
      obj.setOpacity(options.target.intersectsWithObject(obj) ? 0.5 : 1);
    });
  }
cargarFondo();
render();
