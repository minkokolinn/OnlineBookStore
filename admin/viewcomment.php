<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['bookid'])) {
		$bookidforcomment=$_REQUEST['bookid'];

		$selectbookname="SELECT bookName from book where bookId='$bookidforcomment'";
		$runselectbookname=mysqli_query($connection,$selectbookname);
		$dataofbookname=mysqli_fetch_array($runselectbookname);
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
                    	<h4 class="mt-4"><a href="booklist.php">
                        	<i class="fas fa-chevron-left"></i>Back
                        </a>&nbsp;&nbsp;&nbsp;User Comment of <u><?php echo $dataofbookname['bookName']; ?></u></h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                You can view and manage book information.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name (who commented)</th>
                                            <th>Comment</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name (who commented)</th>
                                            <th>Comment</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									<?php 
										$selectcomment="SELECT c.commentId,c.comment,c.commentDate,u.userName,c.userId from comment c, user u where c.bookId='$bookidforcomment' && c.userId=u.userId order by c.commentDate desc";
										
										$runselectcomment=mysqli_query($connection,$selectcomment);
										$countofcomment=mysqli_num_rows($runselectcomment);
										if ($countofcomment>0) {
											$no=0;
											for ($i=0; $i <$countofcomment ; $i++) { 
												$dataofcomment=mysqli_fetch_array($runselectcomment);
												$commentid=$dataofcomment['commentId'];
												echo "<tr>";
												echo "<td>".($no+1)."</td>";
												echo "<td>".$dataofcomment['userName']."</td>";
												echo "<td>".$dataofcomment['comment']."</td>";
												echo "<td>".$dataofcomment['commentDate']."</td>";
												echo "<td>
                                    				<a href='commentdelete.php?commentIdtodelete=$commentid&&bdid=$bookidforcomment' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
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