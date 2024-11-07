<?php 
	include('../connect.php');
	if (isset($_REQUEST['commentIdtodelete']) && isset($_REQUEST['bdid'])) {
		$deletedcomment=$_REQUEST['commentIdtodelete'];
		$bookdetailid=$_REQUEST['bdid'];

		$deletecomment="DELETE from comment where commentId='$deletedcomment'";
		$rundeletecomment=mysqli_query($connection,$deletecomment);
		if ($rundeletecomment) {
			echo "<script>location='viewcomment.php?bookid=$bookdetailid'</script>";
		}else{
			echo "<script>alert('Error in deleting');</script>";
		}
	}
 ?>