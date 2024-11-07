<?php 
	session_start();
	if (isset($_REQUEST['addtocard']) && isset($_REQUEST['bdid']) && isset($_REQUEST['cartquantity'])) {
		if (isset($_SESSION['cartcount'])) {
			$_SESSION['cartcount']++;
		}else{
			$_SESSION['cartcount']=1;
		}
		$dir=$_REQUEST['bdid'];
		$quantity=$_REQUEST['cartquantity'];

		$countofcart=$_SESSION['cartcount'];
		$_SESSION['bookid'][$countofcart]=$dir;
		$_SESSION['bookquantity'][$countofcart]=$quantity;
		echo "<script>alert('Added to cart')</script>";

		
		echo "<script>location='bookdetail.php?bdid=".$dir."'</script>";
	}

 ?>