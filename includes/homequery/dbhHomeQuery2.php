<?php

$serverName = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ss market";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die('connessione fallita: ' . mysqli_connect_error());
}

$query = "SELECT * FROM products WHERE category = 'Bibite' AND sub_category = 'Gassate' ORDER BY RAND() LIMIT 10;";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

echo json_encode($data);