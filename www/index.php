<?php
session_start();
define("SITE_URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require "models/users/UsersManager.class.php";
require "controllers/livres/LivreController.controller.php";
require "controllers/users/UserController.controller.php";

$usersManager = new UserManager;
$livresController = new LivresController;
$usersController = new UsersController();
// Routeur

try {
    if (empty($_GET['page'])) {
        $livresController->afficherLivresAll(); // page par défaut
    } else {
        // $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $url = explode("/", $_GET['page']);
        switch ($url[0]) {
                // case 'accueil':
                //     $livresController->afficher(); // Appel de la vue Acuueil
                //     break;
            case 'livres':
                if (empty($url[1])) {
                    $livresController->ajouterLivre(); // Appel de la vue Livres
                } else if ($url[1] === "l") {
                    echo "Afficher livre"; // appel controller
                } else if ($url[1] === "a") {
                    echo "ajout livre";
                } else if ($url[1] === "av") {
                    $livresController->ajoutLivreValidation();
                } else if ($url[1] === "m") {
                    echo "modifier livre";
                } else if ($url[1] === "s") {
                    echo "supprimer livre";
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case 'a-propos':
                require "views/users/a-propos.view.php"; // Appel de la vue Livres
                break;
            case 'connexion':
                $usersController->connexion(); // Appel de la vue Livres
                break;
            case 'deconnexion':
                $usersController->deconnexion(); // Appel methode deconnexion
                break;
            default:
                throw new Exception("La page n'existe pas"); // page d'erreur
                break;
        }
    }
} catch (Exception $e) {
    // echo $e->getMessage();
    require "views/error/error.view.php";
}
