<?php 
    include('../connect.php');
	include('header.php');
	include('generate_random.php');

    if (isset($_POST['btncreate'])) {
        $valemail=$_POST['tfemail'];
        $valpass=$_POST['tfpass'];
        $valtype=$_POST['rdotype'];

        $insertadmin="INSERT into admin(adminEmail,adminPassword,adminType) values('$valemail','$valpass','$valtype')";
        $runinsertadmin=mysqli_query($connection,$insertadmin);
        if ($runinsertadmin) {
            echo "<script>alert('A new admin account is created successfully..');</script>";
        }else{
            echo mysqli_error($connection);
        }
    }

 ?>

        <div id="layoutAuthentication" class="mt-5">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Admin Account</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="tfemail" required autocomplete="off" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" value="<?php echo password_generate(10); ?>" name="tfpass" required autocomplete="off"/>
                                                <label for="inputEmail">Password</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <h6><input type="radio" width="10px" name="rdotype" value="master">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Master Admin</h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <h6><input type="radio" width="10px" name="rdotype" value="normal" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal Admin</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <h6>
                                                        	General Admin Task <i class="fas fa-check fa-fw"></i>
                                                        </h6>
                                                        <h6>
                                                        	Create admin account <i class="fas fa-check fa-fw"></i>
                                                        </h6>
                                                        <h6>
                                                        	Manage access code <i class="fas fa-check fa-fw"></i>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <h6>
                                                        	General Admin Task <i class="fas fa-check fa-fw"></i>
                                                        </h6>
                                                        <h6>
                                                        	Create admin account <i class="fas fa-times fa-fw"></i>
                                                        </h6>
                                                        <h6>
                                                        	Manage access code <i class="fas fa-times fa-fw"></i>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" name="btncreate" value="Create Account"></div>
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

<?php 

	include('footer.php');
 ?>