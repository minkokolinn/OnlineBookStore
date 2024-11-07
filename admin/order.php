<?php 
	include('../connect.php');
	include('header.php');
    if (isset($_REQUEST['orderidtodelete'])) {
        $orderidtodelete=$_REQUEST['orderidtodelete'];
        $deleteorder="DELETE from ordercart where orderId='$orderidtodelete'";
        $rundeleteorder=mysqli_query($connection,$deleteorder);
    }
 ?>
<style type="text/css">
	.actionlink{
		text-decoration: none;
	}
	.actionlink:hover{
		color: darkred;
	}
</style>
<div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    	<h4 class="mt-4">Order List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage book information.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            <th>Name</th>
                                            <th>Delivery Type</th>
                                            <th>Payment Type</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            <th>Name</th>
                                            <th>Delivery Type</th>
                                            <th>Payment Type</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectorder="SELECT o.*,u.userName from ordercart o,user u where o.userId=u.userId";
                                    		$runselectorder=mysqli_query($connection,$selectorder);
                                    		$countoforder=mysqli_num_rows($runselectorder);
                                    		if ($countoforder>0) {
                                    			for ($i=0; $i <$countoforder ; $i++) { $dataoforder=mysqli_fetch_array($runselectorder);
                                    				$orderid=$dataoforder['orderId'];
                                    				echo "<tr>";
                                    				echo "<td><a href='orderdetail.php?odid=$orderid'>".$dataoforder['orderNo']."</a></td>";
                                                    echo "<td>".$dataoforder['orderDate']."</td>";
                                                    echo "<td>".$dataoforder['userName']."</td>";
                                                    echo "<td>".$dataoforder['deliveryType']." delivery</td>";
                                                    echo "<td>".$dataoforder['paymentType']." payment</td>";
                                                    echo "<td>".$dataoforder['total']."</td>";
                                                    echo "<td>".$dataoforder['status']."</td>";
                                                    echo "<td>
                                                    <a href='order.php?orderidtodelete=$orderid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
                                                    </td>
                                                    ";
                                    				echo "</tr>";
                                    			}
                                    		}
                                    	 ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
</div>
</div>
<?php 
	include('footer.php');
 ?>