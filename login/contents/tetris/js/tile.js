function Tile(){
	this.tile=[];
	this. score=0;
	for(var i=0;i<=9;i++){
		this.tile[i]=[];
		for(var j=0;j<=19;j++){
			this.tile[i][j]=[false,"white"];
		}
	}
	this.update=function(blocks){
		for(var i=0;i<blocks.pos.length;i++){
			x=blocks.pos[i][0];
			y=blocks.pos[i][1];
			this.tile[x][y][0]=true;
			this.tile[x][y][1]=blocks.color;
		}
	}
	this.render=function(){
		for(var i=0;i<this.tile.length;i++){
					for(var j=0; j<=19;j++){
						if(this.tile[i][j][0]==true){
							ctx.fillStyle=this.tile[i][j][1];
							ctx.fillRect(i*gs,j*gs,gs-2,gs-2);
						}
					}
				}
	}
	this.findRow=function(){
		for(var i=0;i<=19;i++){
			complete=[];
			for (var j=0;j<=9;j++){
				if(this.tile[j][i][0]==true){
					complete.push(1);
					if(complete.length==10){
						this.collapse(i);
						this.score++;
					}
				}
			}
		}
	}
	this.collapse=function(row){
		for(var k=row; k>=1;k--){
			temp=[[,],[,],[,],[,],[,],[,],[,],[,],[,],[,]];
			for(var l=0; l<=9;l++){
				temp[l][0]=this.tile[l][k-1][0];
				temp[l][1]=this.tile[l][k-1][1];
			}
			for(var l=0;l<=9;l++){
				this.tile[l][k][0]=temp[l][0];
				this.tile[l][k][1]=temp[l][1];
			}
		}
	}
}