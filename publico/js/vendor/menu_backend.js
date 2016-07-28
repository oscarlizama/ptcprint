$('#abrirmbk').click(function() {
    $("#abrirmbk").addClass("hide");
    $("#cerrarmbk").removeClass("hide");
    $(".opciones-menubk").toggleClass("abrirmbk");
    $(".opciones-menubk").removeClass("cerrarmbk");
});


$("#cerrarmbk").click(function(){
    $("#abrirmbk").removeClass("hide");
    $("#cerrarmbk").addClass("hide");
    $(".opciones-menubk").toggleClass("cerrarmbk");
    $(".opciones-menubk").removeClass("abrirmbk");
});