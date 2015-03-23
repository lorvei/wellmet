<?php

$pageTitle = "Kapcsolat";



// Üzenetküldés feldolgozása:
if(isset($_POST['contactSubmit'])) {
    
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $message = $_POST['contactMessage'];
    
    $emailmessage = "Üzenet a weboldalról:\n\n";
    $emailmessage .= "Feladó neve: $name\n";
    $emailmessage .= "email címe: $email\n";
    $emailmessage .= "\nÜzenet:\n\n";
    $emailmessage .= $message;
    
    
    mail('kovacs.m94@gmail.com'. 'KPortal üzenet'. $emailmessage);
    
}
