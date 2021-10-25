<?php
  include_once 'header.php';
?>

<section class="index-intro">
  <h1>Your Feed</h1>
  <p>Discover posts related to your university!</p>
</section>

<?php
 if (isset($_SESSION["useruid"])) {
              echo "Welcome to the member's area, " . $_SESSION['usersName'] . "!";
            }
            ?>

<section class="feed-example">
  <div id="feed-example-list">
    <div class="post-example">
      <h3>Post 1</h3>
    </div>
    <div class="post-example">
      <h3>Post 2</h3>
    </div>
    <div class="post-example">
      <h3>Post 3</h3>
    </div>
    <div class="post-example">
      <h3>Post 4</h3>
    </div>
  </div>
</section>

<?php
  include_once 'footer.php';
?>
