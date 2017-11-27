window.onload=function() {
	canv=document.getElementById("gc");
	ctx=canv.getContext("2d");
	document.addEventListener("keydown",keyReleased);
	document.addEventListener("keyup",keyPush);
	ctx.fillStyle="black";
	ctx.fillRect(0,0,canv.width,canv.height);
	tileArr=new Tile();
	game();
	document.addEventListener("keydown",rotate);
	interval=setInterval(falling,1000);

}
var tileArr;
var tc=10;
var gs=30;
var block;
var reached=false;
var newone=false;


function game() {
	block=new Blocks();
	block.start();
	block.shape();
}

function falling(){
			contact();
			ctx.fillStyle="black";
			ctx.fillRect(0,0,canv.width,canv.height);
			if(!newone){block.render(0,1)}
			block.render(0,0);
			newone=false;
			tileArr.render();
		}
var reachTop=false;
function contact(){
		reachTop=false;
		for(var i=0;i<block.pos.length;i++){
			if(block.pos[i][1]==19){
				block.reached=true;
				clearInterval(interval);
				tileArr.update(block);
				tileArr.findRow();
				document.getElementsByClassName("score")[0].innerHTML=tileArr.score;
				document.getElementsByClassName("score")[1].setAttribute("value",tileArr.score);
				tileArr.render();
				game();
				newone=true;
				interval=setInterval(falling,800);
				break;
			}
			x=block.pos[i][0];
			y=block.pos[i][1];
			if (typeof tileArr.tile[x][y+1][0] !== 'undefined') {
				if(tileArr.tile[x][y+1][0]==true){
					for(var j=0; j<4;j++){
						if(block.pos[j][1]==0){
							block.reached=true;
							clearInterval(interval);
							newone=true;
							reachTop=true;
						}
					}
						if(!reachTop){
							block.reached=true;
							clearInterval(interval);
							tileArr.update(block);
							tileArr.findRow();
							document.getElementsByClassName("score")[0].innerHTML=tileArr.score;
							document.getElementsByClassName("score")[1].setAttribute("value",tileArr.score);
							tileArr.render();
					
							game();
							newone=true;
							interval=setInterval(falling,800);
								}
							}
						}
					}
				}	
	
var pressedl = 0;
var pressedr = 0;
var pressedd = 0;
var leftwall=false;
var rightwall=false;
function keyPush(evt) {
	leftwall=false;
	rightwall=false;
	for(var i=0; i< block.pos.length;i++){
				if(block.pos[i][0]==0)
					leftwall=true;
				else if(block.pos[i][0]==9)
						rightwall=true;
			}
	if(!block.reached){
		hit=false;
		switch(evt.keyCode) {
			case 37:
			if(pressedl == 0){
			left();
			if(!leftwall&&!hit){
				ctx.fillStyle="black";
				ctx.fillRect(0,0,canv.width,canv.height);
				block.render(-1,0);
				tileArr.render();
				}
			pressedl=1;
			}
				break;
			case 39:
			if(pressedr == 0){
			right();
			if(!rightwall&&!hit){
				ctx.fillStyle="black";
				ctx.fillRect(0,0,canv.width,canv.height);
				block.render(1,0);
				tileArr.render();
				}
			pressedr=1;
			}
				break;
			case 40:
			if(pressedd == 0){
				contact();
				if(block.reached){pressedd=1}
				else{
					ctx.fillStyle="black";
					ctx.fillRect(0,0,canv.width,canv.height);
					if(!newone){block.render(0,1)}
					block.render(0,0);
					newone=false;
					tileArr.render();
					pressedd=1;
				}
				
			}
				break;
			}
	}
}

function keyReleased(evt) {
	switch(evt.keyCode) {
		case 37:
			pressedl=0;
			break;
		case 39:
			pressedr=0;
			break;
		case 40:
			pressedd=0;
			break;
	}
}

	
function right(){
	for(var i=0;i<block.pos.length;i++){
		x=block.pos[i][0];
		y=block.pos[i][1];
		if (typeof tileArr.tile[x+1] == 'undefined'|| rightwall){}
		else if(tileArr.tile[x+1][y][0]==true){
				hit=true;
			}
		}
	}
function left(){
	for(var i=0;i<block.pos.length;i++){
		x=block.pos[i][0];
		y=block.pos[i][1];
		if (typeof tileArr.tile[x-1] == 'undefined'|| leftwall){}
		else if(tileArr.tile[x-1][y][0]==true){
				hit=true;
			}
		}
	}
	
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);


var matrix=[[0,-1],[1,0]];
function rotate(evt){
	if(evt.keyCode==38){
			if(block.color=="blue"){
				pivotX=block.pos[2][0];
				pivotY=block.pos[2][1];
				matrixEva(pivotX,pivotY);
				
			}
			else if(block.color=="yellow"||block.color=="green"||block.color=="red"){
				pivotX=block.pos[1][0];
				pivotY=block.pos[1][1];
				matrixEva(pivotX,pivotY);
			}
			
		}
}

function matrixEva(X,Y){
	vr=[[],[],[],[]];
				for(var i=0; i<4;i++){
					vr[i].push(block.pos[i][0]-X);
					vr[i].push(block.pos[i][1]-Y);
				}
				vt=[[],[],[],[]];
				for(var i=0; i<4;i++){
					vt[i].push(matrix[0][0]*vr[i][0]+matrix[0][1]*vr[i][1]);
					vt[i].push(matrix[1][0]*vr[i][0]+matrix[1][1]*vr[i][1]);
				}
				vf=[[],[],[],[]];
				for(var i=0; i<4;i++){
					vf[i].push(vt[i][0]+X);
					vf[i].push(vt[i][1]+Y);
				}
				outofgrid=false;
				for(var i=0; i<4;i++){
					if(vf[i][0]<0 || vf[i][0]==10 ||vf[i][1]<0 || vf[i][1]==20){outofgrid=true;}
				}
				if(!outofgrid){
						for(var i=0; i<4;i++){
							block.pos[i][0]=vf[i][0];
							block.pos[i][1]=vf[i][1];
						}
								
						ctx.fillStyle="black";
						ctx.fillRect(0,0,canv.width,canv.height);
						tileArr.render();
				
						for(var i=0; i<4; i++){
							ctx.fillStyle=block.color;
							ctx.fillRect(block.pos[i][0]*gs,block.pos[i][1]*gs,gs-2,gs-2);
							}
					}
				
}





