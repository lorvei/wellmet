<?php

$pageTitle = "Profil";

// Profilképek:
if (isset($_SESSION['iid'])) {
    $query = "SELECT * FROM `profilkepek` WHERE profil_id=" . $_SESSION['iid'];
    $profilkepek = $db->query($query);
    if ($db->errno) {
        die($db->error);
    }
}

$profil = $db->query("SELECT p.*,u.uname,u.email FROM `profilok` AS p LEFT JOIN `users` AS u ON u.id=p.user_id WHERE p.id=" . $_SESSION['iid'])->fetch_assoc();

//var_dump($profil); die();


if (isset($_POST['msgSubmit'])) {
    $userID = $_SESSION['user_id'];
    $cimzett = $_POST['cimzett'];
    $idopont = date('Y-m-d H:i:s');
    $szoveg = $_POST['uMsg'];
    
    $error = false;
    if (empty($szoveg))
        $error = true;
    if ($error) {
        
    } else {
        $query = "INSERT INTO uzenetek (felado_id, cimzett_id, mikor, szoveg) VALUES "
                . "('$userID', '$cimzett', '$idopont','$szoveg')";
        $result = $db->query($query);
        if ($db->errno) {
            die($db->error);
        }
        $_SESSION['msgke'] = '<div id="uMsg" class="col-md-6">Üzenet elküldve.</div>';
    }
}