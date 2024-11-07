<?php 
	include('../connect.php');
	$dropnews="Drop table news";
	$rundropnews=mysqli_query($connection,$dropnews);
	if ($rundropnews) {
		echo "<p>News Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createnews="CREATE table news
		(
			newsId int Auto_Increment not null primary key,
			newsTitle varchar(100) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			news longtext CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			uploadedDate date,
			newsimg varchar(30)
		)" ;
	$runcreatenews=mysqli_query($connection,$createnews);
	if ($runcreatenews) {
		echo "<p>News Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$today=date("Y/m/d");
	$insertnews="INSERT into news values(1,'What is Lorem Ipsum?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','$today','newsimage/n1.jpg')";
	$runinsertnews=mysqli_query($connection,$insertnews);
	if ($runinsertnews) {
		echo "<p>A new blog is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>