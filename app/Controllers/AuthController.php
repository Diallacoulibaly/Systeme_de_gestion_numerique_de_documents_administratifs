<?php
// app/Controllers/AuthController.php
require_once 'app/Models/User.php';
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
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->register($nom, $prenom, $adresse, $telephone, $email, $password, $role = 'citoyen')) {
                echo "Inscription réussie ! <a href='index.php?action=login_form'>Se connecter</a>";
            } else {
                echo "Erreur lors de l'inscription.";
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

                header("Location: index.php?action=login_form");

                // header("Location: index.php?action=register_form");

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
