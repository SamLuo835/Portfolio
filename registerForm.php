<?php session_start(); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	
	<link href="css/freelancer.min.css" rel="stylesheet">
	
	<style>
	.navbar-brand{
		float:left;
		min-height:55px;
		padding:1px 15px 15px ;
		}
		.navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus
		, .navbar-inverse .navbar-nav .active a:hover{
		background-color:#222;
		color:#FFF;
		}	
	.flex{display:flex}
	.mrr{margin-right:auto!important;}
	
	.mrl{margin-left:auto!important;}
	
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
	
	@media (max-width:900px){
	.fa{
		font-size:20px;
		padding:10px;
		}
	}
	
	.jumbotron {
  max-width: 500px;
  padding: 15px;
  margin: 10px auto ;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
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
				<a class="navbar-brand" href=""><img src="images/s.png"></a>
		</div>
		<div id="myNavbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="index.html">Home</a></li>
					<li><a class="js-scroll-trigger" href="index.html#portfolio">portfolio</a></li>
					<li><a class="js-scroll-trigger" href="index.html#about">About</a></li>
					<li><a class="js-scroll-trigger" href="index.html#contact">Contact</a></li>
					
				</ul>
		</div>
	</div>
</nav>



<div class="container">
	<div class="jumbotron">
		
	
		<form class="form-signin" method="POST" action="login/loginProcess.php" onsubmit="validateForm(event)">
		<h2 class="form-signin-heading">Create Account</h2>
			
			<fieldset>
			<legend>Personal Information</legend>
			<div class="form-group">
				<label><b>First Name</b></label>
				<input class="form-control" type="text" name="fName" value="<?php echo $_SESSION['fName']?>" maxlength="50" required>
				<label><b>Last Name</b></label>
				<input class="form-control" value="<?php echo $_SESSION['lName']?>" type="text" name="lName" maxlength="50" required>
				<input type="hidden" name="date" value="2017-07-24">
			</div >
				
				
				<div class="form-group">
				<label>Gender</label>
				<div class="form">
				<input  type="radio" name="gender" value="male" checked>Male</input>
				<input  type="radio" name="gender" <?php if($_SESSION['gender']=="female"){
					echo "checked";
				} ?>
				 value="female">
				Female</input>
				</div>
				</div>
				
				
				<div class="form-group">
				<label><b>Email</b></label>
				<input class="form-control"" type="email" name="email" value="<?php echo $_SESSION['address']?>" maxlength="50" required>
				</div>
			</fieldset>
			
			<div class="form-group">
			<label>Choose a username</label>
				<input class="form-control" type="text" name="uName" value="<?php echo $_SESSION['uName']?>" maxlength="50" required>
				<?php if($_SESSION['duplicate']){
					echo "<span style='color:orange'> User Name already taken, please try another one</span>";
					$_SESSION['duplicate']=false;
				}?>
			</div>
			
			<div  class=" form-group pass1">
			<label>Choose a password</label>
				<input class="form-control" type="password" name="secret" value="<?php echo $_SESSION['secret']?>" maxlength="50" required id="pw1">
			</div>
			
			<div class="form-group pass2">
			<label>Confirm Password</label>
				<input class="form-control" type="password" name="secret" value="<?php echo $_SESSION['secret']?>" maxlength="50" required id="pw2" onkeyup="checkPass();return false;">
				<span id="confirmMessage" class="confirmMessage"></span>
			</div>
				
			<div class="flex">
				<input class="mrr btn btn-default" id="reset" type="reset" name="clear" >
			
			
				<button class=" btn btn-default" type="submit" name="submit">Submit</button>
			</div>
			
		</form>  	
	
	
	</div>

</div>


<footer class="container-fluid text-center">
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
	document.getElementById("reset").addEventListener("click",reset);
	function reset(){
		document.getElementById('confirmMessage').innerHTML="";
		document.getElementById('pw2').style.backgroundColor="";
		document.getElementById('pw1').style.backgroundColor="";
	}
	function checkPass()
	{
    //Store the password field objects into variables ...
		var pass1 = document.getElementById('pw1');
		var pass2 = document.getElementById('pw2');
    //Store the Confimation Message Object ...
		var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
		if(pw1.value == pw2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pw2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
		return true;
		}else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pw2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
		return false;
		}
	}  
	function validateForm(e){
		if(checkPass()==true){
			console.log("checkPass()");
		}
		else{
		e.preventDefault();
		console.log("checkPass()");
		}
	}
</script>
 </body>
</html>