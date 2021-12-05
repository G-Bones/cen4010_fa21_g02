<?php
include_once 'header.php';

$conn = mysqli_connect("localhost","root","","test");

if(!$conn){
    echo"<h3> No connection established</h3>";
}

$query = "SELECT * FROM posts";
$query = mysqli_query($conn, $query);

if(isset($_REQUEST['send'])){
  $file = $_FILES['file'];
  $postsText = $_REQUEST["postsText"];
  $postsUniversity = $_SESSION["useruniveristy"];
  $postsUsername = $_SESSION["useruid"];
  $postsTitle = $_REQUEST["postsTitle"];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = 'uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $sqli = "INSERT INTO posts(postsText, postsImage, postsUniversity, postsUsername, postsTitle) VALUES('$postsText', '$fileNameNew', '$postsUniversity', '$postsUsername', '$postsTitle')";
        mysqli_query($conn,$sqli);
        header("Location: index.php?upload=success");
      }
      else {
        echo "Your file is too big!";
      }
    }
    else {
      echo "There was an error uploading your file!";
    }
  }
  else {
    echo "You cannot upload files of this type!";
  }
}
