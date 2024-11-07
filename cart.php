<?php 
	include('connect.php');
	include('header.php');
	if (isset($_REQUEST['cancel'])) {
		for ($j=1; $j <=$_SESSION['cartcount'] ; $j++) {
		  		unset($_SESSION['bookid'][$j]);
		  		unset($_SESSION['bookquantity'][$j]);
		  		
		  	}
		  	unset($_SESSION['cartcount']);
		  	echo "<script>location='cart.php'</script>";
	}
 ?>

<section id="center" class="clearfix center_shop"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12">
	 <h2 class="mgt col_1">Shopping Cart</h2>
	</div>
   </div>
  </div>
 </div>	  
</section>

<section id="cart">
 <div class="container">
  <div class="row">
   <div class="cart_1 clearfix">
    <div class="col-sm-3">
	 <div class="cart_1i clearfix">
	  <h4>Shopping cart</h4>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i1 clearfix">
	  <h5 class="mgt transform"><span class="span_1 col">1</span> <span class="span_2 col_1">Shopping Cart</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i2 clearfix">
	  <h5 class="mgt transform"><span class="span_1">2</span> <span class="span_2 col_3">Checkout</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i2 clearfix">
	  <h5 class="mgt transform"><span class="span_1">3</span> <span class="span_2 col_3">Completed</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
   </div>

   <div class="cart_2 clearfix">
    <div class="col-sm-12">
	 <table>
		  <tbody><tr>
		  	
			<th class="big_p"><h4 class="mgt">Products</h4></th>
			<th class="big_p"><h4 class="mgt">Quantity</h4></th>
			<th class="big_p"><h4 class="mgt">Price</h4></th>
			<th class="big_p"><h4 class="mgt">Total</h4></th>
		  </tr>
		  <?php 
		  $total=0;
		  if (isset($_SESSION['cartcount'])) {
		  	
		  	for ($i=1; $i <=$_SESSION['cartcount'] ; $i++) {
		  		$bookid=$_SESSION['bookid'][$i];
		  		$bookquantity=$_SESSION['bookquantity'][$i];

		  		$selectbook="SELECT * from book where bookId='$bookid'";
		  		$runselectbook=mysqli_query($connection,$selectbook);
		  		$dataofbook=mysqli_fetch_array($runselectbook);

				echo "
					<tr>
					
						<td class='text-left'><img class='mgt' src='admin/".$dataofbook['bookcoverimg']."' style='width:60px; height:80px; float:left; margin-right:10px;'>
						<h5 class='mgt bold' style='width:120px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>".$dataofbook['bookName']."</h5>
						<h6 class='normal transform'>aptent taciti </h6>
						</td>
						<td>
						 <div class='input-group number-spinner'>
							<input type='number' class='form-control text-center' value='".$bookquantity."' min='1' id='text' readonly>	
						 </div>
						</td>
						<td> ".$dataofbook['price']." MMK</td>
						<td>".$dataofbook['price']*$bookquantity." MMK</td>
					  </tr>
				";
				$total=$total+($dataofbook['price']*$bookquantity);
			}
		  }
		  
		   ?>
		  
       </tbody></table>
       <p id='showtotal'></p>
	</div>
   </div>
  
    <div class="cart_3 join_1  clearfix">
	 <div class="col-sm-6">
	 </div>
	 <div class="col-sm-6">
	  <h4 class="text-right">Total - <span class="col_1"><?php echo $total; ?> MMK</span></h4>
	 </div>
	 </div>
	</div>
	<div class="cart_4 text-right   clearfix">
		<h5><a class="button_1" href="cart.php?cancel=on">Cancel this cart</a></h5>
	 <h5><a class="button_1" href="checkout.php">Process Checkout</a></h5>
	</div>
  </div>
 </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <?php 
 	include('footer.php');

  ?>