function valores_check(num){
	var tbl = $("#tbl").val();
	var val = [];
	val.push($("#nombre_permiso").val());
	var checkboxes = ["configuraciones[]","usuarios[]","permisos[]","comentarios[]","clientes[]","informacion[]","redes[]","proveedores[]","facturacion[]","productos[]","medidas[]","precios[]","cantidadp[]","mano[]","recursos[]","equipo[]"];
	var values = {};
	var i;
	for (i = 0; i < checkboxes.length; i = i + 1) {
		sum = 0;
		var $inputs = $('#frm :input[name="'+checkboxes[i]+'"]:checked').not(".btn-scrud").not(".omitir");
		$inputs.each(function() {
			sum = (parseInt($(this).val())) + sum;
		});
		val.push(sum);
	}
	if(num == 1){
		val.push(1);
		insertar(tbl,val);
	}
	if(num == 2){
		val.push(1);
		val.push($('#id_reg').text());
		editar(tbl,val);
	}
}
function msjActualizarP(){
	swal({
		title: "¿Seguro de actualizar?",
		text: "Sa actualizarán los cambios en este usuario",
		type: "info",
		showCancelButton: true,
		confirmButtonColor: "#1e88e5",
		confirmButtonText: "Sí, actualizar",
		closeOnConfirm: false },
		function(){ 
			valores_check(2);
		});
}