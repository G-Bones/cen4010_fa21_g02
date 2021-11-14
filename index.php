<?php
  include_once 'header.php';
  include "logic.php";
?>

<section class="index-intro">
  <h1>Your Feed</h1>
  <p>Discover posts related to your university!</p>
</section>

<section>   
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

        $useruni=$_SESSION['userUniveristy'];

        $query1 = "SELECT * FROM posts WHERE postsUniversity='$useruni'";
        $query1 = mysqli_query($conn, $query1);
        ?>

            <?php foreach($query1 as $q){ ?>


        <section class="main-content">
		<div >
			<div class="row">
				<div class="col-sm-10 col-centered">
					<div class="post-block">
						<div class="d-flex justify-content-between">
							<div class="d-flex mb-3">
								<div>
									<h3 style="display: inline;"class="mb-3"><?php echo $q['postsUsername'];?></h3>
                                    <h4 style="display: inline;" class="mb-0"> - <?php echo $q['postsTitle'];?></h4>
								</div>
   
							</div>
							<div class="post-block__user-options">
								<a href="#!" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
									<a class="dropdown-item text-dark" href="#!"><i class="fa fa-pencil mr-1"></i>Edit</a>
									<a class="dropdown-item text-danger" href="#!"><i class="fa fa-trash mr-1"></i>Delete</a>
								</div>
							</div>
						</div>
						<div class="post-block__content mb-2">
							<p><?php echo $q['postsText'];?></p>
							<img src='uploads/<?php echo $q['postsImage'];?>' alt="Content img">
						</div>
						<hr>
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
