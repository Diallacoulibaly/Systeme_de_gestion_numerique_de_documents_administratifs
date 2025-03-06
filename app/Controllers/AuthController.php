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

    //fonction pour s'inscrire


    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données envoyées via le formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Génération du token pour la confirmation
            $verifieToken = bin2hex(random_bytes(32));

            // Appel à la méthode register() dans le modèle User avec le rôle par défaut 'citoyen'
            if ($this->userModel->register($nom, $prenom, $adresse, $telephone, $email, $password, $verifieToken)) {
                // Envoi de l'email de confirmation
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
        $mail->SMTPAuth = true;
        $mail->Username = 'aboubacarbagayoko2000@gmail.com';
        $mail->Password = 'qhotmfmrujjuhwrr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // expediteur et destinataire
        $mail->setFrom('aboubacarbagayoko2000@gmail.com', 'GMAIL');
        $mail->addAddress($email);
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

                $_SESSION['message'] = 'Email ou mot de passe incorrect.';
                header("Location: index.php?action=login_form");

                // header("Location: index.php?action=register_form");
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

    //fonction verification de l'email
    public function maill()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $user = $this->userModel->maill($email);
            if ($user) {
                header("Location: index.php?action=reeni");
                exit;
            } else {
                echo "email incorrecte";
            }
        }
    }
    // fonction réenitialisation 
    public function reeni()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if ($pass1 === $pass2) {
                if ($this->userModel->reeni($pass1)) {
                    echo "Mot de passe réinitialisé avec succès.";
                } else {
                    echo "Mot de passe non réinitialisé.";
                }
            } else {
                echo "Les mots de passe ne correspondent pas.";
            }
        } else {
            header("Location: index.php?action=reeni_page");
            //include 'index.php?action=reeni_page';
        }
    }
}