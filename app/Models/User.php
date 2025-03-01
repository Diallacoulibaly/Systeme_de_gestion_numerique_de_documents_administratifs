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

    // Inscription d'un utilisateur avec rôle par défaut "user"
    public function register($nom, $prenom, $adrese, $telephone, $email, $password, $role = 'Citoyen')
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, adresse, telephone, email, password, role) VALUES (:nom, :prenom, :adresser, :telephone, :email, :password, :role)");
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'adrese' => $adrese,
            'telephone' => $telephone,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ]);
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
}
