<?php 
	include('../connect.php');
	$dropadmin="Drop table admin";
	$rundropadmin=mysqli_query($connection,$dropadmin);
	if ($rundropadmin) {
		echo "<p>Admin Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createadmin="CREATE table admin
		(
			adminId int Auto_Increment not null primary key,
			adminEmail varchar(60),
			adminPassword varchar(50),
			adminType varchar(8)
		)" ;
	$runcreateadmin=mysqli_query($connection,$createadmin);
	if ($runcreateadmin) {
		echo "<p>Admin Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertadmin="INSERT into admin values(1,'admin@gmail.com','admin123','master')";
	$runinsertadmin=mysqli_query($connection,$insertadmin);
	if ($runinsertadmin) {
		echo "<p>A new admin is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>