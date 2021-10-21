<?php

$servername = "localhost";
$dBUsername = "cen4010_fa21_g02@localhost";
$dBPassword = "";
$dBName = "test";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}