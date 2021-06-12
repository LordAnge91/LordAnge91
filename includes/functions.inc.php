<?php

function emptyInputSignup($nome, $cognome, $email, $username, $pwd, $pwdrepeat) {
	$result;
	if (empty($nome) || empty($cognome) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

function invalidName($nome) {
	$result;
	if (!preg_match("/^[a-zA-Z- ]*$/", $nome)) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9- ]*$/", $username)) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username, $email) {
	$sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=stmtfailedcheck");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}

function createUser($conn, $nome, $cognome, $email, $phone, $username, $pwd, $sex, $indirizzo, $indirizzoInfo, $citta, $provincia) {
	$sql = "INSERT INTO users (userNome, userCognome, userEmail, userPhone, userUid, userPwd, userSex, userIndirizzo, userIndirizzoInfo, userCity, userProvincia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=stmtfailed");
		exit(); 
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssssssssss", $nome, $cognome, $email, $phone, $username, $hashedPwd, $sex, $indirizzo, $indirizzoInfo, $citta, $provincia);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: ../index.php?error=none");
	exit();
}

function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;	
	} else {
		$result = false;
	}
	return $result;
}

	function loginUser($conn, $username, $pwd) {
		$uidExists = uidExists($conn, $username, $username);

		if ($uidExists === false) {
		header("location: ../index.php?error=wronglogin");
		exit();
		}

		$pwdHashed = $uidExists["userPwd"];
		$checkPwd = password_verify($pwd, $pwdHashed);

		if ($checkPwd === false) {
		header("location: ../index.php?error=wronglogin");
		exit();
		} else if ($checkPwd === true) {
			session_start();
			$_SESSION["userid"] = $uidExists["usersId"];
			$_SESSION["useruid"] = $uidExists["userUid"];

		header("location: ../index.php");
		exit();
		}
	}

function updateUser($conn, $nome, $cognome, $phone, $sex, $indirizzo, $info, $citta, $provincia, $id) {
	$sql = "UPDATE users SET userNome = ?, userCognome = ?, userSex = ?, userIndirizzo = ?, userIndirizzoInfo = ?,userPhone = ?, userCity = ?, userProvincia = ? WHERE usersId = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}


	mysqli_stmt_bind_param($stmt, "sssssissi", $nome, $cognome, $sex, $indirizzo, $info, $phone, $citta, $provincia, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: ../1/2/Profilo.php?Profilo=aggiornato");
	exit();
}


function updProd($conn, $id, $img, $img2, $nome, $link, $barcode, $brand, $price, $offer, $discount, $weight, $speciali, $category, $subcategory, $info, $dispo) {
	$sql = "UPDATE products SET img = ?, img2 = ?, nome = ?, link = ?, barcode = ?, brand = ?, Offer = ?, discount = ?, weight = ?, speciali = ?, category = ?, sub_category = ?, info = ?, Disponibilita = Disponibilita + ? WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/updProd.php?error=stmtfailed");
		exit(); 
	}


	mysqli_stmt_bind_param($stmt, "ssssisidissssii", $img, $img2, $nome, $link, $barcode, $brand, $offer, $discount, $weight, $speciali, $category, $subcategory, $info, $dispo, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: ../1/2/updProd.php?error=none");
	exit();
}

function updisp($conn, $id, $dispo) {
	$sql = "UPDATE products SET Disponibilita = Disponibilita + ? WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/updProd.php?error=stmtfailed");
		exit(); 
	}


	mysqli_stmt_bind_param($stmt, "ii", $dispo, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: ../1/2/updProd.php?error=none");
	exit();
}


function updateEmail($conn, $newemail, $id, $oldemail) {
	$sql = "UPDATE users SET userEmail = ? WHERE usersId = ? AND userEmail = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}


	mysqli_stmt_bind_param($stmt, "sis", $newemail, $id, $oldemail);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: ../1/2/Profilo.php?error=emailaggiornata");
	exit();
}

function updateUid($conn, $newusername, $id, $oldusername) {
	$sql = "UPDATE users SET userUid = ? WHERE usersId = ? AND userUid = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}


	mysqli_stmt_bind_param($stmt, "sis", $newusername, $id, $oldusername);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: logout.inc.php?nomeutenteaggiornato");
	exit();
}

function updatePwd($conn, $username, $oldpwd, $id, $newpwd) {
	$uidExists = uidExists($conn, $username, $username);

		if ($uidExists === false) {
		header("location: ../index.php?error=errato");
		exit();
		}

		$pwdHashed = $uidExists["userPwd"];
		$checkPwd = password_verify($oldpwd, $pwdHashed);

		if ($checkPwd === false) {
		header("location: ../1/2/Profilo.php?error=passwordnoncorretta");
		exit();
		} else if ($checkPwd === true) {

	$sql = "UPDATE users SET userPwd = ? WHERE usersId = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}

	$hashedPwd = password_hash($newpwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "si", $hashedPwd, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	header("location: logout.inc.php?passwordaggiornata");
	exit();
}

}

function updateConsegna($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $amount, $dataord, $orario, $listspesa, $costspesa, $iduser) {
	$sql = "UPDATE settimana SET `disp consegna` = `disp consegna` - 1 WHERE orario = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}

	mysqli_stmt_bind_param($stmt, "s", $orario);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	

	updateDispo($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $amount, $dataord, $orario, $listspesa, $costspesa, $iduser);
}

function updateDispo($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $amount, $dataord, $orario, $listspesa, $costspesa, $iduser) {
	$sql = "UPDATE products SET `Disponibilita` =  `Disponibilita` - ? WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../1/2/Profilo.php?error=stmtfailed");
		exit(); 
	}
	$id = array_map('intval', explode(',', $idprod));
	$amount = array_map('intval', explode(',', $amount));
	$len = count($id);
    for ($i = 0; $i < $len; $i++) { 
        mysqli_stmt_bind_param($stmt, "ii", $amount[$i], $id[$i]);
   		mysqli_stmt_execute($stmt);
    }
		mysqli_stmt_close($stmt);

	createAcquisto($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $dataord, $orario, $listspesa, $costspesa, $iduser);
}


function createAcquisto($conn, $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $dataord, $orario, $listspesa, $costspesa, $iduser) {
	$sql = "INSERT INTO acquisti (nome, cognome, telefono, citta, indirizzo, info, `metodo di pagamento`, idprodotti, data, `data consegna`, listaprodotti, costospesa, idUtente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../index.php?error=stmtfailed");
		exit(); 
	}

	mysqli_stmt_bind_param($stmt, "sssssssssssdi", $nome, $cognome, $phone, $citta, $indirizzo, $indirizzoInfo, $tipopag, $idprod, $dataord, $orario, $listspesa, $costspesa, $iduser);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);	
	

header('location: ../1/Carrello/Carrello.php?acquistocompletato');

	exit();


}

?>
