<?php

session_start();

require_once 'config.php';
$db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$db->set_charset('utf8');

// Aktuális lap kiválasztása:
$page = 'kezdolap';
if(isset($_GET['q'])){
    $page = $_GET['q'];
}
if(isset($_GET['iid'])){
    $_SESSION['iid'] = $_GET['iid'];
}
// Aktuális lap betöltése:
switch ($page){
    case 'kezdolap';
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    case 'profilok';
        include('controllers/profilesPage.php');
        include('views/profilesPage.php');
        break;
    case 'regisztracio';
        include('controllers/registrationPage.php');
        include('views/registrationPage.php');
        break;
    case 'kapcsolat';
        include('controllers/contactPage.php');
        include('views/contactPage.php');
        break;
    case 'profil';
        include('controllers/profilPage.php');
        include('views/profilPage.php');
        break;
    case 'iprofil';
        include('controllers/iprofilPage.php');
        include('views/iprofilPage.php');
        break;
    case 'uzenetek';
        include('controllers/messagePage.php');
        include('views/messagePage.php');
        break;
    case 'backMessage';
        include('controllers/backMessagePage.php');
        include('views/backMessagePage.php');
        break;
    case 'kijelentkezes';
        session_unset();
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    default:
        $pageTitle = "404 error";
        include('views/404Page.php');
}

$db->close();

