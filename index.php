<?php
session_start();

// Redirection automatique vers le dashboard si l'utilisateur est connecté
if (isset($_SESSION['user']) && (!isset($_GET['action']) || $_GET['action'] == 'login_form')) {
    header("Location: index.php?action=dashboard");
    exit();
}


// Inclure les dépendances principales
require_once 'config/database.php';
require_once 'core/Router.php';
require_once 'app/Controllers/AuthController.php';
require_once 'app/Controllers/UserController.php';

// Initialisation du contrôleur d'authentification
$authController = new AuthController();
//$userController = new UserController();

// Récupérer l'action depuis l'URL
$action = $_GET['action'] ?? 'login_form';

// Pages nécessitant le layout d'authentification
$authPages = ['login_form', 'reset_password', "emailVerifyForm", 'reeni_page'];

// Gestion des routes
switch ($action) {

    case 'login':
        $authController->login();
        exit();
    case 'register':
        $authController->register();
        exit();

    case 'logout':
        $authController->logout();
        exit();

    case 'emailVerify':
        $authController->resetPasswordRequest();
        exit();

    case 'reset_password':
        $authController->resetPassword();
        exit();

    case 'verifyEmail':
        $authController->verifyEmail();
        exit();
    case 'change_role':
        $userController->changeRole();
        exit();

        //  les pages de la vue

    case 'listeUser':
        $page = "user/liste";
        break;
    /* case 'gest':
        $page = "user/gestionUser";
        break;
    case 'userProfil':
        $page = "user/profil";
        break; */
    case 'emailVerifyForm':
        $page = "auth/verificationEmail";
        break;

    case 'login_form':
        $page = "auth/login";
        break;

    case 'reeni_page':  // Page de demande de réinitialisation du mot de passe
        $page = "auth/reeniEmail";
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
$layout = in_array($action, $authPages) ? "Views/layout/auth_layout.php" : "Views/layout/master_layout.php";
require $layout;