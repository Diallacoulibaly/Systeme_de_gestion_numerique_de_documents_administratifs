<?php
require_once 'app/Models/Demande.php';  

class AgentController {
    private $demandeModel;

    public function __construct($db) {
        $this->demandeModel = new Demande($db);
    }
    // Fonction pour afficher le tableau de bord de l'agent
    public function dashboard() {
        $demande = $this->demandeModel->getDemandes();
        include 'views/dashboard.php';
    }
    // Fonction pour afficher les détails d'une demande
    public function afficherDemande($id) {
        $demande = $this->demandeModel->getDemandeById($id);
        include 'views/demande/admin/demande_details.php';
    }   
    
    // Fonction pour mettre à jour le statut d'une demande
    public function updateStatut($id, $statut) {
    $this->demandeModel->updateStatut($id, $statut);
    header("Location: index.php?action=dashboard"); // Redirection vers le tableau de bord après la mise à jour
    }

    // Fonction pour supprimer une demande
    public function deleteDemande($id) {
        $this->demandeModel->deleteDemande($id);
        header("Location: index.php?action=dashboard"); // Redirection vers le tableau de bord après la suppression
    }
}