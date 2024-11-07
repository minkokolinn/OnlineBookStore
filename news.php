<?php 
	include('connect.php');
	include('header.php');
 ?>
 <script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>

 <section id="center" class="clearfix center_shop" style="background-image: url(image/authorbanner.png); background-position: center; background-size: cover;"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12"><hr>
	 <h2 class="mgt col_1">News & Blogs</h2><hr>
	 <p style="color: white;">You can view news, blog, announcement, activities in this page</p><br>
	</div>
   </div>
  </div>
 </div>	  
</section>

<section id="blog_page" class="clearfix"> 
 <div class="container">
  <div class="row">
   <div class="blog_page_1 clearfix">
	<div class="col-sm-12">
      <div class="blog_page_1r mgt clearfix">
      	<input id="myInput" onkeyup="myFunction()" type="text" placeholder="Search for name, author, category, price.." class="form-control" style="width:30%; float: right;">
			<br><br>
			
			<ul id="myUL">
      	<?php 
      		$selectnews="SELECT * from news";
      		$runselectnews=mysqli_query($connection,$selectnews);
      		$countofnews=mysqli_num_rows($runselectnews);
      		if ($countofnews>0) {
      			for ($i=0; $i <$countofnews ; $i++) { 
      				$dataofnews=mysqli_fetch_array($runselectnews);
      				$newsid=$dataofnews['newsId'];
      				$newDate = date("d M,Y", strtotime($dataofnews['uploadedDate']));
      				echo "
      				<li><a href='#'><p style='display:none;'>".$dataofnews['newsTitle']."</p>
						<p style='display:none;'>".$dataofnews['news']."</p>
      					<div class='col-sm-4'>
							<div class='blog_home_1i clearfix'>
							<img src='admin/".$dataofnews['newsimg']."' class='iw' alt='abc'>
							<h4 style='width:80%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'><a href='newsdetail.php?newsIdtodetail=$newsid'>".$dataofnews['newsTitle']."</a></h4>
							<p style='height:100px; overflow:hidden; text-overflow:ellipsis;'>".$dataofnews['news']."</p>
							<p><a href='newsdetail.php?newsIdtodetail=$newsid'>See more...</a></p>
							<div class='blog_home_1ii clearfix'>
							<h6 class='transform mgt'>".$newDate."</h6>
							  </div>
							 </div>
						</div>
						</a></li>
      				";
      			}
      		}

      	 ?>
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