<?php 
	session_start();
	include('connect.php');
	$userid="";
	if (isset($_SESSION['uid'])) {
		$userid=$_SESSION['uid'];

		$selectprofileimg="SELECT userProfileimg from user where userId='$userid'";
		$runselectprofileimg=mysqli_query($connection,$selectprofileimg);
		$dataofprofileimg=mysqli_fetch_array($runselectprofileimg);
		$profileimgdir=$dataofprofileimg['userProfileimg'];
	}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reader's Paradise Book Store</title>
    <link rel="icon" href="image/tabicon.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link href="css/product.css" rel="stylesheet">
	<link href="css/detail.css" rel="stylesheet">
	<link href="css/blog.css" rel="stylesheet">
	<link href="css/blog_detail.css" rel="stylesheet">
	<link href="css/checkout.css" rel="stylesheet">
	<link href="css/cart.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
	<script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  	<style type="text/css">
  	html{
  		scroll-behavior: smooth;
  	}
		#myBtn {
		  display: none; /* Hidden by default */
		  position: fixed; /* Fixed/sticky position */
		  bottom: 20px; /* Place the button at the bottom of the page */
		  right: 30px; /* Place the button 30px from the right */
		  z-index: 99; /* Make sure it does not overlap */
		  border: none; /* Remove borders */
		  outline: none; /* Remove outline */
		  background-color: #339966; /* Set a background color */
		  color: white; /* Text color */
		  cursor: pointer; /* Add a mouse pointer on hover */
		  padding: 15px; /* Some padding */
		  border-radius: 50%; /* Rounded corners */
		  font-size: 18px; /* Increase font size */
		  box-shadow: 2px 2px 4px 2px grey;
		}

		#myBtn:hover {
		  background-color: #555; /* Add a dark-grey background on hover */
		}
		.headerprofileimg{
			margin-top: -8px;
			width: auto;
			height: 25px;
			border-radius: 50%;
		}
</style>
<body>

<section id="header" class="clearfix">
	<nav class="navbar nav_t navbar-fixed-top">
		<div class="container">
		    <div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php" style="font-size: 24px;"><i class="fa fa-book"></i> Reader's <span>Paradise</span> </a>
			</div>
			<!-- Brand and toggle get grouped for better mobile display -->
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<li><a class="tag_m active_tab" href="index.php">Home</a></li>
				<li><a class="tag_m" href="about.php">About</a></li>
				<li class="dropdown">
                     <a href="#" class="dropdown-toggle tag_m" data-toggle="dropdown">Book <b class="caret"></b></a>
                     <ul class="dropdown-menu drop_1">
                        <li><a href="myanmarbook.php">Myanmar Books</a></li>
                        <li><a href="internationalbook.php">International Books</a></li>
                       </ul>
                  </li>
				<li class="dropdown">
                     <a href="#" class="dropdown-toggle tag_m" data-toggle="dropdown">Blog <b class="caret"></b></a>
                     <ul class="dropdown-menu drop_1">
                        <li><a href="news.php">News</a></li>
                        <li><a href="author.php">Authors</a></li>
                        <li><a href="bookreview.php">Book Reviews</a></li>
                       </ul>
                  </li>
				<li><a class="tag_m" href="contact.php">Contact</a></li>
			    <li class="dropdown">
                     <a href="#" class="dropdown-toggle tag_m" data-toggle="dropdown">Other <b class="caret"></b></a>
                     <ul class="dropdown-menu drop_1">
                        <!-- <li><a href="product.html">Testimonials</a></li>
                        <li><a href="detail.html">Give Feedbacks</a></li> -->
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="eventsanddiscount.php">Special Events & Discount</a></li>
                       </ul>
                  </li>
			</ul>
		    	<ul class="nav navbar-nav navbar-right">
				<li><a class="tag_m" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart  <?php 
					if (isset($_SESSION['cartcount'])) {
						echo "( ".$_SESSION['cartcount']." )";
					}else{
						// echo "( 0 )";
					}
					
				 ?> </a></li>
				<?php 
					if ($userid!="") {
						echo "<li class='dropdown'>
                     <a href='#' class='dropdown-toggle tag_m' data-toggle='dropdown'><img src='$profileimgdir' class='headerprofileimg'/> <b class='caret'></b></a>
                     <ul class='dropdown-menu drop_1'>
                        <li><a href='profile.php'>Profile</a></li>
                        <li><a href='userlogout.php'>Logout</a></li>
                       </ul>
                  </li>";
					}else{
						echo "<li><a class='tag_m' href='userlogin.php'>Login</a></li>";
					}
				 ?>

				<li class="dropdown"><a class="tag_m1" href="#" data-toggle="dropdown"><span class="fa fa-search"></span></a>
											<ul class="dropdown-menu drop_2" style="min-width: 300px;">
												<li>
													<div class="row_1">
														<div class="col-sm-12">
															<form class="navbar-form navbar-left" role="search">
															<div class="input-group">
																<input type="text" class="form-control" placeholder="Search">
																<span class="input-group-btn">
																	<button class="btn btn-primary" type="button">
																		Search</button>
																</span>
															</div>
															</form>
														</div>
													</div>
												</li>
											</ul>
								  </li>
			    </ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	
	</section>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

<!-- click to top button -->
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>