<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['reviewidtodetail'])) {
		$reviewid=$_REQUEST['reviewidtodetail'];

		$selectbookreview="SELECT * from bookreview where bookreviewId='$reviewid'";
        $runselectbookreview=mysqli_query($connection,$selectbookreview);
        $dataofbookreview=mysqli_fetch_array($runselectbookreview);
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='reviewlist.php'</script>";
	}
 ?>
 <div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><a href="reviewlist.php">
                        	<i class="fas fa-chevron-left"></i>Back
                        </a>&nbsp;&nbsp;&nbsp;<?php echo $dataofbookreview['bookName']; ?></h4>
                        <div class="card mb-4">
                            <div class="card-body">
                            	<?php 
                            		if ($dataofbookreview['bookreviewimg']=="") {
                            			
                            		}else{
                            			echo "<img src='".$dataofbookreview['bookreviewimg']."' class='col-sm-2'>";
                            		}
                            	 ?>
                            	
                            	<br><br>
                                <p>
                                	<?php echo $dataofbookreview['bookreview']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </main>
            </div>
        </div>


<?php 
	include('footer.php');
 ?>