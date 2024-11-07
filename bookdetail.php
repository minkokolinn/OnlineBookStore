<?php 
	include('connect.php');
	include('header.php');


	$userid="";
	if (isset($_SESSION['uid'])) {
		$userid=$_SESSION['uid'];

		$selectprofileimg="SELECT userProfileimg from user where userId='$userid'";
		$runselectprofileimg=mysqli_query($connection,$selectprofileimg);
		$dataofprofileimg=mysqli_fetch_array($runselectprofileimg);
		$profileimgdir=$dataofprofileimg['userProfileimg'];
	}else{
		echo "<script>window.alert('Please login first')</script>";
		echo "<script>location='userlogin.php'</script>";
	}
	// ..................................
	$today=date("Y/m/d");

	// ..................................

	if ($_REQUEST['bdid']) {
		$bookid=$_REQUEST['bdid'];

		$selectbook="SELECT * from book where bookId='$bookid'";
		$runselectbook=mysqli_query($connection,$selectbook);
		$dataofbook=mysqli_fetch_array($runselectbook);
		$catid=$dataofbook['bookcategoryId'];

		$selectcatgory="SELECT bookcategoryName from bookcategory where bookcategoryId='$catid'";
		$runselectcategory=mysqli_query($connection,$selectcatgory);
		$dataofcategory=mysqli_fetch_array($runselectcategory);
	}else{
		echo "<script>window.alert('Invalid action')</script>";
		echo "<script>location='index.php'</script>";
	}

	// ..............


	// ......................
	if (isset($_POST['btndone'])) {
		$valcomment=$_POST['tacomment'];
		$insertcomment="INSERT into comment(comment,userId,bookId,commentDate) values('$valcomment','$userid','$bookid','$today')";
		$runinsertcomment=mysqli_query($connection,$insertcomment);
		if ($runinsertcomment) {
			
		}else{
			echo "<script>window.alert('Failed to comment')</script>";
		}
	}

	if (isset($_POST['btnaddtocard'])) {
		
		$valquantitycart=$_POST['tfquantity'];
		echo "<script>location='addtocart.php?addtocard=something&&bdid=$bookid&&cartquantity=$valquantitycart'</script>";

	}
 ?>
<?php 
	if ($dataofbook['bookType']=='Myanmar') {
		echo "<section id='center' class='clearfix center_shop' style='background-image: url(image/burmabook.jpg); background-position: center; background-size: cover;'> 
			 <div class='container'>
			  <div class='row'>
			   <div class='center_shop_1 text-center clearfix'>
			    <div class='col-sm-12'><hr>
				 <h2 class='mgt col_1'>Myanmar Book Collections</h2><hr>
				 <p style='color: white;'>Various types of myanmar books are shown in this page</p><br>
				</div>
			   </div>
			  </div>
			 </div>	  
			</section>"	;
	}else{
		echo "<section id='center' class='clearfix center_shop' style='background-image: url(image/internationalbook1.jpg); background-position: center; background-size: cover;'> 
			 <div class='container'>
			  <div class='row'>
			   <div class='center_shop_1 text-center clearfix'>
			    <div class='col-sm-12'><hr>
				 <h2 class='mgt col_1'>International Book Collections</h2><hr>
				 <p style='color: white;'>Various types of myanmar books are shown in this page</p><br>
				</div>
			   </div>
			  </div>
			 </div>	  
			</section>";
	}
 ?>

<section id="detail"> 
 <div class="container">
 	<?php 
 		if ($dataofbook['bookType']=='Myanmar') {
 			echo "<a href='myanmarbook.php' class='button'>Back</a><br><br>";
 		}else{
 			echo "<a href='internationalbook.php' class='button'>Back</a><br><br>";
 		}
 	 ?>
 	
  <div class="row">
    <div class="detail_1 clearfix">
    <div class="col-sm-6">
	 <div class="detail_1l clearfix">
	  <img src="admin/<?php echo $dataofbook['bookcoverimg']; ?>" class="iw" alt="abc">
	 </div>
	</div>
	<div class="col-sm-6">
	 <div class="detail_1r clearfix">
	  <div class="detail_1ri clearfix">
	    <h5 class="mgt col_1">Sale</h5>
		<h6 class="transform">
		<span class="col_2">
		 <?php 
		 	for ($j=0; $j <$dataofbook['ratingstar'] ; $j++) { 
					   		 echo "<i class='fa fa-star'></i>&nbsp;";
					   }
		  ?>
		</span>
		<u><?php echo $dataofcategory['bookcategoryName']; ?></u>
		</h6>
		<h3><?php echo $dataofbook['bookName']; ?></h3>
		<h4>Written By : <?php echo $dataofbook['author']; ?></h4>
		<h4 class="normal">
			<?php 
				if ($dataofbook['quantity']>0) {
					$forsale="In stock";
				}else{
					$forsale="Out of stock";
				}
			 ?>
		   <span class="span_3 col_1"><?php echo $dataofbook['price'] ?> MMK (<?php echo $forsale; ?>)</span>
	    </h4>
		<p><?php echo $dataofbook['description'] ?></p>
	  </div>
	  <div class="detail_1ri1 clearfix">
		<br>
		<h5 class="transform left">
	   <span class="span_1 bold">Quantity</span> 
	   </h5>
	   <form method="post">
	   <div class="input-group number-spinner">
				
				<input type="number" class="form-control text-center" name="tfquantity" value="1" min="1">
			</div><br>

		<h4><input type='submit' class='button' name="btnaddtocard" value='Add To Cart'></h4>
		 
		 </form>
	   
	  </div>
	 </div>
	</div>
   </div>
    <div class="detail_2 clearfix">
	  <div class="box_1 text-center clearfix">
		<div class="col-sm-12">
		 <h3 class="mgt">Customer Reviews</h3>
		 <p>Please share you opinion about this book</p>
		 <hr>
		</div>
   </div>
      <div class="detail_2i clearfix" id="bobo">
	   <div class="col-sm-4">
	   	<p class="text-center"><?php echo date('d M,Y'); ?></p>
	    <div class="detail_2il text-center clearfix">
	    	<form method="post">
		 <p>Type your comment</p><br>
		 <span class="col_2">
		 	<textarea class="form-control" style="resize: none; height: 300px;" name="tacomment"></textarea>
		</span>
		<input type="submit" class="button" value="Done" name="btndone" style="width:100%;">
		</form>
		</div>
<!-- 		<div class="detail_2il1 text-center clearfix">
		 <h2 class="mgt">100%</h2>
		 <h4 class="normal transform">Our Customers would recommend this product.</h4>
		</div> -->
	   </div>
	   <div class="col-sm-8">
		
			<?php 
				$selectcomment="SELECT c.commentId,c.comment,c.commentDate,u.userName,c.userId from comment c, user u where c.bookId='$bookid' && c.userId=u.userId order by c.commentDate desc";
				
				$runselectcomment=mysqli_query($connection,$selectcomment);
				$countofcomment=mysqli_num_rows($runselectcomment);
				if ($countofcomment>0) {
					for ($i=0; $i <$countofcomment ; $i++) { 
						$dataofcomment=mysqli_fetch_array($runselectcomment);
						$commentIdtodelete=$dataofcomment['commentId'];
						$newDate = date("d M,Y", strtotime($dataofcomment['commentDate']));
						echo "
						<div class='detail_2ir clearfix'>
							<h4>".$dataofcomment['userName']." <span class='transform'>".$newDate."</span></h4>
							  <p>".$dataofcomment['comment']."</p>
							  ";
							  if ($dataofcomment['userId']==$userid) {
							  	echo "<h5><a href='commentdelete.php?bdid=$bookid&&commentIdtodelete=$commentIdtodelete' style='text-decoration:underline;'>Delete</a></h5>";
							  }
							  echo "
							</div>
						";
					}
				}else{
					echo "
						<div class='detail_2ir clearfix'>
							<h4>No Comment</h4>
							  
							</div>
						";
				}

			 ?>
		  
		
		<br><br>
		<div class="clearfix detail_2ir1">
		  
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