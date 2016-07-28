var i = 0;
$(document).ready(function() {
    $('#menu-movil-b').click(function() {
    /*$('#menu-movil-b').remove();
    var close = '<span class="uk-icon-large uk-icon-close" id="close-menu"></span>';
    $("#boton-container").append(close);*/
        if(i == 0){
            $("#menu-movil-b").removeClass("uk-icon-bars close-menu").addClass("uk-icon-chevron-circle-left");
            $(".overlay").animate({"width":"toggle"});
            $("#cont-op-mv").animate({"width":"toggle"});

            i = 1;
        }
        else{
            $("#menu-movil-b").removeClass("uk-icon-chevron-circle-left close-menu").addClass("uk-icon-bars");
            $(".overlay").animate({"width":"toggle"});
            $("#cont-op-mv").animate({"width":"toggle"});
            i = 0;
        }
    });
});
$(document).ready(function(){
    $(".submenu-button").click(function(){
        if($(this).siblings('.sub-menu-mv').hasClass("abrir")){
            $(this).siblings('.sub-menu-mv').removeClass("abrir").hide();
        }
        else{
            $(this).siblings('.sub-menu-mv').addClass("abrir").show();
        }
    });
});