<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $startAddress = $_POST['startAddress'];
    $endAddress = $_POST['endAddress'];
    $moveDate = $_POST['moveDate'];
    
    $to = 'votre_email@example.com';
    $subject = 'Nouvelle demande de devis';
    $message = "Nom: $name\nEmail: $email\nNuméro de téléphone: $phone\nAdresse de départ: $startAddress\nAdresse d'arrivée: $endAddress\nDate du déménagement: $moveDate";
    $headers = 'From: ' . $email;
    
    if (mail($to, $subject, $message, $headers)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
