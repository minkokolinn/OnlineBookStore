<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_POST['btnadd'])) {
		$valbookname=$_POST['tfbookname'];
		$valbookreview=$_POST['tareview'];

				//Image Upload
		      $profileimg=$_FILES['coverimg']['name'];
		      if ($profileimg=="" || $profileimg==null) {
		      	
		      }else{
		      	$folder="bookcover/";

		      $filename=$folder.'_'.$profileimg;
		      $copied=copy($_FILES['coverimg']['tmp_name'], $filename);
		      if (!$copied) {
		        // echo "<script>window.alert('Cannot Upload Image!')</script>";
		        exit();
		      }
		      }
		      

		$insertbookreview="INSERT into bookreview(bookName,bookreview,bookreviewimg) values('$valbookname','$valbookreview','$filename')";
					$runinsertbookreview=mysqli_query($connection,$insertbookreview);
					if ($runinsertbookreview) {
						echo "<script>alert('New book review is inserted successfully..')</script>";
					}else{
						echo mysqli_error($connection);
					}
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
                        <h4 class="mt-4">Write Book Review</h4>
                        <div class="card mb-4 col-sm-10">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can insert book review in this form.
                                </p>
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Book Name" name="tfbookname" autocomplete="off" required />
                                                <label for="inputEmail">Book Name
                                            </div><br>
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 180px;" name="tareview" required>
                                                	
                                                </textarea>
                                                <label for="inputEmail">Review
                                            </div> <br>
                                    <div >
                                    			<label for="inputEmail">Cover Image or Related one
                                                <input class="form-control" id="inputEmail" type="file" placeholder="Image" name="coverimg" />
                                            </div><br>
                                            <div class="d-flex align-items-center justify-content-between j mt-2 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btnadd" value="ADD">
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
</div>
</div>
<?php 
	include('footer.php');
 ?>