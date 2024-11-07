<?php 
	include('../connect.php');
	$dropbookreview="Drop table bookreview";
	$rundropbookreview=mysqli_query($connection,$dropbookreview);
	if ($rundropbookreview) {
		echo "<p>Book Review Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createbookreview="CREATE table bookreview
		(
			bookreviewId int Auto_Increment not null primary key,
			bookName varchar(80) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			bookreview text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			bookreviewimg varchar(30)
		)" ;
	$runcreatebookreview=mysqli_query($connection,$createbookreview);
	if ($runcreatebookreview) {
		echo "<p>Book Review Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertbookreview="INSERT into bookreview values(1,'Podcasting for Dummies','ul li Understand the dos and donts of podcasting li li Produce unique content that attracts listeners li li Build a studio that rivals pro podcasters li ul How to talk your way to the top As more and more people turn to podcasts for entertainment, information, and education, the market for new players has never been bigger--or more competitive. And with corporations and A-list celebs moving in on the action, its more important than ever to know how to stand out from the crowd. Written by two podcasting veterans, this book gives you everything you need to launch a podcast. Get the insider info on how to produce quality audio (and even video)','bookcover/just.jpg')";
	$runinsertbookreview=mysqli_query($connection,$insertbookreview);
	if ($runinsertbookreview) {
		echo "<p>A new book review is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>