<?php
require_once __DIR__ . '/../../core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    //************** Gestion authentification ****************//

    public function createUser($nom, $prenom, $adresse, $telephone, $email, $password, $token)
    {
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, adresse, telephone, email, password, verifieToken, email_verifie, role) VALUES (?, ?, ?, ?, ?, ?, ?, 0, 'citoyen')");
        return $stmt->execute([$nom, $prenom, $adresse, $telephone, $email, password_hash($password, PASSWORD_DEFAULT), $token]);
    }

    public function getUserByToken($token)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE verifieToken = :token");
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyUser($token)
    {
        $stmt = $this->db->prepare("UPDATE `user` SET email_verifie = 1, verifieToken = NULL WHERE verifieToken = :token");
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function emailExists($email)
    {
        $stmt = $this->db->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    public function storeResetToken($email, $token)
    {
        $stmt = $this->db->prepare("UPDATE `user` SET verifieToken = ? WHERE email = ?");
        return $stmt->execute([$token, $email]);
    }

    public function updatePassword($token, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE `user` SET password = ?, verifieToken = NULL WHERE verifieToken = ?");
        return $stmt->execute([$hashedPassword, $token]);
    }

    public function deleteResetToken($email)
    {
        $stmt = $this->db->prepare("UPDATE `user` SET verifieToken = NULL WHERE email = ?");
        return $stmt->execute([$email]);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //************** Gestion utilisateur ****************//

    public function getRole($userId)
    {
        $stmt = $this->db->prepare("SELECT role FROM user WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchColumn();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($id, $nom, $prenom,  $adresse, $email, $telephone, $photo_profil = null)
    {
        if ($photo_profil) {
            $stmt = $this->db->prepare("UPDATE `user` SET nom = ?, prenom = ?, adresse = ?, email = ?, telephone = ?, photo_profil = ?, updated_at = NOW() WHERE id = ?");
            return $stmt->execute([$nom, $prenom, $adresse, $email, $telephone, $photo_profil, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE `user` SET nom = ?, prenom = ?, adresse = ?, email = ?, telephone = ?, updated_at = NOW() WHERE id = ?");
            return $stmt->execute([$nom, $prenom, $adresse, $email, $telephone, $id]);
        }
    }

    public function updateRole($userId, $newRole)
    {
        $stmt = $this->db->prepare("UPDATE `user` SET role = ? WHERE id = ?");
        return $stmt->execute([$newRole, $userId]);
    }

    public function updatePasswordProfile($userId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE `user` SET password = ?, updated_at = NOW() WHERE id = ?");
        return $stmt->execute([$hashedPassword, $userId]);
    }

    public function logConnexion($userId, $ip_adresse)
    {
        $stmt = $this->db->prepare("INSERT INTO historique_connexions (user_id, ip_adresse, date_connexion) VALUES (?, ?, NOW())");
        return $stmt->execute([$userId, $ip_adresse]);
    }

    public function logAction($userId, $action)
    {
        $stmt = $this->db->prepare("INSERT INTO historique_actions (user_id, action, date_action) VALUES (?, ?, NOW())");
        return $stmt->execute([$userId, $action]);
    }

    public function getHistoriqueConnexions($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM historique_connexions WHERE user_id = ? ORDER BY date_connexion DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistoriqueActions($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM historique_actions WHERE user_id = ? ORDER BY date_action DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}