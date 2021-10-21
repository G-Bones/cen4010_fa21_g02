<?php

// Check for empty input signup
function emptyInputSignup($name, $email, $university, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($university) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid university
function invalidUniversity($university) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $university)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Insert new user into database
function createUser($conn, $name, $email, $university, $username, $pwd) {

	$sql_u = "SELECT * FROM users WHERE usersUID='$username'";
	$res_u = mysqli_query($conn, $sql_u);

	if (mysqli_num_rows($res_u) > 0) {
  	  header("location: ../signup.php?error=usernametaken");
  	}
	else{
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (usersName, usersEmail, usersUniversity, usersUID, usersPwd) VALUES ('$name', '$email', '$university', '$username', '$hashedPwd');";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
		header("location: ../signup.php?error=none");
	}
}

// Check for empty input login
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function uidExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE usersUID = '$username';";

  $result = mysqli_query($conn, $sql);

  if($result -> num_rows > 0){
	return mysqli_fetch_assoc($result);
  }
  else{return false;}
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUID"];
		header("location: ../index.php?error=none");
		exit();
	}
}
