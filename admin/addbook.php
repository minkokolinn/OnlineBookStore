<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_POST['btnadd'])) {
		$valbookname=$_POST['tfbookname'];
		$valbooktype=$_POST['tfbooktype'];
		$valbookcat=$_POST['tfcatname'];
		$valauthor=$_POST['tfauthor'];
		$valprice=$_POST['tfprice'];
		$valquantity=$_POST['tfquantity'];
		$valratingstar=$_POST['tfratingstar'];
		$valdescription=$_POST['tadescription'];

				//Image Upload
		      $profileimg=$_FILES['coverimg']['name'];
		      $folder="bookcover/";

		      $filename=$folder.'_'.$profileimg;
		      $copied=copy($_FILES['coverimg']['tmp_name'], $filename);
		      if (!$copied) {
		        echo "<script>window.alert('Cannot Upload Image!')</script>";
		        exit();
		      }{
		      	$insertbook="INSERT into book(bookName,bookType,bookcategoryId,author,price,quantity,ratingstar,description,bookcoverimg) values('$valbookname','$valbooktype','$valbookcat','$valauthor','$valprice','$valquantity','$valratingstar','$valdescription','$filename')";
					$runinsertbook=mysqli_query($connection,$insertbook);
					if ($runinsertbook) {
						echo "<script>alert('New book is inserted successfully..')</script>";
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
                        <h4 class="mt-4">Add Book</h4>
                        <div class="card mb-4 col-sm-10">
                            <div class="card-body">
                                <p class="mb-0">
                                    You can insert new book in this form.
                                </p>
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                	<div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Book Name" name="tfbookname" autocomplete="off" required />
                                                <label for="inputEmail">Book Name
                                            </div><br>
                                      <div>
                                                <input type="radio" name="tfbooktype" value="Myanmar" required />&nbsp;&nbsp;Myanmar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               <input type="radio" name="tfbooktype" value="International" required />&nbsp;&nbsp;International
                                            </div><br>
                                      <div class="form-floating">
                                                <select class="form-control" id="inputEmail" name="tfcatname" required>
                                                	<?php 
                                                		$selectbookcat="SELECT * from bookcategory";
                                                		$runselectbookcat=mysqli_query($connection,$selectbookcat);
                                                		$countofbookcat=mysqli_num_rows($runselectbookcat);
                                                		if ($countofbookcat>0) {
                                                			for ($i=0; $i <$countofbookcat ; $i++) { $dataofbookcat=mysqli_fetch_array($runselectbookcat);
                                                			echo "<option value='".$dataofbookcat['bookcategoryId']."'>".$dataofbookcat['bookcategoryName']."</option>";
                                                			}
                                                		}
                                                	 ?>
                                                </select>
                                                <label for="inputEmail">Book Category
                                            </div><br>
                                     <div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Author" name="tfauthor" autocomplete="off" required />
                                                <label for="inputEmail">Author
                                            </div><br>
                                    <div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="number" placeholder="Price" name="tfprice" autocomplete="off" required />
                                                <label for="inputEmail">Price
                                            </div><br>
                                    <div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="number" placeholder="Quantity" name="tfquantity" autocomplete="off" required />
                                                <label for="inputEmail">Quantity
                                            </div><br>
                                    <div class="form-floating">
                                                <input class="form-control" id="inputEmail" type="number" placeholder="Amount of Rating Star" name="tfratingstar" autocomplete="off" required min="1" max="5" />
                                                <label for="inputEmail">Amount of Rating Star
                                            </div><br>
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 180px;" name="tadescription">
                                                	
                                                </textarea>
                                                <label for="inputEmail">Description
                                            </div> <br>
                                    <div >
                                    			<label for="inputEmail">Cover Image or Related one
                                                <input class="form-control" id="inputEmail" type="file" required placeholder="Image" name="coverimg" />
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