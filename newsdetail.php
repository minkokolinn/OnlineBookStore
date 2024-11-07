<?php 
	include('connect.php');
	include('header.php');
	if (isset($_REQUEST['newsIdtodetail'])) {
		$newsid=$_REQUEST['newsIdtodetail'];

		$selectnews="SELECT * from news where newsId='$newsid'";
        $runselectnews=mysqli_query($connection,$selectnews);
        $dataofnews=mysqli_fetch_array($runselectnews);

        $newDate = date("d M,Y", strtotime($dataofnews['uploadedDate']));
	}else{
		echo "<script>alert('Invalid Action')</script>";
		echo "<script>location='news.php'</script>";
	}
 ?>
 <section id="center" class="clearfix center_shop" style="background-image: url(image/authorbanner.png); background-position: center; background-size: cover;"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12"><hr>
	 <h2 class="mgt col_1">News & Blogs (Detail)</h2><hr>
	</div>
   </div>
  </div>
 </div>	  
</section>


<section id="blog_page" class="clearfix"> 
 <div class="container">
  <div class="row">
   <div class="blog_page_1 clearfix">
   	<div class="col-sm-2">
   		
   	</div>
	<div class="col-sm-8">
     <div class="blog_detail_1 clearfix">
	  <img src="admin/<?php echo $dataofnews['newsimg'] ?>" class="iw" alt="abc">
	  <h3><?php echo $dataofnews['newsTitle']; ?></h3>
	  <h5 class="transform">Uploaded : <u><?php echo $newDate; ?></u> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="span_1"></span> <span class="bold">By Admin of Reader's Paradise</span></h5><br><br>
	  <p><?php echo $dataofnews['news']; ?></p>
	 </div>
	 <div class="blog_detail_2 clearfix">
	  	<h4 class="transform text-center">Share This Article</h4>
		<ul class="social-network social-circle text-center">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
       </ul>
	 </div>
	</div>
   </div>
  </div>
 </div>	  
</section>

<?php 
	include('footer.php');
 ?>