<?php 
	include('../connect.php');
	$droporder="Drop table orderbook";
	$rundroporder=mysqli_query($connection,$droporder);
	if ($rundroporder) {
		echo "<p>Order Book Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	// $createorder="CREATE table orderbook
	// 	(
	// 		obid int Auto_Increment not null primary key,
	// 		orderId int,
	// 		bookId int,
	// 		quantity int,
	// 		FOREIGN KEY(orderId) REFERENCES ordercart(orderId),
	// 		FOREIGN KEY(bookId) REFERENCES book(bookId)
	// 	)" ;
	// $runcreateorder=mysqli_query($connection,$createorder);
	// if ($runcreateorder) {
	// 	echo "<p>Order Book Table is created successfully!</p>";
	// }else{
	// 	echo mysqli_error($connection);
	// }

 ?>