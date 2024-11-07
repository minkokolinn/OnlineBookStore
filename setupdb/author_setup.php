<?php 
	include('../connect.php');
	$dropauthor="Drop table author";
	$rundropauthor=mysqli_query($connection,$dropauthor);
	if ($rundropauthor) {
		echo "<p>Author Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createauthor="CREATE table author
		(
			authorId int Auto_Increment not null primary key,
			authorName varchar(50) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			authorBiography varchar(255) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			authorimg varchar(50)
		)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;" ;
	$runcreateauthor=mysqli_query($connection,$createauthor);
	if ($runcreateauthor) {
		echo "<p>Author Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertauthor="INSERT into author values(1,'John','He is a doctor, he wrote many books about health and medical topic','authorimg/1.jpg')";
	$runinsertauthor=mysqli_query($connection,$insertauthor);
	if ($runinsertauthor) {
		echo "<p>A new author is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>