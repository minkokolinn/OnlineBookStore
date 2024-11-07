<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['authorIdtoedit'])) {
		$authorIdtoedit=$_REQUEST['authorIdtoedit'];
		$selectauthor="SELECT * from author where authorId='$authorIdtoedit'";
		$runselectauthor=mysqli_query($connection,$selectauthor);
		$dataofauthor=mysqli_fetch_array($runselectauthor);

	}else{
		echo "<script>alert('Invalid')</script>";
		echo "<script>location='authorlist.php'</script>";
	}
	if (isset($_POST['btnupdate'])) {
		$valauthorname=$_POST['tfauthorname'];
		$valauthorbiography=$_POST['tabiography'];
		      	$updateauthor="UPDATE author set authorName='$valauthorname',authorBiography='$valauthorbiography' where authorId='$authorIdtoedit'";
					$runupdateauthor=mysqli_query($connection,$updateauthor);
					if ($runupdateauthor) {
						echo "<script>alert('Updated')</script>";
						echo "<script>location='authorlist.php'</script>";
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
                        <h4 class="mt-4">Edit Author</h4>
                        <div class="card mb-4 col-sm-8">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can update author's information in this form.
                                </p>
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Author Name" name="tfauthorname" autocomplete="off" value="<?php echo $dataofauthor['authorName']; ?>" required />
                                                <label for="inputEmail">Author Name
                                            </div><br>
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 150px;" name="tabiography">
                                                	<?php echo $dataofauthor['authorBiography']; ?>
                                                </textarea>
                                                <label for="inputEmail">Biography
                                            </div> <br>
                                            <div class="d-flex align-items-center justify-content-between j mt-2 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btnupdate" value="UPDATE">
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