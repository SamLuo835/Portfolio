function Blocks(){
	this.startX;
	this.startY;
	this.color;
	this.pos;
	this.reach=false;
	this.start=function(){
		var x=Math.floor((Math.random()*7));
		var y=0;
		this.startX=x;
		this.startY=y;
	}
	this.shape=function(){
		ran=Math.floor(Math.random()*5);
		if(ran==0){
			ctx.fillStyle="white";
			this.color="white";
			ctx.fillRect(this.startX*gs,this.startY*gs,gs-2,gs-2);
			ctx.fillRect((this.startX+1)*gs,this.startY*gs,gs-2,gs-2);
			ctx.fillRect((this.startX+1)*gs,(this.startY+1)*gs,gs-2,gs-2);
			ctx.fillRect(this.startX*gs,(this.startY+1)*gs,gs-2,gs-2);
			this.pos=[[this.startX,this.startY],[this.startX+1,this.startY],
				[this.startX+1,this.startY+1],[this.startX,this.startY+1]];
	
		}
		else if(ran==1){
				ctx.fillStyle="red";
				this.color="red";
				ctx.fillRect(this.startX*gs,this.startY*gs,gs-2,gs-2);
				ctx.fillRect((this.startX+1)*gs,this.startY*gs,gs-2,gs-2);
				ctx.fillRect((this.startX+1)*gs,(this.startY+1)*gs,gs-2,gs-2);
				ctx.fillRect((this.startX+2)*gs,(this.startY+1)*gs,gs-2,gs-2);
				this.pos=[[this.startX,this.startY],[this.startX+1,this.startY],
					[this.startX+1,this.startY+1],[this.startX+2,this.startY+1]];
			}
			else if(ran==2){
					ctx.fillStyle="green";
					this.color="green";
					ctx.fillRect(this.startX*gs,this.startY*gs,gs-2,gs-2);
					ctx.fillRect((this.startX+1)*gs,this.startY*gs,gs-2,gs-2);
					ctx.fillRect((this.startX+2)*gs,this.startY*gs,gs-2,gs-2);
					ctx.fillRect(this.startX*gs,(this.startY+1)*gs,gs-2,gs-2);
					this.pos=[[this.startX,this.startY],[this.startX+1,this.startY],
					[this.startX+2,this.startY],[this.startX,this.startY+1]];
			}
		
				else if(ran==3){
						ctx.fillStyle="yellow";
						this.color="yellow";
						ctx.fillRect((this.startX)*gs,this.startY*gs,gs-2,gs-2);
						ctx.fillRect((this.startX+1)*gs,this.startY*gs,gs-2,gs-2);
						ctx.fillRect((this.startX+2)*gs,this.startY*gs,gs-2,gs-2);
						ctx.fillRect((this.startX+3)*gs,this.startY*gs,gs-2,gs-2);
						this.pos=[[this.startX,this.startY],[this.startX+1,this.startY],
					[this.startX+2,this.startY],[this.startX+3,this.startY]];
				}
					else if(ran==4){
						ctx.fillStyle="blue";
						this.color="blue";
						ctx.fillRect((this.startX+1)*gs,this.startY*gs,gs-2,gs-2);
						ctx.fillRect(this.startX*gs,(this.startY+1)*gs,gs-2,gs-2);
						ctx.fillRect((this.startX+1)*gs,(this.startY+1)*gs,gs-2,gs-2);
						ctx.fillRect((this.startX+2)*gs,(this.startY+1)*gs,gs-2,gs-2);
						this.pos=[[this.startX+1,this.startY],[this.startX,this.startY+1],
						[this.startX+1,this.startY+1],[this.startX+2,this.startY+1]];
				}
	}
	
	this.render=function(a,b){
		for(var i=0; i< this.pos.length;i++){
				posX=this.pos[i][0];
				posY=this.pos[i][1];
				posY=this.pos[i][1];
				ctx.fillStyle=this.color;
				ctx.fillRect((posX+a)*gs,(posY+b)*gs,gs-2,gs-2);
				block.pos[i]=[posX+a,posY+b];
			}
	}
	
}