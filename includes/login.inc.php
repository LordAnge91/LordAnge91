<?php

if (isset($_POST["submit"])) {

	$username = htmlspecialchars($_POST["uid"], ENT_QUOTES);
	$pwd = $_POST["pwd"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputLogin($username, $pwd) !== false) {
		header("location: ../index.php?error=emptyinput");
		exit();
	}

	loginUser($conn, $username, $pwd);

} else {
	header("location: ../index.php");
	exit();
}