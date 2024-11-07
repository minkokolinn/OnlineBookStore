<?php 
	include('../connect.php');
	$dropbook="Drop table book";
	$rundropbook=mysqli_query($connection,$dropbook);
	if ($rundropbook) {
		echo "<p>Book Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createbook="CREATE table book
		(
			bookId int Auto_Increment not null primary key,
			bookName varchar(70) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			bookType varchar(15),
			bookcategoryId int,
			author varchar(50) CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			price int,
			quantity int,
			ratingstar int,
			description text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			bookcoverimg varchar(50),
			FOREIGN KEY (bookcategoryId) REFERENCES bookcategory(bookcategoryId)
		)" ;
	$runcreatebook=mysqli_query($connection,$createbook);
	if ($runcreatebook) {
		echo "<p>Book Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertbook="INSERT into book(bookId,bookName,bookType,bookcategoryId,author,price,quantity,ratingstar,description,bookcoverimg) values(1,'Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future','International',9,'Vance, Ashlee',50000,10,3,'In the spirit of Steve Jobs and Moneyball, Elon Musk is both an illuminating and authorized look at the extraordinary life of one of Silicon Valley most exciting, unpredictable, and ambitious entrepreneurs a real-life Tony Stark and a fascinating exploration of the renewal of American invention and its new makers. Elon Musk spotlights the technology and vision of Elon Musk, the renowned entrepreneur and innovator behind SpaceX, Tesla, and SolarCity, who sold one of his Internet companies, PayPal, for $1.5 billion. Ashlee Vance captures the full spectacle and arc of the genius life and work, from his tumultuous upbringing in South Africa.','bookcover/c1.jpg')";
	$runinsertbook=mysqli_query($connection,$insertbook);
	if ($runinsertbook) {
		echo "<p>A new book is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>