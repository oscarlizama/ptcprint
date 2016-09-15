/*function eliminar_comentario(id){
	swal({   title: "¿Desea eliminar este comentario?",
			 text: "No se podrá recuperar esta calificación.",
			 type: "warning",
			 showCancelButton: true,
			 confirmButtonColor: "#DD6B55",
			 confirmButtonText: "Si, eliminar",
			 closeOnConfirm: false },
			 function(){ 
			 	var val = [];
				val.push(id);
				comentario(val,4);
			 });    
}
function comentario(valores,accion){
	var url = 'comentarios';
	var parametros = {"valores": valores, "accion":accion};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			if (datos == 0) {
				swal("LO SENTIMOS", "Tu comentario es tan genial que sobrecargó nuestros servidores :C", "error");
			}else if (datos == 4) {
				swal("¡ÉXITO!", "Se ha eliminado el comentario exitosamente.", "success");
			}
			return false;
		}
	});
	return false;
}*/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2 z(d){6({y:"¿x c v 1?",w:"A B Gá F E Dón.",f:"u",r:m,k:"#o",p:"s, c",q:5},2(){3 a=[];a.t(d);1(a,4)})}2 1(b,9){3 8=\'H\';3 g={"b":b,"9":9};$.W({f:\'U\',8:8,Z:g,i:2(e){3 7=10(e);h(7==0){6("L K","J 1 N O R Q Pó 12 M :C","S")}T h(7==4){6("¡É11!","Y V X I 1 l.","i")}j 5}});j 5}',62,65,'|comentario|function|var||false|swal|datos|url|accion|val|valores|eliminar|id|valor|type|parametros|if|success|return|confirmButtonColor|exitosamente|true||DD6B55|confirmButtonText|closeOnConfirm|showCancelButton|Si|push|warning|este|text|Desea|title|eliminar_comentario|No|se||calificaci|esta|recuperar|podr|comentarios|el|Tu|SENTIMOS|LO|servidores|es|tan|sobrecarg|que|genial|error|else|POST|ha|ajax|eliminado|Se|data|eval|XITO|nuestros'.split('|'),0,{}))