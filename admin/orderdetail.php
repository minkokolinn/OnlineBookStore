<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['odid'])) {
		$orderid=$_REQUEST['odid'];

		$selectbook="SELECT o.*,u.userName from ordercart o,user u where o.userId=u.userId and o.orderId='$orderid'";
		$runselectbook=mysqli_query($connection,$selectbook);
		$dataoforder=mysqli_fetch_array($runselectbook);


	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='order.php'</script>";
	}
 ?>
 <div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><a href="booklist.php">
                        	<i class="fas fa-chevron-left"></i>Back
                        </a>&nbsp;&nbsp;&nbsp;Order Detail</h4>
                        <div class="card mb-4">
                        	<div class="card-body">
                        	<?php 
                            		$countofitem=0;
                            		$groupbookids=$dataoforder['bookIds'];
                            		$groupquantities=$dataoforder['quantities'];
                            		$bookids=array();
                            		$quantities=array();

                            		$bookids=explode("|", $groupbookids);
                            		$quantities=explode("|",$groupquantities);
                            		echo "<table id='datatablesSimple'>
	                                    <thead>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Book Name</th>
	                                            <th>Unit Price</th>
	                                            <th>Quantity</th>
	                                        </tr>
	                                    </thead>
	                                    <tfoot>
	                                        <tr>
	                                            <th>Image</th>
	                                            <th>Book Name</th>
	                                            <th>Unit Price</th>
	                                            <th>Quantity</th>
	                                        </tr>
	                                    </tfoot>
	                                    <tbody>";
                            		for ($i=0; $i <2 ; $i++) { 
                            			$countofitem++;
                            			$bookid=$bookids[$i];
                            			$quantity=$quantities[$i];
                            			$selectbook="SELECT bookcoverimg,bookName,price from book where bookId='$bookid'";
                            			$runselectbook=mysqli_query($connection,$selectbook);
                            			$dataofbook=mysqli_fetch_array($runselectbook);
                            			
	                                    echo "
	                                    	<tr>
	                                    		<td><img src='".$dataofbook['bookcoverimg']."' width='30px'></td>
	                                    		<td>".$dataofbook['bookName']."</td>
	                                    		<td>".$dataofbook['price']." MMK</td>
	                                    		<td>".$quantity."</td>
	                                    	</tr>";

                            			}
                            			echo "
	                                    </tbody>
	                                    ";
                            			
                            		

                            	 ?>
                            	 </div>
                            <div class="card-body">
                            	
                            	<br><br>
                                <ul>
                                	<li>Order No - <b><?php echo $dataoforder['orderNo']; ?></b></li>
                                	<li>Order Date - <b><?php echo $dataoforder['orderDate']; ?></b></li>
                                	<li>Customer Name - <b><?php echo $dataoforder['userName']; ?></b></li>
                                	<li>Item Count - <b><?php echo $countofitem; ?></b></li>
                                	<li>Phone - <b><?php echo $dataoforder['phone']; ?></b></li>
                                	<li>Address - <b><?php echo $dataoforder['address']; ?></b></li>
                                	<li>Delivery Type - <b><?php echo $dataoforder['deliveryType']; ?> delivery</b></li>
                                	<li>Payment Type - <b><?php echo $dataoforder['paymentType']; ?> payment</b></li>
                                	<li>Total - <b><?php echo $dataoforder['total']; ?></b></li>
                                	<li>Status - <b><?php echo $dataoforder['status']; ?></b></li>
                                </ul>
                            </div>
                            
                        </div>

                    </div>
                    <hr>
                </main>
            </div>
        </div>
        
        <!-- <form method="post" class="form-control">
        	<input type="submit" name="btnprocess" value="Deliver" class="form-control" style="background-color: #339966;">
        </form> -->
        <?php 
        	echo "<a href='orderprocess.php?deliver=something&&orderid=$orderid'>Deliver</a>";
         ?>
        
        <br><br>
<?php 
	include('footer.php');
 ?>