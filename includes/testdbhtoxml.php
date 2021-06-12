<?php

$serverName = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ss market";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die('connessione fallita: ' . mysqli_connect_error());
}

$query = "SELECT * FROM products;";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

echo json_encode($data);