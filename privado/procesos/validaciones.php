<?php

function validarNombrePersona($n) {
	if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜ ]+$/", $n))
		return true;
	else
		return false;
}

function validarNumeroEntero($n) {
	if (preg_match("/^[\d]+$/", $n))
		return true;
	else
		return false;
}

function validarTelefono($n) {
	if (preg_match("/^[\d]{4}[-]{1}[\d]{4}$/", $n))
		return true;
	else
		return false;
}

function validarPrecio($n) {
	if (preg_match("/^[\d]+([.]{1}[\d]{2})?$/", $n))
		return true;
	else
		return false;
}

function validarTexto($n) {
	if (preg_match("/^([^<>])+$/", $n))
		return true;
	else
		return false;
}

function validarCorreo($n){
	if (preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/", $n))
		return true;
	else
		return false;
}

function validarExistencia($n){
	if (preg_match("/^\d*[123456789]+\d*$/", $n))
		return true;
	else
		return false;
}

?>