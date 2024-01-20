<?php

global $titre;

// activer les messages d'erreur
//liste de liens avec URL et label (titre)
$ListeLiens = [
    'accueil' => './Accueil',
    'Invention' => './Invention',
    'Contact' => './Contact'
    ] ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title> <!-- Corrected here -->
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
</head>
<!-- Rest of your code -->
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Basculer le menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <?php
        foreach ($ListeLiens as $label => $url) {
            echo "<li class='nav-item'><a class='nav-link' href='$url'>$label</a></li>";
        ?>

        <li class="nav-item">
          
          <a 
          class="nav-link" <?php

          //strtolower() permet de mettre en minuscule
          //ca permet de comparer par ex Accueil et accueil

          if (strtolower($titre) === @$_GET['action']) {
              echo 'active';

              //active permet de mettre en surbrillance le lien actif
              //sinon ca ferait class="nav-linkactive"
          }
          ?>

           href="./Invention.php"></a>

        </li>
        <?php
        }
        ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<main class="container">
    <?= $content ?>
</main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>