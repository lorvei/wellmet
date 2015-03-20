<?php

function filename_only($name) {
    $parts = explode('.', $name);
    $filename = $parts[0];
    for ($i = 1; $i < count($parts) - 1; $i++) {
        $filename .= '.' . $parts[$i];
    }
    return $filename;
}

function extension_only($name) {
    $parts = explode('.', $name);
    return $parts[count($parts) - 1];
}

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

// feltöltés form feldolgozása:
if (isset($_POST['uploadSubmit'])) {

    $target = "profilepictures/"; //célmappa
    $timeNow = time();
    //var_dump($_FILES); die();
    $file_name = filename_only($_FILES['upload']['name']) . '-' . $timeNow . '.' . extension_only($_FILES['upload']['name']);
    $tmp_dir = $_FILES['upload']['tmp_name']; //az ideiglenes mappa helyét a $tmp_dir változóban tároljuk


    if (!preg_match('/(jpg|png)$/i', $file_name)) { //csak jpg és png fájlt fogadunk el
        $_SESSION['mesg'] = "Rossz fájltípus!";
    } else {
        move_uploaded_file($tmp_dir, $target . $file_name); //az ideiglenes mappából átteszi a fájlt a végleges mappába
        $_SESSION['mesg'] = "Fájl feltöltve.";

        $profId = $_SESSION['profil_id'];
        $kepLeir = 'leiras';

        $query = "INSERT INTO profilkepek (profil_id, filenev, leiras) VALUES "
                . "($profId, '$file_name', '$kepLeir')";

        $db->query($query);
        if ($db->errno) {
            die($db->error);
        }
    }
}

// Profilképek:
if (isset($_SESSION['profil_id'])) {
    $query = "SELECT * FROM `profilkepek` WHERE profil_id=" . $_SESSION['profil_id'];
    $profilkepek = $db->query($query);
    if ($db->errno) {
        die($db->error);
    }
}


// users form feldolgozása:
if (isset($_POST['profilokSubmit'])) {

    $userID = $_SESSION['user_id'];
    $nem = $_POST['nem'];
    $_SESSION['nem'] = $nem;
    $szuletesiDatum = $_POST['ev'] . '-' . $_POST['ho'] . '-' . $_POST['nap'];
    $registracioDatum = date('Y-m-d');
    $profilMegye = $_POST['megye'];
    $_SESSION['megye'] = $profilMegye;
    $profilBemutatkozas = $_POST['bemutatkozas'];
    $_SESSION['bemutatkozas'] = $profilBemutatkozas;
    $eKor = '';
    if (isset($_POST['eKFut'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'futás';
    }
    if (isset($_POST['eKAuto'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'autók';
    }
    if (isset($_POST['eKPc'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'PC';
    }
    if (isset($_POST['eKSport'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'sport';
    }
    if (isset($_POST['eKPolitika'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'politika';
    }
    if (isset($_POST['eKIvaszat'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'ivászat';
    }
    if (isset($_POST['eKAnime'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'animék';
    }
    if (isset($_POST['eKZene'])) {
        if ($eKor != '')
            $eKor .= ', ';
        $eKor .= 'zenék';
    }
    // ...
    // db-be írás:
    $query = "INSERT INTO profilok (user_id, nem, szuletesi_datum, registracio_datum, megye, bemutatkozas, erdeklodesi_kor) VALUES "
            . "('$userID', '$nem', '$szuletesiDatum', '$registracioDatum','$profilMegye', '$profilBemutatkozas', '$eKor');";



    $result = $db->query($query);
    if ($db->errno) {
        die($db->error);
    }

    $_SESSION['masg'] = 'Profil adatok rögzítve.';
    $profilkepek = $db->query("SELECT * FROM profilkepek WHERE profil_id=" . $_SESSION['profil_id'])->fetch_assoc();
    $_SESSION['filenev'] = $profilkepek['filenev'];
    $profil = $db->query("SELECT * FROM profilok WHERE user_id=" . $_SESSION['user_id'])->fetch_assoc();
    $_SESSION['profil_id'] = $profil['id'];
    $_SESSION['eKor'] = $profil['erdeklodesi_kor'];
    $_SESSION['szuletesiDatum'] = $profil['szuletesi_datum'];
    $_SESSION['megye'] = $profil['megye'];
    header("Location: $HOST/?q=profil");
}
if (isset($_POST['profilDelete'])) {



    // db-ből törlés:
    $query = "DELETE FROM profilok WHERE user_id=" . $_SESSION['user_id'];
    $result = $db->query($query);
    if ($db->errno) {
        die($db->error);
    }

    
    $profil = $db->query("SELECT id FROM profilok WHERE user_id=" . $_SESSION['user_id'])->fetch_assoc();
    $_SESSION['profil_id'] = $profil['id'];

    header("Location: $HOST/?q=profil");
    exit;
}
?>