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


	if (isset($_POST['btnsubmit'])) {
		$valquestion=$_POST['taquestion'];

		$insertfaq="INSERT into faq(userId,question) values('$userid','$valquestion')";
		$runinsertfaq=mysqli_query($connection,$insertfaq);
		if ($runinsertfaq) {
			echo "<script>alert('Your question has been submitted...')</script>";
		}else{
			echo mysqli_error($connection);
		}
	}

	if (isset($_REQUEST['faqtodelete'])) {
		$faqidtodelete=$_REQUEST['faqtodelete'];
		$deletefaq="DELETE from faq where faqId='$faqidtodelete'";
		$rundeletefaq=mysqli_query($connection,$deletefaq);
	}
 ?>
<style type="text/css">
	.actionlink{
		color: white;
		text-decoration: none;
		border: 1px solid white;
		padding: 5px;
	}
	.actionlink:hover{
		color: darkred;
	}
</style>

<section id="about_page_o">
 <div class="container">
  <div class="row">
   <div class="col-sm-4">
    <div class="about_page_l clearfix">
	 <h3 class="mgt col_1">Any Question?</h3>
	 	<form method="post">
	 		<textarea name="taquestion" style="resize: none; height: 130px; width: 100%; font-size: 20px;"></textarea><br>
	 		<input type="submit" name="btnsubmit" class="button_1">
	 	</form>
	</div>
   </div>
   <div class="col-sm-8">
    <div class="about_page_r clearfix">
	<h3 class="mgt col_1">Question and Answer</h3>

	<?php 
		$selectfaq="SELECT f.*,u.userProfileimg,u.userName from faq f,user u where f.userId=u.userId";
		$runselectfaq=mysqli_query($connection,$selectfaq);
		$countoffaq=mysqli_num_rows($runselectfaq);
		if ($countoffaq>0) {
			for ($i=0; $i <$countoffaq ; $i++) { 
				$dataoffaq=mysqli_fetch_array($runselectfaq);
				$faqid=$dataoffaq['faqId'];
				echo "
					<div class='panel panel-success'>
							<div class='panel-heading'>
								<img src='".$dataoffaq['userProfileimg']."' width='40px' style='border-radius:50%;'>&nbsp;&nbsp;&nbsp;<b style='font-size:18px;'>".$dataoffaq['userName']."</b>
								";

						if ($dataoffaq['userId']==$userid) {
							echo "<b style='float:right;'><a class='actionlink' href='faq.php?faqtodelete=$faqid'>Delete</a></b>";
						}
								

								echo "<br><br>
								<h5 class='panel-title'>".$dataoffaq['question']."</h5>
								<span class='pull-right clickable'><i class='glyphicon glyphicon-chevron-up'></i></span>
							</div>
							<div class='panel-body'>
								";
								if ($dataoffaq['answer']=="") {
									echo "Temporarily no answer. requesting.....";
								}else{
									echo $dataoffaq['answer'];
								}
							echo "
							</div>
					</div>

				";


			}
		}
	 ?>

	
   </div>
  </div>
 </div>
</div></section>

<script>
	$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
})
</script>
<?php 
	include('footer.php');
 ?>