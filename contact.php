<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que l'autoload de Composer est correctement inclus

// Récupérer les données du formulaire
$nomPrenom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
$numTel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration du serveur
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'wassimk96@gmail.com'; // Remplacez par votre adresse email
    $mail->Password = 'dolkitbmozhiyzbd'; // Mettez le mot de passe d'application ici
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Destinataires
    $mail->setFrom('wassimk96@gmail.com', 'Message d\'un client');
    $mail->addAddress('wassimusausausa@gmail.com'); // Remplacez par l'adresse email de réception

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Message d\'un client';
    $mail->Body = "
    <div style='font-family: Arial, sans-serif; color: #ffffff; background-color: #0f0f2f; max-width: 600px; margin: auto; padding: 20px; border-radius: 10px;'>
        <h2 style='color: #ffffff; margin-bottom: 20px; font-size: 24px;'>Message d'un client</h2>
        <p style='font-size: 18px;'><strong>Nom et Prénom :</strong> {$nomPrenom}</p>
        <p style='font-size: 18px;'><strong>Adresse e-mail :</strong> {$email}</p>
        <p style='font-size: 18px;'><strong>Numéro de téléphone :</strong> {$numTel}</p>
        <p style='font-size: 18px;'><strong>Message :</strong> {$message}</p>
    </div>
";

    // Envoyer l'email
    $mail->send();
    echo json_encode(['status' => 'success']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
}

