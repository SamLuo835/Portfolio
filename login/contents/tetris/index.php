<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tetris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/p5.js"></script>
  <script src="../../../lib/codemirror.js"></script>
  <link rel="stylesheet" href="../../../lib/codemirror.css">
   <script src="../../../addon/active-line.js"></script>
   <script src="../../../mode/javascript.js"></script>
   
  <style>
  li .form-control{
			margin-top:6px;
			background-color:#222;
			color:#FFF}
	.last{margin-top:40px;}
	.needSpace{margin-top:60px;}
	.CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}
	.description{font-size:1.6em}
	.centering{display:flex;justify-content:center;}
	.navbar{
		margin-bottom:0;
		border-radius:0;
		}
		.navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus
		, .navbar-inverse .navbar-nav .active a:hover{
		background-color:#222;
		color:#FFF;
		
		}
	.navbar-brand{
	float:left;
	min-height:55px;
	padding:1px 15px 15px;
	}
	footer{
	width:100%;
	background-color:black;
	margin-top:5px;
	padding:5%;
	color:white;
	}
	.fa{
		padding:15px;
		font-size:25px;
		color:white;
	}
	.fa:hover{
		color:#D5D5D5;
		text-decoration:none;
	}
	#myform{visibility:hidden!important;}
	@media (max-width:900px){
	.fa{
		font-size:20px;
		padding:10px;
		}
	}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=""><img src="../../../images/s.png"></a>
		</div>
		<div id="myNavbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class=active><a href="../../index.php">Home</a></li>
					<li><a href="../tetris/index.php">Tetris</a></li>
					<li><a href="../jsuttt/index.html">Ultimate TicTacToe</a></li>
					<li><a href="../jsSnake/index.php">Snake Game</a></li>
					<li><a href="../movieSearching/index.html">Movie Searching</a></li>
					<li><a href="../GeneticAlgorithm/index.html">Genetic </a></li>
					<?php  
						if(isset($_SESSION['userName'])){}
						else{echo "<li><a class='js-scroll-trigger' href='../../../login.php'>Sign in</a></li>"; }?>
				</ul>
		</div>
	</div>
</nav>
<div class="container ">
<h1 class="text-center">Tetris</h2>
<div class="row">
<div class="jumbotron col-sm-12 col-md-6 col-lg-6 text-center " id="clock">

<canvas id="gc" width="300" height="600"></canvas>

 <?php  
$servername = "localhost";  //localhost
$dbname = "luojianl_firstDB"; // userid_named
$USRID="luojianl";  // userid on dev.fast
$PASSWD="5197295829,./Ljl";     // used with cPanel

try {
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $USRID, $PASSWD);
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "<br>Could not connect " . $e->getMessage();
}

 $query = "SELECT * FROM members ";
 $result  = $dbh -> prepare($query);    
	if ( $result->execute() ) {
		$temp=0;
		$user;
		 while ($myrow = $result->fetch()) {
			if($myrow['tetrisScore']> $temp){ 
				$temp=$myrow['tetrisScore'];
				$user=$myrow['player'];
			}
		 }
	}
	else {
        $error = "Sorry could not retrieve scores";  echo $error;  return;
    }
	$dbh=null;
?>


<h4><br>Highest Record:  &nbsp&nbsp<?php  echo " <span>".$user."&nbsp&nbsp&nbsp&nbsp&nbspScore: ".$temp. "</span>" ?>
</h4> 
	<h4>Your Score: <span class="score"></span></h4>
	<?php  
		if(isset($_SESSION['userName'])){
			echo "<button  id='restart' class='btn btn-default'>Update your highest score and restart</button>";
		}
		else{
			echo "<span>Login to compete with other users!</span>";
		}
	?>

</div> 

<div class=" col-sm-12 col-md-6 col-lg-6">
 <p class="description">
 Written in pure Java Script, The development process was not hard,
 I created a block class for the falling down blocks, each time a block 
 contact with something a new block is constructed(randomly construct for different 
 shapes). Before the new block constructed, my tile class, which is for storing tile
 information, will call a function to update the tile, and then render it on the canvas.
 The tricky part is the rotation, we take the points as vectors, use the rotating point(v) subtract
 from a pivot point(p), with the result(vr) we perform matrix multiplication with [[0,-1],[0,1]]
 ,the vector we get will be a transform vector(vt), the last step is to add vt to p, the answer will be the rotated position.  
 
 </p>
 <img src="../../../images/matrix.png" class="img-responsive">
 </div>

</div>
 </div>

 
 <div class="container">
 <div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 needSpace">
	<h4 class="text-center ">Class for Block Object</h4>
	<form><textarea id="code1">
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
	</textarea></form>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 needSpace">
	<h4 class="text-center ">Class for Tile Object</h4>
	<form><textarea id="code2">
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
	</textarea></form>
	</div>

 </div>
 </div>
 <form  id="myform" name="myform" action="../../loginProcess.php" method="POST">
		<input type="text"value="0"  name="score" class="score" ></input>
		<button  type="submit" name="submitBut"></button>
</form>
 <footer class="container-fluid text-center last">
 <div class="row">
 <div class="col-sm-6 col-md-6 col-lg-6 col-xsm-6">
	<h3>Contact Me</h3>
	<br>
	<h4>samlaw829@gmail.com</h4>
 </div>
 <div class="col-sm-6 col-md-6 col-lg-6 col-xsm-6">
	<h3>Connect</h3>
	<a href="#" class="fa fa-facebook"></a>
	<a href="#" class="fa fa-google"></a>
	<a href="#" class="fa fa-linkedin"></a>
	<a href="#" class="fa fa-twitter"></a>
 </div>
 </div>
 <div class=row>
<div>
<br>
Sam @ 2017
 </div>
 </footer>
 <script src="js/main.js" type='text/javascript'></script>
   <script src="js/blocks.js" type='text/javascript'></script>
   <script src="js/tile.js" type='text/javascript'></script>
  <script>
	var editor1 = CodeMirror.fromTextArea(document.getElementById("code1"), {
  mode: "javascript",
  styleActiveLine: true,
  lineNumbers: true,
 
});
var editor2 = CodeMirror.fromTextArea(document.getElementById("code2"), {
  mode: "javascript",
  styleActiveLine: true,
  lineNumbers: true,
 
});

function update(){ 
	document.forms['myform'].submit();
}
document.getElementById("restart").addEventListener("click",update);
			



</script>

</body>
</html>