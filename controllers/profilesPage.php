<?php

$pageTitle = "Profilok";

//ellen nem
$where = (isset($_SESSION['nem'])) ? "WHERE nem<>'" . $_SESSION['nem'] . "'" : "";

//$query = "SELECT p.*,u.uname,pk.filenev FROM `profilok` AS p JOIN `users` AS u LEFT JOIN `profilkepek` AS pk ON p.user_id=u.id AND p.id=pk.profil_id $where ORDER BY registracio_datum DESC LIMIT 10";
$query = "SELECT p.*,u.uname FROM `profilok` AS p JOIN `users` AS u ON p.user_id=u.id $where ORDER BY registracio_datum DESC LIMIT 10";
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

if (isset($_POST['pSearchSubmit'])) {

    $where = '';

    $profilEKor = $_POST['erdeklodesi_kor'];
    if (!empty($profilEKor))
        $where.= (!empty($where)) ? " AND p.erdeklodesi_kor LIKE '%$profilEKor%'" : "p.erdeklodesi_kor LIKE '%$profilEKor%'";
    $usersUname = $_POST['uname'];
    if (!empty($usersUname))
        $where.= (!empty($where)) ? " AND u.uname LIKE '%$usersUname%'" : "u.uname LIKE '%$usersUname%'";
    $profilMegye = $_POST['megye'];
    if (!empty($profilMegye))
        $where.= (!empty($where)) ? " AND p.megye LIKE '%$profilMegye%'" : "p.megye LIKE '%$profilMegye%'";

    if (!empty($_POST['korTol'])) {
        $korTol = (date('Y') - $_POST['korTol']) . date('-m-d');
        $where.= (!empty($where)) ? " AND szuletesi_datum <= '$korTol'" : "szuletesi_datum <= '$korTol'";
    }

    if (!empty($_POST['korIg'])) {
        $korIg = (date('Y') - $_POST['korIg']) . date('-m-d');
        $where.= (!empty($where)) ? " AND szuletesi_datum >= '$korIg'" : "szuletesi_datum >= '$korIg'";
    }

    $query = (!empty($where)) ? "SELECT p.*,u.uname FROM `profilok` AS p JOIN `users` AS u ON p.user_id=u.id WHERE $where" : "SELECT p.*,u.uname FROM `profilok` AS p JOIN `users` AS u ON p.user_id=u.id";
    $found = $db->query($query);
    if ($db->errno) {
        die($db->error);
    }
    
    //profilok kiírása
    $_SESSION['sresult'] = array();
    $c = 0;
    while ($profilok = $found->fetch_array()) {
        $_SESSION['sresult'][$c]['uname'] = $profilok['uname'];
        $_SESSION['sresult'][$c]['szuletesiDatum'] = $profilok['szuletesi_datum'];
        $_SESSION['sresult'][$c]['nem'] = $profilok['nem'];
        $_SESSION['sresult'][$c]['megye'] = $profilok['megye'];
        $_SESSION['sresult'][$c]['id'] = $profilok['id'];

        $query = "SELECT * FROM `profilkepek` WHERE `profil_id`=" . $profilok['id'];
        $_SESSION['sresult'][$c]['profilkep'] = $db->query($query)->fetch_array();
        if ($db->errno) {
            die($db->error);
        }

        $c++;
    }


    header("Location: $HOST/?q=profilok");
    exit;
}