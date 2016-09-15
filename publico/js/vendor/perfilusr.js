/*function perfil(valores,repetida,accion){
	var url = 'editarperfil';
	var parametros = {"valores":valores, "repetida":repetida,"accion":accion};
		$.ajax({
		type:'POST',
		url:url,
		data:parametros,
		success: function(valor){
			var datos = eval(valor);
			if (datos == 0) {
				swal("Lo sentimos", "Hubo un error al tratar de procesar los datos", "error");
			}else if (datos == 1) {
				swal("¡EXITOSO!", "Hemos actualizado tu información", "success");
			}else if(datos == 2){
				swal("ERROR", "Hay un error, puede que las contraseñas no conicidan o que tu nombre y la contraseña son iguales", "error");
			}else if (datos == 100) {
				swal("ERROR", "asgdsajhsahhasdgsahgd asdhgsah gsah", "error");
			}else if(datos == 3){
				swal("ERROR", "Puede que tu nombre u apellido contenga carateres inválidos", "error");
			}else if(datos == 4){
				swal("ERROR", "Ingresa una contraseña diferente a la actual", "info");
			}else{
				swal("ERROR", datos, "error");
			}
			return false;
		}
	});
	return false;
}

$("#guardar_perfil").click(function(){
	var config = [];
	config.push($("#nombres").val());
	config.push($("#apellidos").val());
	config.push($("#id").text());
	perfil(config,"repetida",1);
});

$("#guardar_contra").click(function(){
	var config = [];
	config.push($("#nombres").val());
	config.push($("#apellidos").val());
	config.push($("#clavec").val());
	var repetida = $("#claverc").val();
	config.push($("#id").text());
	perfil(config,repetida,2);
	//alert(repetida);
});

$("#cancelar").click(function(){
	window.location.replace("indexp.php");
});*/
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('k m(c,d,e){h f=\'O\';h g={"N":c,"w":d,"S":e};$.W({1i:\'1j\',G:f,H:g,v:k(a){h b=R(a);9(b==0){6("X 1f","1g t 7 1k 1l 1m 1n 1o F","7")}i 9(b==1){6("¡I!","J K q Món","v")}i 9(b==2){6("j","P t 7, Q p 1x lñT U V o p q x y z lña Y Z","7")}i 9(b==10){6("j","11 12 13","7")}i 9(b==3){6("j","14 p q x u 15 16 17 18á19","7")}i 9(b==4){6("j","1a 1b lña 1c a z 1d","1e")}i{6("j",b,"7")}s A}});s A}$("#1h").r(k(){h a=[];a.5($("#B").8());a.5($("#C").8());a.5($("#D").E());m(a,"w",1)});$("#1p").r(k(){h a=[];a.5($("#B").8());a.5($("#C").8());a.5($("#1q").8());h b=$("#1r").8();a.5($("#D").E());m(a,b,2)});$("#1s").r(k(){1t.1u.1v("1w.L")});',62,96,'|||||push|swal|error|val|if||||||||var|else|ERROR|function|contrase|perfil|||que|tu|click|return|un||success|repetida|nombre||la|false|nombres|apellidos|id|text|datos|url|data|EXITOSO|Hemos|actualizado|php|informaci|valores|editarperfil|Hay|puede|eval|accion|as|no|conicidan|ajax|Lo|son|iguales|100|asgdsajhsahhasdgsahgd|asdhgsah|gsah|Puede|apellido|contenga|carateres|inv|lidos|Ingresa|una|diferente|actual|info|sentimos|Hubo|guardar_perfil|type|POST|al|tratar|de|procesar|los|guardar_contra|clavec|claverc|cancelar|window|location|replace|indexp|las'.split('|'),0,{}))