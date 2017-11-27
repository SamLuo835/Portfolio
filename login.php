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
	
	
	.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
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
	<form class="form-signin" method="POST" action="login/loginProcess.php">
			<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputEmail" class="sr-only">Enter Username</label>
				<input class="form-control" placeholder="UserName"type="text" name="username" id="inputEmail"  value="<?php echo $_SESSION['uName']?>" required autofocus>
				<label for="inputPass" class="sr-only">Enter Password</label>
				<input class="form-control" id="inputPass" placeholder="Password" value="<?php echo $_SESSION['secret']?>" type="password" name="password"  required>
				
				<?php if($_SESSION['isLoggedIn']){
						echo "<span style='color:red'> User name or password incorrect</span>";
						$_SESSION['isLoggedIn']=false;
						}
						?>
				<button class="btn btn-lg btn-default btn-block" type="submit">Sign in</button>
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
 
 </body>
</html>