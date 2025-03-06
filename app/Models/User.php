<?php
// app/Models/User.php
require_once 'config/database.php';

class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    // Inscription d'un utilisateur avec rôle par défaut "Citoyen"


    public function register($nom, $prenom, $adresse, $telephone, $email, $password, $role = 'utilisateur')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $verifieToken = bin2hex(random_bytes(32));
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, adresse, telephone, email, password, role,verifieToken,is_active) VALUES (:nom, :prenom, :adresse, :telephone, :email, :password, :role,:verifieToken,0)");
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,
            'telephone' => $telephone,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role = 'utilisateur',
            'verifieToken' => $verifieToken,
        ]) ? $verifieToken : false;
    }
    // fonction pour activer le compte apres validation
    public function confirmUser($verifieToken)
    {
        $stmt = $this->db->prepare("SELECT id FROM user WHERE verifieToken = :verifieToken AND is_active = 0");
        $stmt->execute(['verifieToken' => $verifieToken]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $stmt = $this->db->prepare("UPDATE user SET is_active = 1, token = NULL WHERE id = :id");
            return $stmt->execute(['id' => $user['id']]);
        }
        return false;
    }

    // Connexion de l'utilisateur
    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    // verification du email
    public function maill($email)
    {
        $emailv = $email;
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }
    // Réinitialisation du mot de passe
    public function reeni($pass1)
    {
        //session_start(); // Démarrer la session

        if (isset($pass1) && !empty($pass1)) {
            if (!isset($_SESSION['user']['email'])) {
                return false; // Empeche l'exécution si l'email n'est pas défini
            }

            $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
            $email = $_SESSION['user']['email'];

            // Préparation et exécution de la requête SQL
            $stmt = $this->db->prepare("UPDATE user SET password = :password WHERE email = :email");
            $stmt->execute([
                'password' => $hashedPassword,
                'email' => $email
            ]);

            return true;
        } else {
            return false;
        }
    }
}
/* 
            if($user['is_active']== 1){
            return $user;
        }
        else {
            echo "Veuillez confirmer votre email avant de vous connecter.";
            return false;
        }
        }
        return false;
    }
} */