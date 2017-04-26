function somenteNumeros(num) {
	var er = /[^0-9.]/;
	er.lastIndex = 0;
	var campo = num;
	if (er.test(campo.value)) {
		campo.value = "";
	}
}
$(function() {
	var tooltips = $( "[title]" ).tooltip({
		position: {
			my: "left top",
			at: "right+5 top-5",
			collision: "none"
		}
	});
});