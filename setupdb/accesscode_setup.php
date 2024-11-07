<?php 
	include('../connect.php');
	$dropaccesscode="Drop table accesscode";
	$rundropaccesscode=mysqli_query($connection,$dropaccesscode);
	if ($rundropaccesscode) {
		echo "<p>Access Code Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createaccesscode="CREATE table accesscode
		(
			access_code int
		)" ;
	$runcreateaccesscode=mysqli_query($connection,$createaccesscode);
	if ($runcreateaccesscode) {
		echo "<p>Access Code Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertaccesscode="INSERT into accesscode values(12345)";
	$runinsertaccesscode=mysqli_query($connection,$insertaccesscode);
	if ($runinsertaccesscode) {
		echo "<p>A new access code is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>