<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['booktodelete'])) {
		$valbooktodelete=$_REQUEST['booktodelete'];
		echo "<script>
			var x=confirm('Are you sure to delete this book?');
			if(x==true){
				location='deletebook.php?valbooktodelete=$valbooktodelete';
			}else{
				location='booklist.php';
			}
		</script>";
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
                    	<h4 class="mt-4">Book List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage book information.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectbook="SELECT * from book";
                                    		$runselectbook=mysqli_query($connection,$selectbook);
                                    		$countofbook=mysqli_num_rows($runselectbook);
                                    		if ($countofbook>0) {
                                    			for ($i=0; $i <$countofbook ; $i++) { $dataofbook=mysqli_fetch_array($runselectbook);
                                    				$no=$i+1;
                                    				$bookid=$dataofbook['bookId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td><img src='".$dataofbook['bookcoverimg']."' width='30px'></td>";
                                    				echo "<td><a href='bookdetail.php?bookidtodetail=$bookid'>".$dataofbook['bookName']."</a></td>";
                                    				echo "<td>".$dataofbook['bookType']."</td>";
                                    				$catid=$dataofbook['bookcategoryId'];
                                    				$selectcat="SELECT bookcategoryName from bookcategory where bookcategoryId='$catid'";
                                    				$runselectcat=mysqli_query($connection,$selectcat);
                                    				$dataofcat=mysqli_fetch_array($runselectcat);
                                    				echo "<td>".$dataofcat['bookcategoryName']."</td>";
                                    				echo "<td>".$dataofbook['author']."</td>";
                                    				echo "<td>".$dataofbook['price']." MMK</td>";
                                    				echo "<td>".$dataofbook['quantity']."</td>";
                                    				echo "<td>
                                    				<a href='booklist.php?booktodelete=$bookid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
                                                    <br>
                                                    <a href='viewcomment.php?bookid=$bookid' class='actionlink'><i class='fas fa-edit'></i>&nbsp;&nbspView Comment</a>
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