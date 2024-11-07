<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['usertodelete'])) {
		$valbooktodelete=$_REQUEST['usertodelete'];
		$deleteuser="DELETE from user where userId='$valbooktodelete'";
        $rundeleteuser=mysqli_query($connection,$deleteuser);
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
                    	<h4 class="mt-4">Customer List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view customer list
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectbook="SELECT * from user";
                                    		$runselectbook=mysqli_query($connection,$selectbook);
                                    		$countofbook=mysqli_num_rows($runselectbook);
                                    		if ($countofbook>0) {
                                    			for ($i=0; $i <$countofbook ; $i++) { $dataofbook=mysqli_fetch_array($runselectbook);
                                    				$no=$i+1;
                                    				$userid=$dataofbook['userId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td><img src='../".$dataofbook['userProfileimg']."' width='30px'></td>";
                                    				echo "<td>".$dataofbook['userName']."</td>";
                                    				echo "<td>".$dataofbook['userPhone']."</td>";
                                                    echo "<td>".$dataofbook['userAddress']."</td>";
                                                     echo "<td>".$dataofbook['userEmail']."</td>";
                                                     echo "<td>".$dataofbook['userPassword']."</td>";

                                    				echo "<td>
                                    				<a href='stakeholder.php?usertodelete=$userid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
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