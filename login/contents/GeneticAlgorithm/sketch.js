

var population;
// Each rocket is alive till x frames
var lifespan=400;
// Keeps track of frames
var count = 0;
// Where rockets are trying to go
var target;
// Max force applied to rocket
var maxforce = 0.2;

var btn1;
var btn2;
var btn3;
var btn4;
var btn5;
var h4;
var gen;
//html elements



//boolean to keep track of drawing line option
var drawBoo=false;

//default size
var popSize=10;

//objects that hits the target in a generation
var totalComplete=0;

//number of generation passed
var generation=0;

//wall array
var rectLoc=[];

//mouse location , click to draw wall
var mscx;
var mscy;

var canvas;

function setup() {
  btn1=select("#noline");
  btn2=select('#drawline');
  btn3=select("#pop10");
  btn4=select("#pop25");
  btn5=select("#pop50");
  h4=select('#frames');
  gen=select('#gen');
  canvaId=select('#defaultCanvas1');
  canvas=createCanvas(550, 300);
  canvas.parent("canva");
  population = new Population();
  target = createVector(520, height/2);
	btn1.mouseClicked(mySelectEvent);
	btn2.mouseClicked(mySelectEvent2);
	btn3.mouseClicked(mySelectEvent3);
	btn4.mouseClicked(mySelectEvent4);
	btn5.mouseClicked(mySelectEvent5);
	canvaId.mouseClicked(mySelectEvent);
  select('#defaultCanvas0').remove();
}

function draw() {
	
  background(0);
  population.run(rectLoc);
 
  
  // Displays count to window
	h4.html(count);
	gen.html(generation);
 
  for(var i=0;i<rectLoc.length;i++){
	fill(255);
  rect(rectLoc[i].x,rectLoc[i].y,10,120);}
  
  
  //each time draw runs count++
  count++;
  lifespan=rectLoc.length*25+400;
  if (count == lifespan) {
    population.evaluate();
	
	for(var i=0; i<population.rockets.length;i++){
		if(population.rockets[i].completed){
			totalComplete+=1;
		}
	}
	
    population.selection(draw);
	fill(255);
	for(var i=0; i<rectLoc.length;i++){
		rect(rectLoc[i].x,rectLoc[i].y,10,120);
	}
	
	
  
	for(var i=0;i<population.rockets.length;i++){
		population.rockets[i].locaions=[];
		}
    count = 0;
	lifespan=400;
	totalComplete=0;
	generation++;
	
  }
 
  ellipse(target.x, target.y, 16, 16);
}

function mouseClicked(){
	if(mouseX>0 && mouseX<550 && mouseY>0 && mouseY<300){
			mscx=mouseX;
			mscy=mouseY;
			rectLoc.push({x:mscx,y:mscy});
		}
	}

function mySelectEvent(){
	drawBoo=false;
}

function mySelectEvent2(){
	drawBoo=true;
}

function mySelectEvent3(){
	popSize=10;
	population=new Population();
	generation=0;
	draw();
}
function mySelectEvent4(){
	popSize=25;
	population=new Population();
	generation=0;
	draw();
}
function mySelectEvent5(){
	popSize=50;
	population=new Population();
	generation=0;
	draw();
}

	
