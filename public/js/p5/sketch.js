let img;
function setup() {
	createCanvas(720, 400);
	img = loadImage('../../img/petaits.jpg');
}

function draw() {
	// image(img, 0, 200);
  	// Displays the image at point (0, height/2) at half size
  	image(img, 0, -300, img.width / 2, img.height / 2);
}