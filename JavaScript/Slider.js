var slider = document.getElementById("myRange");
var slider2 = document.getElementById("myRange2");

var output = document.getElementById("demo");
var output2 = document.getElementById("hp");

output.innerHTML = slider.value;
output2.innerHTML = slider2.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

slider2.oninput = function() {
  output2.innerHTML = this.value;
}
