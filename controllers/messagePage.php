<?php

$pageTitle = "Üzenetek";


$query = "SELECT m.*,u.* FROM `uzenetek` AS m LEFT JOIN `users` AS u ON m.felado_id=u.id WHERE cimzett_id=". $_SESSION['user_id'] ." ORDER BY mikor DESC";
$uzi = $db->query($query);
if ($db->errno) {
    die($db->error);
}





