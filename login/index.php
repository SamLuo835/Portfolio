<?php session_start(); 
	if(!isset($_SESSION['userName'])){
		header("location:../index.html");
	}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Portfolio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link href="../css/animate.css" rel="stylesheet"/></script>
	<link href="../css/waypoints.css" rel="stylesheet"/></script>
	<script src="../js/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="../js/waypoints.js" type="text/javascript"></script>
	<link href="../css/freelancer.min.css" rel="stylesheet">
	
	
	
	<style>
		li .form-control{
			margin-top:6px;
			background-color:#222;
			color:#FFF}
		.centering{display:flex;justify-content:center;}
		.navbar{
		margin-bottom:0;
		border-radius:0;
		}
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
		.img-fluid {
			max-width: 100%;
			height: auto;
		}
		footer{
			width:100%;
			background-color:black;
			margin-top:5px;
			padding:5%;
			color:white;
	}
	
	.js-loading *,
.js-loading *:before,
.js-loading *:after {
  animation-play-state: paused !important;
}
	
	#sendMessageButton:hover{
		color:white;
		background:#222;
		transition:all 0.5s;
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
				<a class="navbar-brand" href=""><img src="../images/s.png"></a>
		</div>
		<div id="myNavbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a class="js-scroll-trigger" href="#portfolio">portfolio</a></li>
					<li><a class="js-scroll-trigger" href="#about">About</a></li>
					<li><a class="js-scroll-trigger" href="#contact">Contact</a></li>
					<li><form  method="POST" action="loginProcess.php">
					<input class="form-control "type="submit"  name="logout"  value="LOGOUT">
			</form></li>
					
				</ul>
		</div>
	</div>
</nav>
	<section class="intro">
		<div class="inner">
			<div class="content">
				<section class=" os-animation" data-os-animation="bounceInUp" data-os-animation-delay="0s">
					<h1>Welcome</h1>
				</section>
				<section class=" os-animation" data-os-animation="bounceInUp" data-os-animation-delay="0.1s">
					<h2><?php echo $_SESSION['userName']; ?></h2>
				</section>
				<section class="os-animation " data-os-animation="bounceInUp" data-os-animation-delay="0.2s">
					<a class="cbtn  js-scroll-trigger " href="#portfolio">My portfolio</a>
				</section>
			</div>
		</div>
	</section>
	
	<section id="portfolio">
      <div class="container">
        <h2 class="text-center">Portfolio</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/tetris/index.php" >
              <div class="caption">
                <div class="caption-content">
				<h4>Tetris</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/tetris.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/jsuttt/index.html" >
              <div class="caption">
                <div class="caption-content">
				<h4>Ultimate Tic Tac Toe</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/ultimate.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/jsSnake/index.php">
              <div class="caption">
                <div class="caption-content">
				<h4>Classic Snake Game</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/snake.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/clock/index.html" >
              <div class="caption">
                <div class="caption-content">
				<h4>Clock Design</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/clock.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/movieSearching/index.html" >
              <div class="caption">
                <div class="caption-content">
				<h4>Movie Searching Tool</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/movieSearch.png" alt="">
            </a>
          </div>
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="contents/GeneticAlgorithm/index.html" >
              <div class="caption">
                <div class="caption-content">
					<h4>Genetic Algorithm Example</h4>
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../images/genetic.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/jquery.easing.min.js"></script>
	 <script src="../js/freelancer.min.js"></script>
	 
	 
	 
	 
	  <section class="success" id="about">
      <div class="container">
        <h2 class="text-center">About</h2>
        <hr >
        <div class="row " >
          <div  class="col-lg-6 col-md-6 col-sm-12" >
            <p>Hi! My name is Sam, I'm a second year student in Sheridan College, current program is Computer Systems Technology  Systems Analyst</p>
          </div>
          <div class="col-lg-6 col-md-6  col-sm-12">
            <p>This blog's purpose is to share my academic and personal projects. There is also a MYSQL database 
				connected to this website, you can create account and compete with other users in games like snake or tetris.</p>
          </div>
		   </div>
		    <div class="row centering" >
			<div class="col-lg-8 text-center ">
				<a class="cbtn">
				<span class="fa fa-download"> </span>Download CV</a>
          </div>
		  </div>
       
      </div>
    </section>
	
	
	
	
	 <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center">Contact Me</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto centering">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form action="mailto:samlaw829@gmail.com" method="POST" name="sentMessage" enctype="mutilpart/form-data" id="contactForm" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Name</label>
                  <input class="form-control" name="VistorName" id="name" type="text" placeholder="Name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Email Address</label>
                  <input class="form-control" name="VistorEmail" id="email" type="email" placeholder="Email Address" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Phone Number</label>
                  <input class="form-control" name="VistorNumber" id="phone" type="tel" placeholder="Phone Number" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Message</label>
                  <textarea class="form-control" name="VistorMessage" id="message" rows="5" placeholder="Message" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-lg" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
	
	
	
	
	
	
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
		document.body.classList.add('js-loading');

	window.addEventListener("load", showPage);

	function showPage() {
	document.body.classList.remove('js-loading');
	}
	</script>
   <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

</body>
</html>