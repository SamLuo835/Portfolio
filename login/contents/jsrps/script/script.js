//ramdom number generate from 1 to 3
var ramNum=Math.floor(Math.random()*3+1);

//reset button function to reload the page
function Reset(){
	location.reload();
	var set=document.getElementsByClassName("show");
	set[0].classList.toggle("hide");
	set[1].classList.toggle("hide");
	set[2].classList.toggle("hide");
	document.getElementsByClassName("computerbox")[0].innerHTML="&nbsp;";
	document.getElementsByClassName("playerbox")[0].innerHTML="&nbsp;";
	document.getElementsByClassName("result")[0].innerHTML="Welcome";
	}
//a box to display the computer's choice decided by the random number.1 for rock ,2 for paper, 3 for scissor	
function computerbox(){
	if (ramNum==1){
		document.getElementsByClassName("computerbox")[0].innerHTML="<p>PC's pick</p><img src='images/rock.png' alt='rock'>";
		}
	if(ramNum==2){
		document.getElementsByClassName("computerbox")[0].innerHTML="<p>PC's pick</p><img src='images/paper.png' alt='paper'>";
		}
	if(ramNum==3){
		document.getElementsByClassName("computerbox")[0].innerHTML="<p>PC's pick</p><img src='images/scissor.png'alt='scissor'>";
		}
	}
		
//a function when  player click on the images  , it changes the player box image to player's choice, also compare two players
//choice's and then display a result
function clickImage(){
	var choice=document.getElementById(event.target.id).getAttribute("alt");
	if (choice=="rock"){
		document.getElementsByClassName("playerbox")[0].innerHTML="<p>Your pick</p><img src='images/rock.png' alt='rock'>";
		}
	if(choice=="paper"){
		document.getElementsByClassName("playerbox")[0].innerHTML="<p>Your pick</p><img src='images/paper.png' alt='paper'>";
		}
	if(choice=="scissor"){
		document.getElementsByClassName("playerbox")[0].innerHTML="<p>Your pick</p><img src='images/scissor.png' alt='scissor'>";
		}
		var set=document.getElementsByClassName("show");
		set[0].classList.toggle("hide");
		set[1].classList.toggle("hide");
		set[2].classList.toggle("hide");
		computerbox();
			if (choice=="scissor"){
				if(ramNum==1){
					document.getElementsByClassName("result")[0].innerHTML="computer wins";
				}
				if (ramNum==2){
					document.getElementsByClassName("result")[0].innerHTML="you win";
				}
				if (ramNum==3){
					document.getElementsByClassName("result")[0].innerHTML="tie";
				}
			}
			if(choice=="paper"){
				if(ramNum==1){
					document.getElementsByClassName("result")[0].innerHTML="you win";
				}
				if (ramNum==2){
					document.getElementsByClassName("result")[0].innerHTML="tie";
				}
				if (ramNum==3){
					document.getElementsByClassName("result")[0].innerHTML="computer wins";
				}
			}
			if(choice=="rock"){
				if(ramNum==1){
					document.getElementsByClassName("result")[0].innerHTML="tie";
				}
				if (ramNum==2){
					document.getElementsByClassName("result")[0].innerHTML="computer wins";
				}
				if (ramNum==3){
					document.getElementsByClassName("result")[0].innerHTML="you win";
				}
			}
		}
		
	