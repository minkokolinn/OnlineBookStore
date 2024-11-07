<?php 
	include('../connect.php');
	$dropbookcat="Drop table bookcategory";
	$rundropbookcat=mysqli_query($connection,$dropbookcat);
	if ($rundropbookcat) {
		echo "<p>Book Category Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createbookcat="CREATE table bookcategory
		(
			bookcategoryId int Auto_Increment not null primary key,
			bookcategoryName varchar(60)
		)" ;
	$runcreatebookcat=mysqli_query($connection,$createbookcat);
	if ($runcreatebookcat) {
		echo "<p>Book Category Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertbookcat="INSERT into bookcategory values(1,'History')";
	$runinsertbookcat=mysqli_query($connection,$insertbookcat);
	if ($runinsertbookcat) {
		echo "<p>A new book category is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>