<?php
session_start();

// Vérifier si un utilisateur est déjà connecté et veut accéder au dashboard
if (isset($_SESSION['user']) && (!isset($_GET['action']) || $_GET['action'] == 'login_form')) {
    header("Location: index.php?action=dashboard");
    exit();
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
// Inclure les dépendances principales
require_once 'config/database.php';
require_once 'core/Router.php';
require_once 'app/Controllers/AuthController.php';

// Initialisation du contrôleur d'authentification
$authController = new AuthController();
// Récupérer l'action depuis l'URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login_form';
//var_dump($action);
// Pages nécessitant le layout d'authentification
$authPages = ['login_form', 'register_form', "verifyEmail", 'reeni_page'];

// Gestion des actions et des vues
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
    case 'verifyEmail':
        $authController->verifyEmail();
        break;

    /* case "verifyEmail":
        $authController->verifyEmail();
        exit(); */

    /* case 'reset_password_request':
        $authController->resetPasswordRequest();
        exit();

    case 'reset_password':
        $authController->resetPassword();
        exit(); */

    // Pages affichées directement
    case 'userProfil':
        $page = "user/profil";
        break;
    case 'verifyEmail':
        $page = "verificationEmail";
        break;
    case 'register_form':
        $page = "register";
        break;
    case 'login_form':
        $page = "login";
        break;
    case 'reeni_page':
        $page = "reeniEmail";
        break;
    case 'dashboard':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login_form");
            exit();
        }
        $page = "dashboard";
        break;
    default:
        $page = "404"; // Page d'erreur
}

// Charger le bon layout en fonction du type de page
if (in_array($action, $authPages)) {
    require "Views/auth_layout.php";
} else {
    require "Views/layout.php";
}