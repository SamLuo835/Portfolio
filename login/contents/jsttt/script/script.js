//a boolean var to distinguish between a tie game and a player wins when all the cells are filled. 
	var done=false;
	//a var for player name , change over turns.
	var player="X";
	//a counter to keep track of the player turns
	var counter=1;
	//a boolean var to check the game finished or not
	var finishGame=false;
	//set the two dimensional array called wincombo, 
	//and assign the table cells as objetcs to its array elements  
	var wincombo=[[],[],[],[],[],[],[],[]];
	wincombo[0]=[document.getElementById("1"),document.getElementById("2"),document.getElementById("3")];
	wincombo[1]=[document.getElementById("4"),document.getElementById("5"),document.getElementById("6")];
	wincombo[2]=[document.getElementById("7"),document.getElementById("8"),document.getElementById("9")];
	wincombo[3]=[document.getElementById("1"),document.getElementById("4"),document.getElementById("7")];
	wincombo[4]=[document.getElementById("2"),document.getElementById("5"),document.getElementById("8")];
	wincombo[5]=[document.getElementById("3"),document.getElementById("6"),document.getElementById("9")];
	wincombo[6]=[document.getElementById("1"),document.getElementById("5"),document.getElementById("9")];
	wincombo[7]=[document.getElementById("3"),document.getElementById("5"),document.getElementById("7")];
	//a function to selcet which result messages should be displayed
	function myFun(number){
		if(number==1){
			var pop=document.getElementById("myPopup1");
			pop.classList.toggle("show");
		}
		if(number==2){
			var pop=document.getElementById("myPopup2");
			pop.classList.toggle("show");
		}
		if(number==3){
			var pop=document.getElementById("myPopup3");
			pop.classList.toggle("show");
		}
	}
	// a function for the button to reset or start the game
	function Start(){
		done=false;
		finishGame=false;
		player="X";
		if (document.getElementsByTagName("button")[0].innerHTML=="Reset game"){
			counter=1;
			}
		for (var x=0;x<=8;x++){
			document.getElementsByTagName("td")[x].innerHTML="&nbsp";
			document.getElementsByTagName("td")[x].style.backgroundColor="transparent";
			}
		document.getElementsByTagName("p")[0].innerHTML="Player "+ player+ " go";
		document.getElementsByTagName("button")[0].innerHTML="Reset game";
			}		
	//change cell background colors when a player wins,it has an array and a number as parameters	
	function colorChange(array,i){
		var wincombo=[[],[],[],[],[],[],[],[]];
	wincombo[0]=[document.getElementById("1"),document.getElementById("2"),document.getElementById("3")];
	wincombo[1]=[document.getElementById("4"),document.getElementById("5"),document.getElementById("6")];
	wincombo[2]=[document.getElementById("7"),document.getElementById("8"),document.getElementById("9")];
	wincombo[3]=[document.getElementById("1"),document.getElementById("4"),document.getElementById("7")];
	wincombo[4]=[document.getElementById("2"),document.getElementById("5"),document.getElementById("8")];
	wincombo[5]=[document.getElementById("3"),document.getElementById("6"),document.getElementById("9")];
	wincombo[6]=[document.getElementById("1"),document.getElementById("5"),document.getElementById("9")];
	wincombo[7]=[document.getElementById("3"),document.getElementById("5"),document.getElementById("7")];
		for(var k=0;k<wincombo[i].length;k++){
			wincombo[i][k].style.backgroundColor="coral";
			}
		}	
	//check if X wins, it has an array and a number as parameters	
	function checkX(array,i){
		var wincombo=[[],[],[],[],[],[],[],[]];
	wincombo[0]=[document.getElementById("1"),document.getElementById("2"),document.getElementById("3")];
	wincombo[1]=[document.getElementById("4"),document.getElementById("5"),document.getElementById("6")];
	wincombo[2]=[document.getElementById("7"),document.getElementById("8"),document.getElementById("9")];
	wincombo[3]=[document.getElementById("1"),document.getElementById("4"),document.getElementById("7")];
	wincombo[4]=[document.getElementById("2"),document.getElementById("5"),document.getElementById("8")];
	wincombo[5]=[document.getElementById("3"),document.getElementById("6"),document.getElementById("9")];
	wincombo[6]=[document.getElementById("1"),document.getElementById("5"),document.getElementById("9")];
	wincombo[7]=[document.getElementById("3"),document.getElementById("5"),document.getElementById("7")];
		if(wincombo[i][0].innerHTML.match("cross")&&wincombo[i][1].innerHTML.match("cross")&&wincombo[i][2].innerHTML.match("cross")){
					if (counter==10){
					myFun(1);
					done=true;
					document.getElementsByTagName("p")[0].innerHTML="Player X win";
					colorChange(wincombo,i);
				}
					else{
					myFun(1);
					done=true;
					finishGame=true;
					document.getElementsByTagName("p")[0].innerHTML="Player X win";
					colorChange(wincombo,i);
				}
			}
		}
	//check if O wins,it has an array and a number as parameters	
	function checkO(array,i){
		var wincombo=[[],[],[],[],[],[],[],[]];
	wincombo[0]=[document.getElementById("1"),document.getElementById("2"),document.getElementById("3")];
	wincombo[1]=[document.getElementById("4"),document.getElementById("5"),document.getElementById("6")];
	wincombo[2]=[document.getElementById("7"),document.getElementById("8"),document.getElementById("9")];
	wincombo[3]=[document.getElementById("1"),document.getElementById("4"),document.getElementById("7")];
	wincombo[4]=[document.getElementById("2"),document.getElementById("5"),document.getElementById("8")];
	wincombo[5]=[document.getElementById("3"),document.getElementById("6"),document.getElementById("9")];
	wincombo[6]=[document.getElementById("1"),document.getElementById("5"),document.getElementById("9")];
	wincombo[7]=[document.getElementById("3"),document.getElementById("5"),document.getElementById("7")];
		if(wincombo[i][0].innerHTML.match("circle")&&wincombo[i][1].innerHTML.match("circle")&&wincombo[i][2].innerHTML.match("circle")){
					if (counter==10){
					myFun(2);
					done=true;
					document.getElementsByTagName("p")[0].innerHTML="Player O win";
					colorChange(wincombo,i);
				}
					else{
					myFun(2);
					done=true;
					finishGame=true;
					document.getElementsByTagName("p")[0].innerHTML="Player O win";
					colorChange(wincombo,i);
				}
			}
		}		
	//the run() function is called when a player click on a cell
	function run(){
	//the  run() function only runs if the table cell is empty and the game is not finished.
			if (!finishGame && document.getElementById(event.target.id).innerHTML.match("&nbsp")){
	//determine which player's turn by checking the remainder of counter,then change the cell picture to
	//cross or circle
			if (counter%2==1){
				player="O";
				document.getElementById(event.target.id).innerHTML='<img src="images/cross.png">';
				document.getElementsByTagName("p")[0].innerHTML="Player "+ player+ " go";
				counter++;
			}
			else{
				player="X";
				document.getElementById(event.target.id).innerHTML='<img src="images/circle.png">';
				document.getElementsByTagName("p")[0].innerHTML="Player "+ player+ " go";
				counter++;
			}
			//a loop checking winner 
			for (var i=0;i<wincombo.length;i++){
				checkX(wincombo,i);
				checkO(wincombo,i);
				}
			//when all the cells are filled but no one wins.
			if ((!done)&&counter==10){
				myFun(3);
				document.getElementsByTagName("p")[0].innerHTML="No one wins";
			}
		}
	}