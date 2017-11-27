<?php session_start(); ?>
<html lang="en">
<!--
    Name:Jianlin Luo	
    Version:1.0
    Date created:5/13/2017
    Date updated:
    Description:Tictactoe game，the pop up function "myFUn()" and the related css
	are from a guide on W3schools  https://www.w3schools.com/howto/howto_js_popup.asp
-->
<head>
    <title>Tictactoe</title>
    <meta charset="utf-8" />
    <meta name="author" content="JianlinLuo" >
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Short description of this page's purpose">
	<link href='https://fonts.googleapis.com/css?family=Teko:400,600' rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<script src="script/script.js" type='text/javascript'></script>
</head>

<body>        
    <header>  
    </header>
    <nav> 
	</nav>
	<h2>Tic Tac Toe</h2>
    <main>
	<!--a 3*3 table with "tic tac toe" in each row-->
	<div class="wrapper1">
	<table>
        <tr>
            <td id="1" onclick="run()">T</td>
            <td id="2" onclick="run()">I</td>
            <td id="3" onclick="run()">C</td>
        </tr>
        <tr>
            <td id="4" onclick="run()">T</td>
            <td id="5" onclick="run()">A</td>
            <td id="6" onclick="run()">C</td>
        </tr>
        <tr>
            <td id="7" onclick="run()">T</td>
            <td id="8" onclick="run()">O</td>
            <td id="9" onclick="run()">E</td>
        </tr>        
    </table>
	<p></p>
	<div class="popup"><span class="popuptext" id="myPopup1" onclick="myFun(1)">X wins ,click me to dismiss</span><span class="popuptext" id="myPopup2" onclick="myFun(2)">O wins ,click me to dismiss</span><span class="popuptext" id="myPopup3" onclick="myFun(3)">No one wins ,click me to dismiss</span>
	</div>
	<div class="start">
    <button type="button" onclick="Start()">Start Game</button>
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
		Jianlin Luo, 2017 © SYST10049 Web Development, Sheridan College
    </footer>
	</body>
</html>