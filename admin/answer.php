<?php 
	include('../connect.php');
	include('header.php');
	if (isset($_REQUEST['faqIdtoanswer'])) {
		$faqtoanswer=$_REQUEST['faqIdtoanswer'];
		$selectquestion="SELECT question,answer from faq where faqId='$faqtoanswer'";
		$runselectquestion=mysqli_query($connection,$selectquestion);
		$dataofquestion=mysqli_fetch_array($runselectquestion);

	}else{
		echo "<script>alert('Invalid action!')</script>";
		echo "<script>location='faqlist.php'</script>";
	}

	if (isset($_POST['btndone'])) {
		$valanswer=$_POST['taanswer'];

		$updatefaq="UPDATE faq set answer='$valanswer' where faqId='$faqtoanswer'";
		$runupdatefaq=mysqli_query($connection,$updatefaq);
		if ($runupdatefaq) {
			echo "<script>location='faqlist.php'</script>";
		}
	}
 ?>
<div id="layoutSidenav">
<div id="layoutSidenav_content">
              <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4"><?php echo $dataofquestion['question']; ?></h4>
                        <div class="card mb-4 col-sm-8">
                            <div class="card-body">
                                <form method="post" class="mt-2" enctype="multipart/form-data">
                                    <div class="form-floating">
                                                <textarea class="form-control" id="inputEmail" style="height: 150px;" name="taanswer">
                                                	<?php 
                                                	if ($dataofquestion['answer']=="") {
                                                		
                                                	}else{
                                                		echo $dataofquestion['answer'];
                                                	}
                                                	 ?>
                                                </textarea>
                                                <label for="inputEmail">Type the answer
                                            </div> <br>
                                            <div class="d-flex align-items-center justify-content-between j mt-2 mb-0">
                                                <a class="small" href="#"></a>
                                                <input type="submit" class="btn btn-primary" name="btndone" value="DONE">
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
</div>
</div>

<?php 
	include('footer.php');
 ?>