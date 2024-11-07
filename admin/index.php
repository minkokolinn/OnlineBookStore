<?php
    session_start();
    include('../connect.php');
    if (isset($_SESSION['aid'])) {
        echo "<script>location='order.php'</script>";
    }else{
        if (isset($_POST['btnlogin'])) {
        $valemail=$_POST['tfemail'];
        $valpass=$_POST['tfpass'];
        $valaccesscode=$_POST['tfaccesscode'];

        $selectadmin="SELECT * from admin where adminEmail='$valemail' && adminPassword='$valpass'";
        $runselectadmin=mysqli_query($connection,$selectadmin);
        $countofadmin=mysqli_num_rows($runselectadmin);
        if ($countofadmin==1) {
            $dataofadmin=mysqli_fetch_array($runselectadmin);
            $admintype=$dataofadmin['adminType'];
            
            $selectaccesscode="SELECT * from accesscode";
            $runselectaccesscode=mysqli_query($connection,$selectaccesscode);
            $dataofaccesscode=mysqli_fetch_array($runselectaccesscode);
            $accesscode=$dataofaccesscode['access_code'];
            if ($valaccesscode==$accesscode) {
                echo "<script>alert('Logined as ".$admintype." admin')</script>";
                $_SESSION['aid']=$dataofadmin['adminId'];
            echo "<script>location='order.php'</script>";
            }else{
                echo "<script>alert('Wrong access code!Contact to master admin')</script>";
            }
        }else{
             echo "<script>alert('Login failed! You are not permitted to access admin panel')</script>";
            
        }
    }
    }

    
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Login (Reader's Paradise)</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="tfemail" autocomplete="off" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="tfpass" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <p>If you don't know access code, contact master admin.</p>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAccesscode" type="number" placeholder="Accesscode" name="tfaccesscode" autocomplete="off" />
                                                <label for="inputAccesscode">Access Code</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btnlogin" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
