<?php 
	include('../connect.php');
	if (isset($_REQUEST['valbooktodelete'])) {
		$booktodelete=$_REQUEST['valbooktodelete'];
		$deletebook="DELETE from book where bookId='$booktodelete'";
		$rundeletebook=mysqli_query($connection,$deletebook);
		if ($rundeletebook) {
			echo "<script>location='booklist.php'</script>";
		}else{
			echo mysqli_error();
		}
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='booklist.php'</script>";
	}
	
 ?>