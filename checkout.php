<?php 
	include('connect.php');
	include('header.php');
	if (isset($_SESSION['uid'])) {
		$userid=$_SESSION['uid'];

		$selectuser="SELECT * from user where userId='$userid'";
		$runselectuser=mysqli_query($connection,$selectuser);
		$dataofuser=mysqli_fetch_array($runselectuser);
		$userName=$dataofuser['userName'];
		$userAddress=$dataofuser['userAddress'];
		$userPhone=$dataofuser['userPhone'];
		
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='index.php'</script>";
	}

	$total=0;
		  	for ($i=1; $i <=$_SESSION['cartcount'] ; $i++) {
		  		$bookid=$_SESSION['bookid'][$i];
		  		$bookquantity=$_SESSION['bookquantity'][$i];

		  		$selectbook="SELECT * from book where bookId='$bookid'";
		  		$runselectbook=mysqli_query($connection,$selectbook);
		  		$dataofbook=mysqli_fetch_array($runselectbook);

				
				$total=$total+($dataofbook['price']*$bookquantity);
			}

	if (isset($_POST['btncomplete'])) {
		$today=date('Ymd');

		$valorderno=$today."-O-".password_generate(5);
		$valaddress=$_POST['tfaddress'];
		$valphone=$_POST['tfphone'];
		$today2=date('Y/m/d');
		$valdelitype=$_POST['deliverytype'];
		$valpaymenttype=$_POST['paymenttype'];
		if ($valdelitype=="normal") {
			$valtotal=$total+1000;
		}else{
			$valtotal=$total+4000;
		}

		$valbookids="";
		$valquantities="";
		for ($j=1; $j <=$_SESSION['cartcount'] ; $j++) {
		  		$bookid1=$_SESSION['bookid'][$j];
		  		$bookquantity1=$_SESSION['bookquantity'][$j];

		  		

				if ($valbookids=="") {
					$valbookids=$bookid1;
				}else{
					$valbookids=$valbookids."|".$bookid1;
				}

				if ($valquantities=="") {
					$valquantities=$bookquantity1;
				}else{
					$valquantities=$valquantities."|".$bookquantity1;
				}
			}
		
		
		$insertordercart="INSERT into ordercart(orderNo,userId,address,phone,orderDate,deliveryType,paymentType,bookIds,quantities,total,status) values('$valorderno','$userid','$valaddress','$valphone','$today2','$valdelitype','$valpaymenttype','$valbookids','$valquantities','$valtotal','ready for processing')";
		$runinsertordercart=mysqli_query($connection,$insertordercart);
		if ($runinsertordercart) {
			echo "<script>location='complete.php?orderno=$valorderno&&total=$valtotal'</script>";
			
		}else{
			echo mysqli_error();
		}
	}

	//generate random
	function password_generate($chars) 
		{
		  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		  return substr(str_shuffle($data), 0, $chars);
		}
 ?>
	
<section id="center" class="clearfix center_shop"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12">
	 <h2 class="mgt col_1">Checkout</h2>
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
	  <h4>Checkout</h4>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i2 clearfix">
	  <h5 class="mgt transform"><span class="span_1">1</span> <span class="span_2 col_3">Shopping Cart</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i1 clearfix">
	  <h5 class="mgt transform"><span class="span_1 col">2</span> <span class="span_2 col_1">Checkout</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
	<div class="col-sm-3">
	 <div class="cart_1i2 clearfix">
	  <h5 class="mgt transform"><span class="span_1">3</span> <span class="span_2 col_3">Completed</span> <span class="span_3"><i class="fa fa-long-arrow-right"></i></span></h5>
	 </div> 
	</div>
   </div>
   
   <div class="checkout clearfix">
   	<form method="post">
    <div class="col-sm-6">
	 <div class="bg_1">
	   <div class="checkout_l clearfix">
	  <h4>Buyer Info <br><span>Check again, change when something is wrong</span></h4>
	 </div><br>
	 <div class="checkout_l1 clearfix">
	  <h6>Name</h6>
	  <input class="form-control" type="text" value="<?php echo $userName; ?>" readonl>
	  <h6>Address</h6>
	  <input class="form-control" type="text" name="tfaddress" value="<?php echo $userAddress; ?>">
	  <h6>Phone</h6>
	  <input class="form-control" type="text" name="tfphone" value="<?php echo $userPhone; ?>">
	 </div>
	 </div>
	</div>
	<div class="col-sm-6">
	 <div class="bg_1">
	   <div class="checkout_l clearfix">
	  <h4>Payment Method and Delivery</h4>
	 </div><br>
	 <div class="checkout_l1 clearfix">
	  <div class="col-sm-12 space_left">
	   <h6>Delivery</h6>
	    <select class="form-control" name="deliverytype" id="mySelect" onchange="myFunction()">
	    	<option value="normal">Normal Delivery (3 days or more) (Cost : +1000 MMK)</option>
			 <option value="fast">Fast Delivery (within 1 or 2 day) (Cost : +4000 MMK)</option>
			 
		 </select>
	  </div>
	  <div class="col-sm-12 space_left">
	   <h6>Payment Method</h6>
	    <select class="form-control" name="paymenttype">
	    	<option value="online">Online Payment</option>
			 <option value="cash">Cash on delivery</option>
			 
		 </select>
	  </div>
	  <div class="col-sm-12 space_left">
	  	<h6>Order Date - <?php echo date('d M,Y'); ?></h6>
	   <h6>Item Count -  <?php echo $_SESSION['cartcount']; ?></h6>
	   <h3>Total : <?php echo $total; ?> MMK</h3><h3 id="demo">+1000 MMK (delivery fees)</h3>
	  </div>
	 </div>
	 <div class="checkout_l1 clearfix">

	 </div>
	 <div class="checkout_l1 clearfix">
	 	<div class="col-sm-6"><h5><a class="button" href="cart.php">Back to cart</a></h5></div>
	 	<div class="col-sm-6"><h5><input type="submit" value="Complete Order" class="button_1" name="btncomplete"></h5></div>
	 	
	 </div>
	 </div>
	</div>
	</form>
   </div>
   
  </div>

 </div>
</section>

<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  if (x=='normal') {
  	document.getElementById("demo").innerHTML = '+1000 MMK (delivery fees)';
  }else{
  	document.getElementById("demo").innerHTML = '+4000 MMk (delivery fees)';
  }
  
}
</script>

<?php 
	include('footer.php');
 ?>