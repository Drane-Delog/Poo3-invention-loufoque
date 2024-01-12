<?php


ob_start();
?>

<h1> Ajout d'un nouvel article (post)</h1>
<a href="#"><button type="button" class="btn btn-secondary">Ajouter un post</button></a>

<?php
$title = 'AddPost';
$content = ob_get_clean(); // clean c'est comme retirer la banane du pot d'échappement
require_once 'template.php';