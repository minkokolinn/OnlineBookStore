<?php 
	include('../connect.php');
	include('header.php');
	$selectaccesscode="SELECT * from accesscode";
            $runselectaccesscode=mysqli_query($connection,$selectaccesscode);
            $dataofaccesscode=mysqli_fetch_array($runselectaccesscode);
            $accesscode=$dataofaccesscode['access_code'];

     if (isset($_POST['btnchange'])) {
     	$valaccesscode=$_POST['tfnewaccesscode'];
     	$updatecode="UPDATE accesscode set access_code='$valaccesscode' where access_code='$accesscode'";
     	$runupdatecode=mysqli_query($connection,$updatecode);
     	if ($runupdatecode) {
     		echo "<script>alert('Access code has been changed successfully..')</script>";
     		echo "<script>location='manageaccesscode.php'</script>";
     	}else{
     		echo "<script>alert('Action failed!')</script>";
     	}
     }
            
 ?>
<div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Current Access Code :  <?php echo "$accesscode"; ?></h4>
                    </div>
                    <hr>
                </main>
                        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change access code</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Enter new access code" name="tfnewaccesscode" autocomplete="off" required minlength="5" />
                                                <label for="inputEmail">Enter new access code</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btnchange" value="Change">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
            </div>
        </div>
<?php 
	include('footer.php');
 ?>