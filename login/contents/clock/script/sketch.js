
function setup(){
		var canvas=createCanvas(300,300);
		canvas.parent("clock");
		angleMode(DEGREES);
		
		
}
function draw(){
	background(0);
	translate(152,152);
	let hr=hour();
	let mn=minute();
	let sc=second();
	rotate(-90);
	
	
	
	strokeWeight(6);
	stroke(255);
	noFill();
	let end1= map(sc,0,60,0,360);
	arc(0,0,280,280,0,end1);
	
	push();
	rotate(end1);
	stroke(255);
	line(0,0,100,0);
	pop();
	
	stroke(150,200,255);
	let end2=map(mn,0,60,0,360);
	arc(0,0,260,260,0,end2);
	
	push();
	rotate(end2);
	stroke(150,200,255);
	line(0,0,80,0);
	pop();
	
	stroke(200,0,255);
	let end3=map(hr%12,0,12,0,360);
	arc(0,0,240,240,0,end3);
	
	push();
	rotate(end3);
	stroke(200,0,255);
	line(0,0,60,0);
	pop();
	
	stroke(255);
	point(0,0);
	
	push();
	translate(100,0);
	rotate(90);
	textSize(18);
	fill(0, 102, 153);
	text("1 2",-13,3);
	pop();
	
	push();
	translate(0,100);
	rotate(90);
	textSize(18);
	fill(0, 102, 153);
	text("3",0,5);
	pop();
	
	push();
	translate(-100,0);
	rotate(90);
	textSize(18);
	fill(0, 102, 153);
	text("6",-4,8);
	pop();
	
	push();
	translate(0,-100);
	rotate(90);
	textSize(18);
	fill(0, 102, 153);
	text("9",-9,5);
	pop();
	
}

/*function drawTextAlongArc(context, str, centerX, centerY, radius, angle) {
	var len = str.length, s;
	context.save();
	context.translate(centerX, centerY);
	context.rotate(-1 * angle / 2);
	context.rotate(-1 * (angle / len) / 2);
	for(var n = 0; n < len; n++) {
		context.rotate(angle / len);
		context.save();
		context.translate(0, -1 * radius);
		s = str[n];
		context.fillText(s, 0, 0);
		context.restore();
	}
	context.restore();
}
angle = Math.PI * 1.2;
radius = 80;
context = document.getElementById("defaultCanvas0").getContext('2d');
drawTextAlongArc(context, '1 2 3 4 5 6 7 8 9', 0, 0, radius, angle);
*/
