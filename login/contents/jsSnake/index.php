<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Snake</title>
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
	.CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;}
	.description{font-size:1.7em}
	.last{margin-top:30px;}
	.centering{display:flex;justify-content:center;}
	.navbar{
		margin-bottom:0;
		border-radius:0;
		}
	.navbar-brand{
	float:left;
	min-height:55px;
	padding:1px 15px 15px;
	}
	.navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus
		, .navbar-inverse .navbar-nav .active a:hover{
		background-color:#222;
		color:#FFF;
		
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
	#myform{visibility:hidden;}
	@media (max-width:900px){
	.fa{
		font-size:20px;
		padding:10px;
		}
	}
	.form-group{margin-top:10px;}
	.control-label{margin-top:150px;}
	
	@media (max-width:1000px){
	#newGame{margin-top:0;}
	}
	@media (max-width:425px)
	{.centering{display:block;}
	 .control-label{margin-top:20px;}
	}
	
  </style>
</head>
<body>

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
			if($myrow['snakeScore']> $temp){ 
				$temp=$myrow['snakeScore'];
				$user=$myrow['player'];
			}
		 }
	}
	else {
        $error = "Sorry could not retrieve scores";  echo $error;  return;
    }
	$dbh=null;
?>



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
<h1 class="text-center">Snake</h2>
<div class"row">
<div class="jumbotron col-sm-12 col-md-6 col-lg-6 centering" >
<canvas id="gc" width="300" height="300"></canvas>
<div class="container-fluid">

<h4>Score: <span id="score"> 0&nbsp &nbsp </span>
</h4>
<button class="btn btn-default " id="new">New Game</button>
<?php  
		if(isset($_SESSION['userName'])){
			echo "<button  id='restart' class='btn btn-default'>Update your score</button>";
		}
		else{
			echo "<span>Login to compete with other users!</span>";
		}
	?>



<div class="form-group">
        <h4 class=" control-label">Speed</h4>
        <div class=" input-group-md">
            <select class="form-control" id="sp" name="size">
                <option value="s1">Slow</option>
                <option value="s2" selected>Medium</option>
                <option value="s3">Fast</option>
                <option value="s3">Super Fast</option>
            </select>
        </div>
    </div>
	</div>
<br>


</div> 
<div class="jumbotron col-sm-12 col-md-6 col-lg-6" >
<h4>Highest Record:  &nbsp&nbsp<?php  echo " <span>".$user."&nbsp&nbsp&nbsp&nbsp&nbspScore: ".$temp. "</span>" ?></h4>
<form><textarea id="code">
window.onload=function() {
	canv=document.getElementById("gc");
	ctx=canv.getContext("2d");
	document.addEventListener("keydown",keyPush);
	interval=setInterval(game,1000/speed);
	
}

//player x and y coordinate
px=py=10;
//grid size and grid count
tc=20;
gs=15;
//food x and y coordinate
ax=ay=9;
//x and y speed
xv=yv=0;
//array to store snake's location
trail=[];
//snake's length
tail = 5;

speed=10;

gameover=false;

score=1;
function game() {
	px+=xv;
	py+=yv;
	if(px<0) {
		px= tc-1;
	}
	if(px>tc-1) {
		px= 0;
	}
	if(py<0) {
		py= tc-1;
	}
	if(py>tc-1) {
		py= 0;
	}
	
	ctx.fillStyle="black";
	ctx.fillRect(0,0,canv.width,canv.height);
	
	
	
	
	
	ctx.fillStyle="white";
	for(var i=0;i<trail.length;i++) {
		ctx.fillRect(trail[i].x*gs,trail[i].y*gs,gs-2,gs-2);
		if(trail[i].x==px && trail[i].y==py&&trail.length>5) {
			document.removeEventListener("keydown",keyPush);
			ctx.fillStyle="black";
			ctx.fillRect(0,0,canv.width,canv.height);
			xv=0;
			yv=0;
			trail=[];
			tail=0;
			ctx.fillStyle="white";
			ctx.fillRect(3*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(4*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,5*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,6*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(3*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(4*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,7*gs,gs-2,gs-2);
	
			ctx.fillRect(12*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(13*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,5*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,6*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(12*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(13*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,7*gs,gs-2,gs-2);
			clearInterval(interval);
			gameover=true;
		}
	}
	trail.push({x:px,y:py});
	while(trail.length>tail) {
	trail.shift();
	}

	if(ax==px && ay==py) {
		tail++;
		document.getElementsByClassName("score")[0].innerHTML=score++;
		ax=Math.floor(Math.random()*tc);
		ay=Math.floor(Math.random()*tc);
		var exit=true;
		while(exit){
			exit=false;
			for (var i=0; i<trail.length;i++){
				if(trail[i].x==ax && trail[i].y==ay){
					ax=Math.floor(Math.random()*tc);
					ay=Math.floor(Math.random()*tc);
					exit=true;
					break;
				}
			}
		}
		
	}
	if(!gameover){
	ctx.fillStyle="lime";
	ctx.fillRect(ax*gs,ay*gs,gs-2,gs-2);
	}
}
function keyPush(evt) {
	switch(evt.keyCode) {
		case 37:
			if(trail[trail.length-2].x==px-1&& py==trail[trail.length-2].y){
				break;
			}
			xv=-1;yv=0;
			break;
		case 38:
			if(trail[trail.length-2].x==px&& py-1==trail[trail.length-2].y){
				break;
			}
			xv=0;yv=-1;
			break;
		case 39:
			if(trail[trail.length-2].x==px+1&& py==trail[trail.length-2].y){
				break;
			}
			xv=1;yv=0;
			break;
		case 40:
			if(trail[trail.length-2].x==px&& py+1==trail[trail.length-2].y){
				break;
			}
			xv=0;yv=1;
			break;
	}
}

window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

var speedControl=document.getElementsByClassName("sp")[0];
speedControl.addEventListener("click",myfun3);


document.getElementById("newGame").addEventListener("click",myfun1);
document.getElementById("close").addEventListener("click",myfun2);
			function myfun1(){
				window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/contents/jsSnake/snake.php","_self");
			}
			function myfun2(){
				window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/index.php","_self");
			}
			function myfun3(){
				if(speedControl.value=="s1"){
				clearInterval(interval);
				speed=5;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s2"){
				clearInterval(interval);
				speed=10;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s3"){
				clearInterval(interval);
				speed=15;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s4"){
				clearInterval(interval);
				speed=20;
				interval=setInterval(game,1000/speed);
				}
				
			}
</textarea>
</form>
</div> 
 </div>
 </div>
 <div class="container text-center">
 <h2></h2>
 <div class="row">
 <div class="col-sm-12 col-md-6 col-lg-8">
 <p class="description">
 My first game made by using canvas function, it's fun to use, with setInterval() and
 clearInterval(), many games can be coded in canvas.
 </p>
 <p class="description">The game is easy to make, with an array of the snake body positions,each time the
 function runs, we push a new position into the array, if no food is eaten, we also shift
 the array, meaning delete the last index item. 
 
 </p>
 </div>
 <div class="col-sm-12 col-md-6 col-lg-4">
 <img src="../../../images/snakeLarge.png" class="img-responsive">
 </div>
 </div>
 </div>
 
 <form  id="myform" name="myform" action="../../loginProcess.php" method="POST">
		<input type="text" value="0"  name="snakescore" class="score ></input>
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
 <div class="row">
<br>
Sam @ 2017
 </div>
 </footer>
  <script>
window.onload=function() {
	canv=document.getElementById("gc");
	ctx=canv.getContext("2d");
	document.addEventListener("keydown",keyPush);
	interval=setInterval(game,1000/speed);
	var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
  mode: "javascript",
  styleActiveLine: true,
  lineNumbers: true,
  
 
});
}

//player x and y coordinate
px=py=10;
//grid size and grid count
tc=20;
gs=15;
//food x and y coordinate
ax=ay=8;
//x and y speed
xv=yv=0;
//array to store snake's location
trail=[];
//snake's length
tail = 5;

speed=10;

gameover=false;

score=1;
function game() {
	px+=xv;
	py+=yv;
	if(px<0) {
		px= tc-1;
	}
	if(px>tc-1) {
		px= 0;
	}
	if(py<0) {
		py= tc-1;
	}
	if(py>tc-1) {
		py= 0;
	}
	
	ctx.fillStyle="black";
	ctx.fillRect(0,0,canv.width,canv.height);
	
	
	
	
	
	ctx.fillStyle="white";
	for(var i=0;i<trail.length;i++) {
		ctx.fillRect(trail[i].x*gs,trail[i].y*gs,gs-2,gs-2);
		if(trail[i].x==px && trail[i].y==py&&trail.length>5) {
			document.removeEventListener("keydown",keyPush);
			ctx.fillStyle="black";
			ctx.fillRect(0,0,canv.width,canv.height);
			xv=0;
			yv=0;
			trail=[];
			tail=0;
			ctx.fillStyle="white";
			ctx.fillRect(3*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(4*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,5*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,6*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(2*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(3*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(4*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(6*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(5*gs,7*gs,gs-2,gs-2);
	
			ctx.fillRect(12*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(13*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,3*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,4*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,5*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,6*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(11*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(12*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(13*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,9*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,8*gs,gs-2,gs-2);
			ctx.fillRect(15*gs,7*gs,gs-2,gs-2);
			ctx.fillRect(14*gs,7*gs,gs-2,gs-2);
			clearInterval(interval);
			gameover=true;
		}
	}
	trail.push({x:px,y:py});
	while(trail.length>tail) {
	trail.shift();
	}

	if(ax==px && ay==py) {
		tail++;
		document.getElementById("score").innerHTML=score++;
		document.getElementsByClassName("score")[0].setAttribute("value",score-1);
		ax=Math.floor(Math.random()*tc);
		ay=Math.floor(Math.random()*tc);
		var exit=true;
		while(exit){
			exit=false;
			for (var i=0; i<trail.length;i++){
				if(trail[i].x==ax && trail[i].y==ay){
					ax=Math.floor(Math.random()*tc);
					ay=Math.floor(Math.random()*tc);
					exit=true;
					break;
				}
			}
		}
		
	}
	if(!gameover){
	ctx.fillStyle="lime";
	ctx.fillRect(ax*gs,ay*gs,gs-2,gs-2);
	}
}
function keyPush(evt) {
	switch(evt.keyCode) {
		case 37:
			if(trail[trail.length-2].x==px-1&& py==trail[trail.length-2].y){
				break;
			}
			xv=-1;yv=0;
			break;
		case 38:
			if(trail[trail.length-2].x==px&& py-1==trail[trail.length-2].y){
				break;
			}
			xv=0;yv=-1;
			break;
		case 39:
			if(trail[trail.length-2].x==px+1&& py==trail[trail.length-2].y){
				break;
			}
			xv=1;yv=0;
			break;
		case 40:
			if(trail[trail.length-2].x==px&& py+1==trail[trail.length-2].y){
				break;
			}
			xv=0;yv=1;
			break;
	}
}

window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

var speedControl=document.getElementById("sp");
speedControl.addEventListener("click",myfun3);


document.getElementById("new").addEventListener("click",myfun1);

			function myfun1(){
				window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/contents/jsSnake/index.html","_self");
			}
			function myfun2(){
				window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/index.php","_self");
			}
			function myfun3(){
				if(speedControl.value=="s1"){
				clearInterval(interval);
				speed=5;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s2"){
				clearInterval(interval);
				speed=10;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s3"){
				clearInterval(interval);
				speed=15;
				interval=setInterval(game,1000/speed);
				}
				else if(speedControl.value=="s4"){
				clearInterval(interval);
				speed=20;
				interval=setInterval(game,1000/speed);
				}
				
			}
					
		function update(){ 
	document.forms['myform'].submit();
}
document.getElementById("restart").addEventListener("click",update);		
</script>
</body>
</html>