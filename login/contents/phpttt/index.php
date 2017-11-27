<?php session_start();?>
	<!DOCTYPE html>
	<html lang="en">
     <head>
	 <title>Tic Tac Toe</title>
	 <link href="css/a6css.css" rel="stylesheet" type="text/css">
	 <meta name="viewport" content="width=device-width, initial-scale=1" />
     </head>
     <body>
	 <h2>Play Tic Tac Toe!</h2>
	 <main>
<?php
session_start();
if(isset($_POST['reset']))  {
    unset($_SESSION['board']);
	unset($_SESSION['who']);
	unset($_SESSION['win']);
	unset($_SESSION['playToken']);
	unset($_SESSION['winResult']);
    echo "<p>Start <a href=''>a new game</a></p>";
	}
	else {
	echo '<div class="wrapper1">';
    play();
    //Button to reset the game..
    echo '
		<div class="wrapper2">
        <form  method="post">
        <input type="submit" name="reset" value="Reset">
        </form></div></div>'; 

}
 
function play() {
    $win = -1;
    if(isset($_SESSION['who']))
        $who = $_SESSION['who'];
    if(!isset($who)) {
        $who="0"; // X start the game
        $_SESSION['board'] = "222222222"; // current cell values on the board
        $_SESSION['win'] = -1; // no winner yet
        $_SESSION['playToken'] = "XO"; // 0 means player X, 1 means  player O, 2 means Tie
    }
		$playToken = $_SESSION['playToken'];
        $board= $_SESSION['board'];
        if(isset($_POST['curCell']))
            $data = $_POST['curCell']; //identify which button was submitted    
        if(isset($data)) {
            $curPos = $data; // get the actual button clicked. 0 to 8 correspond to respective cell
            $board[$curPos] = $who; // set our game's data with player mark
            $who = ($who+1)%2; // switch the player turn
        }
        $outwho = substr($playToken,$who,1);
       
       
		
		//wincombo array,a 2 dimensional array, each sub array is 
		//a winning condition and the index of the postion in $board.
		$wincombo=array(
					array($board[0],0,$board[1],1,$board[2],2),
					array($board[3],3,$board[4],4,$board[5],5),
					array($board[6],6,$board[7],7,$board[8],8),
					array($board[0],0,$board[3],3,$board[6],6),
					array($board[1],1,$board[4],4,$board[7],7),
					array($board[2],2,$board[5],5,$board[8],8),
					array($board[0],0,$board[4],4,$board[8],8),
					array($board[2],2,$board[4],4,$board[6],6)
					);
		//check winner, and set $win to 1 or 0
		for($row=0;$row<8;$row++){
			if($wincombo[$row][0] === $wincombo[$row][2] && $wincombo[$row][2] === $wincombo[$row][4]){
				if($wincombo[$row][0]==='1'){
					$win=1;
					//get the postion of winning cells and store in an array called winResult
					$winResult=array($wincombo[$row][1],$wincombo[$row][3],$wincombo[$row][5]);
					break;
				}
				if($wincombo[$row][0]==='0'){
					$win=0;
					//get the postion of winning cells and store in an array called winResult
					$winResult=array($wincombo[$row][1],$wincombo[$row][3],$wincombo[$row][5]);
					break;
				}
			}
		}
		//$count increase by one if a non 2 value in $board is found
		$count=0;
		for($i=0;$i<9;$i++){
			if($board[$i]!=2){
				$count++;
			}
		}
		//The player's turn messgae will only displayed if game is not finished
		if ($win == -1 && $count!=9)
            echo "<div class='player'><p>" . $outwho . " is playing</p></div>";
		
		
        echo '<div class="imgwrapper"><form method="post">
              <table><tr>';
        $output = "";
		
		//construct the table when there is no winner
		if ($win== -1){
        for( $i = 0; $i < 9; $i++ ) {
            $curCell = $i;
            if(($i)%3 == 0)
                $output .= "</tr><tr>";        
            switch ($board[$i]) {
                case 2:
                    // using <input type=submit> for each cell
                    // ALTERNATIVE: can use any element that has the name=value attributes
                    //              in conjunction with a single "Take turn" submit element
                    //              the "reset" button can be used to finish the turn
                    $output .= '<td><input type="submit" name="curCell"  value="' .$i. '"></td>';
                    break;
                case 0:
                    $output .= "<td>X</td>";   
                    break;
                case 1:
                   
                    $output .= "<td>O</td>";   
                    break;         
            }      
        }
        $output .= "</tr></table></form></div>";
        echo $output;
		}
		
		
		//construct the table when there is a winner
		if ($win==1 or $win==0){
        for( $i = 0; $i < 9; $i++ ) {
            if(($i)%3 == 0)
                $output .= "</tr><tr>";        
            switch ($board[$i]) {
                case 2:
				//disable the empty cells, so they wont submit
                    $output .= '<td><input type="submit" name="curCell" disabled value="' .$i. '"></td>';
                    break;
                case 0:
				//compare the current postion $i to the winning postion in $_SESSION['winResult'], if match, make a td tag with the background color grey
					if ($i== $winResult[0] || $i==$winResult[1] || $i==$winResult[2]){
						$output .="<td style='background:grey'>X</td>";
						break;
					}
					else{
						$output .= "<td>X</td>";   
						break;
					}
                case 1:
				//compare the current postion $i to the winning postion in $_SESSION['winResult'], if match, make a td tag with the //background color grey
                   if ($i== $winResult[0] || $i==$winResult[1] || $i==$winResult[2]){
						$output .="<td style='background:grey'>O</td>";
						break;
					}
					else{
						$output .= "<td>O</td>";   
						break;
					}						
				}      
		}
		
		
        $output .= "</tr></table></form></div>";
        echo $output;
		}
		
		//if $count is 9 and there is no winner yet, echo the tie message
		if($count==9){
				if($win==-1){
					echo"<div class='turn'><p>It's a Tie</p></div>";
				}
			}
		//echo the winner message
        if ($win == 1)
            echo "<div class='turn'><p>" . substr($playToken,$win,1) . " wins</p></div>";   
		if($win==0)
			 echo "<div class='turn'><p>" . substr($playToken,$win,1) . " wins</p></div>"; 

        //update session variables so we can access it next time with current game info...
        $_SESSION['board'] = $board;
        $_SESSION['who'] = $who;
        $_SESSION['win'] = $win;
        $_SESSION['playToken'] = "XO";
		$_SESSION['winResult'] = $winResult;
    
	
	 
	}
 
// end of function play()
?>
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
</body>
<script>
var button=document.getElementById("close");
button.addEventListener("click",myfun);
function myfun(){
	window.open("http://luojianl.dev.fast.sheridanc.on.ca/syst10199/assign7/login/index.php","_self");
}
</script>
</html>