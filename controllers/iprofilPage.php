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
?>