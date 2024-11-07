<?php 
	include('connect.php');
	if (isset($_POST['btnreg'])) {
		if ($_POST['tfpass']!=$_POST['tfcpass']) {
			echo "<script>alert('Confirm password must be same with password!!!')</script>";
		}else{
			$valname=$_POST['tfname'];
			$valnrc=$_POST['tfnrc'];
			$valdob=$_POST['tfdob'];
			$valgender=$_POST['rdogender'];
			$valphone=$_POST['tfphone'];
			$valsocial=$_POST['tfsocial'];
			$valpostal=$_POST['tfpostal'];
			$valaddress=$_POST['taaddress'];
			$valinterest=$_POST['tainterest'];
			$valemail=$_POST['tfemail'];
			$valpass=$_POST['tfcpass'];
			//Image Upload
		      $profileimg=$_FILES['tfprofile']['name'];
		      $folder="userprofileimg/";

		      $filename=$folder.'_'.$profileimg;
		      $copied=copy($_FILES['tfprofile']['tmp_name'], $filename);
		      if (!$copied) {
		        echo "<script>window.alert('Cannot Upload Image!')</script>";
		        exit();
		      }{
		      	$insertuser="INSERT into user(userName,userNrc,userDob,userGender,userPhone,userSocial,userPostalcode,userAddress,userProfileimg,userInterestcat,userEmail,userPassword) values('$valname','$valnrc','$valdob','$valgender','$valphone','$valsocial','$valpostal','$valaddress','$filename','$valinterest','$valemail','$valpass')";
					$runinsertuser=mysqli_query($connection,$insertuser);
					if ($runinsertuser) {
						echo "<script>window.alert('You created your account successfully..')</script>";
						echo "<script>location='userlogin.php'</script>";
					}else{
						echo mysqli_error($connection);
					}
		      }  
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
		<div class="col-sm-2">
			
		</div>
	 <div class="col-sm-8">
	  <div class="contact_page_2i clearfix">
	  <form method="post" enctype="multipart/form-data">
	   <h3 class="mgt">Create an account</h3>
	   <p>Please fill up all of these fields. Only in English</p>
	   <input class="form-control" type="text" placeholder="Name" name="tfname" autocomplete="off" required >
	   <input class="form-control" type="text" placeholder="NRC" name="tfnrc" autocomplete="off" required >
	   <input class="form-control" type="date" placeholder="Date of birth" name="tfdob" required >
	   <div class="form-control">
	   	Gender - 
	   	<input class="" type="radio" name="rdogender" value="male" required > Male
	   	<input class="" type="radio" name="rdogender" value="female" > Female
	   </div>
	   <input class="form-control" type="text" placeholder="Phone" maxlength="13" name="tfphone" autocomplete="off" required >
	   <input class="form-control" type="text" placeholder="Social Media Link (Optional)" autocomplete="off" name="tfsocial" >
	   <input class="form-control" type="text" placeholder="Postal Code" name="tfpostal" autocomplete="off" required >
	   <div>
	   		<p>Addres (Please fill exactly for delivery process)</p>
	   		<textarea class="form-control" style="resize: none; height: 100px;" name="taaddress" required>
	   	
	   		</textarea>
	   </div>
	   <input type="file" class="form-control" name="tfprofile">
	   <input class="form-control" type="text" value="Your point amount - 0 (Your point wallet will be created)" disabled>
	   <div>
	   		<p>Which types of book are you interested in? (Optional)</p>
	   		<textarea class="form-control" style="resize: none; height: 100px;" name="tainterest">
	   	
	   		</textarea>
	   </div>

	   <p>For account login, fill up account information</p>
	   <input class="form-control" type="email" placeholder="Email" name="tfemail" autocomplete="off" required >
	   <input class="form-control" type="password" placeholder="Password" maxlength="15" name="tfpass" required >
	   <input class="form-control" type="password" placeholder="Confirm password" maxlength="15" name="tfcpass" required >
	   <h5><input type="submit" class="button_1" name="btnreg" value="REGISTER">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button_1" value="CANCEL"></h5>
	   </form>
	  </div>
	  <div class="contact_page_2ii clearfix">
	  	<a href="userlogin.php"><p class="linkregister"><u>Aready have an account? Don't need to register</u></p></a>
	   </div>
	   <div class="contact_page_2ii clearfix">
	  	
	   </div>
	 </div>
	</div>
  </div>
 </div>
</section>
</body>
</html>
