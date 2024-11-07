<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['bookidtodetail'])) {
		$bookid=$_REQUEST['bookidtodetail'];

		$selectbook="SELECT * from book where bookId='$bookid'";
		$runselectbook=mysqli_query($connection,$selectbook);
		$dataofbook=mysqli_fetch_array($runselectbook);

		$catid=$dataofbook['bookcategoryId'];
		$selectcatgory="SELECT bookcategoryName from bookcategory where bookcategoryId='$catid'";
		$runselectcategory=mysqli_query($connection,$selectcatgory);
		$dataofcategory=mysqli_fetch_array($runselectcategory);


	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='booklist.php'</script>";
	}
 ?>
 <div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><a href="booklist.php">
                        	<i class="fas fa-chevron-left"></i>Back
                        </a>&nbsp;&nbsp;&nbsp;<?php echo $dataofbook['bookName']; ?></h4>
                        <div class="card mb-4">
                            <div class="card-body">
                            	<img src="<?php echo $dataofbook['bookcoverimg']; ?>" class="col-sm-2">
                            	<br><br>
                                <ul>
                                	<li>Book Name - <b><?php echo $dataofbook['bookName']; ?></b></li>
                                	<li>Type - <b><?php echo $dataofbook['bookType']; ?></b></li>
                                	<li>Category - <b><?php echo $dataofcategory['bookcategoryName']; ?></b></li>
                                	<li>Author - <b><?php echo $dataofbook['author']; ?></b></li>
                                	<li>Price - <b><?php echo $dataofbook['price']; ?></b></li>
                                	<li>Quantity - <b><?php echo $dataofbook['quantity']; ?></b></li>
                                	<li>Rating Star - <b><?php echo $dataofbook['ratingstar']; ?></b></li>
                                	<li>Description - </li>
                                </ul>
                                <p>
                                	<?php echo $dataofbook['description']; ?>
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