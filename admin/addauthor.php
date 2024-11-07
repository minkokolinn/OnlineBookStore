<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_POST['btnadd'])) {
		$valauthorname=$_POST['tfauthorname'];
		$valauthorbiography=$_POST['tabiography'];
		//Image Upload
		      $profileimg=$_FILES['authorimg']['name'];
		      $folder="authorimg/";

		      $filename=$folder.'_'.$profileimg;
		      $copied=copy($_FILES['authorimg']['tmp_name'], $filename);
		      if (!$copied) {
		        echo "<script>window.alert('Cannot Upload Image!')</script>";
		        exit();
		      }{
		      	$insertauthor="INSERT into author(authorName,authorBiography,authorimg) values('$valauthorname','$valauthorbiography','$filename')";
					$runinsertauthor=mysqli_query($connection,$insertauthor);
					if ($runinsertauthor) {
						echo "<script>alert('New author is inserted successfully..')</script>";
					}else{
						echo mysqli_error($connection);
					}
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
                        <h4 class="mt-4">Add Author</h4>
                        <div class="card mb-4 col-sm-8">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can insert new author's information in this form.
                                </p>
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Author Name" name="tfauthorname" autocomplete="off" required />
                                                <label for="inputEmail">Author Name
                                            </div><br>
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 150px;" name="tabiography">
                                                	
                                                </textarea>
                                                <label for="inputEmail">Biography
                                            </div> <br>
                                    <div >
                                    			<label for="inputEmail">Image
                                                <input class="form-control" id="inputEmail" type="file" required placeholder="Image" name="authorimg" />
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