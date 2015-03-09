<?php

$pageTitle = "Profil";

//jogosultságok kigyűjtése:
$query = "SELECT * FROM `rights`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$rights = array();
$c = 0;
while ($uData = $result->fetch_array()) {
	$rights[$c]['id'] = $uData['id'];
	$rights[$c]['description'] = $uData['description'];
	$c++;
}

// users form feldolgozása:
if (isset($_POST['profilokSubmit'])) {
        
        $userID = $_SESSION['user_id'];
	$nem = $_POST['nem'];
	$szuletesiDatum = $_POST['ev'].'-'.$_POST['ho'].'-'.$_POST['nap'];
	$registracioDatum = date('Y-m-d');
	$profilBemutatkozas = $_POST['bemutatkozas'];
	
	
	// db-be írás:
	$query = "INSERT INTO profilok (user_id, nem, szuletesi_datum, registracio_datum, bemutatkozas) VALUES "
                . "('$userID', '$nem', '$szuletesiDatum', '$registracioDatum', '$profilBemutatkozas');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Profil adatok rögítve.';
	$profil = $db->query("SELECT id FROM profilok WHERE user_id=".$_SESSION['user_id'])->fetch_assoc();
        $_SESSION['profil_id'] = $profil['id'];
        
	header("Location: $HOST/?q=profil");
	
}
if (isset($_POST['profilDelete'])) {
        
        
	
	// db-be írás:
	$query = "DELETE FROM profilok WHERE user_id=".$_SESSION['user_id'];
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Profil adatok rögítve.';
	$profil = $db->query("SELECT id FROM profilok WHERE user_id=".$_SESSION['user_id'])->fetch_assoc();
        $_SESSION['profil_id'] = $profil['id'];
        
	header("Location: $HOST/?q=profil");
	exit;
}

?>