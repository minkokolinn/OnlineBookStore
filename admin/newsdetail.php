<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['newsIdtodetail'])) {
		$newsid=$_REQUEST['newsIdtodetail'];

		$selectnews="SELECT * from news where newsId='$newsid'";
        $runselectnews=mysqli_query($connection,$selectnews);
        $dataofnews=mysqli_fetch_array($runselectnews);
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='newslist.php'</script>";
	}
 ?>
 <div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><a href="newslist.php">
                        	<i class="fas fa-chevron-left"></i>Back
                        </a>&nbsp;&nbsp;&nbsp;<?php echo $dataofnews['newsTitle']; ?></h4>
                        <div class="card mb-4">
                            <div class="card-body">

                            	<img src="<?php echo $dataofnews['newsimg'] ?>" class='col-sm-5'>

                            	
                            	<br><br>
                                <ul><li>Date : <u><?php echo $dataofnews['uploadedDate'] ?></u></li></ul>
                                <p>
                                	<?php echo $dataofnews['news']; ?>
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