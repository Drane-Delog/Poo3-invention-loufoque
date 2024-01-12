<?php

// activer les messages d'erreur

use function PHPSTORM_META\map;

ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

/*les url sont de la forme /post/lire/2 ici, post c'est le controller, lire c'est l'action et 2 c'est l'id du post */

echo $_SERVER['REQUEST_URI'];

$url = explode(
        "/",
     filter_var
     (rtrim($_SERVER['REQUEST_URI'], "/"),
      FILTER_SANITIZE_URL
    ));

    $lastURL = end($url);

    $map = [
        'accueil' => ['accueil', 'accueil', null],
        'Invention' => ['Invention', 'accueil', null],
        'contact' => ['contact', 'accueil', null],
        null => ['accueil', 'accueil', null]
    ];

     if (is_numeric($lastURL)) {
        $controller = 'Invention';


    } elseif ( in_array($lastURL, array_keys($map))) {
        list($controller, $action, $id) = $map($lastURL);
    

    } else {
        $controller = 'accueil';
        $action = 'accueil';
        $id = null;
        echo "<br>404</br>";
    }

    echo "<pre>";
    print_r($url);
    echo "</pre>";

//On ne garde que les 3 dernier éléments du tableau
list($controller, $action, $id) = array_slice($url, -3, 3, true);



//on regarder le dernier élément du tableau
//si c'est vide, on met accueil par défaut
//si c'est accueil, on met accueil par défaut
//si c'est invention, on met invention par défaut
//sinon si c'est un nombre, on va mettre le controleur a blog et l'action a lire.


// routeur
switch (@$_GET['action']) {
    case 'accueil':
        require_once 'views/accueil.view.php';
        break;
    case 'Invention':
        require_once 'controllers/Invention.controller.php';
        $Invention_Controller = new Invention_controller();

        if ($action === 'lire') {
            $Invention_Controller->displaySinglePosts($id);
            break;
        } elseif ($action === 'add') {
            $Invention_Controller->displayAddPost();
            break;
        }

        $Invention_Controller->displayPosts();
        break;
    case 'contact':
        require_once 'views/contact.view.php';
        break;
    default:
        require_once 'views/accueil.view.php'; // page par défaut
        break;
}

?>