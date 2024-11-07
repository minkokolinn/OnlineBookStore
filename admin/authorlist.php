<?php 
	include('../connect.php');
	include('header.php');

	if (isset($_REQUEST['authorIdtodelete'])) {
		$valauthortodelete=$_REQUEST['authorIdtodelete'];
		$deleteauthor="DELETE from author where authorId='$valauthortodelete'";
		$rundeleteauthor=mysqli_query($connection,$deleteauthor);
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
                    	<h4 class="mt-4">Author List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage author information.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Biography</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Biography</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectauthor="SELECT * from author";
                                    		$runselectauthor=mysqli_query($connection,$selectauthor);
                                    		$countofauthor=mysqli_num_rows($runselectauthor);
                                    		if ($countofauthor>0) {
                                    			for ($i=0; $i <$countofauthor ; $i++) { $dataofauthor=mysqli_fetch_array($runselectauthor);
                                    				$no=$i+1;
                                    				$authorid=$dataofauthor['authorId'];
                                    				echo "<tr>";
                                    				echo "<td>".$no."</td>";
                                    				echo "<td><img src='".$dataofauthor['authorimg']."' width='30px'></td>";
                                    				echo "<td>".$dataofauthor['authorName']."</td>";
                                    				echo "<td><div style='width:300px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;'>".$dataofauthor['authorBiography']."</div></td>";
                                    				echo "<td>
                                    				<a href='authorlist.php?authorIdtodelete=$authorid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
                                    				&nbsp;&nbsp;|&nbsp;&nbsp;
                                    				<a href='authoredit.php?authorIdtoedit=$authorid' class='actionlink'><i class='fas fa-edit'></i>&nbsp;&nbspEdit</a>
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