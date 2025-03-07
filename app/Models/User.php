<?php
require_once __DIR__ . '/../../core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function createUser($nom, $prenom, $adresse, $telephone, $email, $password, $token)
    {
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, adresse, telephone, email, password, verifieToken, email_verifie) VALUES (?, ?, ?, ?, ?, ?, ?, 0)");
        return $stmt->execute([$nom, $prenom, $adresse, $telephone, $email, $password, $token]);
    }

    public function verifyUser($token)
    {
        $stmt = $this->db->prepare("UPDATE user SET email_verifie = 1, verifieToken = NULL WHERE verifieToken = ?");
        return $stmt->execute([$token]);
    }

    public function emailExists($email)
    {
        $stmt = $this->db->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    public function storeResetToken($email, $token)
    {
        $stmt = $this->db->prepare("UPDATE user SET verifieToken = ? WHERE email = ?");
        return $stmt->execute([$token, $email]);
    }

    public function updatePassword($token, $newPassword)
    {
        $stmt = $this->db->prepare("UPDATE user SET password = ?, verifieToken = NULL WHERE verifieToken = ?");
        return $stmt->execute([$newPassword, $token]);
    }
    // ✅ Récupérer un utilisateur par email
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ Mise à jour des informations de l'utilisateur
    public function updateUser($id, $nom, $prenom, $adresse, $email, $telephone, $photo_profil)
    {
        $stmt = $this->db->prepare("UPDATE user SET :nom, :prenom, :email, :adresse, :telephone, :photo_profil WHERE id = :id");
        return $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'adresse' => $adresse,
            'telephone' => $telephone,
            'photo_profil' => $photo_profil,
            'id' => $id
        ]);
    }
}