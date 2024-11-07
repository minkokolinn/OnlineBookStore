<?php 
	include('connect.php');
	include('header.php');
 ?>
<section id="center" class="clearfix center_shop" style="background-image: url(image/authorbanner.png); background-position: center; background-size: cover;"> 
 <div class="container">
  <div class="row">
   <div class="center_shop_1 text-center clearfix">
    <div class="col-sm-12"><hr>
	 <h2 class="mgt col_1">Authors</h2><hr>
	 <p style="color: white;">You can view biography of authors. Some books are writtens by these authors but you cannot even gain information of some authors.</p><br>
	</div>
   </div>
  </div>
 </div>	  
</section>

<?php 
	$selectauthor="SELECT * from author";
	$runselectauthor=mysqli_query($connection,$selectauthor);
	$countofauthor=mysqli_num_rows($runselectauthor);
	if ($countofauthor>0) {
		for ($i=0; $i <$countofauthor ; $i++) { 
			$dataofauthor=mysqli_fetch_array($runselectauthor);
			echo "<section id='picked'>";
			echo "<div class='container'>";
			echo "<div class='row'>";
			echo "<div class='picked_1 clearfix'>";
			echo "<div class='col-sm-9'>";
			echo "<div class='picked_1l clearfix'>";
			echo "<h3>".$dataofauthor['authorName']."</h3>";
			echo "<p>".$dataofauthor['authorBiography']."</p>";
			echo "</div>";
			echo "</div>";
			echo "<div class='col-sm-3'>";
			echo "<div class='picked_1r clearfix'>";
			echo "<img src='admin/".$dataofauthor['authorimg']."' class='iw' alt='abc'>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</section><hr>";
		}
	}

	
 ?>
<?php 
	include('footer.php');
 ?>