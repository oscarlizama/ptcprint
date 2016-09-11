$(function(){
    $("body").on("click", ".uk-button[data-message]", function(){
        UIkit.notify($(this).data());
    });
});
$(document).ready(function(){
	$('.datepicker').datepicker({
		maxViewMode: 2,
	    clearBtn: true,
	    language: "es",
	    orientation: "top auto",
	    autoclose: true
	});
});