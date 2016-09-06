$(".imgmenu").click(function () {
	var id = 0;
	var icono = "";
	id = $(this).attr("id");
	//alert($(this).attr("id"));
	$(".col-lg-2").css({"border":"none"});
	$(this).parent(".col-lg-2").css({"border":"2px solid #e91e63"});
	if (id == 1) {
		icono = "flaticon-ads";
	}
	if (id == 2) {
		icono = "flaticon-balloons";
	}
	if (id == 3) {
		icono = "flaticon-clothes";
	}
	if (id == 4) {
		icono = "flaticon-two-presentation-cards-with-text-and-photograph";
	}
	if (id == 5) {
		icono = "flaticon-billboard";
	}
	if (id == 6) {
		icono = "flaticon-birthday-card";
	}
	if (id == 7) {
		icono = "flaticon-door";
	}
	if (id == 8) {
		icono = "flaticon-menu";
	}
	if (id == 9) {
		icono = "flaticon-mode-circular-button";
	}
	if (id == 10) {
		icono = "flaticon-rings";
	}
	if (id == 11) {
		icono = "flaticon-wanted";
	}
	if (id == 12) {
		icono = "flaticon-round-add-button";
	}
	$("#icono").val(icono);
	//alert($("#icono").val());
});