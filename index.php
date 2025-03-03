<?php
// ce fichier nous permet de controller l'acces

// Vérifier si un utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    header("Location: index.php?action=dashboard");
    exit();
}

// Vérifier si 'action' est présent, sinon rediriger vers la page de connexion
if (!isset($_GET['action'])) {
    header("Location: index.php?action=login_form");
    exit();
}

require_once 'config/database.php';
require_once 'app/Controllers/AuthController.php';
/* include "views/layout.php";
$content = "views/dashboard.php"; */

$authController = new AuthController($pdo);

// Vérifier si un utilisateur est déjà connecté
if (!isset($_GET['action'])) {
    header("Location: index.php?action=login_form");
    exit();
}

$action = $_GET['action'];
<<<<<<< HEAD

=======
>>>>>>> 6e7aacee603d3fe8571515d56dfd0b703b33ab48
$authPages = ['login_form', 'register_form']; // Pages qui utilisent auth_layout

switch ($action) {
    case 'register':
        $authController->register();
        exit();
    case 'login':
        $authController->login();
        exit();
    case 'logout':
        $authController->logout();
        exit();
    case 'register_form':
        $page = "register";
        break;
    case 'login_form':
        $page = "login";
        break;
    case 'dashboard':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login_form");
            exit();
        }
        $page = "dashboard";
        break;
    default:
        $page = "404"; // Page d'erreur (à créer rien pour le moment )
}

// Déterminer le bon layout à utiliser
if (in_array($action, $authPages)) {
    require "Views/auth_layout.php";
} else {
    require "Views/layout.php";
}
