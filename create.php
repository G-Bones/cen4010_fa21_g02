<?php
include_once 'header.php';
?>

    <title>CHEP'S creator</title>
    <body>
       <!--Header Section^^-->
       <div class="main__body">
    
  <div class="post__maker">
  <form action="logic.php" method="POST" enctype="multipart/form-data">
    <label for="postsTitle">Post Title</label>
    <input type="text" name="postsTitle" placeholder="Title...">

    <label for="file">Upload Image</label>
    <input type="file" name="file">

    <textarea name="postsText" type="text1" placeholder="Share to your Class"></textarea>
  
    <button name="send" placeholder="Post">Post</button>
  </form>

  </div>
   
    </body>
   