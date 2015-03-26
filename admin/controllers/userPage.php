<?php

$pageTitle = "Felhasználók kezelése";

//jogosultságok kigyűjtése:
$query = "SELECT * FROM `rights`";
$result = $db->query($query);
if ($db->errno) {
	die($db->error);
}

$rights = array();
$c = 0;
while ($uData = $result->fetch_array()) {
	$id = $uData['id'];
	$rights[$id] = $uData['description'];
	$c++;
}

//még nem aktivált userek kigyűjtése:
$query = "SELECT * FROM `users` WHERE active=0";
$nonActivated = $db->query($query);
if ($db->errno) {
	die($db->error);
}

// user keresés form feldolgozása:
if (isset($_POST['searchSubmit'])) {
  
	$where = '';
	$userName = $_POST['name'];
	if (!empty($userName)) $where.= "name LIKE '%$userName%'";
	$userUName = $_POST['uname'];
	if (!empty($userUName)) $where.= (!empty($where)) ? " AND uname LIKE '%$userUName%'"  : "uname LIKE '%$userUName%'";
	$userEmail = $_POST['email'];
	if (!empty($userEmail)) $where.= (!empty($where)) ? " AND email LIKE '%$userEmail%'"  : "email LIKE '%$userEmail%'";
	 
	$query = (!empty($where)) ? "SELECT * FROM `users` WHERE $where" : "SELECT * FROM `users` LIMIT 10";
	//var_dump($_POST, $query); die;
	$found = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['sresult'] = array();
	$c = 0;
	while ($newsData = $found->fetch_array()) {
		$_SESSION['sresult'][$c]['rights'] = $newsData['rights'];
		$_SESSION['sresult'][$c]['name'] = $newsData['name'];
		$_SESSION['sresult'][$c]['uname'] = $newsData['uname'];
		$_SESSION['sresult'][$c]['email'] = $newsData['email'];
		$c++;
	}	
		
	header("Location: $HOST/admin/?q=felhasznalok");
	exit;
}

// users form feldolgozása:
if (isset($_POST['usersSubmit'])) {
  
	$userName = $_POST['uname'];
	$userPass = crypt($_POST['upass']);
	$userRealName = $_POST['name'];
	$userEmail = $_POST['email'];
	$userRights = $_POST['rights'];
	
	// db-be írás:
	$query = "INSERT INTO users (uname, upass, name, email, rights) VALUES ('$userName', '$userPass', '$userRealName', '$userEmail', '$userRights');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Felhasználó rögzítve.';
		
	header("Location: $HOST/admin/?q=felhasznalok");
	exit;
}

// user utólagos aktiválása form feldolgozása:
if (isset($_POST['activateSubmit'])) {
  
	foreach ($_POST as $k => $v) {
		if ($k != 'activateSubmit') {
			$query = "UPDATE users SET active=1 WHERE id=$v";
			$result = $db->query($query);
			if ($db->errno) {
				die($db->error);
			}
		}
	}
	
	header("Location: $HOST/admin/?q=felhasznalok");
	exit;
}

