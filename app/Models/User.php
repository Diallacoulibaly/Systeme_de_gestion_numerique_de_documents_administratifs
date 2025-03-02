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
        ]) ? $verifieToken:false; 
    }
    // fonction pour activer le compte apres validation
    public function confirmUser($verifieToken){
    $stmt = $this->db->prepare("SELECT id FROM user WHERE verifieToken = :verifieToken AND is_active = 0");
    $stmt -> execute(['verifieToken'=>$verifieToken]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user){
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
}