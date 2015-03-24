<?php

$pageTitle = "Regisztráció";

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
if (isset($_POST['usersSubmit'])) {
    
	$userName = $_POST['uname'];
	$userPass = (!empty($_POST['upass'])) ? crypt($_POST['upass']) : '';
	$userRealName = $_POST['name'];
	$userEmail = $_POST['email'];
	//$userRights = $_POST['rights'];
        $userRights = 4;    // Alap érték: Felhasználó
	$userActive = 1;    //Alap érték: Aktív
        
        $error=false;
	if(empty($userName) || empty($userPass) || empty($userRealName) || empty($userEmail)) $error=true;
        if($error){
            $_SESSION['msg'] = 'Hiányzó adat, <a href="?q=profilok">próbáld újra!</a>';
        }else{
        
	// db-be írás:
	$query = "INSERT INTO users (uname, upass, name, email, rights, active) VALUES "
                . "('$userName', '$userPass', '$userRealName', '$userEmail', '$userRights', '$userActive');";
	$result = $db->query($query);
	if ($db->errno) {
		die($db->error);
	}
	
	$_SESSION['msg'] = 'Sikeres regisztráció.';
        }
	header("Location: $HOST/?q=regisztracio");
	exit;
}

?>