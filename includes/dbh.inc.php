<?php

$serverName = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginOne";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die('connessione fallita: ' . mysqli_connect_error());
}
