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
<section id="center" class="clearfix center_shop" style="background-image: url(image/burmabook.jpg); background-position: center; background-size: cover;"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12"><hr>
	 <h2 class="mgt col_1">Myanmar Book Collections</h2><hr>
	 <p style="color: white;">Various types of myanmar books are shown in this page</p><br>
	</div>
   </div>
  </div>
 </div>	  
</section>


<section id="product"> 
 <div class="container">
  <div class="row">
		<div class="product_2 clearfix">
			<input id="myInput" onkeyup="myFunction()" type="text" placeholder="Search for name, author, category, price.." class="form-control" style="width:30%; float: right;">
			<br><br>
			
			<ul id="myUL">
				<?php 
					$selectbook="SELECT * from book where bookType='Myanmar'";
					$runselectbook=mysqli_query($connection,$selectbook);
					$countofbook=mysqli_num_rows($runselectbook);
					if ($countofbook>0) {
						$count=0;
						for ($i=0; $i <$countofbook ; $i++) { 
							$count++;
							$dataofbook=mysqli_fetch_array($runselectbook);
							$bookid=$dataofbook['bookId'];
							$catid=$dataofbook['bookcategoryId'];

							$selectcat="SELECT bookcategoryName from bookcategory where bookcategoryId='$catid'";
							$runselectcat=mysqli_query($connection,$selectcat);
							$dataofcat=mysqli_fetch_array($runselectcat);

												echo "
						<li><a href='#'><p style='display:none;'>".$dataofbook['bookName']."</p>
						<p style='display:none;'>".$dataofcat['bookcategoryName']."</p>
						<p style='display:none;'>".$dataofbook['author']."</p>
						<p style='display:none;'>".$dataofbook['price']."</p>
 	


				<div class='col-sm-3 space_left' >
					<div class='arriv_2m clearfix'>
					  <div class='arriv_2m1 clearfix'>
						<a href='bookdetail.php?bdid=$bookid'><img src='admin/".$dataofbook['bookcoverimg']."' alt='abc' class='iw' style='height:220px; width:auto;'></a>
					  </div>
					  <div class='arriv_2m3 clearfix'>
					   <h5 class='bold' style='width:90%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>".$dataofbook['bookName']."</h5>
					   <p style='color:#339966;'><u>".$dataofbook['author']." (".$dataofcat['bookcategoryName'].")</u></p>
					   <p style='height:100px; overflow:hidden; text-overflow:ellipsis;'><a href='bookdetail.php?bdid=$bookid'>".$dataofbook['description']."</a></p><p>See more...</p>
					   <span class='span_1'>
					   ";
					   for ($j=0; $j <$dataofbook['ratingstar'] ; $j++) { 
					   		 echo "<i class='fa fa-star'></i>";
					   }
					   echo "
					   </span>
					   <h3 class='normal'>
					   <span class='span_3 col_1'> ".$dataofbook['price']." MMK</span>
					   </h3>";
					   if ($dataofbook['quantity']>0) {
					   	echo "
					   <h5><a class='button' href='#'>In stock</a></h5>"; 
					   }else{
					   	echo "
					   <h5><a class='button' href='#'>Out of stock</a></h5>"; 
					   }
					   echo "
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
</section>
<?php 
	include('footer.php');
 ?>

 
 	