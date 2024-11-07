<?php 
	include('connect.php');
	include('header.php');
 ?>
<section id="center" class="clearfix center_shop" style="background-image: url(image/contactus.jpg); background-position: center; background-size: cover;"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12">
    	
	 <h2 class="mgt col_1">Book Review</h2>
	</div>
   </div>
  </div>
 </div>	  
</section>

<?php 
	$selectbookreview="SELECT * from bookreview";
    $runselectbookreview=mysqli_query($connection,$selectbookreview);
    $countofbookreview=mysqli_num_rows($runselectbookreview);
    if ($countofbookreview>0) {
     for ($i=0; $i <$countofbookreview ; $i++) { 
      $dataofbookreview=mysqli_fetch_array($runselectbookreview);
       if ($dataofbookreview['bookreviewimg']=="") {
       		echo "<section id='picked'>
			 <div class='container'>
			  <div class='row'>
			   <div class='picked_1 clearfix'>
			    <div class='col-sm-12'>
				 <div class='picked_1l clearfix'>
				   <h2>".$dataofbookreview['bookName']."</h2>
				   <p>".$dataofbookreview['bookreview']."</p>
				 </div>
				</div>
			    
			   </div>
			  </div>
			 </div>
			</section><hr>";
       }else{
       	echo "<section id='picked'>
			 <div class='container'>
			  <div class='row'>
			   <div class='picked_1 clearfix'>
			   <div class='col-sm-2'>
				 <div class='picked_1r clearfix'>
				  <img src='admin/".$dataofbookreview['bookreviewimg']."' class='iw' alt='abc'>
				 </div>
				</div>
			    <div class='col-sm-10'>
				 <div class='picked_1l clearfix'>
				   <h2>".$dataofbookreview['bookName']."</h2>
				   <p>".$dataofbookreview['bookreview']."</p>
				 </div>
				</div>
			    
			   </div>
			  </div>
			 </div>
			</section><hr>";
       }     				
     }
    }
 ?>


<?php 
	include('footer.php');
 ?>