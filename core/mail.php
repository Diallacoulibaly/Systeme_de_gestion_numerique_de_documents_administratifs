<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php'; // Charger PHPMailer
require_once __DIR__ . '/../config/database.php'; // Charger la config SMTP

class Mail
{
    public static function sendMail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            // Configurer le serveur SMTP
            $mail->isSMTP();
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USER;
            $mail->Password   = SMTP_PASS;
            $mail->SMTPSecure = SMTP_SECURE;
            $mail->Port       = SMTP_PORT;

            // Paramètres de l'expéditeur et du destinataire
            $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
            $mail->addAddress($to);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            return $mail->send(); // Retourne true si l'email est envoyé
        } catch (Exception $e) {
            return false; // Retourne false si l'email échoue
        }
    }
}