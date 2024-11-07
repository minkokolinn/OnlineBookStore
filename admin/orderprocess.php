<?php 
	include('../connect.php');
	if (isset($_REQUEST['deliver'])&&isset($_REQUEST['orderid'])) {
		$orderid=$_REQUEST['orderid'];
		$updateorder="UPDATE ordercart set status='completed' where orderId='$orderid'";
		$runupdateorder=mysqli_query($connection,$updateorder);
		if ($runupdateorder) {
			echo "<script>alert('Completed! This order has been processed')</script>";
			echo "<script>location='order.php'</script>";
		}else{
			echo mysqli_error();
		}

	}
 ?>