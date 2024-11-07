<?php 
	include('../connect.php');
	include('header.php');
	//insert book cat
	if (isset($_POST['btnadd'])) {
		$valbookcat=$_POST['tfbookcat'];
		
		$selectbookcat2="SELECT * from bookcategory where bookcategoryName='$valbookcat'";
		$runselectbookcat2=mysqli_query($connection,$selectbookcat2);
		$countofbookcat2=mysqli_num_rows($runselectbookcat2);
		if ($countofbookcat2>0) {
			echo "<script>alert('This data already exists!! You are adding same data two times')</script>";
		}else{
			$insertbookcat="INSERT into bookcategory(bookcategoryName) values('$valbookcat')";
			$runinsertbookcat=mysqli_query($connection,$insertbookcat);
		}
	}

	//delete book cat
	if (isset($_REQUEST['bookcattodelete'])) {
		$valbookcattodelete=$_REQUEST['bookcattodelete'];
		$deletebookcat="DELETE from bookcategory where bookcategoryId='$valbookcattodelete'";
		$rundeletebookcat=mysqli_query($connection,$deletebookcat);
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
                        <h4 class="mt-4">Add Book Category</h4>
                        <div class="card mb-4 col-sm-8">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can manage book categories in this page.
                                </p>
                                <form method="post" class="mt-2">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Book Category" name="tfbookcat" autocomplete="off" required />
                                                <label for="inputEmail">Book Category</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between j mt-2 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btnadd" value="ADD">
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Book Category
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectbookcat="SELECT * from bookcategory";
                                    		$runselectbookcat=mysqli_query($connection,$selectbookcat);
                                    		$countofbookcat=mysqli_num_rows($runselectbookcat);
                                    		if ($countofbookcat>0) {
                                    			for ($i=0; $i <$countofbookcat ; $i++) { $dataofbookcat=mysqli_fetch_array($runselectbookcat);
                                    				$no=$i+1;
                                    				$bookcatid=$dataofbookcat['bookcategoryId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td>".$dataofbookcat['bookcategoryName']."</td>";
                                    				echo "<td>
                                    				<a href='bookcategory.php?bookcattodelete=$bookcatid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
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