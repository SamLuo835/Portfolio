<?php session_start(); ?>
<html lang="en">
<!--
    Name:Jianlin Luo	
    Version:1.0
    Date created:7/13/2017
    Date updated:
    Description:Rock-Paper-Scrssors-lizzard-spock game.
-->
<head>
    <title>Rock-Paper-Scrssors-Lizard-Spock</title>
    <meta charset="utf-8" />
    <meta name="author" content="JianlinLuo" >
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Short description of this page's purpose">
	<link href='https://fonts.googleapis.com/css?family=Teko:400,600' rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel='stylesheet' type='text/css'>
	<link href="css/main.css" rel='stylesheet' type='text/css'>
</head>
<body>
<header>
</header>
<h2>Rock-Paper-Scrssors-Lizard-Spock</h2>
<main>
<!--the wrapper1 contains the winning message,
player & computer's choice images, and the form 
section-->
<div class="wrapper1">
<div class="turn">
<!--declare the variables, also echo the 
reusult in 'turn class'-->
<?php 
$moves = array("rock", "paper", "scissors","spock","lizard");
$output = "";
$player="";
$winner=array(
"rock"=>array("paper","spock"),"paper"=>array("scissors","lizard"),"scissors"=>array("rock","spock"),"spock"=>array("paper","lizard"),"lizard"=>array("scissors","rock"));
$player = $_GET['move'];
$machine = $moves[array_rand($moves)];
if ($player == "rock" || $player == "paper" ||$player == "scissors"||$player=="spock"||$player=="lizard"){
	if ($machine == $player){ 
		echo "<p>IT IS A TIE.</p>"; }
	else {if ($winner[$player][0]==$machine||$winner[$player][1]==$machine){
			echo "<p> YOU LOSE.</p>";}
		 else{
			echo  "<p> YOU WIN. </p>";
			}
		}
	}
	
	?>
<!--the header for player and computer's pick-->
</div>
<div class="player">
<h4>YOUR PICK</h4><h4>COMPUTER PICK</h4>
</div>
<!--class containging the imges-->
<div class="imgwrapper" style="display:flex;justify-content:center">
<?php 
if ($player == "rock" || $player == "paper" ||$player == "scissors"||$player=="spock"||$player=="lizard"){
$pImg = "<img src='images/$player.png' alt='$player' />";
$mImg = "<img src='images/$machine.png' alt='$machine' />";}
echo $pImg;
echo $mImg; ?>
</div>
<!--FORM SECTION-->
<form method="GET">
<div class="selection" >
<select name="move"<?php echo isset($_GET["move"])?"disabled style='background-color:lightgrey'":""?>>
			<option disabled="disabled" selected>Please select your move</option>
			<option value="scissors">scissors</option>
            <option value="rock">rock</option>
            <option value="paper">paper</option>
			<option value="spock">spock</option>
			<option value="lizard">lizard</option>
			
</select>
 <input type="submit" value="PLAY" name="PLAY" id="submit" <?php echo isset($_GET["PLAY"])?"disabled style='background-color:lightgrey;color:grey'":""?>/>
 </div>
 </form>
<button id="new">NEW GAME</button>
</div>
<!--wrapper 2 containing 3 buttons, currently have no function-->
<div class="wrapper2">
<button>stats</button>
<button>help</button>
<button id="close">close</button>
<?php echo "<h4>Current User: ".$_SESSION['userName']. "</h4>" ?>
</div>
</main>
<footer>
Jianlin Luo Web programming @ Sheridan College
</footer>
<script>
//add event listenre to the new game button, when clicking
// opoen the page on the same window
document.getElementById("new").addEventListener("click",myfun);
function myfun(){
	window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/contents/phprps/index.php","_self");
}
document.getElementById("close").addEventListener("click",myfun2);
function myfun2(){
	window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/index.php","_self");
}
</script>
</body>
</html>
