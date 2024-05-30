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
$DateDemenagement2 = filter_var($_POST['DateDemenagement2'], FILTER_SANITIZE_STRING);
$Habitation = filter_var($_POST['habitation'], FILTER_SANITIZE_STRING);
$surfaceActuelle = filter_var($_POST['surfaceActuelle'], FILTER_SANITIZE_STRING);
$EtageDepart = filter_var($_POST['EtageDepart'], FILTER_SANITIZE_STRING);
$EtageArivee = filter_var($_POST['EtageArivee'], FILTER_SANITIZE_STRING);
$EmailAdr= filter_var($_POST['EmailAdr'], FILTER_SANITIZE_STRING);

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
    $mail->Body = "
    <div style='font-family: Arial, sans-serif; color: #ffffff; background-color: #0d47a1; max-width: 600px; margin: auto; padding: 20px; border-radius: 10px;'>
        <h2 style='color: #ffffff; margin-bottom: 20px; font-size: 24px;'>Nouvelle demande de devis</h2>
        <table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Nom et Prénom :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$nomPrenom}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Numéro de téléphone :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$numTel}</td>
            </tr>
            <tr>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>E-mail:</strong></td>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$EmailAdr}</td>
        </tr>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Adresse de départ :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$AdresseDepart}</td>
            </tr>
            <tr>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>*Etage de départ :</strong></td>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$EtageDepart}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Adresse d'arrivée :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$AdresseArivee}</td>
            </tr>
            <tr>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Etage d'arrivée :</strong></td>
            <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$EtageArivee}</td>
        </tr>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Première date possible :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$DateDemenagement}</td>
            </tr>
            <tr>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'><strong>Dernière date possible :</strong></td>
                <td style='padding: 10px; border-bottom: 1px solid #ffffff; font-size: 18px;'>{$DateDemenagement2}</td>
            </tr>
            <tr>
                <td style='padding: 10px; font-size: 18px;'><strong>Habitation :</strong></td>
                <td style='padding: 10px; font-size: 18px;'>{$Habitation}</td>
            </tr>
            <tr>
                <td style='padding: 10px; font-size: 18px;'><strong>Surface actuelle :</strong></td>
                <td style='padding: 10px; font-size: 18px;'>{$surfaceActuelle}</td>
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
