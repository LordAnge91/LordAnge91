<?php

$serverName = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ss market";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die('connessione fallita: ' . mysqli_connect_error());
}

$query = "SELECT * FROM settimana WHERE `id giorno` between 13 and 24;";
$result = mysqli_query($conn, $query);


