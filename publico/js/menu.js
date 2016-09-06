var i = 0;
$("#menubutton").click(function () {
	if(i == 0){
		$("#menubutton").removeClass("flaticon-menu-button");
		$("#menubutton").addClass("flaticon-back-arrow-circular-symbol");
		$(".movildiv").css("display","block");
		$(".itemm-m").css("display","block");
		$(".opm").css("display","block");
		$(".overlym").css("display","block");
		$(".overlym2").css("display","block");
		$(".opm").addClass("animated SlideInLeft");
		$(".overlym2").addClass("animated SlideInLeft");
		$(".overlym").addClass("animated SlideInLeft");
		i = 1;
	}else{
		$("#menubutton").addClass("flaticon-menu-button");
		$("#menubutton").removeClass("flaticon-back-arrow-circular-symbol");
		$(".movildiv").css("display","none");
		$(".itemm-m").css("display","none");
		$(".opm").css("display","none");
		$(".overlym").css("display","none");
		$(".overlym2").css("display","none");
		i = 0;
	}
});

/*$(".mayor").hover(function(){
	$(this).addClass("animated SlideOutUp");
	$(this).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', $(this).parents("div.col-lg-1").find(".mayor-name").css("display","block"));
	}, function(){
	$(this).removeClass("animated SlideOutUp");
	$(this).addClass("animated SlideInDown");
	$(this).parents("div.col-lg-1").find(".mayor-name").css("display","none");
});*/