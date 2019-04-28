let img;
function setup() {
	createCanvas(555, 700);
	img = loadImage('../../img/petaits.jpg');
}

function draw() {
	image(img, 0, 0);
  	// Displays the image at point (0, height/2) at half size
  	// image(img, 0, 0, img.width / 2, img.height / 2);
}