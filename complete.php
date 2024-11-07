<?php 
	include('connect.php');
	include('header.php');
	if (isset($_REQUEST['orderno']) && isset($_REQUEST['total'])) {
		$orderno=$_REQUEST['orderno'];
		$total=$_REQUEST['total'];
	}


	for ($j=1; $j <=$_SESSION['cartcount'] ; $j++) {
		  		unset($_SESSION['bookid'][$j]);
		  		unset($_SESSION['bookquantity'][$j]);
	}
		  	unset($_SESSION['cartcount']);

	// echo "<script>location='index.php'</script>";
 ?>

<section id="center" class="clearfix center_shop"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12">
	 <h2 class="mgt col_1">Order Complete</h2>
	 <h3>Order No : <u><?php echo $orderno ?></u></h3>
	 <h3>Total : <u><?php echo $total ?> MMK </u></h3>
	 <p>For online payment, the organisation will announce bank accounts and e-money accounts via email.</p>
	</div>
   </div>
  </div>
 </div>	  
</section>



<?php 
	include('footer.php');
 ?>