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
// Aktuális lap betöltése:
switch ($page){
    case 'kezdolap';
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    case 'bemutatkozas';
        include('controllers/introductionPage.php');
        include('views/introductionPage.php');
        break;
    case 'kereses';
        include('controllers/keresesPage.php');
        include('views/keresesPage.php');
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
    case 'kijelentkezes';
        unset($_SESSION['logged']);
        include('controllers/frontPage.php');
        include('views/frontPage.php');
        break;
    default:
        $pageTitle = "404 error";
        include('views/404Page.php');
}

$db->close();

