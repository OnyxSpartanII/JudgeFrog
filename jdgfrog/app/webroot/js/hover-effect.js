
var duration = 600;
var centerX = 8, centerY = 5;

function bringTheFunc(div) {
var startTime = Date.now();
var callback = function() {
var diff = Date.now() - startTime;
var perc = Math.floor(
120 * diff / duration);

div.style.webkitMaskImage = 

"-webkit-radial-gradient("
+ centerX + "px " + centerY + "px, "
+ "circle farthest-side, black 0%, "
+ "black " + (perc - 30) + "%, "
+ "rgba(0, 0, 0, 0.2) " + (perc - 1) + "%, "
+ "black " + perc + "%, black 100%)";

if (diff < duration) {
webkitRequestAnimationFrame(callback);
} else {
div.style.webkitMaskImage = "";
}
};

webkitRequestAnimationFrame(callback);
}


	// var radius = 5;
	// var interval = window.setInterval(function animLogo() {
	// $(".logo").css("-webkit-mask", "-webkit-gradient(radial, 27 27, " + radius + ", 5 5, " + 
	// (radius + 5) + ", from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))");
	// radius++;
	// if (radius === 150) {
	// window.clearInterval(interval);
	// }
	// }, 5);