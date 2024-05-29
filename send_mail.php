<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous que l'autoload de Composer est correctement inclus

// Récupérer les données du formulaire
$nomPrenom = filter_var($_POST['nomPrenom'], FILTER_SANITIZE_STRING);
$numTel = filter_var($_POST['numTel'], FILTER_SANITIZE_STRING);
$AdresseDepart = filter_var($_POST['AdresseDepart'], FILTER_SANITIZE_STRING);
$AdresseArivee = filter_var($_POST['AdresseArivee'], FILTER_SANITIZE_STRING);
$DateDemenagement = filter_var($_POST['DateDemenagement'], FILTER_SANITIZE_STRING);
$surfaceActuelle = filter_var($_POST['surfaceActuelle'], FILTER_SANITIZE_STRING);

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
    $mail->setFrom('wassimk96@gmail.com', 'Demande de devis');
    $mail->addAddress('wassimusausausa@gmail.com'); // Remplacez par votre adresse email de réception

    // Contenu de l'email
    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle demande de devis';
       $mail->Body    = "
        <div style='font-family: Arial, sans-serif; color: #333; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9; max-width: 600px; margin: auto;'>
            <h2 style='color: #0066cc;'>Nouvelle demande de devis</h2>
            <table style='width: 100%; border-collapse: collapse;'>
                <tr>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Nom et Prénom:</strong></td>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$nomPrenom}</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Numéro de téléphone:</strong></td>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$numTel}</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Adresse de départ:</strong></td>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$AdresseDepart}</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Adresse d'arrivée:</strong></td>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$AdresseArivee}</td>
                </tr>
                <tr>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Date de déménagement:</strong></td>
                    <td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$DateDemenagement}</td>
                </tr>
                <tr>
                    <td style='padding: 10px;'><strong>Surface actuelle:</strong></td>
                    <td style='padding: 10px;'>{$surfaceActuelle}</td>
                </tr>
            </table>
        </div>
    ";

    // Envoyer l'email
    $mail->send();
    echo json_encode(['status' => 'success']);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
}
