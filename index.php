<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="partials/style.css">
</head>
<body>
    
    <?php include('partials/navbar.php')?>   

    <header class="banner">
        <h1>Bienvenue sur Game in Life</h1>
        <?php if (!$isUserConnected) : ?>
            <button><a href="authentification/login.php">Se connecter</a></button>
        <?php elseif (!$userHasCharacter) : ?>
            <button><a href="create.php">Créer votre personnage</a></button>
        <?php else : ?>
            <button><a href="profil_page.php">Afficher votre personnage</a></button>
        <?php endif; ?>
    </header>
    
</body>
</html>