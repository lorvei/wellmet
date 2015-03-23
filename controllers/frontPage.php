<?php

$pageTitle = "Kezdőlap";

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
$query = "SELECT n.*, u.uname FROM `news` AS n JOIN `users` AS u WHERE u.id=n.owner ORDER BY date DESC LIMIT 4";
$news = $db->query($query);
if ($db->errno) {
    die($db->error);
}

