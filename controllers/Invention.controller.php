<?php
require_once('model/PostManager.class.php');
class Invention_controller
{
    private $postManager; // permet d'accéder aux méthodes de la classe PostManager
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->postManager->getPostsFromDb();
    }
    public function displayPosts()
    {
        global $post; // on récupère la variable globale $posts en la créant dans l'espace de nom global
        $post = $this->postManager->getPosts(); // on récupère les posts depuis la base de données
        require_once('views/Invention.view.php');
    }

    public function displaySinglePosts($id)
    {
        global $posts;
        $posts = $this->postManager->getPostById
        ($id); 
        require_once('views/Invention.view.php');
    }

    public function displayAddPost()
    {
        require_once('views/AddPost.view.php');
    }



}