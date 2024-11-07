<?php 
	include('connect.php');
	include('header.php');
	if (isset($_SESSION['uid'])) {
		$userid=$_SESSION['uid'];

		$selectuser="SELECT * from user where userId='$userid'";
		$runselectuser=mysqli_query($connection,$selectuser);
		$dataofuser=mysqli_fetch_array($runselectuser);
		
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='index.php'</script>";
	}

	if (isset($_REQUEST['usertodelete'])) {
		$deleteuser="DELETE from user where userId='$userid'";
		$rundeleteuser=mysqli_query($connection,$deleteuser);
		if ($rundeleteuser) {
			echo "<script>alert('Your account is permanently deleted?')</script>";
			echo "<script>location='index.php'</script>";
		}
	}
 ?>

 <style type="text/css">
 	.profileimg{
 		width: 20%;
 		border-radius: 100%;
 		margin-bottom: 30px;
 	}
 </style>

<section id="cart">
 <div class="container">
  <div class="row">
   <div class="checkout clearfix">
   	<div class="col-sm-2">
   		
   	</div>
	<div class="col-sm-8">
	 <div class="bg_1">
	   <div class="checkout_l clearfix">
	  <h4>Payment Method </h4>
	 </div><br>
	 <div class="checkout_l1n clearfix">
       <ul>
	    <li>
		 <span>
		 <img src="<?php echo $dataofuser['userProfileimg'] ?>" class="profileimg">
		 </span>
		</li>
	   </ul>
	 </div>
	<div class="checkout_l1 clearfix">
      <div class="col-sm-8 space_left">
	   <h6>Name</h6>
	  <input class="form-control" type="text" value="<?php echo $dataofuser['userName'] ?>" readonly>
	  </div>
	  <div class="col-sm-4 space_right">
	  </div>
	 </div>
	 <div class="checkout_l1 clearfix">
	      <div class="col-sm-12 space_left">
		   <h6>NRC</h6>
		  <input class="form-control" type="text" value="<?php echo $dataofuser['userNrc'] ?>" readonly>
		  </div>	  
	 </div>
	<div class="checkout_l1 clearfix">
      <div class="col-sm-4 space_left">
	   <h6>Date of birth</h6>
	  <input class="form-control" type="text" value="<?php echo $dataofuser['userDob'] ?>" readonly>
	  </div>
	  <div class="col-sm-4 space_left">
	   <h6>Gender</h6>
	  <input class="form-control" type="text" value="<?php echo $dataofuser['userGender'] ?>" readonly>
	  </div>
	  <div class="col-sm-4 space_right">
	   <h6>Phone</h6>
	  <input class="form-control" type="text" value="<?php echo  $dataofuser['userPhone']?>" readonly>
	  </div>
	 </div>
	 <div class="checkout_l1 clearfix">
	      <div class="col-sm-12 space_left">
		   <h6>Email</h6>
		  <input class="form-control" type="text" value="<?php echo $dataofuser['userEmail'] ?>" readonly>
		  </div>	  
	 </div>
	 <div class="checkout_l1 clearfix">
	      <div class="col-sm-12 space_left">
		   <h6>NRC</h6>
		  <textarea class="form-control" readonly style="resize: none; height: 120px"><?php echo $dataofuser['userAddress'];?></textarea>
		  </div>	  
	 </div>
	 <div class="checkout_l1 text-right clearfix">
      <h5><a class="button" href="profile.php?usertodelete=todelete">Deactive my account</a></h5>
	 </div>
	 </div>
	</div>
   </div>
  </div>
 </div>
</section>

<?php 
	include('footer.php');
 ?>