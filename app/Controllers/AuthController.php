<?php
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../core/mail.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User(); // Initialisation correcte du modèle User
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(50));

            $userModel = new User();

            if ($userModel->emailExists($email)) {
                echo "Cet email est déjà utilisé.";
                return;
            }

            if ($userModel->createUser($nom, $prenom, $adresse, $telephone, $email, $password, $token)) {
                $link = BASE_URL . "localhost/projetTutorer/iDocsMali/views/verify?token=...
";
                $body = "Cliquez ici pour vérifier votre email : <a href='$link'>$link</a>";

                if (Mail::sendMail($email, "Vérification d'email", $body)) {
                    echo "Un email de confirmation vous a été envoyé.";
                } else {
                    echo "Échec de l'envoi de l'email.";
                }
            }
        }
    }

    public function verifyEmail()
    {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $userModel = new User();

            if ($userModel->verifyUser($token)) {
                echo "Email vérifié avec succès !";
            } else {
                echo "Lien invalide.";
            }
        }
    }

    public function resetPasswordRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $userModel = new User();

            if (!$userModel->emailExists($email)) {
                echo "Aucun compte trouvé.";
                return;
            }

            $token = bin2hex(random_bytes(50));
            $userModel->storeResetToken($email, $token);

            $link = BASE_URL . "auth/reset?token=$token";
            $body = "Cliquez ici pour réinitialiser votre mot de passe : <a href='$link'>$link</a>";

            if (Mail::sendMail($email, "Réinitialisation du mot de passe", $body)) {
                echo "Email envoyé.";
            } else {
                echo "Erreur d'envoi.";
            }
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $userModel = new User();

            if ($userModel->updatePassword($token, $newPassword)) {
                echo "Mot de passe réinitialisé.";
            } else {
                echo "Lien invalide.";
            }
        }
    }


    // ✅ Connexion de l'utilisateur
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Vérifier si l'utilisateur existe

            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['mot_de_passe'])) {
                // Stocker l'utilisateur en session
                $_SESSION['user'] = $user;
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                $_SESSION['error'] = "Identifiants incorrects.";
                header("Location: index.php?action=login_form");
                exit();
            }
        }
    }

    public function updateProfile()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_SESSION['user']['id'];
            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $adresse = trim($_POST['adres$adresse']);
            $email = trim($_POST['email']);
            $telephone = trim($_POST['telephone']);
            $photo_profil = $_SESSION['user']['photo_profil']; // Garde l'ancienne photo si pas de nouvelle

            // ✅ Gestion du téléchargement de l'image
            if (isset($_FILES['photo_profil']) && $_FILES['photo_profil']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = 'public/assets/images/';
                $fileName = basename($_FILES['photo_profil']['name']);
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Autoriser seulement certaines extensions
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($_FILES['photo_profil']['tmp_name'], $targetFilePath)) {
                        $photo_profil = $targetFilePath; // Met à jour la photo
                    }
                }
            }

            // ✅ Mise à jour des informations de l'utilisateur
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


    // ✅ Déconnexion de l'utilisateur
    public function logout()
    {
        session_start();
        session_destroy(); // Détruit la session
        header("Location: index.php?action=login_form");
        exit();
    }
}