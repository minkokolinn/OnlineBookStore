<?php 
	include('../connect.php');
	$droporder="Drop table ordercart";
	$rundroporder=mysqli_query($connection,$droporder);
	if ($rundroporder) {
		echo "<p>Order Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createorder="CREATE table ordercart
		(
			orderId int Auto_Increment not null primary key,
			orderNo varchar(50),
			userId int,
			address text CHARACTER SET utf8 COLLATE utf8_myanmar_ci,
			phone varchar(15),
			orderDate date,
			deliveryType varchar(10),
			paymentType varchar(10),
			bookIds varchar(225),
			quantities varchar(225),
			total int,
			status varchar(30),
			FOREIGN KEY(userId) REFERENCES user(userId)
		)" ;
	$runcreateorder=mysqli_query($connection,$createorder);
	if ($runcreateorder) {
		echo "<p>Order Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

 ?>