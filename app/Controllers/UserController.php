<?php

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    //  Mise à jour du profil utilisateur
    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $userId = $_SESSION['user_id'] ?? null;
            if (!$userId) {
                $_SESSION['error'] = "Utilisateur non authentifié.";
                header("Location: index.php?action=profile");
                exit();
            }

            // Nettoyage des entrées
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $adresse = trim($_POST['adresse'] ?? '');
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $telephone = trim($_POST['telephone'] ?? '');

            // Vérification de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "L'adresse email n'est pas valide.";
                header("Location: index.php?action=profile");
                exit();
            }

            // Vérification du format du téléphone (exemple : 8 à 12 chiffres)
            if (!preg_match('/^\d{8,12}$/', $telephone)) {
                $_SESSION['error'] = "Le numéro de téléphone doit contenir entre 8 et 12 chiffres.";
                header("Location: index.php?action=profile");
                exit();
            }

            // Gestion de la photo de profil
            $photo_path = null;
            if (!empty($_FILES['photo']['name'])) {
                $photo = $_FILES['photo']['name'];
                $photo_tmp = $_FILES['photo']['tmp_name'];
                $photo_size = $_FILES['photo']['size'];
                $photo_ext = strtolower(pathinfo($photo, PATHINFO_EXTENSION));

                $uploadDir = "uploads/profile/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($photo_ext, $allowedExtensions)) {
                    $_SESSION['error'] = "Format d'image non autorisé. Utilisez JPG, JPEG, PNG ou GIF.";
                    header("Location: index.php?action=profile");
                    exit();
                }

                if ($photo_size > 2 * 1024 * 1024) { // 2 Mo max
                    $_SESSION['error'] = "L'image est trop volumineuse. Taille maximale : 2 Mo.";
                    header("Location: index.php?action=profile");
                    exit();
                }

                $photo_path = $uploadDir . uniqid() . '.' . $photo_ext;
                if (!move_uploaded_file($photo_tmp, $photo_path)) {
                    $_SESSION['error'] = "Erreur lors de l'upload de l'image.";
                    header("Location: index.php?action=profile");
                    exit();
                }
            }

            if ($this->userModel->updateProfile($userId, $nom, $prenom, $adresse, $email, $telephone, $photo_path)) {
                $_SESSION['success'] = "Profil mis à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour du profil.";
            }

            header("Location: index.php?action=profile");
            exit();
        }
    }


    // 🔹 Changement du mot de passe
    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $userId = $_SESSION['user_id'] ?? null;
            if (!$userId) {
                $_SESSION['error'] = "Utilisateur non authentifié.";
                header("Location: index.php?action=profile");
                exit();
            }

            $oldPassword = $_POST['old_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Vérifier si l'utilisateur existe
            $user = $this->userModel->getUserById($userId);
            if (!$user || !password_verify($oldPassword, $user['mot_de_passe'])) {
                $_SESSION['error'] = "Ancien mot de passe incorrect.";
                header("Location: index.php?action=profile");
                exit();
            }

            if ($newPassword !== $confirmPassword) {
                $_SESSION['error'] = "Les nouveaux mots de passe ne correspondent pas.";
                header("Location: index.php?action=profile");
                exit();
            }

            // Sécurisation du nouveau mot de passe
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            if ($this->userModel->updatePassword($userId, $hashedPassword)) {
                $_SESSION['success'] = "Mot de passe modifié avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la modification du mot de passe.";
            }

            header("Location: index.php?action=profile");
            exit();
        }
    }

    // 🔹 Mise à jour du rôle utilisateur
    public function updateUserRole()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Vérifier si l'utilisateur est super admin
            if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'superAdmin') {
                $_SESSION['error'] = "Accès refusé.";
                header("Location: index.php?action=dashboard");
                exit();
            }

            $userId = $_POST['user_id'] ?? null;
            $newRole = $_POST['role'] ?? null;

            if (!$userId || !$newRole) {
                $_SESSION['error'] = "Données manquantes.";
                header("Location: index.php?action=dashboard");
                exit();
            }

            if ($this->userModel->updateRole($userId, $newRole)) {
                $_SESSION['success'] = "Rôle mis à jour avec succès.";
            } else {
                $_SESSION['error'] = "Erreur lors de la mise à jour du rôle.";
            }

            header("Location: index.php?action=dashboard");
            exit();
        }
    }
    public function userList()
    {
        $users = $this->userModel->getAllUsers();
        var_dump($users);
        include("view/user/liste.php");
    }
}
