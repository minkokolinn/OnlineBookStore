<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_POST['btnadd'])) {
		$valnewstitle=$_POST['tfnewstitle'];
		$valnews=$_POST['tanews'];
		$valuploaddate=$_POST['tfuploaddate'];



				//Image Upload
		      $profileimg=$_FILES['newsimg']['name'];
		      	$folder="newsimage/";

		      $filename=$folder.'_'.$profileimg;
		      $copied=copy($_FILES['newsimg']['tmp_name'], $filename);
		      if (!$copied) {
		        echo "<script>window.alert('Cannot Upload Image!')</script>";
		        exit();
		      }else{

		      }
		      
		      

		$insertnews="INSERT into news(newsTitle,news,uploadedDate,newsimg) values('$valnewstitle','$valnews','$valuploaddate','$filename')";
					$runinsertnews=mysqli_query($connection,$insertnews);
					if ($runinsertnews) {
						echo "<script>alert('New Blog is inserted successfully..')</script>";
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
                        <h4 class="mt-4">Write News/Blogs</h4>
                        <div class="card mb-4 col-sm-10">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can insert new blog in this form.
                                </p>
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Book Name" name="tfnewstitle" autocomplete="off" required />
                                                <label for="inputEmail">Title
                                            </div><br>
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 180px;" name="tanews" required>
                                                	
                                                </textarea>
                                                <label for="inputEmail">News/Blog
                                            </div> <br>
                                    <div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Upload Date" name="tfuploaddate" value="<?php echo date("Y/m/d"); ?>" autocomplete="off" required readonly/>
                                                <label for="inputEmail">Upload Date
                                            </div><br>
                                    <div >
                                    			<label for="inputEmail">Cover Image or Related one
                                                <input class="form-control" id="inputEmail" type="file" placeholder="Image" name="newsimg" />
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