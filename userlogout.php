<?php 
	session_start();
	unset($_SESSION['uid']);
	echo "<script>location='index.php'</script>";
	session_destroy();
 ?>