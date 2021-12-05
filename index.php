<?php
  include_once 'header.php';
  include "logic.php";
?>

<section class="index-intro m-auto">
  <h1>Your Feed</h1>
  <p>Discover posts related to your university!</p>
</section>

<section class="m-auto">   
        <!-- Display any info -->
        <?php if(isset($_REQUEST['info'])){ ?>
            <?php if($_REQUEST['info'] == "added"){?>
                <div class="alert alert-success" role="alert">
                    Post has been added successfully
                </div>
            <?php }?>
        <?php } ?>

        <!-- Display posts from database -->

        <?php 
        if (isset($_SESSION["useruid"])) {

        $useruni=$_SESSION['useruniveristy'];

        $query1 = "SELECT * FROM posts WHERE postsUniversity='$useruni'";
        $query1 = mysqli_query($conn, $query1);
        ?>

            <?php foreach($query1 as $q){ ?>


        <section class="main-content m-auto">
		<div >
			<div class="row m-auto">
				<div class="col-sm-10 m-auto">
					<div class="post-block m-auto">
						<div class="d-flex justify-content-between">
							<div class="d-flex mb-3">
								<div>
									<h3 style="display: inline;"class="mb-3"><?php echo $q['postsUsername'];?></h3>
                                    <h4 style="display: inline;" class="mb-0"> - <?php echo $q['postsTitle'];?></h4>
								</div>
   
							</div>
						</div>
						<div class="post-block__content mb-2">
							<p><?php echo $q['postsText'];?></p>
							<img src='uploads/<?php echo $q['postsImage'];?>' alt="Content img">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

            <?php } }
            else{
                echo "login to see posts!";
            }
            ?>
        </div>
       

    }
    
</section>

<?php
  include_once 'footer.php';
?>
