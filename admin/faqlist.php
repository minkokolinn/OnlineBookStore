<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['faqIdtodelete'])) {
		$faqidtodelete=$_REQUEST['faqIdtodelete'];
		$deletefaq="DELETE from faq where faqId='$faqidtodelete'";
		$rundeletefaq=mysqli_query($connection,$deletefaq);
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
                    	<h4 class="mt-4">Question List</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Please answer back to the customers.
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	<?php 
                                    		$selectfaq="SELECT f.*,u.userProfileimg,u.userName from faq f,user u where f.userId=u.userId";
											$runselectfaq=mysqli_query($connection,$selectfaq);
											$countoffaq=mysqli_num_rows($runselectfaq);
											if ($countoffaq>0) {
												$no=0;
												for ($i=0; $i <$countoffaq ; $i++) { 
													$dataoffaq=mysqli_fetch_array($runselectfaq);
													$faqid=$dataoffaq['faqId'];
													$no=$no+1;
													echo "<tr>";
													echo "<td>".$no."</td>";
													echo "<td><img src='../".$dataoffaq['userProfileimg']."' width='40px' style='border-radius:50%;'></td>";
													echo "<td>".$dataoffaq['userName']."</td>";
													echo "<td>".$dataoffaq['question']."</td>";
													echo "<td>".$dataoffaq['answer']."</td>";
													echo "<td>
                                    				<a href='faqlist.php?faqIdtodelete=$faqid' class='actionlink'><i class='fas fa-trash'></i>&nbsp;&nbspDelete</a>
                                                    <br>
                                                    <a href='answer.php?faqIdtoanswer=$faqid' class='actionlink'><i class='fas fa-edit'></i>&nbsp;&nbspAnswer</a>
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