<?php

if (isset($_POST["submit"])) {

  // get the form data from the URL
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  // run a bunch of error handlers to catch any user mistakes
  // functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // inputs empty
  if (emptyInputLogin($username, $pwd) === true) {
    header("location: ../login.php?error=emptyinput");
		exit();
  }

  // no user errors
  // insert the user into the database
  loginUser($conn, $username, $pwd);

} else {
	header("location: ../login.php");
    exit();
}
