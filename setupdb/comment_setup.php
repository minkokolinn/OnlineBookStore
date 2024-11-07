<?php 
	include('../connect.php');
	$dropcomment="Drop table comment";
	$rundropcomment=mysqli_query($connection,$dropcomment);
	if ($rundropcomment) {
		echo "<p>Comment Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createcomment="CREATE table comment
		(
			commentId int Auto_Increment not null primary key,
			comment text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			userId int,
			bookId int,
			commentDate date,
			FOREIGN KEY (userId) REFERENCES user(userId),
			FOREIGN KEY (bookId) REFERENCES book(bookId)
		)" ;
	$runcreatecomment=mysqli_query($connection,$createcomment);
	if ($runcreatecomment) {
		echo "<p>Comment Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertcomment="INSERT into comment values(1,'Wow! This book is amazing.',1,1,'2021/07/01')";
	$runinsertcomment=mysqli_query($connection,$insertcomment);
	if ($runinsertcomment) {
		echo "<p>A new comment is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>