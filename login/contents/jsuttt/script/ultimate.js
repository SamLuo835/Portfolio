		//the 3 dimensional array keep track of each boards winnning combo, 9 boards, each borad has 8 winning combo, each combo has 3 elements
		var wincombo= [[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]],[[],[],[],[],[],[],[],[]]];

		for (var i=0;i<=8;i++){
		wincombo[i][0]=[document.getElementsByClassName("1"),document.getElementsByClassName("2"),document.getElementsByClassName("3")];
		wincombo[i][1]=[document.getElementsByClassName("4"),document.getElementsByClassName("5"),document.getElementsByClassName("6")];
		wincombo[i][2]=[document.getElementsByClassName("7"),document.getElementsByClassName("8"),document.getElementsByClassName("9")];
		wincombo[i][3]=[document.getElementsByClassName("1"),document.getElementsByClassName("4"),document.getElementsByClassName("7")];
		wincombo[i][4]=[document.getElementsByClassName("2"),document.getElementsByClassName("5"),document.getElementsByClassName("8")];
		wincombo[i][5]=[document.getElementsByClassName("3"),document.getElementsByClassName("6"),document.getElementsByClassName("9")];
		wincombo[i][6]=[document.getElementsByClassName("1"),document.getElementsByClassName("5"),document.getElementsByClassName("9")];
		wincombo[i][7]=[document.getElementsByClassName("3"),document.getElementsByClassName("5"),document.getElementsByClassName("7")];
		}
	// a boolean var to keep track of the big board's result	
	var gameover=false;
	//a boolean array to distinguish between a tie game and a player wins when all the cells are filled in 9 small boards. 
	var done=[];
	for (var i=0;i<=8;i++){
		done[i]=false;
	}
	//a var for player name , change over turns.
	var player="X";
	//a counter array to keep track of cells filled only in 9 small board
	var counter=[];
	for(var i=0;i<=8;i++){
		counter[i]=1;
	}
	// a counter to help finding player's turn
	var boardcounter=1;
	
	//a boolean array to check the 9 small borads game result
	var finishGame=[];
	for (var i=0;i<=8;i++){
		finishGame[i]=false;
	}
	// a function for the button to reset or start the game, reset all the var above, also change the button and table styles etc,
	function Start(){
		gameover=false;
		for(var i=0;i<=8;i++){
		counter[i]=1;
		}
		boardcounter=1;
		for (var i=0;i<=8;i++){
		done[i]=false;
		}
		for (var i=0;i<=8;i++){
		finishGame[i]=false;
		}
		player="X";
		document.getElementById("msg").innerHTML="player <span id='player'></span>  go! ";
		for (var x=0;x<=8;x++){
			document.getElementById(x).setAttribute("style","false");
		}
		for (var x=0;x<=80;x++){
			document.getElementsByTagName("td")[x].innerHTML="";
			document.getElementsByTagName("td")[x].style.color="darkblue";
			}
		document.getElementById("player").innerHTML=player;
		document.getElementsByTagName("button")[2].innerHTML="Reset game";
		}		
		
	//the run() function is called when a player click on a cell
	function run(){
		console.log("ho");
	//a two dimensional array to keep track of the big board's winning combo
			var boardcombo=[[],[],[],[],[],[],[],[]];
			boardcombo[0]=[document.getElementById("0"),document.getElementById("1"),document.getElementById("2")];
			boardcombo[1]=[document.getElementById("3"),document.getElementById("4"),document.getElementById("5")];
			boardcombo[2]=[document.getElementById("6"),document.getElementById("7"),document.getElementById("8")];
			boardcombo[3]=[document.getElementById("0"),document.getElementById("3"),document.getElementById("6")];
			boardcombo[4]=[document.getElementById("1"),document.getElementById("4"),document.getElementById("7")];
			boardcombo[5]=[document.getElementById("2"),document.getElementById("5"),document.getElementById("8")];
			boardcombo[6]=[document.getElementById("0"),document.getElementById("4"),document.getElementById("8")];
			boardcombo[7]=[document.getElementById("2"),document.getElementById("4"),document.getElementById("6")];
	//get the event element, which is a td tag, and then look for its parent's parent,the table element
			var targetId=event.target.parentElement.parentElement;
	//the  run() function only runs if the table cell is empty, the small board game is not finished,the popup is not shown and the big board game is not finished.
			if (!finishGame[targetId.id] && event.target.innerHTML==("")&&(document.getElementById("myPopup").getAttribute("class")=="popuptext")&&!gameover){
	//determine which player's turn by checking the remainder of counter,then change the cell picture to
	//cross or circle,
			if (boardcounter%2==1){
				player="O";
				event.target.innerHTML="X";
				document.getElementById("player").innerHTML=player;
				counter[targetId.id]++;
				boardcounter++;
			}
			else{
				player="X";
				event.target.innerHTML="O";
				document.getElementById("player").innerHTML=player;
				counter[targetId.id]++;
				boardcounter++;
			}
			//a loop checking  small boards winner 
			for (var i=0;i<8;i++){
				//checking if X wins first
				if(wincombo[targetId.id][i][0][targetId.id].innerHTML==("X")&&wincombo[targetId.id][i][1][targetId.id].innerHTML==("X")&&wincombo[targetId.id][i][2][targetId.id].innerHTML==("X")){
					if (counter[targetId.id]==10){
					done[targetId.id]=true;
					for(var k=0;k<=2;k++){
							wincombo[targetId.id][i][k][targetId.id].style.color="grey";
					}
					document.getElementById(targetId.id).style.backgroundImage="url('images/cross.png')";
					document.getElementById(targetId.id).style.backgroundRepeat="no-repeat";
					document.getElementById(targetId.id).style.backgroundSize="contain";
					document.getElementById(targetId.id).style.backgroundPosition="center";
					}
					else{
						done[targetId.id]=true;
						finishGame[targetId.id]=true;
						document.getElementById(targetId.id).style.backgroundImage="url('images/cross.png')";
						document.getElementById(targetId.id).style.backgroundRepeat="no-repeat";
						document.getElementById(targetId.id).style.backgroundSize="contain";
						document.getElementById(targetId.id).style.backgroundPosition="center";
						for(var k=0;k<=2;k++){
							wincombo[targetId.id][i][k][targetId.id].style.color="grey";
						}	
					}
				}
				//chekcing  if O wins second
				if(wincombo[targetId.id][i][0][targetId.id].innerHTML==("O")&&wincombo[targetId.id][i][1][targetId.id].innerHTML==("O")&&wincombo[targetId.id][i][2][targetId.id].innerHTML==("O")){
					if (counter[targetId.id]==10){
					done[targetId.id]=true;
					document.getElementById(targetId.id).style.backgroundImage="url('images/circle.png')";
					document.getElementById(targetId.id).style.backgroundRepeat="no-repeat";
					document.getElementById(targetId.id).style.backgroundSize="contain";
					document.getElementById(targetId.id).style.backgroundPosition="center";
					for(var k=0;k<=2;k++){
						wincombo[targetId.id][i][k][targetId.id].style.color="grey";
						}
					}
					else{
					done[targetId.id]=true;
					finishGame[targetId.id]=true;
					document.getElementById(targetId.id).style.backgroundImage="url('images/circle.png')";
					document.getElementById(targetId.id).style.backgroundRepeat="no-repeat";
					document.getElementById(targetId.id).style.backgroundSize="contain";
					document.getElementById(targetId.id).style.backgroundPosition="center";
					for(var k=0;k<=2;k++){
						wincombo[targetId.id][i][k][targetId.id].style.color="grey";
						}
					}
				}
			}
			//when all the cells are filled in a small board  but no one wins.
			if (!done[targetId.id]&&(counter[targetId.id]==10)){
				document.getElementById(targetId.id).style.backgroundImage="url('images/hyphen.png')";
				document.getElementById(targetId.id).style.backgroundRepeat="no-repeat";
				document.getElementById(targetId.id).style.backgroundSize="contain";
				document.getElementById(targetId.id).style.backgroundPosition="center";
			}
			//a for loop to check if the big board has a result
			for (var k=0;k<=7;k++){
				if(boardcombo[k][0].getAttribute("style").match("cross")&&boardcombo[k][1].getAttribute("style").match("cross")&&boardcombo[k][2].getAttribute("style").match("cross")){
					document.getElementById("msg").innerHTML="Player X wins";
					for(var j=0;j<=2;j++){
						boardcombo[k][j].style.backgroundColor="lightblue";
					}
					gameover=true;
				}
				if(boardcombo[k][0].getAttribute("style").match("circle")&&boardcombo[k][1].getAttribute("style").match("circle")&&boardcombo[k][2].getAttribute("style").match("circle")){
					document.getElementById("msg").innerHTML="Player O wins";
					gameover=true;
					for(var j=0;j<=2;j++){
						boardcombo[k][j].style.backgroundColor="lightblue";
					}
					
				}
			}
			//checking if the big board is a tie game
			if(!gameover&&(document.getElementById("0").getAttribute("style").match("background"))&&(document.getElementById("1").getAttribute("style").match("background"))&&(document.getElementById("2").getAttribute("style").match("background"))&&(document.getElementById("3").getAttribute("style").match("background"))&&(document.getElementById("4").getAttribute("style").match("background"))&&(document.getElementById("5").getAttribute("style").match("background"))&&(document.getElementById("6").getAttribute("style").match("background"))&&(document.getElementById("7").getAttribute("style").match("background"))&&(document.getElementById("8").getAttribute("style").match("background"))){
				document.getElementById("msg").innerHTML="No One Wins";
			}
		}
	}
		//material from the prof, create 9 tables, the buttons, the headding ,
		function createBoard() {
			
            // MOVED declarations inside the function - used only here
            var myTable, myRow, myCell, myData, myBoard, myTitle;
			myTable=[];
			for (var i=0;i<=8;i++){
				myTable[i]=document.createElement("table");
				myTable[i].setAttribute('id',i)
				}
            var gameTitle = ["T", "I", "C", "T", "A", "C", "T", "O", "E"];
            myBoard = document.getElementById("game");
			for(var i=0;i<=8;i++){
				myBoard.appendChild(myTable[i])
				}
			for(var k=0;k<=8;k++){
				for (var i = 0; i < 3; i++) {
					myRow = document.createElement("tr");
					myTable[k].appendChild(myRow);
					for (var j = 0; j < 3; j++) {
						myCell = document.createElement("td");
						myRow.appendChild(myCell);
						myData = document.createTextNode(gameTitle[j + (i * 3)]);
						myCell.setAttribute("class",(j+1+(i*3)));
						myCell.setAttribute("onclick","run()");
						myCell.appendChild(myData);
					}
				}
			}
            var par = myBoard.appendChild(document.createElement("p"));
            var elSpanMsg = document.createElement("span");
            elSpanMsg.setAttribute("id", "msg");
            elSpanMsg.style.fontFamily = "monospace";
            elSpanMsg.appendChild(document.createTextNode("Player "));
            var elSpan = document.createElement("span");
            elSpan.setAttribute("id", "player");
            elSpanMsg.appendChild(elSpan);
            elSpanMsg.appendChild(document.createTextNode(""));
            elSpanMsg.appendChild(document.createTextNode(" go! "));
            par.appendChild(elSpanMsg);
            var elButton = document.createElement("button");
			var secButton=document.createElement("button");
			elButton.setAttribute("onclick","Start()")
			secButton.appendChild(document.createTextNode("Stat"));
			secButton.setAttribute("onclick","score()");
			secButton.setAttribute("class","btn ");
			par.appendChild(secButton);
            elButton.appendChild(document.createTextNode(
                "New game"));
            elButton.setAttribute("id", "reset");
			elButton.setAttribute("class","btn ");
            par.appendChild(elButton);
    }
	//a function to switch the pop up text class, to make the pop up invisble or visible
	function myFun(){
		var pop=document.getElementById("myPopup");
			pop.classList.toggle("show");
		}
	// a function score , called when the stat button is click, shows the small boards results
	function score(){
		var xWins=0;
		var oWins=0;
		var ties=0;
		for(var i=0;i<=8;i++){
			if (document.getElementById(i).getAttribute("style").match("cross")){
					xWins++;
				}
				
			if(document.getElementById(i).getAttribute("style").match("circle")){
					oWins++;
				}
			
			if(document.getElementById(i).getAttribute("style").match("hyphen")){
				ties++;
			}
		}
		myFun();
		document.getElementById("myPopup").innerHTML="<p>Number of boards X wins:&nbsp;</p>"+Math.floor(xWins) +"<br><p> Number of boards O wins:&nbsp;</p>"+Math.floor(oWins)+"<p>tie boards:&nbsp;</p>"+Math.floor(ties)+"<br><p> click me to dimiss</p><br>";
	}

	