<?php

$servername = "lamp.cse.fau.edu";
$dBUsername = "cen4010_fa21_g02@localhost";
$dBPassword = "O7y4Zt8R5A";
$dBName = "cen4010_fa21_g02";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}