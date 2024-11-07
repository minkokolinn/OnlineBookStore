<?php 
	session_start();
	for ($i=1; $i <=$_SESSION['cartcount'] ; $i++) { 
		$cartcount=$_SESSION['cartcount'];
		echo $_SESSION['bookid'][$i]."<br>";
		echo $_SESSION['bookquantity'][$i]."<br>";
	}


 ?>


