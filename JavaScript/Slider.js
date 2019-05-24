var slider = document.getElementById("myRange");
var slider2 = document.getElementById("myRange2");
var slider3 = document.getElementById("myRange3");


var output = document.getElementById("demo");
var output2 = document.getElementById("hp");
var output3 = document.getElementById("stoc");

output.innerHTML = slider.value;
output2.innerHTML = slider2.value;
output3.innerHTML = slider3.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

slider2.oninput = function() {
  output2.innerHTML = this.value;
}

slider3.oninput = function() {
  output3.innerHTML = this.value;
}
