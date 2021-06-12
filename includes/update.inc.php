<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("location: ../index.php");
	die();
}

require_once 'dbh.inc.php';

if (isset($_POST["update"]) !== false) {

	$nome = htmlspecialchars($_POST["nome"]);
	$cognome = htmlspecialchars($_POST["cognome"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$sex = $_POST["sesso"];
	$indirizzo = htmlspecialchars($_POST["indirizzo"], ENT_QUOTES);
	$info = htmlspecialchars($_POST["Dettagli"], ENT_QUOTES);
	$citta = htmlspecialchars($_POST["citta"]);
	$provincia = $_POST["provincia"];
	$id = $_POST['ID'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (invalidName($nome) !== false) {
		header("location: ../1/2/Profilo.php?error=nomenonvalido");
		exit();		
	}
	if (invalidName($cognome) !== false) {
		header("location: ../1/2/Profilo.php?error=cognomenonvalido");
		exit();
	}
	updateUser($conn, $nome, $cognome, $phone, $sex, $indirizzo, $info, $citta, $provincia, $id);


} else if (isset($_POST["updatepwd"]) !== false) {

	$oldpwd = $_POST["oldpwd"];
	$newpwd = $_POST["newpwd"];	
	$newpwdrpt = $_POST["newpwdrpt"];
	$id = $_POST['ID'];
	$username = $_POST["oldusername"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (pwdMatch($newpwd, $newpwdrpt) !== false) {
		header("location: ../1/2/Profilo.php?error=passwordnoncoincidono");
		exit();
	}
	updatePwd($conn, $username, $oldpwd, $id, $newpwd);
	exit();

} else if (isset($_POST["updatemail"]) !== false) {

	$oldemail = $_POST["oldemail"];
	$newemail = $_POST["newemail"];
	$id = $_POST['ID'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';


	if (uidExists($conn, $newemail, $newemail) !== false) {
		header("location: ../1/2/Profilo.php?error=emailnondisponibile");
		exit();
	
	} else {
		updateEmail($conn, $newemail, $id, $oldemail);
		exit();
	}

} else if (isset($_POST["updateuid"]) !== false) {

	$oldusername = htmlspecialchars($_POST["oldusername"]);
	$newusername = htmlspecialchars($_POST["newusername"]);
	$id = $_POST['ID'];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (invalidUid($newusername) !== false) {
		header("location: ../1/2/Profilo.php?error=nomeutentenonvalido");
		exit();
	}

	if (uidExists($conn, $newusername, $newusername) !== false) {

		header("location: ../1/2/Profilo.php?nomeutentenondisponibile");
		exit();

	} else {

		updateUid($conn, $newusername, $id, $oldusername);
		exit();
		}		

} else if (isset($_POST["updprod"])) {



	$id = $_POST['ID'];
	$img = htmlspecialchars($_POST["img"]);
	$img2 = htmlspecialchars($_POST["img2"]);
	$nome = htmlspecialchars($_POST["nome"], ENT_QUOTES);
	$link = $_POST["link"];
	$barcode = htmlspecialchars($_POST["barcode"]);
	$brand = htmlspecialchars($_POST["brand"], ENT_QUOTES);
	$price = htmlspecialchars($_POST["price"]);
	$offer = htmlspecialchars($_POST["offer"]);
	$discount = htmlspecialchars($_POST["discount"]);
	$weight = htmlspecialchars($_POST["weight"]);
	$speciali = htmlspecialchars($_POST["speciali"], ENT_QUOTES);
	$category = $_POST["category"];
	$subcategory = $_POST["subcategory"];
	$info = htmlspecialchars($_POST["info"], ENT_QUOTES);
	$dispo = htmlspecialchars($_POST["dispo"]);

	require_once 'dbprod.inc.php';
	require_once 'functions.inc.php';


	updProd($conn, $id, $img, $img2, $nome, $link, $barcode, $brand, $price, $offer, $discount, $weight, $speciali, $category, $subcategory, $info, $dispo);


} else if (isset($_POST["updisp"])) {



	$id = $_POST['ID'];
	$dispo = htmlspecialchars($_POST["dispo"]);

	require_once 'dbprod.inc.php';
	require_once 'functions.inc.php';


	updisp($conn, $id, $dispo);


} else if (isset($_POST['']) !== true) {

		header("location: ../index.php");
		exit();

}
	




	



