function error_registrar(error) {
	UIkit.notify({
	    message : error,
	    status  : 'info',
	    timeout : 5000,
	    pos     : 'top-center'
	});
}