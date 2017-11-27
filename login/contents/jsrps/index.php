<?php session_start(); ?>
<html lang="en">
<!--
    Name:Jianlin Luo	
    Version:1.0
    Date created:5/26/2017
    Date updated:
    Description:
-->
<head>
    <title>RockPaperScissors</title>
    <meta charset="utf-8" />
    <meta name="author" content="JianlinLuo" >
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Short description of this page's purpose">
	<link href='https://fonts.googleapis.com/css?family=Teko:400,600' rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel='stylesheet' type='text/css'>
	<script src="script/script.js" type='text/javascript'></script>
	<link href='css/rps.css' rel='stylesheet' type='text/css'>
</head>
<body>

<h2>Rock Paper Scissors</h2>
<main>
<div class="wrapper1">
<div class="wrapper">
<div class="playerbox">
</div>
<div class="computerbox">
</div>
<p class="result">Welcome</p>
</div>
<div class="images"><img id="rock"class="show"onclick="clickImage()" src="images/rock.png" alt="rock"><img id="scissor"class="show" onclick="clickImage()"  src="images/scissor.png" alt="scissor"><img id="paper"class="show"onclick="clickImage()"  src="images/paper.png" alt="paper">
</div>
<div class="res">
<button type="button" onclick="Reset()">Reset</button>
</div>
</div>
<div class="wrapper2">
<button>stats</button>
<button>help</button>
<button id="close">close</button>
<?php echo "<h4>Current User: ".$_SESSION['userName']. "</h4>" ?>
</div>
</main>
<script>
document.getElementById("close").addEventListener("click",myfun2);
			function myfun2(){
				window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/index.php","_self");
		}
</script>
<footer>
Jianlin Luo, 2017 © SYST10199 Web Development, Sheridan College
</footer>
</body>
</html>