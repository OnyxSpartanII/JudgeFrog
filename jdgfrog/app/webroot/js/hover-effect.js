
var duration = 1500;
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
