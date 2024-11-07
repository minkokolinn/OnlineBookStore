<?php  
    include('../connect.php');
    session_start();
    if (isset($_SESSION['aid'])) {
        $adminid=$_SESSION['aid'];
        $selectadmin="SELECT * from admin where adminId='$adminid'";
        $runselectadmin=mysqli_query($connection,$selectadmin);
        $dataofadmin=mysqli_fetch_array($runselectadmin);
        $adminemail=$dataofadmin['adminEmail'];
        $admintype=$dataofadmin['adminType'];
    }else{
        echo "<script>alert('Access denied')</script>";
        echo "<script>location='index.php'</script>";
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
        <title>Reader's paradise Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Admin Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <h5 style="color:white;"><?php echo "$adminemail($admintype)"; ?></h5>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="adminlogout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Order
                            </a>
                            <a class="nav-link" href="stakeholder.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-user"></i></div>
                                Stakeholder
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <?php 
                                if ($admintype=="master") {
                                    echo "
                                    <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseLayouts' aria-expanded='false' aria-controls='collapseLayouts'>
                                        <div class='sb-nav-link-icon'><i class='fas fa-cog'></i></div>
                                        Setting
                                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                                    </a>
                                    <div class='collapse' id='collapseLayouts' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                                        <nav class='sb-sidenav-menu-nested nav'>
                                            <a class='nav-link' href='createadminaccount.php'>Create admin account</a>
                                            <a class='nav-link' href='manageaccesscode.php'>Manage Access code</a>
                                        </nav>
                                    </div>

                                    ";
                                }
                             ?>

                            <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseBook' aria-expanded='false' aria-controls='collapseBook'>
                                        <div class='sb-nav-link-icon'><i class='fas fa-book'></i></div>
                                        Book
                                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                                    </a>
                                    <div class='collapse' id='collapseBook' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                                        <nav class='sb-sidenav-menu-nested nav'>
                                            <a class='nav-link' href='addbook.php'>Add Book</a>
                                            <a class='nav-link' href='booklist.php'>Book List</a>
                                            <a class='nav-link' href='bookcategory.php'>Book Category</a>
                                        </nav>
                                    </div>

                            <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseAuthor' aria-expanded='false' aria-controls='collapseAuthor'>
                                        <div class='sb-nav-link-icon'><i class='fas fa-user'></i></div>
                                        Author
                                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                                    </a>
                                    <div class='collapse' id='collapseAuthor' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                                        <nav class='sb-sidenav-menu-nested nav'>
                                            <a class='nav-link' href='addauthor.php'>Add Author</a>
                                            <a class='nav-link' href='authorlist.php'>Author List</a>
                                        </nav>
                                    </div>
                             <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseReview' aria-expanded='false' aria-controls='collapseReview'>
                                        <div class='sb-nav-link-icon'><i class='fas fa-edit'></i></div>
                                        Book Review
                                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                                    </a>
                                    <div class='collapse' id='collapseReview' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                                        <nav class='sb-sidenav-menu-nested nav'>
                                            <a class='nav-link' href='addreview.php'>Add Book Review</a>
                                            <a class='nav-link' href='reviewlist.php'>Book Review List</a>
                                        </nav>
                                    </div>

                            <a class='nav-link collapsed' href='#' data-bs-toggle='collapse' data-bs-target='#collapseNews' aria-expanded='false' aria-controls='collapseNews'>
                                        <div class='sb-nav-link-icon'><i class='fas fa-newspaper'></i></div>
                                        News
                                        <div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>
                                    </a>
                                    <div class='collapse' id='collapseNews' aria-labelledby='headingOne' data-bs-parent='#sidenavAccordion'>
                                        <nav class='sb-sidenav-menu-nested nav'>
                                            <a class='nav-link' href='addnews.php'>Add News</a>
                                            <a class='nav-link' href='newslist.php'>News List</a>
                                        </nav>
                                    </div>

                            <a class="nav-link" href="faqlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-question"></i></div>
                                FAQ answer back
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo "$adminemail"; ?>
                    </div>
                </nav>
            </div>
        </div>