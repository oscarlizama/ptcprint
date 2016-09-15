function cargar(){
	var image = document.getElementById("imgtoLoad");
	var img = document.getElementById("producto");
	image.src = 'data:image/*;base64,' + img.options[img.selectedIndex].value;
};