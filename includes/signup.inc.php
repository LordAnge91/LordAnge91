<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header("location: ../index.php");
	die();
} 

if (isset($_POST["submit"])) {

	$nome = $_POST["Nome"];
	$cognome = $_POST["Cognome"];
	$email = $_POST["Email"];
	$phone = $_POST["tel"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
	$sex = $_POST["sesso"];
	$indirizzo = htmlspecialchars($_POST["Indirizzo"], ENT_QUOTES);
	$indirizzoInfo = htmlspecialchars($_POST["Dettagli"], ENT_QUOTES);
	$citta = $_POST["Citta"];
	$provincia = $_POST["Provincia"];


	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($nome, $cognome, $email, $username, $pwd, $pwdrepeat) !== false) {
		header("location: ../index.php?error=emptyinput");
		exit();
	}
	if (invalidName($nome) !== false) {
		header("location: ../index.php?error=nomenonvalido");
		exit();
	}
	if (invalidName($cognome) !== false) {
		header("location: ../index.php?error=cognomenonvalido");
		exit();
	}
	if (invalidUid($username) !== false) {
		header("location: ../index.php?error=nomeutentenonvalido");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../index.php?error=emailnonvalida");
		exit();
	}
	if (pwdMatch($pwd, $pwdrepeat) !== false) {
		header("location: ../index.php?error=passwordnonuguale");
		exit();
	}
	if (uidExists($conn, $username, $email) !== false) {
		header("location: ../index.php?error=nomeutentenondisponibile");
		exit();
	}

	createUser($conn, $nome, $cognome, $email, $phone, $username, $pwd, $sex, $indirizzo, $indirizzoInfo, $citta, $provincia);


} else if (isset($_POST["contrassegno"])) {

	$nome = htmlspecialchars($_POST["nome"], ENT_QUOTES);
	$cognome = htmlspecialchars($_POST["cognome"], ENT_QUOTES);
	$phone = htmlspecialchars($_POST["tel"], ENT_QUOTES);
	$citta = htmlspecialchars($_POST["Citta"], ENT_QUOTES);
	$indirizzo = htmlspecialchars($_POST["indirizzo"], ENT_QUOTES);
	$indirizzoInfo = htmlspecialchars($_POST["info"], ENT_QUOTES);
	$tipopag = htmlspecialchars($_POST["pagamento"], ENT_QUOTES);
	$idprod = htmlspecialchars($_POST["idproducts"], ENT_QUOTES);
	$amount = htmlspecialchars($_POST["amountprod"], ENT_QUOTES);
	$dataord = htmlspecialchars($_POST["dataordine"], ENT_QUOTES);
	$orario = htmlspecialchars($_POST["orario"]);
	$listspesa = htmlspecialchars($_POST["listsp"], ENT_QUOTES);
	$costspesa = htmlspecialchars($_POST["costordine"], ENT_QUOTES);
	$iduser = htmlspecialchars($_POST["ID"], ENT_QUOTES);


	require_once 'dbprod.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($nome, $cognome, $phone, $citta, $indirizzo, $costspesa) !== false) {
		header("location: ../index.php?error=emptyinput");
		exit();
	}
	if (invalidName($nome) !== false) {
		header("location: ../index.php?error=nomenonvalido");
		exit();
	}
	if (invalidName($cognome) !== false) {
		header("location: ../index.php?error=cognomenonvalido");
		exit();
	}


	updateConsegna($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $amount, $dataord, $orario, $listspesa, $costspesa, $iduser);


} else {
	header("location: ../index.php");
	exit();
}