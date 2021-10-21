<?php

if (isset($_POST["submit"])) {

  // get the form data from the URL
  $name = $_POST["name"];
  $email = $_POST["email"];
  $university = $_POST["university"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  // error handlers to catch any user mistakes
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // check if inputs empty
  // set the functions "!== false" since "=== true" has a risk of giving the wrong outcome
  if (emptyInputSignup($name, $email, $university, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
		exit();
  }
  // Proper username chosen
  if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=invaliduid");
		exit();
  }
  // Proper email chosen
  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
		exit();
  }
  // Proper university chosen
  if (invalidUniversity($university) !== false) {
    header("location: ../signup.php?error=invaliduniversity");
		exit();
  }
  // Do the two passwords match?
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
		exit();
  }

  // Now we insert the user into the database
  createUser($conn, $name, $email, $university, $username, $pwd);

} else {
	header("location: ../signup.php");
    exit();
}
