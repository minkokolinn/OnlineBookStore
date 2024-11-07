<?php 
	include('../connect.php');
	$dropfaq="Drop table faq";
	$rundropfaq=mysqli_query($connection,$dropfaq);
	if ($rundropfaq) {
		echo "<p>FAQ Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createfaq="CREATE table faq
		(
			faqId int Auto_Increment not null primary key,
			userId int,
			question varchar(255) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			answer text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			FOREIGN KEY(userId) REFERENCES user(userId)
		)" ;
	$runcreatefaq=mysqli_query($connection,$createfaq);
	if ($runcreatefaq) {
		echo "<p>FAQ Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertfaq="INSERT into faq values(1,1,'What is major process of readers paradise?','Hi, Thank you for asking us. Yah, we mainly serve for book sale.Customers like u can buy books online and after order, we deliver this product to in front of your house.')";
	$runinsertfaq=mysqli_query($connection,$insertfaq);
	if ($runinsertfaq) {
		echo "<p>A new faq is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>