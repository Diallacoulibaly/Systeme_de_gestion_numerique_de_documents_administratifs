<?php

use PHPMailer\PHPMailer\PHPMailer;
// app/Controllers/AuthController.php
require_once 'app/Models/User.php';
//pour faire appel au service phpMailer
require_once 'app/libs/PHPMailer/PHPMailer.php';
require_once 'app/libs/PHPMailer/SMTP.php';
require_once 'app/libs/PHPMailer/Exception.php';
session_start();

class AuthController
{
    private $userModel;
    // connexion a la base
    public function __construct($db)
    {
        $this->userModel = new User($db);
    }
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verifieToken = bin2hex(random_bytes(32));

            if ($this->userModel->register($nom, $prenom, $adresse, $telephone, $email, $password, $verifieToken)) {
                $this->envoyerConfirmationEmail($email, $verifieToken);
                // Message de succès et redirection vers la page de connexion
                $_SESSION['message'] = 'Inscription réussie. Un email de confirmation a été envoyé.';
                header("Location: index.php?action=login_form");
                exit;
            } else {
                // Message d'erreur et redirection vers le formulaire d'inscription
                $_SESSION['message'] = 'Erreur lors de l\'inscription. Veuillez réessayer.';
                header("Location: index.php?action=register_form");
                exit;
            }
        }
    }
    //fonction pour envoyer l'email de confirmation
    private function envoyerConfirmationEmail($email, $verifieToken)
    {
        $subject = "Confirmation de votre inscription";
        $confirmationLien = "http://localhost/Systeme_de_gestion_numerique_de_documents_administratifs-main/index.php?action=confirm&token=" . $verifieToken;
        $message =  "Cliquez sur ce lien pour confirmer votre inscription : $confirmationLien";
        // appelle le phpMailer
        $mail = new PHPMailer;

        // parametre du  serveur SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;                               // Active l'authentification SMTP
        $mail->Username = 'aboubacarbagayoko2000@gmail.com';    // metter votre vrai email par contre si votre email contient un double authentification cest impossible
        $mail->Password = 'qhotmfmrujjuhwrr';  // votre vrai mot de passe 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Sécuriser la connexion
        $mail->Port = 587;                                    // Port pour STARTTLS

        // expediteur et destinataire
        $mail->setFrom('aboubacarbagayoko2000@gmail.com', 'GMAIL'); // Adresse de l'administrateur cest a dire votre adresse mail ci dessus au niveau de setFrom(votreadressemail@gmail.com)
        $mail->addAddress($email);                             // Adresse de l'utilisateur qui s'inscrit
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Envoi de l'email
        if (!$mail->send()) {
            echo 'L\'email n\'a pas pu être envoyé.';
            echo 'Erreur: ' . $mail->ErrorInfo;
        } else {
            echo 'Un email de confirmation a été envoyé.';
        }
    }
    //fonction pour confirmer L'inscription
    public function confirm()
    {
        if (isset($_GET['verifieToken'])) {
            $verifieToken = $_GET['verifieToken'];
            if ($this->userModel->confirmUser($verifieToken)) {
                echo "Votre compte a été activé avec succès ! <a href='index.php?action=login_form'>Se connecter</a>";
            } else {
                echo "Lien invalide ou compte déjà activé.";
            }
        }
    }
    //fonction pour ce connecter
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=dashboard");
                exit;
            } else {
                header("Location: index.php?action=register_form");
                //echo "Email ou mot de passe incorrect.";
            }
        }
    }
    //fonction pour ce deconnecter
    public function logout()
    {
        session_destroy();
        header("Location: index.php?action=login_form");
        exit;
    }
}