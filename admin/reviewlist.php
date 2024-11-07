<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['reviewIdtodelete'])) {
		$reviewidtodelete=$_REQUEST['reviewIdtodelete'];
		$deletereview="DELETE from bookreview where bookreviewId='$reviewidtodelete'";
		$rundeletereview=mysqli_query($connection,$deletereview);
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
                    	<h4 class="mt-4">Book Review List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage author information.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Book Name</th>
                                            <th>Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Book Name</th>
                                            <th>Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectbookreview="SELECT * from bookreview";
                                    		$runselectbookreview=mysqli_query($connection,$selectbookreview);
                                    		$countofbookreview=mysqli_num_rows($runselectbookreview);
                                    		if ($countofbookreview>0) {
                                    			for ($i=0; $i <$countofbookreview ; $i++) { 
                                    				$dataofbookreview=mysqli_fetch_array($runselectbookreview);
                                    				$no=$i+1;
                                    				$reviewId=$dataofbookreview['bookreviewId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td><img src='".$dataofbookreview['bookreviewimg']."' width='30px'></td>";
                                    				echo "<td><a href='reviewdetail.php?reviewidtodetail=$reviewId'>".$dataofbookreview['bookName']."</a></td>";
                                    				echo "<td><div style='width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>".$dataofbookreview['bookreview']."</div></td>";
                                    				echo "<td>
                                    				<a href='reviewlist.php?reviewIdtodelete=$reviewId' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
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