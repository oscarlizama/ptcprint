$(function(){

    var progressbar = $("#progressbar"),
        bar         = progressbar.find('.uk-progress-bar'),
        settings    = {

        action: '/', // upload url

        allow : '*.(jpg|gif|png)', // allow only images

        loadstart: function() {
            bar.css("width", "0%").text("0%");
            progressbar.removeClass("uk-hidden");
        },

        progress: function(percent) {
            percent = Math.ceil(percent);
            bar.css("width", percent+"%").text(percent+"%");
        },

        allcomplete: function(response) {

            bar.css("width", "100%").text("100%");

            setTimeout(function(){
                progressbar.addClass("uk-hidden");
            }, 250);
            swal("Éxito","Se ha cargado la imagen correctamente","success");
        }
    };

    var select = UIkit.uploadSelect($("#imagen"), settings);
});