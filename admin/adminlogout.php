<?php 
	session_start();
	unset($_SESSION['aid']);
	echo "<script>location='index.php'</script>";
 ?>