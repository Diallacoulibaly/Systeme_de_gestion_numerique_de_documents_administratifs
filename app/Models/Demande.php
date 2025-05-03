<?php
class Demande {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDemandes() {
        $stmt = $this->db->prepare("SELECT * FROM demandes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDemandeById($id) {
        $stmt = $this->db->prepare("SELECT * FROM demandes WHERE id = :id");
        $stmt->execute(['id' => $id]);  
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatut($id, $statut) {
        $stmt = $this->db->prepare("UPDATE demandes SET statut = :statut WHERE id = :id");
        return $stmt->execute(['statut' => $statut, 'id' => $id]);
    }
    public function deleteDemande($id) {
        $stmt = $this->db->prepare("DELETE FROM demandes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}