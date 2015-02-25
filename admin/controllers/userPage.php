<?php

$pageTitle = "Felhasználók rögzítése";

// login form feldolgozása:
if (isset($_POST['userSubmit'])) {
    include ('views/includes/header.php');

    $usersUname = $_POST['userName'];
    $usersUpass = $_POST['userPass'];
    $email = $_POST['email'];
    

    // db-be írás:

$query = "INSERT INTO users (id, uname, upass, email) VALUES (NULL, '$usersUname', '$usersUpass', '$email');";
 $result = $db->query($query);
 if ($db->errno) {
  die($db->error);
 }
    $_SESSION['msg'] = 'Felhasználó rögzítve.';
    header("Location: ?q=felhasznalok");



    include ('views/includes/footer.php');
    die();
}
?>