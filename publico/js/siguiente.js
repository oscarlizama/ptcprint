$("#next").click(function () {
	//$("#menu").empty();
	$(".p").css("display","none");
	$(".login").addClass("animated fadeInUp");
	$(".login").css("display","block");
	//var menu = '<div class="item"><div class="glyph"><div class="glyph-icon flaticon-ads"></div><div class="class-name">Banners</div></div></div>';
	//menu += '<div class="overlay"></div>';
	//$("#menu").append($(".m2"));
	//$("#menu").append(menu);
});

$("#volver").click(function () {
	//$("#menu").empty();
	$(".p").addClass("animated fadeInDown");
	$(".p").css("display","block");
	$(".login").css("display","none");
	//var menu = '<div class="item"><div class="glyph"><div class="glyph-icon flaticon-ads"></div><div class="class-name">Banners</div></div></div>';
	//menu += '<div class="overlay"></div>';
	//$("#menu").append($(".m2"));
	//$("#menu").append(menu);
});