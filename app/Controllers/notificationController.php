<?php
class NotificationController
{
    public function sendSMS($numero, $message)
    {
        $numero = escapeshellarg($numero);
        $message = escapeshellarg($message);

        $commande = "gammu --config C:\\gammu\\gammurc sendsms TEXT $numero -text $message";

        exec($commande, $output, $resultCode);

        if ($resultCode === 0) {
            return true;
        } else {
            return false;
        }
    }
}

// $notifier = new NotificationController();
//$notifier->sendSMS("+22391000000", "Votre demande est validée !");