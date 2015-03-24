<?php

$pageTitle = "Kezdőlap";

//profilok kigyűjtése



$query = "SELECT p.*,u.uname FROM `profilok` AS p JOIN `users` AS u ON p.user_id=u.id ORDER BY rand() LIMIT 3";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}

$talal = array();

$c = 0;
while ($profilok = $result->fetch_array()) {
    $talal[$c]['uname'] = $profilok['uname'];
    $talal[$c]['szuletesiDatum'] = $profilok['szuletesi_datum'];
    $talal[$c]['nem'] = $profilok['nem'];
    $talal[$c]['megye'] = $profilok['megye'];
    $talal[$c]['id'] = $profilok['id'];
    
    
    $query = "SELECT * FROM `profilkepek` WHERE `profil_id`=" . $profilok['id'];
    $talal[$c]['profilkep'] = $db->query($query)->fetch_array();
    if ($db->errno) {
        die($db->error);
    }

    $c++;
}

// hír rögzítése form feldolgozása:
if (isset($_POST['newsSubmit'])) {
  
	
	$newsText = $_POST['text'];
	$newsDate = date('Y-m-d');
        $newsOwner = $_SESSION['user_id'];
	
        
	// db-be írás:
	$query = "INSERT INTO news (text, date, owner) VALUES ('$newsText', '$newsDate', '$newsOwner');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = '';
		
	header("Location: $HOST/?q=kezdolap");
	exit;
}

// Hírek kiolvasása adatbázisból:
$query = "SELECT n.*, u.uname FROM `news` AS n JOIN `users` AS u WHERE u.id=n.owner ORDER BY date DESC, id DESC LIMIT 4";
$news = $db->query($query);
if ($db->errno) {
    die($db->error);
}

//profilok kiírása
