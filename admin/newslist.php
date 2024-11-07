<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['newsIdtodelete'])) {
		$newidtodelete=$_REQUEST['newsIdtodelete'];
		$deletenews="DELETE from news where newsId='$newidtodelete'";
		$rundeletenews=mysqli_query($connection,$deletenews);
	}
 ?>
<style type="text/css">
	.actionlink{
		text-decoration: none;
	}
	.actionlink:hover{
		color: darkred;
	}
</style>
<div id="layoutSidenav">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    	<h4 class="mt-4">News/Blog List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage news/blogs.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>News</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>News</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectbookreview="SELECT * from news";
                                    		$runselectbookreview=mysqli_query($connection,$selectbookreview);
                                    		$countofbookreview=mysqli_num_rows($runselectbookreview);
                                    		if ($countofbookreview>0) {
                                    			for ($i=0; $i <$countofbookreview ; $i++) { 
                                    				$dataofbookreview=mysqli_fetch_array($runselectbookreview);
                                    				$no=$i+1;
                                    				$newsid=$dataofbookreview['newsId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td><img src='".$dataofbookreview['newsimg']."' width='30px'></td>";
                                    				echo "<td><a href='newsdetail.php?newsIdtodetail=$newsid'>".$dataofbookreview['newsTitle']."</a></td>";
                                    				echo "<td><div style='width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>".$dataofbookreview['news']."</div></td>";
                                                    echo "<td>".$dataofbookreview['uploadedDate']."</td>";
                                    				echo "<td>
                                    				<a href='newslist.php?newsIdtodelete=$newsid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
                                    				</td>
                                    				";
                                    				echo "</tr>";
                                    			}
                                    		}
                                    	 ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
</div>
</div>

<?php 
	include('footer.php');
 ?>