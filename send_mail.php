<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomPrenom = $_POST["nomPrenom"];
    $numTel = $_POST["numTel"];
    $adresseDepart = $_POST["AdresseDepart"];
    $adresseArrivee = $_POST["AdresseArivee"];
    $dateDemenagement = $_POST["DateDemenagement"];
    $surfaceActuelle = $_POST["surfaceActuelle"];

    // Construire le contenu de l'e-mail
    $to = "wassimusausausa@gmail.com";
    $subject = "Demande de devis de déménagement";
    $message = "Nom et Prénom: $nomPrenom\n";
    $message .= "Numéro de téléphone: $numTel\n";
    $message .= "Adresse de départ: $adresseDepart\n";
    $message .= "Adresse d'arrivée: $adresseArrivee\n";
    $message .= "Date de déménagement: $dateDemenagement\n";
    $message .= "Surface actuelle: $surfaceActuelle\n";

    // Envoyer l'e-mail
    mail($to, $subject, $message);

    // Rediriger l'utilisateur vers une page de confirmation
    header("Location: index.html");
    exit;
}
?>
