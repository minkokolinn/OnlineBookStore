<?php 
	include('../connect.php');
	$dropuser="Drop table user";
	$rundropuser=mysqli_query($connection,$dropuser);
	if ($rundropuser) {
		echo "<p>User Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createuser="CREATE table user
		(
			userId int Auto_Increment not null primary key,
			userName varchar(50),
			userNrc varchar(30),
			userDob date,
			userGender varchar(7),
			userPhone varchar(22),
			userSocial text,
			userPostalcode varchar(30),
			userAddress text,
			userProfileimg varchar(50),
			userInterestcat text,
			userEmail varchar(60),
			userPassword varchar(15)
		)" ;
	$runcreateuser=mysqli_query($connection,$createuser);
	if ($runcreateuser) {
		echo "<p>User Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertuser="INSERT into user values(1,'Mg Mg','11/GaTaNa(N)111111','2002/03/23','male','09254325731','https://www.facebook.com/steven.linn.3760/','123456','No.16(A) Nawaday road, Dagon, Yangon','userprofileimg/1.jpg','History and Science Fiction','mgmg@gmail.com','mgmg123')";
	$runinsertuser=mysqli_query($connection,$insertuser);
	if ($runinsertuser) {
		echo "<p>A new user is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>