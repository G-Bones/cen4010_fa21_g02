<?php
session_start();

if (isset($_POST["update"])) {

  // get the form data from the URL
  //$name = $_POST["name"];
  $email = $_POST["input-email"];
  $university = $_POST["input-university"];
  $username = $_POST["input-username"];
  $pwdOld = $_POST["input-password"];
  $pwdNew = $_POST["input-new-password"];
  $id = $_SESSION['userid'];

  // error handlers to catch any user mistakes
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // check if inputs empty
  // set the functions "!== false" since "=== true" has a risk of giving the wrong outcome
  // Proper username chosen
  if (invalidUid($username) !== false) {
    header("location: ../profile.php?error=invaliduid");
		exit();
  }
  // Proper university chosen
  if (invalidEmail($email) !== false) {
    if ($email != ''){
    header("location: ../profile.php?error=invalidemail");
		exit();
    }
  }

  $sql_u = "SELECT * FROM users WHERE usersId='$id'";
  $res_u = mysqli_query($conn, $sql_u);


    if (mysqli_num_rows($res_u) > 0 && $username != '') {
    $sql_username = "UPDATE users SET usersUID='$username' WHERE usersId='$id'";
    mysqli_query($conn, $sql_username);

    $_SESSION["useruid"] = $username;
    }

    if (mysqli_num_rows($res_u) > 0 && $email != '') {
    $sql_email = "UPDATE users SET usersEmail='$email' WHERE usersId='$id'";
    mysqli_query($conn, $sql_email);

    $_SESSION["useremail"] = $email;

    header("location: ../profile.php");
  	}

    if (mysqli_num_rows($res_u)) {
    $sql_uni = "UPDATE users SET usersuniversity='$university' WHERE usersId='$id'";
    mysqli_query($conn, $sql_uni);

    $_SESSION['useruniveristy'] = $university;

    header("location: ../profile.php");
  	}
    
    if (mysqli_num_rows($res_u) > 0 && $pwdOld != '' && $pwdNew != '' && $pwdOld != $pwdNew) {

    $row = mysqli_fetch_row($res_u);
    $dbpwd = $row[5];

    if(password_verify($pwdOld, $dbpwd)){

    $hashedPwd = password_hash($pwdNew, PASSWORD_DEFAULT);

    $sql_password = "UPDATE users SET usersPwd='$hashedPwd' WHERE usersId='$id'";
    mysqli_query($conn, $sql_password);

    header("location: ../profile.php?error=pwdupdated");
	exit();
    }
  	}

} else {
    mysqli_close($conn);
	header("location: ../profile.php");
	exit();
}
