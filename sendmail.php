<?php
// Inkluder Composer autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Gmail SMTP-innstillinger
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'oberoihenri@gmail'; // Endre til din Gmail-adresse
    $smtpPassword = ''; // Endre til ditt Gmail-passord

    $to = "oberoihenri@gmail.com"; // Endre til mottakerens e-postadresse
    $subject = "Ny melding fra $name";
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Konfigurer SMTP-transport
    $transport = new Swift_SmtpTransport($smtpHost, $smtpPort, 'tls');
    $transport->setUsername($smtpUsername);
    $transport->setPassword($smtpPassword);

    // Opprett mailer
    $mailer = new Swift_Mailer($transport);

    // Opprett meldingsobjekt
    $messageObj = new Swift_Message($subject);
    $messageObj->setFrom([$email => $name]);
    $messageObj->setTo($to);
    $messageObj->setBody($message);

    // Send e-postmelding
    if ($mailer->send($messageObj)) {
        echo "Meldingen ble sendt.";
    } else {
        echo "Det oppstod en feil under sending av meldingen. Vennligst prøv igjen senere.";
    }
} else {
    echo "Ugyldig forespørsel.";
}
?>
