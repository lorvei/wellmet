<?php

$pageTitle = "Üzenetek";


$query = "SELECT m.*,u.* FROM `uzenetek` AS m LEFT JOIN `users` AS u ON m.felado_id=u.id WHERE cimzett_id=" . $_SESSION['user_id'];
$uzi = $db->query($query);
if ($db->errno) {
    die($db->error);
}



if (isset($_POST['msgSubmit'])) {
    $felado = $_SESSION['user_id'];
    $cimzett = $_POST['cimzett_id'];
    $idopont = date('Y-m-d H:i:s');
    $szoveg = $_POST['uMsg'];

    $error = false;
    if (empty($szoveg))
        $error = true;
    if ($error) {
        
    } else {
        $query = "INSERT INTO uzenetek (felado_id, cimzett_id, mikor, szoveg) VALUES "
                . "('$felado', '$cimzett', '$idopont', '$szoveg')";
        $result = $db->query($query);
        if ($db->errno) {
            die($db->error);
        }
        $_SESSION['msgvke'] = '<div id="uMsg" class="col-md-6">Üzenet elküldve.</div>';
    }
}
/*
$query = "SELECT m.*,u.* FROM `uzenetek` AS m LEFT JOIN `users` AS u ON m.felado_id=u.id, m.cimzett_id=u.id";
$result = $db->query($query);
if ($db->errno) {
    die($db->error);
}

$tal = array();

$c = 0;
while ($uMsg = $result->fetch_array()) {
    $tal[$c]['felad'] = $uMsg['felado_id'];
    $tal[$c]['cim'] = $uMsg['cimzett_id'];
    $tal[$c]['ido'] = $uMsg['mikor'];
    $tal[$c]['uzi'] = $uMsg['szoveg'];

    $query = "SELECT * FROM `uzenetek` WHERE `cimzett_id`=" . $_SESSION['user_id'];
    if ($db->errno) {
        die($db->error);
    }

    $c++;
    header("Location: $HOST/?q=uzenetek");
    exit;

}
*/

