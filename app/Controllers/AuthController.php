<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../core/mail.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifier si le token CSRF n'existe pas déjà, sinon on en génère un
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un token unique
        }
    }

    private function filtrageEntrer($input)
    {
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

    private function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Protection CSRF contre les attaques
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $_SESSION['error'] = "Requête invalide.";
                header("Location: index.php?action=login_form#signup");
                exit();
            }

            // Filtrage des entrées utilisateur pour avoir le bon format
            $nom = $this->filtrageEntrer($_POST['nom']);
            $prenom = $this->filtrageEntrer($_POST['prenom']);
            $adresse = $this->filtrageEntrer($_POST['adresse']);
            $telephone = $this->filtrageEntrer($_POST['telephone']);
            $email = $this->filtrageEntrer($_POST['email']);
            $password = $_POST['password'];




            // Vérifications pour valider la saisi de l'utilisateur
            if (!$this->validateEmail($email)) {
                $_SESSION['error'] = "Email invalide.";
                header("Location: index.php?action=login_form#signup");
                exit();
            }

            if (strlen($password) < 8) {
                $_SESSION['error'] = "Le mot de passe doit contenir au moins 8 caractères.";
                header("Location: index.php?action=login_form#signup");
                exit();
            }

            if (!preg_match('/^[0-9]{8,15}$/', $telephone)) {
                $_SESSION['error'] = "Numéro de téléphone invalide.";
                header("Location: index.php?action=login_form#signup");
                exit();
            }

            // Vérification d'unicité de l'email
            if ($this->userModel->emailExists($email)) {
                $_SESSION['error'] = "Cet email est déjà utilisé.";
                header("Location: index.php?action=login_form#signup");
                exit();
            }
            // Lors de l'échec de la validation ou d'une erreur j'initialise la session pour garder ces information
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['adresse'] = $adresse;
            $_SESSION['email'] = $email;
            $_SESSION['telephone'] = $telephone;


            // Hachage sécurisé du mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(50));

            // Création de l'utilisateur
            if ($this->userModel->createUser($nom, $prenom, $adresse, $telephone, $email, $hashedPassword, $token)) {
                $link = BASE_URL . "action=verifyEmail&token=" . urlencode($token);
                $body = "Cliquez ici pour vérifier votre email : <a href='$link'>$link</a>";

                if (Mail::sendMail($email, "Vérification d'email", $body)) {
                    $_SESSION['success'] = "Un email de confirmation vous a été envoyé.";
                } else {
                    $_SESSION['error'] = "Échec de l'envoi de l'email.";
                }
            }
            // Réinitialiser les données du formulaire après un succès mais je garde l'email pour afficher sur login
            unset($_SESSION['nom']);
            unset($_SESSION['prenom']);
            unset($_SESSION['telephone']);
            unset($_SESSION['adresse']);
            header("Location: index.php?action=login_form#signin");
            exit();
        }
    }

    public function verifyEmail()
    {
        if (isset($_GET['token'])) {
            // Filtrage et validation du token
            $token = $this->filtrageEntrer($_GET['token']);

            // Vérification du token dans la base de données
            $user = $this->userModel->getUserByToken($token);

            if ($user && $this->userModel->verifyUser($token)) {
                // Mise à jour de l'état de l'utilisateur pour marquer son email comme vérifié
                $_SESSION['success'] = "Votre email a été vérifié avec succès ! Vous pouvez maintenant vous connecter.";
            } else {
                $_SESSION['error'] = "Le lien de vérification est invalide ou déjà utilisé.";
            }
        } else {
            $_SESSION['error'] = "Aucun token fourni.";
        }

        // Rediriger l'utilisateur vers la page de connexion ou une page de succès
        header("Location: index.php?action=login_form");
        exit();
    }


    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Vérifier si l'utilisateur existe
            $user = $this->userModel->getUserByEmail($email);

            if (!$user) {
                $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
                header("Location: index.php?action=login_form");
                die();
            }

            // Vérifier si le compte est activé (email vérifié)
            if ($user['email_verifie'] == 0) {
                $_SESSION['error'] = "Votre compte n'est pas encore activé. Veuillez vérifier votre email.";
                header("Location: index.php?action=login_form");
                die();
            }

            // Vérifier le mot de passe
            if (!password_verify($password, $user['password'])) {
                $_SESSION['error'] = "Mot de passe incorrect.";
                header("Location: index.php?action=login_form");
                die();
            }

            // Authentification réussie
            $_SESSION['user'] = $user;
            header("Location: index.php?action=dashboard");
            die();
        }
    }

    // La founction pour modifier un utilisateur

    public function updateProfile()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!isset($_SESSION['user'])) {
                header("Location: index.php?action=login_form");
                exit();
            }

            $id = $_SESSION['user']['id'];
            $nom = $this->filtrageEntrer($_POST['nom']);
            $prenom = $this->filtrageEntrer($_POST['prenom']);
            $adresse = $this->filtrageEntrer($_POST['adresse']);
            $email = $this->filtrageEntrer($_POST['email']);
            $telephone = $this->filtrageEntrer($_POST['telephone']);
            $photo_profil = $_SESSION['user']['photo_profil'];

            if (!$this->validateEmail($email)) {
                $_SESSION['error'] = "Email invalide.";
                header("Location: index.php?action=userProfil");
                exit();
            }

            if (!preg_match('/^[0-9]{8,15}$/', $telephone)) {
                $_SESSION['error'] = "Numéro de téléphone invalide.";
                header("Location: index.php?action=userProfil");
                exit();
            }

            if (isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/assets/images/profil/';
                $fileName = basename($_FILES['photo_profil']['name']);
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['photo_profil']['tmp_name'], $targetFilePath)) {
                        $photo_profil = $targetFilePath;
                    }
                }
            }

            if ($this->userModel->updateUser($id, $nom, $prenom, $adresse, $email, $telephone, $photo_profil)) {
                $_SESSION['user']['nom'] = $nom;
                $_SESSION['user']['prenom'] = $prenom;
                $_SESSION['user']['adresse'] = $adresse;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['telephone'] = $telephone;
                $_SESSION['user']['photo_profil'] = $photo_profil;

                $_SESSION['success'] = "Profil mis à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour.";
            }

            header("Location: index.php?action=userProfil");
            exit();
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?action=login_form");
        exit();
    }
}