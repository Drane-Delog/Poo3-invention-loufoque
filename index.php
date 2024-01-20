<?php

// activer les messages d'erreur
ini_set('display_errors', 1); // utile pour les développeurs
ini_set('display_startup_errors', 1); // utile pour les développeurs
error_reporting(E_ALL);

echo $_SERVER['REQUEST_URI'];

$url = explode(
    "/",
    filter_var(rtrim($_SERVER['REQUEST_URI'], "/"), FILTER_SANITIZE_URL)
);

$lastURL = end($url);

$map = [
    'accueil' => ['accueil', 'accueil', null],
    'Invention' => ['Invention', 'accueil', null],
    'contact' => ['contact', 'accueil', null],
    null => ['accueil', 'accueil', null]
];

if (is_numeric($lastURL)) {
    $controller = 'Invention';
} elseif (in_array($lastURL, array_keys($map))) {
    list($controller, $action, $id) = $map[$lastURL];
} else {
    $controller = 'accueil';
    $action = 'accueil';
    $id = null;
    echo "<br>404</br>";
}

echo "<pre>";
print_r($url);
echo "</pre>";

// routeur
switch ($action) {
    case 'accueil':
        require_once 'views/accueil.views.php'; // Updated path
        break;
    case 'Invention':
        require_once 'Invention.controller.php';
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
        require_once 'contact.views.php';
        break;
    default:
        require_once 'accueil.views.php'; // page par défaut
        break;
}

?>