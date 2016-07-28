function empresa_nombre(){
	swal({   
		title: "Bienvenido a la configuracion.",   
		text: "Por favor ingrese el nombre de la empresa:",   
		type: "input",   
		showCancelButton: true,   
		closeOnConfirm: false,   
		animation: "slide-from-top",   
		inputPlaceholder: "Nombre de la empresa" 
	}, 
	function(inputValue){   
		if (inputValue === false) return false;      
		if (inputValue === "") {     
			swal.showInputError("Nombre no valido");     
			return false   
		}      
		var valor = [inputValue,'Ninguna','Ninguna','Ninguno','Ninguna'];
		insertar(18,valor);
		location.reload();
	});
}