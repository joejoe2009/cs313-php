function clickMe() {
	alert("Clicked!");
}

function changeColor() {
	var textbox_id = "txtColor";
	var textbox = document.getElementById(textbox_id);

	var div_id = "hue1";
	var div = document.getElementById(div_id);

	var color = textbox.value;
	div.style.backgroundColor = color;

}