$(function(){
    $("body").on("click", ".uk-button[data-message]", function(){
        UIkit.notify($(this).data());
    });
})