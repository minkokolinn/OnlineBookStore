<?php 
	session_start();
	include('connect.php');
	if (isset($_POST['btnlogin'])) {
		$valemail=$_POST['tfemail'];
		$valpass=$_POST['tfpass'];

		$selectuser="SELECT * from user where userEmail='$valemail' and userPassword='$valpass'";
		$runselectuser=mysqli_query($connection,$selectuser);
		$countofuser=mysqli_num_rows($runselectuser);
		if ($countofuser==1) {
			$dataofuser=mysqli_fetch_array($runselectuser);
			$_SESSION['uid']=$dataofuser['userId'];
			echo "<script>alert('Login Successful')</script>";
			echo "<script>location='index.php'</script>";
		}else{
			echo "<script>alert('Login Failed')</script>";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reader's Paradise Book Store</title>
    <link rel="icon" href="image/tabicon.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.linkregister{
		transition: 1s;
		color: white;
		padding-top: -10px;
	}
	.linkregister:hover{
		transition: 1s;
		color: #339966;
	}
</style>
<body>

<section id="contact_page">
 <div class="container">
  <div class="row">
	<div class="contact_page_2 clearfix">
		<form method="post">
		<div class="col-sm-3">
			
		</div>
		 <div class="col-sm-6">
		  <div class="contact_page_2i clearfix">
		   <h3 class="mgt">Login to your account</h3>
		   <p>Hey customer, you must login to take actions on this site such as order, feedback and so on. If you don't have an account, please register first. If you have, just type your existing account.</p>
		   <input class="form-control" type="email" placeholder="Email" name="tfemail" autocomplete="off" required>
		   <input class="form-control" type="password" placeholder="Password" name="tfpass">
		   <h5><input type="submit" class="button_1" name="btnlogin" value="LOGIN">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button_1" href="index.php"> Back </a></h5>
		  </div>
		  <div class="contact_page_2ii clearfix">
		  	<a href="userregister.php"><p class="linkregister"><u>I don't have an account. I wanna register first</u></p></a>
		   </div>
		   <div class="contact_page_2ii clearfix">
		  	
		   </div>
	 	</div>
	 	</form>
	</div>
  </div>
 </div>
</section>
</body>
</html>
