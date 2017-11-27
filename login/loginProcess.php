<?php

session_start();
require_once("Member.class");


/*
if (!isset($_POST['submit'])) {
	die(header("Location: ../index.html"));
}
*/
$_SESSION['duplicate'] =false;
$_SESSION['formAttemp'] = true;
$_SESSION['id'] = session_id();
$_SESSION['isLoggedIn'] = false;
$_SESSION['password'] = $_POST['password'];
$date=date("Y-m-d");
if (isset($_POST['username']))
	if (!empty($_POST['username'])) {
		$safeuser = $_POST['username'];
		$_SESSION['firstName'] = $_POST['username'];
	} else
		echo "handle the bad name";
	
$visitor = new Member;

if(isset($_POST['uName'])){
if($visitor->registerMember($_POST['fName'],$_POST['lName'],sha1($_POST['secret']),$date,$_POST['gender'],$_POST['email'],$_POST['uName'])){
	header("Location: registerSucced.html");
	$_SESSION['uName']=$_POST['uName'];
}
else{
	header("Location: ../registerForm.php");
	$_SESSION['duplicate']=true;
	$_SESSION['address']=$_POST['email'];
	$_SESSION['secret']=$_POST['secret'];
	$_SESSION['fName']=$_POST['fName'];
	$_SESSION['lName']=$_POST['lName'];
	$_SESSION['uName']=$_POST['uName'];
	$_SESSION['gender']=$_POST['gender'];
}
}


if(isset($_POST['username']) and isset($_POST['password'])){
if ($visitor->authenticate($_POST['username'],$_POST['password'])) {
	header("Location: index.php");	
	//die(header("Location: ../index2.html"));	
} else {
	header("Location: ../login.php");
	$_SESSION['isLoggedIn']=true;
	//die(header("Location: ../register.html"));
	}
}

if(isset($_SESSION['userName'])){
	if(isset($_POST['score'])){
		if($visitor->updateScore($_POST['score'],$_SESSION['userName'])){
			header("Location: contents/tetris/index.php");
		}
		else{
			echo "false   ".$_POST['score']." f";
		}
	}
}

if(isset($_SESSION['userName'])){
	if(isset($_POST['snakescore'])){
		if($visitor->updateSnakeScore($_POST['snakescore'],$_SESSION['userName'])){
			header("Location: contents/jsSnake/index.php");
		}
		else{
			echo "false   ".$_POST['score']." f";
		}
	}
}

if(isset($_POST['logout'])){
session_destroy();
header("Location: ../index.html");
}
?>